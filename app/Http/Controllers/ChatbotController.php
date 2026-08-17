<?php

namespace App\Http\Controllers;

use App\Models\ChatbotKnowledge;
use App\Models\SiteSetting;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ChatbotController extends Controller
{
    public function message(Request $request): JsonResponse
    {
        $request->validate(['message' => 'required|string|max:1000']);

        $userMessage = trim($request->input('message'));
        $locale      = app()->getLocale();
        $history     = session('chat_history', []);

        $context       = $this->searchKnowledge($userMessage);
        $systemPrompt  = $this->buildSystemPrompt($locale, $context);

        $messages = [['role' => 'system', 'content' => $systemPrompt]];

        foreach (array_slice($history, -(config('chatbot.history_limit') * 2)) as $msg) {
            $messages[] = $msg;
        }
        $messages[] = ['role' => 'user', 'content' => $userMessage];

        $reply = $this->callOpenAI($messages);

        $history[] = ['role' => 'user',      'content' => $userMessage];
        $history[] = ['role' => 'assistant', 'content' => $reply];

        if (count($history) > 40) {
            $history = array_slice($history, -40);
        }
        session(['chat_history' => $history]);

        return response()->json(['reply' => $reply]);
    }

    public function clearHistory(): JsonResponse
    {
        session()->forget('chat_history');
        return response()->json(['success' => true]);
    }

    private function searchKnowledge(string $query): string
    {
        // 1. Try exact-phrase search first
        $entries = ChatbotKnowledge::active()
            ->search($query)
            ->orderBy('order_index')
            ->limit(5)
            ->get();

        // 2. If nothing matched, try individual keyword search
        if ($entries->isEmpty()) {
            $keywords = $this->extractKeywords($query);
            if (!empty($keywords)) {
                $entries = ChatbotKnowledge::active()
                    ->searchByKeywords($keywords)
                    ->orderBy('order_index')
                    ->limit(5)
                    ->get();

                // Score by keyword relevance — put entries that match more keywords first
                if ($entries->count() > 1) {
                    $entries = $entries->sortByDesc(function ($item) use ($keywords) {
                        $text = strtolower(
                            ($item->title_ar ?? '') . ' ' .
                            ($item->title_en ?? '') . ' ' .
                            ($item->content_ar ?? '') . ' ' .
                            ($item->content_en ?? '') . ' ' .
                            ($item->tags ?? '')
                        );
                        return collect($keywords)->filter(fn($kw) => str_contains($text, $kw))->count();
                    })->values()->take(3);
                }
            }
        }

        if ($entries->isEmpty()) return '';

        $locale  = app()->getLocale();
        $context = '';

        foreach ($entries as $item) {
            $title   = $locale === 'ar' ? $item->title_ar : ($item->title_en ?: $item->title_ar);
            $content = $locale === 'ar' ? $item->content_ar : ($item->content_en ?: $item->content_ar);
            $context .= "### {$title}\n{$content}\n\n";
        }

        return trim($context);
    }

    private function extractKeywords(string $query): array
    {
        static $stopWords = [
            'من', 'في', 'على', 'إلى', 'عن', 'مع', 'هل', 'ما', 'ماذا', 'هو', 'هي', 'هم',
            'أن', 'لا', 'كل', 'شو', 'شو', 'اللي', 'كيف', 'متى', 'أين', 'وين', 'كم', 'قديش',
            'لو', 'إذا', 'عند', 'بعد', 'قبل', 'يجب', 'أريد', 'اريد', 'أرغب', 'بدي', 'بدك',
            'ابي', 'ابغى', 'ممكن', 'قادر', 'هناك', 'هنا', 'هون', 'لي', 'لك', 'له', 'لها',
            'عندي', 'عندك', 'انا', 'أنا', 'انت', 'أنت', 'احنا', 'نحن', 'هاي', 'هذا', 'هذه',
            'الي', 'التي', 'الذي', 'عليه', 'عليها', 'يا', 'يب', 'او', 'أو', 'و', 'ف',
        ];

        $words = preg_split('/[\s،,\.؟?!:؛;]+/u', $query, -1, PREG_SPLIT_NO_EMPTY);

        $keywords = [];
        foreach ($words as $word) {
            $word = trim($word);
            if (mb_strlen($word, 'UTF-8') < 3) continue;
            if (in_array($word, $stopWords, true))  continue;

            // Strip Arabic definite article "ال" prefix, keep root if ≥ 3 chars
            if (mb_substr($word, 0, 2, 'UTF-8') === 'ال') {
                $root = mb_substr($word, 2, null, 'UTF-8');
                if (mb_strlen($root, 'UTF-8') >= 3) {
                    $keywords[] = $root;
                    continue;
                }
            }

            $keywords[] = $word;
        }

        return array_values(array_unique($keywords));
    }

    private function buildSystemPrompt(string $locale, string $context): string
    {
        $clinicName = SiteSetting::val('identity.site_name', $locale);
        $phone      = SiteSetting::raw('contact.phone');
        $hours      = SiteSetting::val('contact.working_hours', $locale);

        if ($locale === 'ar') {
            $base = "أنتِ سارة، موظفة الاستقبال في {$clinicName}. تتحدثين مع المرضى وذويهم بأسلوب دافئ وإنساني وطبيعي تماماً كما تفعل موظفة استقبال حقيقية ومتخصصة.

قواعد صارمة يجب الالتزام بها:
- لا تذكري أبداً أنكِ ذكاء اصطناعي أو روبوت أو AI — أنتِ سارة، إنسانة حقيقية
- إذا سألك أحد عمن تكونين، قولي: «أنا سارة من فريق {$clinicName}، كيف أقدر أساعدك؟»
- تحدثي بعربية فصيحة بسيطة ودافئة — لا جفاء ولا رسمية مبالغة
- كوني متعاطفة مع المريض وتفهمي ظروفه بدفء
- لا تعطي تشخيصات طبية محددة — وجهي دائماً للطبيب المختص
- للمواعيد: «يسعدني مساعدتك في تحديد موعد، يمكنك الاتصال على {$phone} أو الحجز من الموقع مباشرة»
- أوقات العمل: {$hours}
- ردودك تكون موجزة وواضحة ومفيدة — 2 إلى 4 جمل في الغالب
- لا تبدأي كل رد بـ\"بالطبع\" أو \"أهلاً\" — تنوعي في المقدمات
- اسألي أسئلة متابعة عند الحاجة لتفهم احتياج المريض أكثر
- **هام جداً**: لا تخترعي أي معلومات محددة خاصة بالعيادة مثل الأسعار أو أرقام الهواتف أو المواعيد أو العناوين إلا إذا كانت مذكورة صراحةً في المعلومات المقدمة أدناه";

            if ($context) {
                $base .= "\n\nمعلومات العيادة — استخدميها كما هي دون تعديل أو إضافة:\n{$context}";
            } else {
                $base .= "\n\nلا تتوفر معلومات محددة لهذا السؤال في قاعدة بياناتنا. أجيبي بشكل عام إذا كان السؤال طبياً عاماً، أما إذا كان السؤال عن أسعار أو مواعيد أو تفاصيل خاصة بالعيادة فقولي: «للحصول على المعلومات الدقيقة، يمكنك الاتصال على {$phone} وسيسعد فريقنا بمساعدتك.»";
            }
        } else {
            $base = "You are Sara, a warm and professional reception staff member at {$clinicName}. You speak with patients and their families in a caring, natural, human way — exactly like a real clinic receptionist.

Strict rules:
- Never say you are an AI, robot, or chatbot — you are Sara, a real person
- If someone asks who you are: \"I'm Sara from the {$clinicName} team, how can I help you?\"
- Be warm, empathetic, and understanding toward patients
- Do not give specific medical diagnoses — always refer to the specialist doctor
- For appointments: \"I'd be happy to help schedule an appointment, you can call us at {$phone} or book online\"
- Working hours: {$hours}
- Keep responses concise and helpful — usually 2 to 4 sentences
- Vary your opening phrases — don't always start with \"Of course\" or \"Hello\"
- Ask follow-up questions when needed to understand the patient's needs better
- **Critical**: Never invent clinic-specific details (prices, phone numbers, addresses, schedules) unless they are explicitly stated in the context provided below";

            if ($context) {
                $base .= "\n\nClinic information — use exactly as provided, do not modify or add to it:\n{$context}";
            } else {
                $base .= "\n\nNo specific clinic information is available for this question. Answer general medical questions from general knowledge. For clinic-specific questions (prices, schedules, locations), say: \"For accurate details, please call us at {$phone} and our team will be happy to help.\"";
            }
        }

        return $base;
    }

    private function callOpenAI(array $messages): string
    {
        $apiKey = config('chatbot.openai_key');
        $locale = app()->getLocale();

        if (empty($apiKey)) {
            return $locale === 'ar'
                ? 'عذراً، خدمة الدردشة غير متاحة حالياً. يرجى الاتصال بنا مباشرة.'
                : 'Sorry, the chat service is unavailable right now. Please contact us directly.';
        }

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $apiKey,
                'Content-Type'  => 'application/json',
            ])->timeout(30)->post('https://api.openai.com/v1/chat/completions', [
                'model'       => config('chatbot.model', 'gpt-4o-mini'),
                'messages'    => $messages,
                'max_tokens'  => config('chatbot.max_tokens', 400),
                'temperature' => config('chatbot.temperature', 0.75),
            ]);

            if ($response->successful()) {
                $content = $response->json('choices.0.message.content');
                return $content ? trim($content) : $this->fallback();
            }

            Log::warning('ChatBot API error', ['status' => $response->status(), 'body' => $response->body()]);
        } catch (\Exception $e) {
            Log::error('ChatBot exception: ' . $e->getMessage());
        }

        return $this->fallback();
    }

    private function fallback(): string
    {
        return app()->getLocale() === 'ar'
            ? 'حدث خطأ تقني، يرجى المحاولة مجدداً أو الاتصال بنا مباشرة على الخط الساخن.'
            : 'A technical error occurred. Please try again or call our hotline directly.';
    }
}

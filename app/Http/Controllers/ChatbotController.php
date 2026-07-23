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
        // Try full-text keyword search first
        $entries = ChatbotKnowledge::active()
            ->search($query)
            ->orderBy('order_index')
            ->limit(5)
            ->get();

        // If nothing matched, pull general/clinic-info entries as background context
        if ($entries->isEmpty()) {
            $entries = ChatbotKnowledge::active()
                ->whereIn('category', ['general', 'services', 'locations', 'hours'])
                ->orderBy('order_index')
                ->limit(4)
                ->get();
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
- اسألي أسئلة متابعة عند الحاجة لتفهم احتياج المريض أكثر";

            if ($context) {
                $base .= "\n\nمعلومات المركز التي يجب استخدامها في الإجابة:\n{$context}";
            } else {
                $base .= "\n\nأجيبي من معرفتك العامة بالطب العصبي والصحة النفسية مع ذكر أن المريض يتصل بنا للاستفسار الدقيق.";
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
- Ask follow-up questions when needed to understand the patient's needs better";

            if ($context) {
                $base .= "\n\nClinic information to use in your answer:\n{$context}";
            } else {
                $base .= "\n\nAnswer from your general knowledge of neurology and mental health, mentioning that the patient can contact us for precise information.";
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

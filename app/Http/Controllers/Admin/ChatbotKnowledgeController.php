<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ChatbotKnowledgeTemplateExport;
use App\Http\Controllers\Controller;
use App\Imports\ChatbotKnowledgeImport;
use App\Models\ChatbotKnowledge;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ChatbotKnowledgeController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:chatbot-table')->only(['index', 'show', 'downloadTemplate']);
        $this->middleware('permission:chatbot-add')->only(['create', 'store', 'import']);
        $this->middleware('permission:chatbot-edit')->only(['edit', 'update', 'toggleActive']);
        $this->middleware('permission:chatbot-delete')->only(['destroy']);
    }

    public function index()
    {
        $entries = ChatbotKnowledge::orderBy('order_index')->orderBy('category')->get();
        return view('admin.chatbot.index', compact('entries'));
    }

    public function create()
    {
        $chatbot = null;
        return view('admin.chatbot.create', compact('chatbot'));
    }

    private function rules(): array
    {
        return [
            'category'   => 'required|string|max:50',
            'title_ar'   => 'required|string|max:255',
            'title_en'   => 'nullable|string|max:255',
            'content_ar' => 'required|string',
            'content_en' => 'nullable|string',
            'tags'       => 'nullable|string|max:500',
            'order_index'=> 'nullable|integer',
        ];
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->rules());
        $data['is_active']   = $request->boolean('is_active', true);
        $data['order_index'] = $data['order_index'] ?? 0;

        ChatbotKnowledge::create($data);

        return redirect()->route('admin.chatbot.index')->with('success', 'تمت إضافة المعلومة بنجاح.');
    }

    public function show(ChatbotKnowledge $chatbot)
    {
        return redirect()->route('admin.chatbot.edit', $chatbot->id);
    }

    public function edit(ChatbotKnowledge $chatbot)
    {
        return view('admin.chatbot.edit', compact('chatbot'));
    }

    public function update(Request $request, ChatbotKnowledge $chatbot)
    {
        $data = $request->validate($this->rules());
        $data['is_active']   = $request->boolean('is_active');
        $data['order_index'] = $data['order_index'] ?? 0;

        $chatbot->update($data);

        return redirect()->route('admin.chatbot.index')->with('success', 'تم تحديث المعلومة بنجاح.');
    }

    public function destroy(ChatbotKnowledge $chatbot)
    {
        $chatbot->delete();
        return back()->with('success', 'تم حذف المعلومة.');
    }

    public function toggleActive(ChatbotKnowledge $chatbot)
    {
        $chatbot->update(['is_active' => !$chatbot->is_active]);
        return back()->with('success', 'تم تحديث الحالة.');
    }

    public function downloadTemplate()
    {
        return Excel::download(new ChatbotKnowledgeTemplateExport(), 'chatbot-template.xlsx');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls,csv|max:10240',
        ], [
            'file.required' => 'يرجى اختيار ملف للاستيراد.',
            'file.mimes'    => 'صيغة الملف غير مدعومة. استخدم xlsx أو xls أو csv.',
            'file.max'      => 'حجم الملف كبير جداً (الحد الأقصى 10 ميغابايت).',
        ]);

        if ($request->boolean('truncate_first')) {
            ChatbotKnowledge::truncate();
        }

        $import = new ChatbotKnowledgeImport();
        Excel::import($import, $request->file('file'));

        return redirect()->route('admin.chatbot.index')
            ->with('success', "تم استيراد {$import->importedCount} سؤال وجواب بنجاح.");
    }
}

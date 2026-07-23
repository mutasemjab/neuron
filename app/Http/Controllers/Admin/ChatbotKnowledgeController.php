<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChatbotKnowledge;
use Illuminate\Http\Request;

class ChatbotKnowledgeController extends Controller
{
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
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::orderBy('order_index')->get();
        return view('admin.faqs.index', compact('faqs'));
    }

    public function create()
    {
        return view('admin.faqs.create');
    }

    private function rules(): array
    {
        return [
            'question_ar' => 'required|string|max:255',
            'question_en' => 'required|string|max:255',
            'answer_ar'   => 'required|string',
            'answer_en'   => 'required|string',
            'order_index' => 'nullable|integer',
        ];
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->rules());
        $data['is_active']   = $request->boolean('is_active', true);
        $data['order_index'] = $data['order_index'] ?? 0;

        Faq::create($data);

        return redirect()->route('admin.faqs.index')->with('success', 'تمت إضافة السؤال بنجاح.');
    }

    public function edit(Faq $faq)
    {
        return view('admin.faqs.edit', compact('faq'));
    }

    public function update(Request $request, Faq $faq)
    {
        $data = $request->validate($this->rules());
        $data['is_active']   = $request->boolean('is_active');
        $data['order_index'] = $data['order_index'] ?? 0;

        $faq->update($data);

        return redirect()->route('admin.faqs.index')->with('success', 'تم تحديث السؤال بنجاح.');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();
        return back()->with('success', 'تم حذف السؤال.');
    }

    public function toggleActive(Faq $faq)
    {
        $faq->update(['is_active' => ! $faq->is_active]);
        return back()->with('success', 'تم تحديث الحالة.');
    }
}

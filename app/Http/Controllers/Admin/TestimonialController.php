<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::with('doctor')->orderBy('order_index')->get();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        $doctors = Doctor::orderBy('order_index')->get();
        return view('admin.testimonials.create', compact('doctors'));
    }

    private function rules(): array
    {
        return [
            'patient_name_ar' => 'required|string|max:150',
            'patient_name_en' => 'required|string|max:150',
            'role_text_ar'    => 'nullable|string|max:150',
            'role_text_en'    => 'nullable|string|max:150',
            'quote_ar'        => 'required|string',
            'quote_en'        => 'required|string',
            'rating'          => 'nullable|integer|min:1|max:5',
            'avatar'          => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'doctor_id'       => 'nullable|exists:doctors,id',
            'procedure_ar'    => 'nullable|string|max:200',
            'procedure_en'    => 'nullable|string|max:200',
            'order_index'     => 'nullable|integer',
        ];
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->rules());

        if ($request->hasFile('avatar')) {
            $data['avatar'] = uploadImage('assets/uploads/testimonials', $request->file('avatar'));
        }

        $data['rating']      = $data['rating'] ?? 5;
        $data['is_active']   = $request->boolean('is_active', true);
        $data['order_index'] = $data['order_index'] ?? 0;

        Testimonial::create($data);

        return redirect()->route('admin.testimonials.index')->with('success', 'تمت إضافة الشهادة بنجاح.');
    }

    public function edit(Testimonial $testimonial)
    {
        $doctors = Doctor::orderBy('order_index')->get();
        return view('admin.testimonials.edit', compact('testimonial', 'doctors'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $data = $request->validate($this->rules());

        if ($request->hasFile('avatar')) {
            $data['avatar'] = uploadImage('assets/uploads/testimonials', $request->file('avatar'));
        }

        $data['rating']      = $data['rating'] ?? 5;
        $data['is_active']   = $request->boolean('is_active');
        $data['order_index'] = $data['order_index'] ?? 0;

        $testimonial->update($data);

        return redirect()->route('admin.testimonials.index')->with('success', 'تم تحديث الشهادة بنجاح.');
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return back()->with('success', 'تم الحذف.');
    }

    public function toggleActive(Testimonial $testimonial)
    {
        $testimonial->update(['is_active' => ! $testimonial->is_active]);
        return back()->with('success', 'تم تحديث الحالة.');
    }
}

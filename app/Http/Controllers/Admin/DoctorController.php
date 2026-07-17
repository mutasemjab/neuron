<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::orderBy('order_index')->get();
        return view('admin.doctors.index', compact('doctors'));
    }

    public function create()
    {
        return view('admin.doctors.create');
    }

    private function rules(): array
    {
        return [
            'name_ar'           => 'required|string|max:150',
            'name_en'           => 'required|string|max:150',
            'specialization_ar' => 'required|string|max:150',
            'specialization_en' => 'required|string|max:150',
            'title_ar'          => 'required|string|max:200',
            'title_en'          => 'required|string|max:200',
            'bio_ar'            => 'nullable|string',
            'bio_en'            => 'nullable|string',
            'certifications_ar' => 'nullable|string',
            'certifications_en' => 'nullable|string',
            'tags_ar'           => 'nullable|string|max:255',
            'tags_en'           => 'nullable|string|max:255',
            'image'             => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'order_index'       => 'nullable|integer',
        ];
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->rules());

        if ($request->hasFile('image')) {
            $data['image'] = uploadImage('assets/uploads/doctors', $request->file('image'));
        }

        $data['is_active']   = $request->boolean('is_active', true);
        $data['order_index'] = $data['order_index'] ?? 0;

        Doctor::create($data);

        return redirect()->route('admin.doctors.index')->with('success', 'تمت إضافة الطبيب بنجاح.');
    }

    public function edit(Doctor $doctor)
    {
        return view('admin.doctors.edit', compact('doctor'));
    }

    public function update(Request $request, Doctor $doctor)
    {
        $data = $request->validate($this->rules());

        if ($request->hasFile('image')) {
            $data['image'] = uploadImage('assets/uploads/doctors', $request->file('image'));
        }

        $data['is_active']   = $request->boolean('is_active');
        $data['order_index'] = $data['order_index'] ?? 0;

        $doctor->update($data);

        return redirect()->route('admin.doctors.index')->with('success', 'تم تحديث بيانات الطبيب بنجاح.');
    }

    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
        return back()->with('success', 'تم حذف الطبيب.');
    }

    public function toggleActive(Doctor $doctor)
    {
        $doctor->update(['is_active' => ! $doctor->is_active]);
        return back()->with('success', 'تم تحديث الحالة.');
    }
}

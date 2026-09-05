<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\DoctorPublication;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:doctor-table')->only(['index']);
        $this->middleware('permission:doctor-add')->only(['create', 'store']);
        $this->middleware('permission:doctor-edit')->only(['edit', 'update', 'toggleActive']);
        $this->middleware('permission:doctor-delete')->only(['destroy']);
    }

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
            'education_ar'      => 'nullable|string',
            'education_en'      => 'nullable|string',
            'training_ar'       => 'nullable|string',
            'training_en'       => 'nullable|string',
            'affiliation_ar'    => 'nullable|string',
            'affiliation_en'    => 'nullable|string',
            'memberships_ar'    => 'nullable|string',
            'memberships_en'    => 'nullable|string',
            'tags_ar'           => 'nullable|string|max:255',
            'tags_en'           => 'nullable|string|max:255',
            'image'             => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'order_index'       => 'nullable|integer',
            'publications'                  => 'nullable|array',
            'publications.*.title_ar'       => 'required_with:publications.*|string|max:500',
            'publications.*.title_en'       => 'nullable|string|max:500',
            'publications.*.year'           => 'nullable|integer|min:1900|max:2100',
            'publications.*.url'            => 'nullable|url|max:500',
            'publications.*.order_index'    => 'nullable|integer',
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

        $doctor = Doctor::create($data);

        $this->syncPublications($doctor, $request->input('publications', []));

        return redirect()->route('admin.doctors.index')->with('success', 'تمت إضافة الطبيب بنجاح.');
    }

    public function edit(Doctor $doctor)
    {
        $doctor->load('publications');
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

        $this->syncPublications($doctor, $request->input('publications', []));

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

    private function syncPublications(Doctor $doctor, array $rows): void
    {
        $doctor->publications()->delete();

        foreach (array_values($rows) as $i => $row) {
            $titleAr = trim($row['title_ar'] ?? '');
            if ($titleAr === '') continue;

            DoctorPublication::create([
                'doctor_id'   => $doctor->id,
                'title_ar'    => $titleAr,
                'title_en'    => trim($row['title_en'] ?? '') ?: null,
                'year'        => !empty($row['year']) ? (int) $row['year'] : null,
                'url'         => trim($row['url'] ?? '') ?: null,
                'order_index' => isset($row['order_index']) && $row['order_index'] !== '' ? (int) $row['order_index'] : $i,
            ]);
        }
    }
}

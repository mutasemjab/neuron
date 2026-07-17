<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CareerJob;
use Illuminate\Http\Request;

class CareerJobController extends Controller
{
    public function index()
    {
        $jobs = CareerJob::orderBy('order_index')->get();
        return view('admin.career_jobs.index', compact('jobs'));
    }

    public function create()
    {
        return view('admin.career_jobs.create');
    }

    private function rules(): array
    {
        return [
            'title_ar'       => 'required|string|max:200',
            'title_en'       => 'required|string|max:200',
            'type_ar'        => 'nullable|string|max:100',
            'type_en'        => 'nullable|string|max:100',
            'description_ar' => 'required|string',
            'description_en' => 'required|string',
            'location_ar'    => 'nullable|string|max:150',
            'location_en'    => 'nullable|string|max:150',
            'order_index'    => 'nullable|integer',
        ];
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->rules());
        $data['is_active']   = $request->boolean('is_active', true);
        $data['order_index'] = $data['order_index'] ?? 0;

        CareerJob::create($data);

        return redirect()->route('admin.career-jobs.index')->with('success', 'تمت إضافة الوظيفة بنجاح.');
    }

    public function edit(CareerJob $career_job)
    {
        return view('admin.career_jobs.edit', ['job' => $career_job]);
    }

    public function update(Request $request, CareerJob $career_job)
    {
        $data = $request->validate($this->rules());
        $data['is_active']   = $request->boolean('is_active');
        $data['order_index'] = $data['order_index'] ?? 0;

        $career_job->update($data);

        return redirect()->route('admin.career-jobs.index')->with('success', 'تم تحديث الوظيفة بنجاح.');
    }

    public function destroy(CareerJob $career_job)
    {
        $career_job->delete();
        return back()->with('success', 'تم الحذف.');
    }

    public function toggleActive(CareerJob $career_job)
    {
        $career_job->update(['is_active' => ! $career_job->is_active]);
        return back()->with('success', 'تم تحديث الحالة.');
    }
}

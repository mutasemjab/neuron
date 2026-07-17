<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InsuranceCompany;
use Illuminate\Http\Request;

class InsuranceCompanyController extends Controller
{
    public function index()
    {
        $insuranceCompanies = InsuranceCompany::orderBy('order_index')->get();
        return view('admin.insurance_companies.index', compact('insuranceCompanies'));
    }

    public function create()
    {
        return view('admin.insurance_companies.create');
    }

    private function rules(): array
    {
        return [
            'name_ar'     => 'required|string|max:150',
            'name_en'     => 'required|string|max:150',
            'subtitle_ar' => 'nullable|string|max:150',
            'subtitle_en' => 'nullable|string|max:150',
            'order_index' => 'nullable|integer',
        ];
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->rules());
        $data['is_active']   = $request->boolean('is_active', true);
        $data['order_index'] = $data['order_index'] ?? 0;

        InsuranceCompany::create($data);

        return redirect()->route('admin.insurance-companies.index')->with('success', 'تمت إضافة شركة التأمين بنجاح.');
    }

    public function edit(InsuranceCompany $insurance_company)
    {
        return view('admin.insurance_companies.edit', ['insuranceCompany' => $insurance_company]);
    }

    public function update(Request $request, InsuranceCompany $insurance_company)
    {
        $data = $request->validate($this->rules());
        $data['is_active']   = $request->boolean('is_active');
        $data['order_index'] = $data['order_index'] ?? 0;

        $insurance_company->update($data);

        return redirect()->route('admin.insurance-companies.index')->with('success', 'تم التحديث بنجاح.');
    }

    public function destroy(InsuranceCompany $insurance_company)
    {
        $insurance_company->delete();
        return back()->with('success', 'تم الحذف.');
    }

    public function toggleActive(InsuranceCompany $insurance_company)
    {
        $insurance_company->update(['is_active' => ! $insurance_company->is_active]);
        return back()->with('success', 'تم تحديث الحالة.');
    }
}

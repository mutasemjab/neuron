<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index()
    {
        $branches = Branch::orderBy('order_index')->get();
        return view('admin.branches.index', compact('branches'));
    }

    public function create()
    {
        return view('admin.branches.create');
    }

    private function rules(): array
    {
        return [
            'name_ar'           => 'required|string|max:150',
            'name_en'           => 'required|string|max:150',
            'badge_ar'          => 'nullable|string|max:100',
            'badge_en'          => 'nullable|string|max:100',
            'address_ar'        => 'required|string',
            'address_en'        => 'required|string',
            'working_hours_ar'  => 'nullable|string|max:150',
            'working_hours_en'  => 'nullable|string|max:150',
            'phone'             => 'nullable|string|max:50',
            'map_query'         => 'nullable|string|max:255',
            'is_main'           => 'nullable|boolean',
            'order_index'       => 'nullable|integer',
        ];
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->rules());
        $data['is_main']     = $request->boolean('is_main');
        $data['is_active']   = $request->boolean('is_active', true);
        $data['order_index'] = $data['order_index'] ?? 0;

        Branch::create($data);

        return redirect()->route('admin.branches.index')->with('success', 'تمت إضافة الفرع بنجاح.');
    }

    public function edit(Branch $branch)
    {
        return view('admin.branches.edit', compact('branch'));
    }

    public function update(Request $request, Branch $branch)
    {
        $data = $request->validate($this->rules());
        $data['is_main']     = $request->boolean('is_main');
        $data['is_active']   = $request->boolean('is_active');
        $data['order_index'] = $data['order_index'] ?? 0;

        $branch->update($data);

        return redirect()->route('admin.branches.index')->with('success', 'تم تحديث بيانات الفرع بنجاح.');
    }

    public function destroy(Branch $branch)
    {
        $branch->delete();
        return back()->with('success', 'تم حذف الفرع.');
    }

    public function toggleActive(Branch $branch)
    {
        $branch->update(['is_active' => ! $branch->is_active]);
        return back()->with('success', 'تم تحديث الحالة.');
    }
}

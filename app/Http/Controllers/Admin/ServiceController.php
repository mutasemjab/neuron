<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('order_index')->get();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title_ar'       => 'required|string|max:200',
            'title_en'       => 'required|string|max:200',
            'description_ar' => 'required|string',
            'description_en' => 'required|string',
            'image'          => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'is_featured'    => 'nullable|boolean',
            'order_index'    => 'nullable|integer',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = uploadImage('assets/uploads/services', $request->file('image'));
        }

        $data['is_featured'] = $request->boolean('is_featured');
        $data['is_active']   = $request->boolean('is_active', true);
        $data['order_index'] = $data['order_index'] ?? 0;

        Service::create($data);

        return redirect()->route('admin.services.index')->with('success', 'تمت إضافة الخدمة بنجاح.');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $data = $request->validate([
            'title_ar'       => 'required|string|max:200',
            'title_en'       => 'required|string|max:200',
            'description_ar' => 'required|string',
            'description_en' => 'required|string',
            'image'          => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'is_featured'    => 'nullable|boolean',
            'order_index'    => 'nullable|integer',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = uploadImage('assets/uploads/services', $request->file('image'));
        }

        $data['is_featured'] = $request->boolean('is_featured');
        $data['is_active']   = $request->boolean('is_active');
        $data['order_index'] = $data['order_index'] ?? 0;

        $service->update($data);

        return redirect()->route('admin.services.index')->with('success', 'تم تحديث الخدمة بنجاح.');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return back()->with('success', 'تم حذف الخدمة.');
    }

    public function toggleActive(Service $service)
    {
        $service->update(['is_active' => ! $service->is_active]);
        return back()->with('success', 'تم تحديث الحالة.');
    }
}

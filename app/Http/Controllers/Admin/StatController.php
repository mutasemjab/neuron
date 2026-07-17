<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Stat;
use Illuminate\Http\Request;

class StatController extends Controller
{
    public function index()
    {
        $stats = Stat::orderBy('section')->orderBy('order_index')->get()->groupBy('section');
        return view('admin.stats.index', compact('stats'));
    }

    public function create()
    {
        return view('admin.stats.create');
    }

    private function rules(): array
    {
        return [
            'section'     => 'required|in:hero,main',
            'number'      => 'required|integer|min:0',
            'suffix'      => 'nullable|string|max:10',
            'label_ar'    => 'required|string|max:150',
            'label_en'    => 'required|string|max:150',
            'order_index' => 'nullable|integer',
        ];
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->rules());
        $data['is_active']   = $request->boolean('is_active', true);
        $data['order_index'] = $data['order_index'] ?? 0;

        Stat::create($data);

        return redirect()->route('admin.stats.index')->with('success', 'تمت إضافة الرقم بنجاح.');
    }

    public function edit(Stat $stat)
    {
        return view('admin.stats.edit', compact('stat'));
    }

    public function update(Request $request, Stat $stat)
    {
        $data = $request->validate($this->rules());
        $data['is_active']   = $request->boolean('is_active');
        $data['order_index'] = $data['order_index'] ?? 0;

        $stat->update($data);

        return redirect()->route('admin.stats.index')->with('success', 'تم التحديث بنجاح.');
    }

    public function destroy(Stat $stat)
    {
        $stat->delete();
        return back()->with('success', 'تم الحذف.');
    }

    public function toggleActive(Stat $stat)
    {
        $stat->update(['is_active' => ! $stat->is_active]);
        return back()->with('success', 'تم تحديث الحالة.');
    }
}

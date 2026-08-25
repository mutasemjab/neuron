<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClosedDate;
use Illuminate\Http\Request;

class ClosedDateController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:closed-date-table')->only(['index']);
        $this->middleware('permission:closed-date-add')->only(['store']);
        $this->middleware('permission:closed-date-delete')->only(['destroy']);
    }

    public function index()
    {
        $closedDates = ClosedDate::orderBy('date')->get();

        return view('admin.closed_dates.index', compact('closedDates'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'date'     => 'required|date|unique:closed_dates,date',
            'label_ar' => 'nullable|string|max:150',
            'label_en' => 'nullable|string|max:150',
        ]);

        ClosedDate::create($data);

        return back()->with('success', 'تمت إضافة اليوم المغلق بنجاح.');
    }

    public function destroy(ClosedDate $closedDate)
    {
        $closedDate->delete();

        return back()->with('success', 'تم حذف اليوم المغلق.');
    }
}

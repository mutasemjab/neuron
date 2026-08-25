<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:consultation-table')->only(['index', 'show']);
        $this->middleware('permission:consultation-status')->only(['updateStatus']);
        $this->middleware('permission:consultation-delete')->only(['destroy']);
    }

    public function index(Request $request)
    {
        $consultations = Consultation::when($request->status, fn ($q, $s) => $q->where('status', $s))
            ->when($request->search, fn ($q, $s) => $q
                ->where('name', 'like', "%{$s}%")
                ->orWhere('email', 'like', "%{$s}%")
                ->orWhere('phone', 'like', "%{$s}%")
            )
            ->latest()
            ->paginate(15)
            ->withQueryString();

        $counts = [
            'new'       => Consultation::where('status', 'new')->count(),
            'contacted' => Consultation::where('status', 'contacted')->count(),
            'scheduled' => Consultation::where('status', 'scheduled')->count(),
            'closed'    => Consultation::where('status', 'closed')->count(),
        ];

        return view('admin.consultations.index', compact('consultations', 'counts'));
    }

    public function show(Consultation $consultation)
    {
        return view('admin.consultations.show', compact('consultation'));
    }

    public function updateStatus(Request $request, Consultation $consultation)
    {
        $request->validate(['status' => 'required|in:new,contacted,scheduled,closed']);

        $consultation->update(['status' => $request->status]);

        return back()->with('success', 'تم تحديث حالة طلب الاستشارة.');
    }

    public function destroy(Consultation $consultation)
    {
        $consultation->delete();

        return back()->with('success', 'تم حذف طلب الاستشارة.');
    }
}

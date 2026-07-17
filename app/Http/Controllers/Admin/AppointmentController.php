<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index(Request $request)
    {
        $appointments = Appointment::with(['branch', 'doctor'])
            ->when($request->status, fn ($q, $s) => $q->where('status', $s))
            ->when($request->search, fn ($q, $s) => $q
                ->where('name', 'like', "%{$s}%")
                ->orWhere('phone', 'like', "%{$s}%")
            )
            ->latest()
            ->paginate(15)
            ->withQueryString();

        $counts = [
            'new'       => Appointment::where('status', 'new')->count(),
            'contacted' => Appointment::where('status', 'contacted')->count(),
            'confirmed' => Appointment::where('status', 'confirmed')->count(),
            'cancelled' => Appointment::where('status', 'cancelled')->count(),
        ];

        return view('admin.appointments.index', compact('appointments', 'counts'));
    }

    public function show(Appointment $appointment)
    {
        $appointment->load(['branch', 'doctor']);
        return view('admin.appointments.show', compact('appointment'));
    }

    public function updateStatus(Request $request, Appointment $appointment)
    {
        $request->validate(['status' => 'required|in:new,contacted,confirmed,cancelled']);

        $appointment->update(['status' => $request->status]);

        return back()->with('success', 'تم تحديث حالة الحجز.');
    }

    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return back()->with('success', 'تم حذف الحجز.');
    }
}

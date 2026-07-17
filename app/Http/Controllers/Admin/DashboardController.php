<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Article;
use App\Models\Branch;
use App\Models\ContactMessage;
use App\Models\Doctor;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'new_appointments' => Appointment::where('status', 'new')->count(),
            'total_doctors'    => Doctor::where('is_active', true)->count(),
            'total_articles'   => Article::where('is_active', true)->count(),
            'total_branches'   => Branch::where('is_active', true)->count(),
            'unread_messages'  => ContactMessage::where('status', 'new')->count(),
        ];

        $recentAppointments = Appointment::with('branch')->latest()->limit(5)->get();
        $recentContacts     = ContactMessage::where('status', 'new')->latest()->limit(5)->get();

        return view('admin.dashboard', compact('stats', 'recentAppointments', 'recentContacts'));
    }
}

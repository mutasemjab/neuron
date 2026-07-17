<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Branch;
use App\Models\CareerJob;
use App\Models\ContactMessage;
use App\Models\Doctor;
use App\Models\Faq;
use App\Models\InsuranceCompany;
use App\Models\Service;
use App\Models\Stat;
use App\Models\Testimonial;
use App\Models\Video;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $services       = Service::active()->get();
        $doctors        = Doctor::active()->get();
        $branches       = Branch::active()->get();
        $faqs           = Faq::active()->get();
        $insuranceCompanies = InsuranceCompany::active()->get();
        $videos         = Video::active()->get();
        $testimonials   = Testimonial::active()->with('doctor')->get();
        $careerJobs     = CareerJob::active()->get();
        $articles       = Article::published()->limit(3)->get();
        $heroStats      = Stat::active()->section('hero')->get();
        $mainStats      = Stat::active()->section('main')->get();

        return view('front.home', compact(
            'services', 'doctors', 'branches', 'faqs', 'insuranceCompanies',
            'videos', 'testimonials', 'careerJobs', 'articles', 'heroStats', 'mainStats'
        ));
    }

    public function contact(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:200',
            'email'   => 'required|email|max:200',
            'phone'   => 'nullable|string|max:30',
            'subject' => 'nullable|string|max:200',
            'message' => 'required|string|max:3000',
        ]);

        $nameParts = explode(' ', trim($validated['name']), 2);

        ContactMessage::create([
            'first_name' => $nameParts[0],
            'last_name'  => $nameParts[1] ?? '',
            'email'      => $validated['email'],
            'phone'      => $validated['phone'] ?? null,
            'subject'    => $validated['subject'] ?? 'General',
            'message'    => $validated['message'],
            'status'     => 'new',
        ]);

        return back()->with('contact_success', true);
    }

    public function storeAppointment(Request $request)
    {
        $isAr = app()->getLocale() === 'ar';

        $validated = $request->validate([
            'name'                 => 'required|string|max:150',
            'phone'                => 'required|string|max:30',
            'branch_id'            => 'required|exists:branches,id',
            'doctor_id'            => 'nullable|exists:doctors,id',
            'preferred_date'       => 'required|date|after_or_equal:today',
            'preferred_time_slot'  => 'required|string|max:100',
            'notes'                => 'nullable|string|max:2000',
        ]);

        $validated['status'] = 'new';

        $appointment = \App\Models\Appointment::create($validated);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => $isAr ? 'تم استلام طلبك بنجاح.' : 'Your request has been received successfully.',
            ]);
        }

        return back()->with('appointment_success', true);
    }
}

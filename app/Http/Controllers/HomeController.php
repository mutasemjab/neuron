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
use App\Models\SubscriptionPlan;
use App\Models\Testimonial;
use App\Models\Video;
use App\Mail\NewAppointmentNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        $subscriptionPlans = SubscriptionPlan::active()->get();

        return view('front.home', compact(
            'services', 'doctors', 'branches', 'faqs', 'insuranceCompanies',
            'videos', 'testimonials', 'careerJobs', 'articles', 'heroStats', 'mainStats',
            'subscriptionPlans'
        ));
    }

    public function bookingPage()
    {
        $branches = Branch::active()->get();
        $doctors  = Doctor::active()->get();

        return view('front.booking', compact('branches', 'doctors'));
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
            'booking_type'         => 'nullable|in:domestic,international',
            'preferred_date'       => 'required|date|after_or_equal:today',
            'preferred_time_slot'  => 'required|string|max:100',
            'notes'                => 'nullable|string|max:2000',
            'attachment'           => 'nullable|file|mimes:pdf,jpg,jpeg,png,doc,docx|max:10240',
        ]);

        if ($request->hasFile('attachment')) {
            $validated['attachment'] = uploadImage('assets/uploads/appointments', $request->file('attachment'));
        }

        $validated['booking_type'] = $validated['booking_type'] ?? 'domestic';
        $validated['status'] = 'new';

        $appointment = \App\Models\Appointment::create($validated);

        $notifyEmail = sett_raw('contact.booking_notification_email');
        if ($notifyEmail) {
            try {
                Mail::to($notifyEmail)->send(new NewAppointmentNotification($appointment));
            } catch (\Throwable $e) {
                report($e);
            }
        }

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => $isAr ? 'تم استلام طلبك بنجاح.' : 'Your request has been received successfully.',
            ]);
        }

        return back()->with('appointment_success', true);
    }
}

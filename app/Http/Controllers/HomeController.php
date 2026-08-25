<?php

namespace App\Http\Controllers;

use App\Mail\ConsultationReceivedConfirmation;
use App\Mail\NewAppointmentNotification;
use App\Mail\NewConsultationNotification;
use App\Models\Appointment;
use App\Models\Article;
use App\Models\Branch;
use App\Models\CareerJob;
use App\Models\ClosedDate;
use App\Models\Consultation;
use App\Models\ContactMessage;
use App\Models\Doctor;
use App\Models\Faq;
use App\Models\InsuranceCompany;
use App\Models\Service;
use App\Models\Stat;
use App\Models\SubscriptionPlan;
use App\Models\Testimonial;
use App\Models\Video;
use Carbon\Carbon;
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
        $branches    = Branch::active()->get();
        $countries   = config('countries');
        $closedDates = ClosedDate::pluck('date')->map(fn ($d) => $d->format('Y-m-d'))->values();

        return view('front.booking', compact('branches', 'countries', 'closedDates'));
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
            'name'                => 'required|string|max:150',
            'phone_country_code'  => 'required|string|max:6',
            'phone'               => ['required', 'string', 'max:30', function ($attribute, $value, $fail) use ($request, $isAr) {
                if ($request->input('phone_country_code') === '+962') {
                    if (! preg_match('/^(077|078|079)\d{7}$/', $value)) {
                        $fail($isAr
                            ? 'الرقم الأردني يجب أن يبدأ بـ 077 أو 078 أو 079 ويتكوّن من 10 أرقام.'
                            : 'Jordanian numbers must start with 077, 078, or 079 and be 10 digits.');
                    }
                } elseif (! preg_match('/^\d{6,15}$/', $value)) {
                    $fail($isAr ? 'رقم الهاتف غير صالح.' : 'Invalid phone number.');
                }
            }],
            'email'               => 'nullable|email|max:200',
            'branch_id'           => 'required|exists:branches,id',
            'preferred_date'      => ['required', 'date', 'after_or_equal:today', function ($attribute, $value, $fail) use ($isAr) {
                $date = Carbon::parse($value);
                if ($date->dayOfWeek === Carbon::FRIDAY) {
                    $fail($isAr ? 'الحجز غير متاح يوم الجمعة.' : 'Booking is not available on Fridays.');

                    return;
                }
                if (ClosedDate::where('date', $date->toDateString())->exists()) {
                    $fail($isAr ? 'هذا التاريخ عطلة رسمية وغير متاح للحجز.' : 'This date is a public holiday and unavailable for booking.');
                }
            }],
            'preferred_time_slot' => 'required|string|max:100',
            'payment_method'      => 'required|in:insurance,cash',
            'visited_before'      => 'required|boolean',
        ]);

        $validated['status'] = 'new';

        $appointment = Appointment::create($validated);

        $this->notifyTeam(sett_raw('contact.domestic_notification_emails'), new NewAppointmentNotification($appointment));

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => $isAr ? 'تم استلام طلبك بنجاح.' : 'Your request has been received successfully.',
            ]);
        }

        return back()->with('appointment_success', true);
    }

    public function storeConsultation(Request $request)
    {
        $isAr = app()->getLocale() === 'ar';

        $validated = $request->validate([
            'name'                   => 'required|string|max:150',
            'email'                  => 'required|email|max:200',
            'phone_country_code'     => 'required|string|max:6',
            'phone'                  => 'required|string|max:30',
            'country_of_residence'   => 'required|string|max:100',
            'date_of_birth'          => 'required|date|before:today',
            'preferred_days'         => 'required|array|min:1',
            'preferred_days.*'       => 'in:sunday,monday,tuesday,thursday',
            'preferred_periods'      => 'required|array|min:1',
            'preferred_periods.*'    => 'in:morning,afternoon',
            'condition_description'  => 'required|string|max:3000',
            'attachments'            => 'nullable|array|max:5',
            'attachments.*'          => 'file|mimes:pdf,jpg,jpeg,png|max:10240',
            'privacy_consent'        => 'accepted',
        ]);

        $storedFiles = [];
        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $file) {
                $storedFiles[] = uploadImage('assets/uploads/consultations', $file);
            }
        }

        $consultation = Consultation::create([
            'name'                  => $validated['name'],
            'email'                 => $validated['email'],
            'phone_country_code'    => $validated['phone_country_code'],
            'phone'                 => $validated['phone'],
            'country_of_residence'  => $validated['country_of_residence'],
            'date_of_birth'         => $validated['date_of_birth'],
            'preferred_days'        => $validated['preferred_days'],
            'preferred_periods'     => $validated['preferred_periods'],
            'condition_description' => $validated['condition_description'],
            'attachments'           => $storedFiles,
            'privacy_consent'       => true,
            'status'                => 'new',
        ]);

        try {
            Mail::to($consultation->email)->send(new ConsultationReceivedConfirmation($consultation));
        } catch (\Throwable $e) {
            report($e);
        }

        $this->notifyTeam(sett_raw('contact.international_notification_emails'), new NewConsultationNotification($consultation));

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => $isAr ? 'تم استلام طلب الاستشارة بنجاح.' : 'Your consultation request has been received successfully.',
            ]);
        }

        return back()->with('consultation_success', true);
    }

    /**
     * Send a notification mailable to every address in a comma-separated setting value.
     */
    private function notifyTeam(string $emailsCsv, $mailable): void
    {
        $emails = collect(explode(',', $emailsCsv))
            ->map(fn ($e) => trim($e))
            ->filter(fn ($e) => filter_var($e, FILTER_VALIDATE_EMAIL))
            ->values();

        if ($emails->isEmpty()) {
            return;
        }

        try {
            Mail::to($emails->all())->send($mailable);
        } catch (\Throwable $e) {
            report($e);
        }
    }
}

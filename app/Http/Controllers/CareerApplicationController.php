<?php

namespace App\Http\Controllers;

use App\Models\CareerJob;
use App\Models\JobApplication;
use Illuminate\Http\Request;

class CareerApplicationController extends Controller
{
    public function show(CareerJob $careerJob)
    {
        abort_unless($careerJob->is_active, 404);

        return view('front.careers.apply', compact('careerJob'));
    }

    public function store(Request $request, CareerJob $careerJob)
    {
        $isAr = app()->getLocale() === 'ar';

        $validated = $request->validate([
            'name'    => 'required|string|max:150',
            'phone'   => 'required|string|max:30',
            'email'   => 'required|email|max:200',
            'cv'      => 'nullable|file|mimes:pdf,doc,docx|max:10240',
            'message' => 'nullable|string|max:2000',
        ]);

        if ($request->hasFile('cv')) {
            $validated['cv'] = uploadImage('assets/uploads/job_applications', $request->file('cv'));
        }

        $validated['career_job_id'] = $careerJob->id;
        $validated['status'] = 'new';

        JobApplication::create($validated);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => $isAr ? 'تم استلام طلبك بنجاح.' : 'Your application has been received successfully.',
            ]);
        }

        return back()->with('application_success', true);
    }
}

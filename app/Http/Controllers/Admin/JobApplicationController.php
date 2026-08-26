<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use Illuminate\Http\Request;

class JobApplicationController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:job-application-table')->only(['index', 'show']);
        $this->middleware('permission:job-application-status')->only(['updateStatus']);
        $this->middleware('permission:job-application-delete')->only(['destroy']);
    }

    public function index(Request $request)
    {
        $applications = JobApplication::with(['careerJob', 'branch'])
            ->when($request->status, fn ($q, $s) => $q->where('status', $s))
            ->when($request->search, fn ($q, $s) => $q
                ->where('name', 'like', "%{$s}%")
                ->orWhere('phone', 'like', "%{$s}%")
                ->orWhere('email', 'like', "%{$s}%")
            )
            ->latest()
            ->paginate(15)
            ->withQueryString();

        $counts = [
            'new'       => JobApplication::where('status', 'new')->count(),
            'reviewed'  => JobApplication::where('status', 'reviewed')->count(),
            'contacted' => JobApplication::where('status', 'contacted')->count(),
            'rejected'  => JobApplication::where('status', 'rejected')->count(),
        ];

        return view('admin.job_applications.index', compact('applications', 'counts'));
    }

    public function show(JobApplication $jobApplication)
    {
        $jobApplication->load(['careerJob', 'branch']);

        return view('admin.job_applications.show', compact('jobApplication'));
    }

    public function updateStatus(Request $request, JobApplication $jobApplication)
    {
        $request->validate(['status' => 'required|in:new,reviewed,contacted,rejected']);

        $jobApplication->update(['status' => $request->status]);

        return back()->with('success', 'تم تحديث حالة الطلب.');
    }

    public function destroy(JobApplication $jobApplication)
    {
        $jobApplication->delete();

        return back()->with('success', 'تم حذف الطلب.');
    }
}

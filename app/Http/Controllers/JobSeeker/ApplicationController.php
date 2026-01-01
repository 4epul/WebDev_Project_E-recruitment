<?php

namespace App\Http\Controllers\JobSeeker;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application form for a specific job.
     */
    public function create($jobId)
    {
        $user = Auth::user();

        if ($user->role !== 'jobseeker') {
            abort(403, 'Unauthorized access');
        }

        $job = Job::where('status', 'open')
            ->where('deadline', '>=', now())
            ->findOrFail($jobId);

        // Check if user already applied
        $existingApplication = Application::where('user_id', $user->id)
            ->where('job_id', $jobId)
            ->first();

        if ($existingApplication) {
            return redirect()->route('jobseeker.jobs.show', $jobId)
                ->with('error', 'You have already applied for this job!');
        }

        return view('jobseeker.applications.create', compact('job'));
    }

    /**
     * Store a newly created application.
     */
    public function store(Request $request, $jobId)
    {
        $user = Auth::user();

        if ($user->role !== 'jobseeker') {
            abort(403, 'Unauthorized access');
        }

        $job = Job::where('status', 'open')
            ->where('deadline', '>=', now())
            ->findOrFail($jobId);

        // Check if user already applied
        $existingApplication = Application::where('user_id', $user->id)
            ->where('job_id', $jobId)
            ->first();

        if ($existingApplication) {
            return redirect()->route('jobseeker.jobs.show', $jobId)
                ->with('error', 'You have already applied for this job!');
        }

        $validated = $request->validate([
            'cover_letter' => 'required|string|min:50',
        ]);

        $application = new Application();
        $application->user_id = $user->id;
        $application->job_id = $jobId;
        $application->cover_letter = $validated['cover_letter'];
        $application->resume_path = null;
        $application->status = 'pending';
        $application->save();

        return redirect()->route('jobseeker.applications.index')
            ->with('success', 'Application submitted successfully!');
    }

    /**
     * Display all applications for the authenticated job seeker.
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->role !== 'jobseeker') {
            abort(403, 'Unauthorized access');
        }

        $applications = Application::where('user_id', $user->id)
            ->with('job')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('jobseeker.applications.index', compact('applications'));
    }

    /**
     * Display the specified application.
     */
    public function show($id)
    {
        $user = Auth::user();

        if ($user->role !== 'jobseeker') {
            abort(403, 'Unauthorized access');
        }

        $application = Application::where('id', $id)
            ->where('user_id', $user->id)
            ->with('job')
            ->firstOrFail();

        return view('jobseeker.applications.show', compact('application'));
    }
}

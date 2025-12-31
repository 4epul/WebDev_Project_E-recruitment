<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new job.
     */
    public function create()
    {
        $user = Auth::user();

        if ($user->role !== 'employer') {
            abort(403, 'Unauthorized access');
        }

        return view('employer.jobs.create');
    }

    /**
     * Store a newly created job in database.
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        if ($user->role !== 'employer') {
            abort(403, 'Unauthorized access');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'requirements' => 'required|string',
            'location' => 'required|string|max:255',
            'job_type' => 'required|in:full-time,part-time,contract,internship',
            'salary_min' => 'nullable|numeric|min:0',
            'salary_max' => 'nullable|numeric|min:0',
            'deadline' => 'required|date|after:today',
        ]);

        $job = new Job();
        $job->company_id = $user->id;
        $job->title = $validated['title'];
        $job->description = $validated['description'];
        $job->requirements = $validated['requirements'];
        $job->responsibilities = 'Not specified'; // Default value
        $job->location = $validated['location'];
        $job->job_type = $validated['job_type'];
        $job->salary_min = $validated['salary_min'];
        $job->salary_max = $validated['salary_max'];
        $job->experience_level = 'Any'; // Default value
        $job->category = 'General'; // Default value
        $job->deadline = $validated['deadline'];
        $job->status = 'open';
        $job->save();

        return redirect()->route('employer.jobs.index')->with('success', 'Job posted successfully!');
    }

    /**
     * Display a listing of employer's jobs.
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->role !== 'employer') {
            abort(403, 'Unauthorized access');
        }

        $jobs = Job::where('company_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('employer.jobs.index', compact('jobs'));
    }

    /**
     * Show the form for editing the specified job.
     */
    public function edit($id)
    {
        $user = Auth::user();

        if ($user->role !== 'employer') {
            abort(403, 'Unauthorized access');
        }

        $job = Job::where('id', $id)
            ->where('company_id', $user->id)
            ->firstOrFail();

        return view('employer.jobs.edit', compact('job'));
    }

    /**
     * Update the specified job in database.
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user();

        if ($user->role !== 'employer') {
            abort(403, 'Unauthorized access');
        }

        $job = Job::where('id', $id)
            ->where('company_id', $user->id)
            ->firstOrFail();

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'requirements' => 'required|string',
            'location' => 'required|string|max:255',
            'job_type' => 'required|in:full-time,part-time,contract,internship',
            'salary_min' => 'nullable|numeric|min:0',
            'salary_max' => 'nullable|numeric|min:0',
            'deadline' => 'required|date',
            'status' => 'required|in:open,closed,draft',
        ]);

        $job->update($validated);

        return redirect()->route('employer.jobs.index')->with('success', 'Job updated successfully!');
    }

    /**
     * Remove the specified job from database.
     */
    public function destroy($id)
    {
        $user = Auth::user();

        if ($user->role !== 'employer') {
            abort(403, 'Unauthorized access');
        }

        $job = Job::where('id', $id)
            ->where('company_id', $user->id)
            ->firstOrFail();

        $job->delete();

        return redirect()->route('employer.jobs.index')->with('success', 'Job deleted successfully!');
    }
}

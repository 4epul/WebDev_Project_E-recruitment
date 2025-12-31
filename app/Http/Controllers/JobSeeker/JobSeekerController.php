<?php

namespace App\Http\Controllers\JobSeeker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobSeekerController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the job seeker dashboard.
     */
    public function dashboard()
    {
        $user = Auth::user();

        // Make sure only job seekers can access
        if ($user->role !== 'jobseeker') {
            abort(403, 'Unauthorized access');
        }

        return view('jobseeker.dashboard');
    }
}

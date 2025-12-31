<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployerController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the employer dashboard.
     */
    public function dashboard()
    {
        $user = Auth::user();

        // Make sure only employers can access
        if ($user->role !== 'employer') {
            abort(403, 'Unauthorized access');
        }

        return view('employer.dashboard');
    }
}

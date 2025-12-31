<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Employer Routes
Route::middleware(['auth', 'prevent-back-history'])->prefix('employer')->name('employer.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Employer\EmployerController::class, 'dashboard'])->name('dashboard');

    // Job Routes
    Route::get('/jobs', [App\Http\Controllers\Employer\JobController::class, 'index'])->name('jobs.index');
    Route::get('/jobs/create', [App\Http\Controllers\Employer\JobController::class, 'create'])->name('jobs.create');
    Route::post('/jobs', [App\Http\Controllers\Employer\JobController::class, 'store'])->name('jobs.store');
    Route::get('/jobs/{id}/edit', [App\Http\Controllers\Employer\JobController::class, 'edit'])->name('jobs.edit');
    Route::put('/jobs/{id}', [App\Http\Controllers\Employer\JobController::class, 'update'])->name('jobs.update');
    Route::delete('/jobs/{id}', [App\Http\Controllers\Employer\JobController::class, 'destroy'])->name('jobs.destroy');
});

// Job Seeker Routes
Route::middleware(['auth', 'prevent-back-history'])->prefix('jobseeker')->name('jobseeker.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\JobSeeker\JobSeekerController::class, 'dashboard'])->name('dashboard');

    // Job Routes
    Route::get('/jobs', [App\Http\Controllers\JobSeeker\JobController::class, 'index'])->name('jobs.index');
    Route::get('/jobs/{id}', [App\Http\Controllers\JobSeeker\JobController::class, 'show'])->name('jobs.show');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

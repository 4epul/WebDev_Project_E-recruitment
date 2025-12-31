@extends('layouts.app')

@section('content')
<style>
    .dashboard-header {
        background: linear-gradient(135deg, #2557a7 0%, #164081 100%);
        color: white;
        padding: 40px 0;
        margin-bottom: 40px;
    }

    .dashboard-card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        transition: all 0.3s;
        height: 100%;
        overflow: hidden;
    }

    .dashboard-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }

    .card-icon {
        width: 60px;
        height: 60px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
        margin-bottom: 20px;
    }

    .card-primary {
        background: linear-gradient(135deg, #2557a7 0%, #164081 100%);
        color: white;
    }

    .card-success {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        color: white;
    }

    .card-warning {
        background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
        color: white;
    }

    .dashboard-btn {
        border: none;
        padding: 12px 30px;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s;
    }

    .stat-box {
        background: white;
        border-radius: 12px;
        padding: 25px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        margin-bottom: 20px;
    }

    .stat-number {
        font-size: 36px;
        font-weight: 700;
        color: #2557a7;
    }

    .profile-completion {
        background: white;
        border-radius: 12px;
        padding: 25px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    .progress {
        height: 10px;
        border-radius: 10px;
    }

    .progress-bar {
        background: linear-gradient(135deg, #2557a7 0%, #164081 100%);
    }
</style>

<div class="dashboard-header">
    <div class="container">
        <h1 class="mb-2">Welcome back, {{ Auth::user()->name }}!</h1>
        <p class="mb-0 opacity-75">Your job search journey continues here</p>
    </div>
</div>

<div class="container">
    <!-- Profile Completion Alert -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="profile-completion">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h5 class="fw-bold mb-1">Complete Your Profile</h5>
                        <p class="text-muted mb-0 small">A complete profile increases your chances of getting hired</p>
                    </div>
                    <span class="badge bg-primary" style="font-size: 16px;">30%</span>
                </div>
                <div class="progress mb-3">
                    <div class="progress-bar" role="progressbar" style="width: 30%"></div>
                </div>
                <a href="#" class="btn btn-sm btn-primary">
                    <i class="bi bi-pencil-square me-2"></i>Complete Profile
                </a>
            </div>
        </div>
    </div>

    <!-- Quick Stats -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="stat-box text-center">
                <i class="bi bi-file-earmark-check-fill fs-1 text-primary mb-2"></i>
                <div class="stat-number">0</div>
                <div class="text-muted">Applications</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-box text-center">
                <i class="bi bi-bookmark-fill fs-1 text-success mb-2"></i>
                <div class="stat-number">0</div>
                <div class="text-muted">Saved Jobs</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-box text-center">
                <i class="bi bi-eye-fill fs-1 text-info mb-2"></i>
                <div class="stat-number">0</div>
                <div class="text-muted">Profile Views</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-box text-center">
                <i class="bi bi-envelope-fill fs-1 text-warning mb-2"></i>
                <div class="stat-number">0</div>
                <div class="text-muted">Messages</div>
            </div>
        </div>
    </div>

    <!-- Action Cards -->
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card dashboard-card card-primary">
                <div class="card-body p-4">
                    <div class="card-icon">
                        <i class="bi bi-search"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Browse Jobs</h4>
                    <p class="mb-4 opacity-90">Discover thousands of job opportunities that match your skills</p>
                    <a href="{{ route('jobseeker.jobs.index') }}" class="btn dashboard-btn btn-light text-primary">
                        <i class="bi bi-search me-2"></i>Find Jobs
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card dashboard-card card-success">
                <div class="card-body p-4">
                    <div class="card-icon">
                        <i class="bi bi-file-text"></i>
                    </div>
                    <h4 class="fw-bold mb-3">My Applications</h4>
                    <p class="mb-4 opacity-90">Track the status of all your job applications</p>
                    <a href="#" class="btn dashboard-btn btn-light text-success">
                        <i class="bi bi-list-check me-2"></i>View Applications
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card dashboard-card card-warning">
                <div class="card-body p-4">
                    <div class="card-icon">
                        <i class="bi bi-person-circle"></i>
                    </div>
                    <h4 class="fw-bold mb-3">My Profile</h4>
                    <p class="mb-4 opacity-90">Update your resume, skills, and experience</p>
                    <a href="#" class="btn dashboard-btn btn-light text-warning">
                        <i class="bi bi-pencil me-2"></i>Edit Profile
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Recommended Jobs Section -->
    <div class="row mt-5">
        <div class="col-12">
            <div class="card dashboard-card">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-4">
                        <i class="bi bi-star-fill me-2" style="color: #2557a7;"></i>Recommended Jobs
                    </h5>
                    <div class="text-center py-5 text-muted">
                        <i class="bi bi-briefcase fs-1 mb-3"></i>
                        <p class="mb-0">Complete your profile to get personalized job recommendations!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
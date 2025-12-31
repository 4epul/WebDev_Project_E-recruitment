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

    .card-info {
        background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
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
</style>

<div class="dashboard-header">
    <div class="container">
        <h1 class="mb-2">Welcome back, {{ Auth::user()->name }}!</h1>
        <p class="mb-0 opacity-75">Manage your job postings and track applications</p>
    </div>
</div>

<div class="container">
    <!-- Quick Stats -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="stat-box text-center">
                <i class="bi bi-briefcase-fill fs-1 text-primary mb-2"></i>
                <div class="stat-number">0</div>
                <div class="text-muted">Active Jobs</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-box text-center">
                <i class="bi bi-file-earmark-text-fill fs-1 text-success mb-2"></i>
                <div class="stat-number">0</div>
                <div class="text-muted">Applications</div>
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
                <i class="bi bi-people-fill fs-1 text-warning mb-2"></i>
                <div class="stat-number">0</div>
                <div class="text-muted">Shortlisted</div>
            </div>
        </div>
    </div>

    <!-- Action Cards -->
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card dashboard-card card-primary">
                <div class="card-body p-4">
                    <div class="card-icon">
                        <i class="bi bi-plus-circle-fill"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Post a Job</h4>
                    <p class="mb-4 opacity-90">Create and publish new job listings to attract qualified candidates</p>
                    <a href="{{ route('employer.jobs.create') }}" class="btn dashboard-btn btn-light text-primary">
                        <i class="bi bi-plus-lg me-2"></i>Create New Job
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card dashboard-card card-success">
                <div class="card-body p-4">
                    <div class="card-icon">
                        <i class="bi bi-list-ul"></i>
                    </div>
                    <h4 class="fw-bold mb-3">My Jobs</h4>
                    <p class="mb-4 opacity-90">View and manage all your job postings in one place</p>
                    <a href="{{ route('employer.jobs.index') }}" class="btn dashboard-btn btn-light text-success">
                        <i class="bi bi-briefcase me-2"></i>View All Jobs
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card dashboard-card card-info">
                <div class="card-body p-4">
                    <div class="card-icon">
                        <i class="bi bi-inbox-fill"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Applications</h4>
                    <p class="mb-4 opacity-90">Review and manage candidate applications for your jobs</p>
                    <a href="#" class="btn dashboard-btn btn-light text-info">
                        <i class="bi bi-file-text me-2"></i>View Applications
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activity Section -->
    <div class="row mt-5">
        <div class="col-12">
            <div class="card dashboard-card">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-4">
                        <i class="bi bi-clock-history me-2" style="color: #2557a7;"></i>Recent Activity
                    </h5>
                    <div class="text-center py-5 text-muted">
                        <i class="bi bi-inbox fs-1 mb-3"></i>
                        <p class="mb-0">No recent activity yet. Start by posting your first job!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<style>
    .application-details-container {
        padding: 40px 0;
        background-color: #f8f9fa;
    }

    .application-header {
        background: linear-gradient(135deg, #2557a7 0%, #164081 100%);
        color: white;
        padding: 50px 20px;
        margin-bottom: 40px;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .btn-back {
        background: white;
        color: #2557a7;
        border: 2px solid #2557a7;
        padding: 0.65rem 1.5rem;
        border-radius: 8px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s;
        display: inline-block;
        margin-bottom: 20px;
    }

    .btn-back:hover {
        background: #2557a7;
        color: white;
    }

    .content-card {
        background: white;
        border-radius: 12px;
        padding: 35px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        margin-bottom: 20px;
    }

    .sidebar-card {
        background: white;
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        position: sticky;
        top: 20px;
    }

    .section-title {
        font-size: 1.4rem;
        font-weight: 700;
        color: #2d3748;
        margin-bottom: 20px;
        padding-bottom: 15px;
        border-bottom: 3px solid #2557a7;
    }

    .section-content {
        color: #4a5568;
        line-height: 1.8;
        font-size: 1.05rem;
        white-space: pre-line;
    }

    .info-item {
        display: flex;
        justify-content: space-between;
        padding: 15px 0;
        border-bottom: 1px solid #e9ecef;
    }

    .info-item:last-child {
        border-bottom: none;
    }

    .info-label {
        font-weight: 600;
        color: #6c757d;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .info-label i {
        color: #2557a7;
    }

    .info-value {
        font-weight: 600;
        color: #2d3748;
        text-align: right;
    }

    .badge {
        padding: 0.6rem 1.2rem;
        font-weight: 600;
        border-radius: 6px;
        font-size: 0.95rem;
    }

    .badge-pending {
        background-color: #fff3cd;
        color: #856404;
    }

    .badge-reviewing {
        background-color: #d1ecf1;
        color: #0c5460;
    }

    .badge-shortlisted {
        background-color: #d4edda;
        color: #155724;
    }

    .badge-accepted {
        background-color: #cce5ff;
        color: #004085;
    }

    .badge-rejected {
        background-color: #f8d7da;
        color: #721c24;
    }

    .timeline-item {
        padding: 15px 0;
        border-left: 3px solid #e9ecef;
        padding-left: 25px;
        position: relative;
    }

    .timeline-item::before {
        content: '';
        width: 12px;
        height: 12px;
        background: #2557a7;
        border-radius: 50%;
        position: absolute;
        left: -7.5px;
        top: 20px;
    }

    .timeline-date {
        font-size: 0.85rem;
        color: #6c757d;
        margin-top: 5px;
    }
</style>

<div class="application-details-container">
    <div class="container">
        <a href="{{ route('jobseeker.applications.index') }}" class="btn-back">
            <i class="bi bi-arrow-left me-2"></i>Back to My Applications
        </a>

        <!-- Header -->
        <div class="application-header">
            <div class="container">
                <h1 class="mb-3 fw-bold">Application Details</h1>
                <h3 class="mb-3">{{ $application->job->title }}</h3>
                <div class="d-flex gap-4 flex-wrap">
                    <span>
                        <i class="bi bi-geo-alt-fill me-2"></i>
                        {{ $application->job->location }}
                    </span>
                    <span>
                        <i class="bi bi-briefcase-fill me-2"></i>
                        {{ ucfirst(str_replace('-', ' ', $application->job->job_type)) }}
                    </span>
                    @if($application->job->salary_min && $application->job->salary_max)
                    <span>
                        <i class="bi bi-cash-stack me-2"></i>
                        RM {{ number_format($application->job->salary_min) }} - RM {{ number_format($application->job->salary_max) }}
                    </span>
                    @endif
                    <span>
                        <i class="bi bi-calendar-event me-2"></i>
                        Applied {{ $application->created_at->diffForHumans() }}
                    </span>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Main Content -->
            <div class="col-lg-8">
                <!-- Cover Letter -->
                <div class="content-card">
                    <h2 class="section-title">
                        <i class="bi bi-file-text me-2"></i>Your Cover Letter
                    </h2>
                    <div class="section-content">{{ $application->cover_letter }}</div>
                </div>

                <!-- Job Description -->
                <div class="content-card">
                    <h2 class="section-title">
                        <i class="bi bi-info-circle me-2"></i>Job Description
                    </h2>
                    <div class="section-content">{{ $application->job->description }}</div>
                </div>

                <!-- Requirements -->
                <div class="content-card">
                    <h2 class="section-title">
                        <i class="bi bi-list-check me-2"></i>Requirements
                    </h2>
                    <div class="section-content">{{ $application->job->requirements }}</div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="sidebar-card">
                    <!-- Application Status -->
                    <h4 class="fw-bold mb-4">Application Status</h4>

                    <div class="text-center mb-4">
                        <span class="badge badge-{{ $application->status }}">
                            {{ ucfirst($application->status) }}
                        </span>
                    </div>

                    <hr class="my-4">

                    <!-- Application Details -->
                    <h5 class="fw-bold mb-3">Details</h5>

                    <div class="info-item">
                        <span class="info-label">
                            <i class="bi bi-calendar-check"></i>
                            Applied Date
                        </span>
                        <span class="info-value">{{ $application->created_at->format('M d, Y') }}</span>
                    </div>

                    <div class="info-item">
                        <span class="info-label">
                            <i class="bi bi-clock"></i>
                            Time
                        </span>
                        <span class="info-value">{{ $application->created_at->format('h:i A') }}</span>
                    </div>

                    <div class="info-item">
                        <span class="info-label">
                            <i class="bi bi-calendar-event"></i>
                            Job Deadline
                        </span>
                        <span class="info-value">{{ \Carbon\Carbon::parse($application->job->deadline)->format('M d, Y') }}</span>
                    </div>

                    <hr class="my-4">

                    <!-- Timeline -->
                    <h5 class="fw-bold mb-3">Timeline</h5>

                    <div class="timeline-item">
                        <div class="fw-semibold">Application Submitted</div>
                        <div class="timeline-date">{{ $application->created_at->format('M d, Y - h:i A') }}</div>
                    </div>

                    @if($application->status !== 'pending')
                    <div class="timeline-item">
                        <div class="fw-semibold">Status: {{ ucfirst($application->status) }}</div>
                        <div class="timeline-date">{{ $application->updated_at->format('M d, Y - h:i A') }}</div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
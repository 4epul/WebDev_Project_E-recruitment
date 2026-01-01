@extends('layouts.app')

@section('content')
<style>
    .application-container {
        padding: 40px 0;
        background-color: #f8f9fa;
    }

    .application-card {
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .application-header {
        background: linear-gradient(135deg, #2557a7 0%, #164081 100%);
        color: white;
        padding: 40px;
    }

    .application-header h1 {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 15px;
    }

    .job-info {
        background: rgba(255, 255, 255, 0.15);
        border-radius: 8px;
        padding: 20px;
        margin-top: 20px;
    }

    .job-info-item {
        display: inline-block;
        margin-right: 25px;
        margin-bottom: 10px;
    }

    .job-info-item i {
        margin-right: 8px;
    }

    .application-body {
        padding: 40px;
    }

    .form-label {
        font-weight: 600;
        color: #2d3748;
        margin-bottom: 0.75rem;
        font-size: 1.05rem;
    }

    .form-control,
    textarea {
        border: 2px solid #e9ecef;
        border-radius: 8px;
        padding: 0.75rem 1rem;
        transition: all 0.3s;
        font-size: 1rem;
    }

    .form-control:focus,
    textarea:focus {
        border-color: #2557a7;
        box-shadow: 0 0 0 3px rgba(37, 87, 167, 0.1);
    }

    textarea {
        min-height: 250px;
        line-height: 1.8;
    }

    .character-count {
        text-align: right;
        color: #6c757d;
        font-size: 0.9rem;
        margin-top: 8px;
    }

    .btn-submit {
        background: linear-gradient(135deg, #2557a7 0%, #164081 100%);
        color: white;
        border: none;
        padding: 1rem 3rem;
        border-radius: 8px;
        font-weight: 600;
        font-size: 1.1rem;
        transition: all 0.3s;
    }

    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(37, 87, 167, 0.4);
        color: white;
    }

    .btn-cancel {
        background: #6c757d;
        color: white;
        border: none;
        padding: 1rem 3rem;
        border-radius: 8px;
        font-weight: 600;
        font-size: 1.1rem;
        text-decoration: none;
        transition: all 0.3s;
    }

    .btn-cancel:hover {
        background: #5a6268;
        color: white;
    }

    .tips-card {
        background: #e3f2fd;
        border-left: 4px solid #2557a7;
        border-radius: 8px;
        padding: 20px;
        margin-bottom: 30px;
    }

    .tips-card h5 {
        color: #2557a7;
        font-weight: 700;
        margin-bottom: 15px;
    }

    .tips-card ul {
        margin-bottom: 0;
        padding-left: 20px;
    }

    .tips-card li {
        margin-bottom: 8px;
        color: #4a5568;
    }
</style>

<div class="application-container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="application-card">
                    <!-- Header -->
                    <div class="application-header">
                        <h1>
                            <i class="bi bi-send-fill me-2"></i>Apply for Position
                        </h1>
                        <p class="mb-0 opacity-90">Submit your application for this exciting opportunity</p>

                        <div class="job-info">
                            <div class="job-info-item">
                                <i class="bi bi-briefcase-fill"></i>
                                <strong>{{ $job->title }}</strong>
                            </div>
                            <div class="job-info-item">
                                <i class="bi bi-geo-alt-fill"></i>
                                {{ $job->location }}
                            </div>
                            <div class="job-info-item">
                                <i class="bi bi-building"></i>
                                {{ ucfirst(str_replace('-', ' ', $job->job_type)) }}
                            </div>
                            @if($job->salary_min && $job->salary_max)
                            <div class="job-info-item">
                                <i class="bi bi-cash-stack"></i>
                                RM {{ number_format($job->salary_min) }} - RM {{ number_format($job->salary_max) }}
                            </div>
                            @endif
                        </div>
                    </div>

                    <!-- Body -->
                    <div class="application-body">
                        <!-- Tips Card -->
                        <div class="tips-card">
                            <h5>
                                <i class="bi bi-lightbulb-fill me-2"></i>Tips for a Great Cover Letter
                            </h5>
                            <ul>
                                <li>Explain why you're interested in this specific position</li>
                                <li>Highlight your relevant skills and experience</li>
                                <li>Show enthusiasm for the role and company</li>
                                <li>Keep it concise and professional (minimum 50 characters)</li>
                                <li>Proofread for spelling and grammar</li>
                            </ul>
                        </div>

                        <!-- Application Form -->
                        <form method="POST" action="{{ route('jobseeker.applications.store', $job->id) }}">
                            @csrf

                            <div class="mb-4">
                                <label for="cover_letter" class="form-label">
                                    <i class="bi bi-pencil-square me-2"></i>Cover Letter <span class="text-danger">*</span>
                                </label>
                                <textarea class="form-control @error('cover_letter') is-invalid @enderror"
                                    id="cover_letter"
                                    name="cover_letter"
                                    placeholder="Write your cover letter here... Explain why you're the perfect fit for this position."
                                    required>{{ old('cover_letter') }}</textarea>

                                <div class="character-count">
                                    <span id="charCount">0</span> characters
                                </div>

                                @error('cover_letter')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                                <small class="text-muted">Minimum 50 characters required</small>
                            </div>

                            <!-- Action Buttons -->
                            <div class="d-flex gap-3 justify-content-end">
                                <a href="{{ route('jobseeker.jobs.show', $job->id) }}" class="btn btn-cancel">
                                    <i class="bi bi-x-circle me-2"></i>Cancel
                                </a>
                                <button type="submit" class="btn btn-submit">
                                    <i class="bi bi-send-fill me-2"></i>Submit Application
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Character counter
    const textarea = document.getElementById('cover_letter');
    const charCount = document.getElementById('charCount');

    textarea.addEventListener('input', function() {
        charCount.textContent = this.value.length;
    });

    // Initial count
    charCount.textContent = textarea.value.length;
</script>
@endsection
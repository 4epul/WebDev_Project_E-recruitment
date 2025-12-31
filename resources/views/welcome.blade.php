@extends('layouts.app')

@section('content')
<style>
    .hero-section {
        background: linear-gradient(135deg, #2557a7 0%, #164081 100%);
        padding: 80px 0;
        position: relative;
        overflow: hidden;
    }

    .hero-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg"><circle cx="50" cy="50" r="2" fill="rgba(255,255,255,0.1)"/></svg>');
        opacity: 0.3;
    }

    .search-box {
        background: white;
        border-radius: 12px;
        padding: 25px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
    }

    .search-input {
        border: 2px solid #e9ecef;
        border-radius: 8px;
        padding: 14px 20px;
        font-size: 15px;
        transition: all 0.3s;
    }

    .search-input:focus {
        border-color: #2557a7;
        box-shadow: 0 0 0 3px rgba(37, 87, 167, 0.1);
    }

    .search-btn {
        background: linear-gradient(135deg, #2557a7 0%, #164081 100%);
        border: none;
        border-radius: 8px;
        padding: 14px 40px;
        font-weight: 600;
        color: white;
        transition: all 0.3s;
    }

    .search-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(37, 87, 167, 0.4);
    }

    .stat-card {
        text-align: center;
        padding: 35px 20px;
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        transition: all 0.3s;
        height: 100%;
    }

    .stat-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 35px rgba(0, 0, 0, 0.15);
    }

    .stat-icon {
        width: 70px;
        height: 70px;
        margin: 0 auto 20px;
        background: linear-gradient(135deg, #2557a7 0%, #164081 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 32px;
        color: white;
    }

    .stat-number {
        font-size: 36px;
        font-weight: 700;
        background: linear-gradient(135deg, #2557a7 0%, #164081 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 8px;
    }

    .category-card {
        background: white;
        border-radius: 12px;
        padding: 30px 20px;
        text-align: center;
        transition: all 0.3s;
        border: 2px solid #f8f9fa;
        text-decoration: none;
        display: block;
        height: 100%;
    }

    .category-card:hover {
        border-color: #2557a7;
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(37, 87, 167, 0.15);
    }

    .category-icon {
        width: 60px;
        height: 60px;
        margin: 0 auto 15px;
        background: linear-gradient(135deg, #2557a715 0%, #16408115 100%);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
    }

    .feature-box {
        text-align: center;
        padding: 20px;
    }

    .feature-icon {
        width: 80px;
        height: 80px;
        margin: 0 auto 20px;
        background: linear-gradient(135deg, #2557a715 0%, #16408115 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 36px;
        color: #2557a7;
    }

    .section-title {
        font-size: 36px;
        font-weight: 700;
        margin-bottom: 15px;
    }

    .section-subtitle {
        font-size: 18px;
        color: #6c757d;
        margin-bottom: 50px;
    }

    .cta-section {
        background: linear-gradient(135deg, #2557a7 0%, #164081 100%);
        padding: 80px 0;
        text-align: center;
        color: white;
    }

    .btn-cta {
        padding: 16px 50px;
        font-size: 16px;
        font-weight: 600;
        border-radius: 8px;
        border: 2px solid white;
        transition: all 0.3s;
    }

    .btn-cta-primary {
        background: white;
        color: #2557a7;
    }

    .btn-cta-primary:hover {
        background: transparent;
        color: white;
        transform: translateY(-2px);
    }

    .btn-cta-secondary {
        background: transparent;
        color: white;
    }

    .btn-cta-secondary:hover {
        background: white;
        color: #2557a7;
        transform: translateY(-2px);
    }
</style>

<!-- Hero Section -->
<section class="hero-section position-relative">
    <div class="container" style="position: relative; z-index: 1;">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="text-center text-white mb-5">
                    <h1 class="display-4 fw-bold mb-3">Discover Your Next Career Move</h1>
                    <p class="fs-5 mb-0">Thousands of jobs from top companies are waiting for you</p>
                </div>

                <!-- Search Box -->
                <div class="search-box mx-auto" style="max-width: 900px;">
                    <form action="#" method="GET">
                        <div class="row g-3 align-items-center">
                            <div class="col-md-5">
                                <label class="form-label fw-semibold small text-muted mb-2">What</label>
                                <input type="text" class="form-control search-input" placeholder="Job title or keyword" name="search">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-semibold small text-muted mb-2">Where</label>
                                <input type="text" class="form-control search-input" placeholder="City or state" name="location">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label fw-semibold small text-muted mb-2">&nbsp;</label>
                                <button type="submit" class="btn search-btn w-100">
                                    <i class="bi bi-search me-2"></i>Find Jobs
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="mt-3">
                        <small class="text-muted">
                            <strong>Popular searches:</strong>
                            <a href="#" class="text-decoration-none text-muted">Web Developer</a>,
                            <a href="#" class="text-decoration-none text-muted">Marketing Manager</a>,
                            <a href="#" class="text-decoration-none text-muted">Data Analyst</a>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="bi bi-briefcase-fill"></i>
                    </div>
                    <div class="stat-number">1,234</div>
                    <div class="text-muted fw-medium">Live Jobs</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="bi bi-building"></i>
                    </div>
                    <div class="stat-number">567</div>
                    <div class="text-muted fw-medium">Companies</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="bi bi-people-fill"></i>
                    </div>
                    <div class="stat-number">8,910</div>
                    <div class="text-muted fw-medium">Candidates</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Browse by Category -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Browse by Category</h2>
            <p class="section-subtitle">Find the job that's perfect for you</p>
        </div>

        <div class="row g-4">
            <div class="col-lg-3 col-md-4 col-sm-6">
                <a href="#" class="category-card">
                    <div class="category-icon mx-auto">
                        <i class="bi bi-code-slash" style="color: #2557a7;"></i>
                    </div>
                    <h5 class="fw-bold mb-2" style="color: #2d3748;">IT & Software</h5>
                    <p class="text-muted small mb-0">312 Open Positions</p>
                </a>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6">
                <a href="#" class="category-card">
                    <div class="category-icon mx-auto">
                        <i class="bi bi-megaphone" style="color: #164081;"></i>
                    </div>
                    <h5 class="fw-bold mb-2" style="color: #2d3748;">Marketing</h5>
                    <p class="text-muted small mb-0">145 Open Positions</p>
                </a>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6">
                <a href="#" class="category-card">
                    <div class="category-icon mx-auto">
                        <i class="bi bi-cash-stack" style="color: #2557a7;"></i>
                    </div>
                    <h5 class="fw-bold mb-2" style="color: #2d3748;">Finance</h5>
                    <p class="text-muted small mb-0">289 Open Positions</p>
                </a>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6">
                <a href="#" class="category-card">
                    <div class="category-icon mx-auto">
                        <i class="bi bi-palette" style="color: #164081;"></i>
                    </div>
                    <h5 class="fw-bold mb-2" style="color: #2d3748;">Design</h5>
                    <p class="text-muted small mb-0">187 Open Positions</p>
                </a>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6">
                <a href="#" class="category-card">
                    <div class="category-icon mx-auto">
                        <i class="bi bi-graph-up" style="color: #2557a7;"></i>
                    </div>
                    <h5 class="fw-bold mb-2" style="color: #2d3748;">Sales</h5>
                    <p class="text-muted small mb-0">201 Open Positions</p>
                </a>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6">
                <a href="#" class="category-card">
                    <div class="category-icon mx-auto">
                        <i class="bi bi-heart-pulse" style="color: #164081;"></i>
                    </div>
                    <h5 class="fw-bold mb-2" style="color: #2d3748;">Healthcare</h5>
                    <p class="text-muted small mb-0">156 Open Positions</p>
                </a>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6">
                <a href="#" class="category-card">
                    <div class="category-icon mx-auto">
                        <i class="bi bi-book" style="color: #2557a7;"></i>
                    </div>
                    <h5 class="fw-bold mb-2" style="color: #2d3748;">Education</h5>
                    <p class="text-muted small mb-0">98 Open Positions</p>
                </a>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6">
                <a href="#" class="category-card">
                    <div class="category-icon mx-auto">
                        <i class="bi bi-gear" style="color: #164081;"></i>
                    </div>
                    <h5 class="fw-bold mb-2" style="color: #2d3748;">Engineering</h5>
                    <p class="text-muted small mb-0">267 Open Positions</p>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- How it Works -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">How It Works</h2>
            <p class="section-subtitle">Get hired in 3 simple steps</p>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="feature-box">
                    <div class="feature-icon mx-auto">
                        <i class="bi bi-person-plus-fill"></i>
                    </div>
                    <div class="badge bg-primary mb-3" style="font-size: 14px;">Step 1</div>
                    <h4 class="fw-bold mb-3">Create Your Profile</h4>
                    <p class="text-muted">Build your professional profile and upload your resume to get discovered by top employers</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="feature-box">
                    <div class="feature-icon mx-auto">
                        <i class="bi bi-search"></i>
                    </div>
                    <div class="badge bg-primary mb-3" style="font-size: 14px;">Step 2</div>
                    <h4 class="fw-bold mb-3">Apply to Jobs</h4>
                    <p class="text-muted">Search and filter thousands of jobs that match your skills and apply with just one click</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="feature-box">
                    <div class="feature-icon mx-auto">
                        <i class="bi bi-check-circle-fill"></i>
                    </div>
                    <div class="badge bg-primary mb-3" style="font-size: 14px;">Step 3</div>
                    <h4 class="fw-bold mb-3">Get Hired</h4>
                    <p class="text-muted">Track your applications and connect with employers to land your dream job</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <h2 class="display-5 fw-bold mb-3">Start Your Career Journey Today</h2>
        <p class="fs-5 mb-5">Join thousands of professionals finding their dream jobs</p>

        <div class="d-flex gap-3 justify-content-center flex-wrap">
            @guest
            <a href="{{ route('register') }}" class="btn btn-cta btn-cta-primary">
                <i class="bi bi-person-plus me-2"></i>Create Account
            </a>
            <a href="{{ route('login') }}" class="btn btn-cta btn-cta-secondary">
                <i class="bi bi-box-arrow-in-right me-2"></i>Sign In
            </a>
            @else
            @if(Auth::user()->role === 'employer')
            <a href="{{ route('employer.dashboard') }}" class="btn btn-cta btn-cta-primary">
                <i class="bi bi-speedometer2 me-2"></i>Go to Dashboard
            </a>
            @else
            <a href="{{ route('jobseeker.dashboard') }}" class="btn btn-cta btn-cta-primary">
                <i class="bi bi-speedometer2 me-2"></i>Go to Dashboard
            </a>
            @endif
            @endguest
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-dark text-white py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4">
                <h4 class="fw-bold mb-4">
                    <i class="bi bi-briefcase-fill me-2" style="color: #2557a7;"></i>E-Recruitment
                </h4>
                <p class="text-white-50 mb-4">Your trusted partner in finding the perfect career opportunity. Connect with top employers and take the next step in your professional journey.</p>
            </div>

            <div class="col-lg-2 col-md-4">
                <h6 class="fw-bold mb-3">For Job Seekers</h6>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Browse Jobs</a></li>
                    <li class="mb-2"><a href="{{ route('register') }}" class="text-white-50 text-decoration-none">Create Account</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-md-4">
                <h6 class="fw-bold mb-3">For Employers</h6>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Post a Job</a></li>
                    <li class="mb-2"><a href="{{ route('register') }}" class="text-white-50 text-decoration-none">Register Company</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-md-4">
                <h6 class="fw-bold mb-3">Company</h6>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">About Us</a></li>
                    <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Contact</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-md-4">
                <h6 class="fw-bold mb-3">Legal</h6>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Privacy Policy</a></li>
                    <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Terms of Service</a></li>
                </ul>
            </div>
        </div>

        <hr class="my-4 border-secondary">

        <div class="row align-items-center">
            <div class="col-md-6 text-center text-md-start">
                <small class="text-white-50">&copy; 2025 E-Recruitment. All rights reserved.</small>
            </div>
            <div class="col-md-6 text-center text-md-end mt-3 mt-md-0">
                <a href="#" class="text-white-50 text-decoration-none me-3"><i class="bi bi-facebook fs-5"></i></a>
                <a href="#" class="text-white-50 text-decoration-none me-3"><i class="bi bi-twitter fs-5"></i></a>
                <a href="#" class="text-white-50 text-decoration-none me-3"><i class="bi bi-linkedin fs-5"></i></a>
                <a href="#" class="text-white-50 text-decoration-none"><i class="bi bi-instagram fs-5"></i></a>
            </div>
        </div>
    </div>
</footer>
@endsection
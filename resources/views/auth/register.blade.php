@extends('layouts.app')

@section('content')
<style>
    .register-container {
        min-height: calc(100vh - 200px);
        display: flex;
        align-items: center;
        padding: 60px 0;
    }

    .register-card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    .register-card .card-header {
        background: linear-gradient(135deg, #2557a7 0%, #164081 100%);
        color: white;
        border-radius: 12px 12px 0 0 !important;
        padding: 1.5rem;
        font-size: 1.5rem;
        font-weight: 600;
    }

    .form-label {
        font-weight: 600;
        color: #2d3748;
        margin-bottom: 0.5rem;
    }

    .form-control,
    .form-select {
        border: 2px solid #e9ecef;
        border-radius: 8px;
        padding: 0.75rem 1rem;
        transition: all 0.3s;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #2557a7;
        box-shadow: 0 0 0 3px rgba(37, 87, 167, 0.1);
    }

    .btn-primary {
        background: linear-gradient(135deg, #2557a7 0%, #164081 100%);
        border: none;
        padding: 0.75rem 2rem;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(37, 87, 167, 0.3);
    }

    .btn-outline-secondary {
        border-color: #ced4da;
        border-left: none;
        border-radius: 0 8px 8px 0;
    }

    .btn-outline-secondary:hover {
        background-color: #e9ecef;
        border-color: #ced4da;
        color: #495057;
    }

    .input-group .form-control {
        border-right: none;
        border-radius: 8px 0 0 8px;
    }

    .password-requirements ul {
        list-style: none;
        padding-left: 0;
        margin-top: 0.5rem;
    }

    .password-requirements li {
        padding-left: 25px;
        position: relative;
        font-size: 0.875rem;
        color: #6c757d;
    }

    .password-requirements li::before {
        content: "✗";
        position: absolute;
        left: 5px;
        color: #dc3545;
        font-weight: bold;
    }

    .password-requirements li.valid::before {
        content: "✓";
        color: #28a745;
    }
</style>

<div class="register-container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card register-card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body p-4">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end form-label">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end form-label">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Role Dropdown -->
                            <div class="row mb-3">
                                <label for="role" class="col-md-4 col-form-label text-md-end form-label">{{ __('Register As') }}</label>

                                <div class="col-md-6">
                                    <select id="role" class="form-select @error('role') is-invalid @enderror" name="role" required>
                                        <option value="">Select Your Role</option>
                                        <option value="jobseeker" {{ old('role') == 'jobseeker' ? 'selected' : '' }}>Job Seeker</option>
                                        <option value="employer" {{ old('role') == 'employer' ? 'selected' : '' }}>Employer</option>
                                    </select>

                                    @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Password with Eye Button -->
                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end form-label">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                            <i class="bi bi-eye" id="toggleIcon"></i>
                                        </button>
                                    </div>

                                    @error('password')
                                    <span class="d-block invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                    <div class="password-requirements">
                                        <small class="text-muted">Password must contain:</small>
                                        <ul class="mb-0">
                                            <li id="req-length">At least 8 characters</li>
                                            <li id="req-uppercase">One uppercase letter (A-Z)</li>
                                            <li id="req-lowercase">One lowercase letter (a-z)</li>
                                            <li id="req-number">One number (0-9)</li>
                                            <li id="req-special">One special character (!@#$%^&*)</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Confirm Password with Eye Button -->
                            <div class="row mb-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end form-label">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        <button class="btn btn-outline-secondary" type="button" id="togglePasswordConfirm">
                                            <i class="bi bi-eye" id="toggleIconConfirm"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-person-plus me-2"></i>{{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Toggle Password Visibility
    document.getElementById('togglePassword').addEventListener('click', function() {
        const password = document.getElementById('password');
        const icon = document.getElementById('toggleIcon');

        if (password.type === 'password') {
            password.type = 'text';
            icon.classList.remove('bi-eye');
            icon.classList.add('bi-eye-slash');
        } else {
            password.type = 'password';
            icon.classList.remove('bi-eye-slash');
            icon.classList.add('bi-eye');
        }
    });

    // Toggle Confirm Password Visibility
    document.getElementById('togglePasswordConfirm').addEventListener('click', function() {
        const password = document.getElementById('password-confirm');
        const icon = document.getElementById('toggleIconConfirm');

        if (password.type === 'password') {
            password.type = 'text';
            icon.classList.remove('bi-eye');
            icon.classList.add('bi-eye-slash');
        } else {
            password.type = 'password';
            icon.classList.remove('bi-eye-slash');
            icon.classList.add('bi-eye');
        }
    });

    // Real-time Password Validation
    document.getElementById('password').addEventListener('input', function() {
        const password = this.value;

        // Check length
        if (password.length >= 8) {
            document.getElementById('req-length').classList.add('valid');
        } else {
            document.getElementById('req-length').classList.remove('valid');
        }

        // Check uppercase
        if (/[A-Z]/.test(password)) {
            document.getElementById('req-uppercase').classList.add('valid');
        } else {
            document.getElementById('req-uppercase').classList.remove('valid');
        }

        // Check lowercase
        if (/[a-z]/.test(password)) {
            document.getElementById('req-lowercase').classList.add('valid');
        } else {
            document.getElementById('req-lowercase').classList.remove('valid');
        }

        // Check number
        if (/[0-9]/.test(password)) {
            document.getElementById('req-number').classList.add('valid');
        } else {
            document.getElementById('req-number').classList.remove('valid');
        }

        // Check special character
        if (/[!@#$%^&*]/.test(password)) {
            document.getElementById('req-special').classList.add('valid');
        } else {
            document.getElementById('req-special').classList.remove('valid');
        }
    });
</script>
@endsection
@extends('layouts.auth')
@section('title', 'Login')

@section('content')
    <div class="login-card">
        <div class="login-header">
            <h2>Welcome To SaveLifeBD</h2>
            <p>Sign in to your account to continue</p>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ session('error') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        
        <div class="login-body">
            
            <form action="{{ route('user.login.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="loginEmail" class="form-label">Email Address</label>
                    <input type="email" name="email" class="form-control" id="loginEmail" placeholder="Enter your email" required>
                </div>
     
                <div class="mb-3">
                    <label for="loginPassword" class="form-label">Password</label>
                    <div class="input-group">
                        <input type="password" name="password" class="form-control" id="loginPassword" placeholder="Enter your password" required>
                        <span class="input-group-text password-toggle" id="toggleLoginPassword">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                </div>
                
                <div class="mb-3 form-check d-flex justify-content-between">
                    <div>
                        <input type="checkbox" name="remember_me" class="form-check-input" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div>
                    {{-- <a href="#" class="text-decoration-none">Forgot password?</a> --}}
                </div>
                
                <button type="submit" class="btn-login">
                    <i class="fas fa-sign-in-alt me-2"></i>Login to Account
                </button>
            </form>
            
            {{-- <div class="divider">
                <span>Or continue with</span>
            </div>
            
            <div class="social-login">
                <a href="#" class="social-btn google">
                    <i class="fab fa-google"></i>
                </a>
                <a href="#" class="social-btn facebook">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="social-btn twitter">
                    <i class="fab fa-twitter"></i>
                </a>
            </div> --}}
            
            <div class="login-footer">
                <p>Don't have an account? <a href="{{ route('user.signup') }}">Sign up here</a></p>
            </div>
        </div>
    </div>
@endsection

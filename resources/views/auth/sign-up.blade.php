@extends('layouts.auth')
@section('title', 'Sign up')
@push('styles')
<style>
    .col-lg-5.login-part{
        width: 100% !important;
    }
</style>
@endpush
@section('content')

<div class="auth-wrapper">
    <div class="auth-card">

        <!-- Left Side - Visual & Information -->
        <div class="auth-visual">
            <h2>Join <span>SaveLifeBD</span> ❤️</h2>
            <p>Create your account and become a life-saver in our community of donors.</p>
            
            <ul class="features-list">
                <li>
                    <i class="fas fa-tint"></i>
                    <div>
                        <h5>Save Lives</h5>
                        <p>Your donation can save up to 3 lives</p>
                    </div>
                </li>
                <li>
                    <i class="fas fa-bell"></i>
                    <div>
                        <h5>Instant Notifications</h5>
                        <p>Get alerts when your blood type is needed</p>
                    </div>
                </li>
                <li>
                    <i class="fas fa-shield-alt"></i>
                    <div>
                        <h5>Secure & Private</h5>
                        <p>Your data is protected with encryption</p>
                    </div>
                </li>
                <li>
                    <i class="fas fa-users"></i>
                    <div>
                        <h5>Community Support</h5>
                        <p>Join thousands of donors across the country</p>
                    </div>
                </li>
            </ul>
            
            <div class="mt-4">
                <p class="mb-0"><i class="fas fa-check-circle me-2"></i> Already have an account?
                    <br> 
                    <a href="{{ route('user.login') }}" class="btn btn-outline-light mt-3" style="border-width: 2px;">
                        <i class="fas fa-sign-in-alt me-2"></i> Sign In Now
                    </a>
                </p>
                
            </div>
        </div>

        <!-- Right Side - Registration Form -->
        <div class="auth-form">
            <div class="auth-header">
                <h2>Create Your Account</h2>
                <p>Fill in your details to join our donor network</p>
            </div>

            <form action="{{ route('user.signup.store') }}" method="POST" enctype="multipart/form-data" class="row g-3 needs-validation">
                @csrf

                <!-- Name -->
                <div class="col-md-6">
                    <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter your name" required value="{{ old('name') }}">
                    </div>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Email -->
                <div class="col-md-6">
                    <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        <input type="email" class="form-control @error('name') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Enter your email" required>
                    </div>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Phone -->
                <div class="col-md-6">
                    <label for="phone" class="form-label">Phone Number <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" placeholder="Enter your phone number" required>
                    </div>
                    @error('phone')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Optional Phone -->
                <div class="col-md-6">
                    <label for="optional_number" class="form-label">Alternative Number</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="optional_number" value="{{ old('optional_number') }}" name="optional_number" placeholder="Optional phone number">
                    </div>
                    @error('optional_number')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Present Address -->
                <div class="col-md-12">
                    <label for="present_address" class="form-label">Present Address <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-home"></i></span>
                        <textarea class="form-control @error('name') is-invalid @enderror" id="present_address" name="present_address" rows="2" placeholder="Enter your complete address" required>{{ old('present_address') }}</textarea>
                    </div>
                    @error('present_address')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Blood Group -->
                <div class="col-md-5">
                    <label for="blood_group" class="form-label">Blood Group <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-tint"></i></span>
                        <select class="form-select @error('name') is-invalid @enderror" id="blood_group" name="blood_group" required>
                            <option value="">Select Blood Group</option>
                            <option>A+</option>
                            <option>A-</option>
                            <option>B+</option>
                            <option>B-</option>
                            <option>O+</option>
                            <option>O-</option>
                            <option>AB+</option>
                            <option>AB-</option>
                        </select>
                    </div>
                    @error('blood_group')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Weight -->
                <div class="col-md-3">
                    <label for="weight" class="form-label">Weight (kg) <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-weight"></i></span>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="weight" name="weight" value="{{ old('weight') }}" placeholder="00.00" required>
                        <span class="input-group-text">kg</span>
                    </div>
                    @error('weight')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Last Donate -->
                <div class="col-md-4">
                    <label for="last_blood_donate" class="form-label">Last Blood Donation</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                        <input type="date" class="form-control @error('name') is-invalid @enderror" id="last_blood_donate" name="last_blood_donate" value="{{ old('last_blood_donate') }}">
                    </div>
                    @error('last_blood_donate')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Photo Upload -->
                <div class="col-md-12">
                    <label class="form-label">Profile Photo</label>
                    <div class="file-upload-container">
                        <label for="photo" class="file-upload-label">
                            <i class="fas fa-cloud-upload-alt"></i>
                            <span>Click to upload profile photo</span>
                            <small>JPG, PNG or GIF (Max 2MB)</small>
                        </label>
                        <input type="file" class="form-control @error('name') is-invalid @enderror" id="photo" name="photo" accept="image/*">
                    </div>
                    @error('photo')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    
                    <div class="image-preview" id="imagePreviewContainer">
                        <p class="text-muted mb-2">Profile Preview:</p>
                        <img id="previewImage" src="" alt="Profile Preview">
                    </div>
                </div>

                <!-- Password -->
                <div class="col-md-12">
                    <label for="loginPassword" class="form-label">Password <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input type="password" class="form-control @error('name') is-invalid @enderror" id="loginPassword" name="password" placeholder="Create a strong password" required>
                        <span class="input-group-text" id="toggleLoginPassword">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="col-md-12">
                    <label for="confirmPassword" class="form-label">Confirm Password <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="confirmPassword" name="password_confirmation" placeholder="Confirm password" required>
                    </div>
                    @error('password_confirmation')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Terms and Conditions -->
                <div class="col-md-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="terms" required>
                        <label class="form-check-label" for="terms">
                            I agree to the <a href="/terms" class="text-decoration-none">Terms & Conditions</a> and <a href="/privacy" class="text-decoration-none">Privacy Policy</a>
                        </label>
                        <div class="invalid-feedback">You must agree to the terms and conditions.</div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="col-12">
                    <button type="submit" class="btn-submit">
                        <i class="fas fa-user-plus me-2"></i> Create Account
                    </button>
                </div>

                <!-- Login Link -->
                <div class="col-12 login-link">
                    Already have an account? <a href="{{ route('user.login') }}">Sign in here</a>
                </div>
            </form>

        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Form Validation
        const form = document.getElementById('signupForm');
        const photoInput = document.getElementById('photo');
        const previewContainer = document.getElementById('imagePreviewContainer');
        const previewImage = document.getElementById('previewImage');
        const togglePassword = document.getElementById('toggleLoginPassword');
        
        // Real-time image preview
        photoInput.addEventListener('change', function(event) {
            const file = event.target.files[0];
            
            if (file) {
                // Check file size (max 2MB)
                if (file.size > 2 * 1024 * 1024) {
                    alert('File size must be less than 2MB');
                    this.value = '';
                    previewContainer.style.display = 'none';
                    return;
                }
                
                // Check file type
                if (!file.type.match('image.*')) {
                    alert('Please select an image file');
                    this.value = '';
                    previewContainer.style.display = 'none';
                    return;
                }
                
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    previewContainer.style.display = 'block';
                }
                reader.readAsDataURL(file);
            } else {
                previewContainer.style.display = 'none';
            }
        });
        
    });
</script>
@endpush

@endsection
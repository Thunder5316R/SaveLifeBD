<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Auth') | Blood App</title>
    {{-- favicon --}}
    <link href="{{ asset('blood-donation.png') }}" rel="icon">
    <!-- Bootstrap 5 CSS -->
    <link href="{{ asset('auth/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('auth/style.css') }}">
    @stack('styles')
</head>
<body>
    
    <!-- Main Content -->
    <div class="login-container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-8 login-part">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS with Popper -->
    <script src="{{ asset('auth/bootstrap.bundle.min.js') }}"></script>
    
    <script>
        // DOM Elements
        const toggleLoginPassword = document.getElementById('toggleLoginPassword');
        
        // Toggle password visibility
        function togglePasswordVisibility(inputId, toggleIcon) {
            const passwordInput = document.getElementById(inputId);
            const icon = toggleIcon.querySelector('i');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
        
        // Add event listener for password toggle
        toggleLoginPassword.addEventListener('click', function() {
            togglePasswordVisibility('loginPassword', this);
        });
    </script>
    @stack('scripts')
</body>
</html>
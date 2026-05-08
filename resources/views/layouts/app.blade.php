
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Home') | LPI-Blood Bank</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link href="{{ asset('blood-donation.png') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">  

    <!-- Icon Font Stylesheet -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    {{-- laravel er jonno --}}

    
<link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
<link href="{{ asset('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

<link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <style>
        /* Google Translate top banner hide */
        iframe.goog-te-banner-frame {
            display: none !important;
            visibility: hidden !important;
            height: 0 !important;
        }
        .skiptranslate iframe.skiptranslate{
            visibility:  hidden !important;
        }
        .goog-logo-link {
            display:none !important;
        }
        .goog-te-gadget {
            height: 28px !important;
        }
        body {
            top: 0px !important; 
        }
    </style>
    @stack('styles')
</head>

<body onload="loading()">


   <!-- =============== add-page-Preloader ============== -->
   {{-- <div id="loading"></div> --}}
    
    <div class="container-xxl bg-white p-0 index">

        <!-- ================= Navigation Bar =================== -->
        @include('components.nav')

        <!-- ===================== Header Section==================== -->
        @yield('header')

        @yield('content')
        
        @include('components.footer')
         <!-- Back to Top -->
        <a href="#bottom-icon" class="btn btn-lg rounded-0 btn-primary btn-lg-square back-to-top d-none d-md-flex">
            <i class="bi bi-arrow-up"></i>
        </a>
    </div>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- google-translate -->
    <script src="http://translate.google.com/translate_a/element.js?cb=loadGoogleTranslate"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <!-- ----------- Image - Upload ----------- -->

    <script>
        
        var image = document.getElementById('profile-img');
        var input = document.getElementById('upload-img');

        input.addEventListener("change", () => {
            image.src = URL.createObjectURL(input.files[0])
        });

        // Google translate top banner hide
        document.addEventListener("DOMContentLoaded", function () {
            setInterval(function () {
                let frame = document.querySelector("iframe.goog-te-banner-frame");
                if (frame) {
                    frame.style.display = "none";
                    frame.style.visibility = "hidden";
                    frame.style.height = "0";
                }
                document.body.style.top = "0px";
            }, 500);
        });

    </script>
    @stack('scripts')
    @include('widget')
</body>

</html>
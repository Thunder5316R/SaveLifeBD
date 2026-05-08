@extends('layouts.app')
@section('title', 'Privacy Policy')

@section('content')

    <div class="about rules">
        <div class="wrap">
            <h4>Home > <span>Privacy Policy</span></h4>
        </div>
    </div>

    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp">
                <h6 class="section-title text-center text-primary text-uppercase">Save Life BD</h6>
                <h1 class="mb-5">Our <span class="text-primary text-uppercase">Privacy </span>Commitment</h1>
            </div>

            <div class="row g-5">
                <div class="col-lg-4">
                     <img src="img/rules-1.jpg" alt="Privacy" class="img-fluid rounded w-100 wow zoomIn">
                     <div class="card shadow mt-4 border-primary">
                         <div class="card-body">
                             <h5 class="text-center">🛡️ Your Data is Secure</h5>
                             <p class="small text-muted text-center">We use industry-standard encryption to protect your personal contact details.</p>
                         </div>
                     </div>
                </div>

                <div class="col-lg-8 wow fadeInRight">
                    <div class="mb-4">
                        <h3><span class="border-bottom pb-1 border-info">What Information We Collect</span></h3>
                        <p class="mt-3">We collect your name, blood group, location, and mobile number to facilitate the blood donation process. This data is only visible to registered users looking for blood.</p>
                    </div>

                    <div class="mb-4">
                        <h3><span class="border-bottom pb-1 border-info">How We Use Your Data</span></h3>
                        <ul>
                            <li>To connect potential donors with patients in emergency.</li>
                            <li>To send emergency blood request alerts via SMS or Notification.</li>
                            <li>To improve our service and ensure the safety of our community.</li>
                        </ul>
                    </div>

                    <div class="mb-4">
                        <h3><span class="border-bottom pb-1 border-info">Data Sharing</span></h3>
                        <p>We <strong>never sell or rent</strong> your personal information to third-party marketing companies. Your contact details are only shared with verified blood seekers on a need-to-know basis.</p>
                    </div>

                    <div class="alert alert-warning border-0 shadow">
                        <strong>Note:</strong> While we take every precaution, please be careful when sharing extra personal info over the phone with strangers.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <marquee behavior="scroll" direction="" class="border rounded border-danger mb-5">
        <h2 class="p-2">🙏 Your privacy is our <span>priority</span>. Stay <span>safe</span>! 🙏</h2>
    </marquee>

@endsection
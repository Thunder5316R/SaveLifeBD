@extends('layouts.app')
@section('title', 'Terms and Conditions')

@section('content')

    <div class="about rules">
        <div class="wrap">
            <h4>Home > <span>Terms and Conditions</span></h4>
        </div>
    </div>

    <div class="container-xxl py-5">
        <div class="container">
            <h5 class="section-title text-start text-primary text-uppercase">Terms & Conditions</h5>
            <marquee class="mb-4 bg-primary" behavior="scroll">
                <h4 class="p-2 text-white">(Please read our terms carefully to ensure a transparent and safe blood donation process.)</h4>
            </marquee>

            <div class="row g-5">
                <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="mb-4">
                        <h3><span class="border-bottom pb-1 border-info">User Agreement</span></h3>
                        <p class="mt-3">By accessing <strong>Save Life BD</strong>, you agree to comply with our policies. Our platform acts as a bridge between donors and recipients. We do not charge any fees for matching donors.</p>
                    </div>

                    <div class="mb-4">
                        <h3><span class="border-bottom pb-1 border-info">Donor Responsibilities</span></h3>
                        <ol class="mt-3">
                            <li>Donors must provide accurate information regarding their health and blood group.</li>
                            <li>The act of donation must be completely voluntary and without any financial expectation.</li>
                            <li>Donors should follow the safety guidelines mentioned in the Rules section.</li>
                        </ol>
                    </div>

                    <div class="mb-4">
                        <h3><span class="border-bottom pb-1 border-info">Prohibitions</span></h3>
                        <ul class="mt-3" style="list-style-type: square;">
                            <li>Selling or buying blood through this platform is strictly prohibited.</li>
                            <li>Any form of harassment or fraud using the contact numbers provided will lead to a permanent ban.</li>
                            <li>Providing false medical reports is a punishable offense.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-xxl py-5 px-0 wow zoomIn" data-wow-delay="0.1s">
        <div class="row g-0">
            <div class="col-md-12 bg-dark d-flex align-items-center p-5 text-center">
                <div class="w-100">
                    <h1 class="text-white mb-4">Help us maintain a <span class="text-primary">transparent</span> system!</h1>
                    <p class="text-white mb-4">If you find anyone asking for money in exchange for blood, report it immediately.</p>
                    <a href="/contact" class="btn btn-primary py-md-3 px-md-5 me-3">Report Issue</a>
                </div>
            </div>
        </div>
    </div>

@endsection
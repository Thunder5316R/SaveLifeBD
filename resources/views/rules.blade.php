@extends('layouts.app')
@section('title', 'Rules')



@section('content')

        <!-- ===================== Header Section =================== -->
        <div class="about rules">
            <div class="wrap">
                <h4>Home > <span>Rules</span></h4>
            </div>
        </div>

        <!-- ================== About Section ================== -->
        <div class="container-xxl py-5" id="about">
            <div class="container">
                <h5 class="section-title text-start text-primary text-uppercase">
                            Rules
                </h5>
                <marquee class="mb-4 bg-primary" behavior="scroll">
                    <h4 class="p-2 text-white">(Ensure your safety. <strong>www.LPIbloodbank.com</strong> authority will not be responsible for any inconvenience.)</h4>
                </marquee>


                <h4>We are constantly struggling to collect blood for the dying patients. It is our responsibility to manage the blood of patients in an emergency, as well as to ensure the safety of a blood donar.</h4>
                <div class="row g-5 align-items-center mt-lg-2">
                    <div class="col-lg-8">

                        <h3><span class="border-bottom pb-1 border-info">Telling the blood donars:</span></h3>
                        
                        <ol class="mt-4">
                            <li>Find out which hospital/clinic the patient is in. Do not donate blood anywhere other than hospital/clinic. Not even at the patient's home.</li>
                            <li>Do not meet the blood applicant (the person you are contacting on the mobile number) anywhere other than the hospital/clinic. Do not ask to meet in the alley next to the hospital, or in a shop.</li>
                            <li>Check the patient before donating blood. Check the patient's report, doctor's requisition letter.</li>
                            <li>It is better to have two friends with you when donating blood.</li>
                            <li>Make sure to use new needles when donating blood ...</li>
                            <li>If in doubt about the competence of the attending expert, inform the authority...</li>
                            <li>Donate after blood cross matching, not before... most govt hospitals keep blood without cross matching... it should never be done... self aware... donate blood after cross matching...</li>
                        </ol>

                    </div>
                    <div class="col-lg-4">
                         <img src="img/donate.jpg" alt="Image" class="img-fluid rounded w-100 wow zoomIn">
                    </div>
                </div>
            </div>
        </div>


        <!-- =============== Tipes Part =========== -->
        <div class="container-xxl py-5 px-0 wow zoomIn" data-wow-delay="0.1s">
            <div class="row g-0">

                <!-- text-part -->
                <div class="col-md-12 bg-dark d-flex align-items-center tipes">
                    <div class="p-5">
                        <h6 class="section-title text-start text-white text-uppercase mb-3">Free blood donation</h6>
                        <h1 class="text-white mb-4">Blood donation is voluntary, <span>free</span> and <span>safe</span>!</h1>
                        <p class="text-white mb-4">If you want to go for blood donation, first talk to the patient's relative... After knowing the name of the hospital, cabin/ward number, go directly to that cabin/ward... Blood applicant somewhere other than the hospital/clinic (the person you are contacting on the mobile number). Don't meet him... in the alley next to the hospital, or even ask him to meet him in a shop... not even at the patient's home...</p>
                        <p class="text-white mb-4">Know the cabin/ward number, go directly to the cabin/ward... see the patient... Then donating blood... inform the patient and patient's relatives that you are donating blood for free... this will not give the hospital authority or any third party a chance to corrupt...<a href="img/thankyou.gif" target="_blank">Thank you!</a></p>
                        <a href="/sign-up" class="btn d-md-inline-block d-none btn-primary py-md-3 px-md-4 px-lg-5 me-3 problem-btn">Become a Donar</a>
                        <a href="/contact" class="btn btn-light py-md-3 px-md-4 px-lg-5 mt-md-1 mt-lg-0">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- ================== About Section ================== -->
        <div class="container-xxl py-5" id="about">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <h4 class="section-title text-center text-uppercase">
                           📛 Take care of the <span class="text-warning">blood donor</span> 📛

                    </h4>
                    <div class="col-lg-4">
                         <img src="img/rules-1.jpg" alt="Image" class="img-fluid rounded w-100 wow zoomIn">
                    </div>

                    <div class="col-lg-8">
                        
                        <h3><span class="border-bottom pb-1 border-info">Telling the patient (or patient's relative):</span></h3>

                        <ol class="mt-4">
                            <li>Make sure that the blood donar can rest for at least half an hour after donating blood.</li>
                            <li>After blood donation, if possible, provide saline water, juice, water for the blood donar. It is useful for quick recovery of blood donar.</li>
                            <li>Keep in touch with the blood donar even after recovery. Be in good relationship with the one whose blood is flowing in your body, who has selflessly come forward to save your life. Expressing gratitude to the blood donar again and again – I don't think there is anything wrong. :)</li>
                        </ol>
                        
                    </div>
                </div>
            </div>
        </div>

        <marquee behavior="scroll" direction="" class="border rounded border-danger">
            <h2 class="p-2">😍 Donate <span>blood</span>, save <span>life</span> 😍</h2>
        </marquee>

        <!-- ========== Warning part =========== -->


        <div class="container p-5 warning">


            <div class="text-center wow fadeInUp">
                <h6 class="section-title text-center text-primary text-uppercase">LPI - Blood Bank</h6>
                <h1 class="mb-5">Blood Donation<span class="text-primary text-uppercase">Warning! </span>⚠</h1>
            </div>

            <div class="row">
                <div class="col-12 col-md-6 col-lg-3 mb-3 mb-lg-0 wow fadeInUp">
                    <div class="card shadow">
                        <img src="img/be-aware-of-fraud.jpg" class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title text-center">🩸 Be carefull 🩸</h5>
                      </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3 mb-3 mb-lg-0 wow fadeInUp">
                    <div class="card shadow">
                        <img src="img/COM-giveblood.jpg" class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title text-center">🩸 Donate Blood 🩸</h5>
                      </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3 mb-3 mb-lg-0 wow fadeInUp">
                    <div class="card shadow">
                        <img src="img/roktobondu.jpg" class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title text-center">🩸 Donate Blood 🩸</h5>
                      </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3 mb-3 mb-lg-0 wow fadeInUp">
                    <div class="card shadow">
                        <img src="img/warning.jpg" class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title text-center">🩸 Warning 🩸</h5>
                      </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- ========= Other's Ditals ========= -->

        <div class="other wow fadeIn p-5">
            <div class="container">
                <h2>Other's <span>Details</span> Links :</h2>
                <div class="wrap mt-4">
                    <a href="#">
                        👉  Join us. And donate blood.
                    </a>
                    <a href="#">
                        👉  Come forward to serve humanity!
                    </a>
                    <a href="#">
                        👉  Bangladesh is waiting for blood donation.
                    </a>
                    <a href="#">
                        👉  Your blood can save two lives.
                    </a>
                    <a href="#">
                        👉 Donate <span>blood</span>, Save <span>lifes</span>!
                    </a>
                </div>
            </div>
        </div>
@endsection
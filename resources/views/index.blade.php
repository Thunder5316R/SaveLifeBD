@extends('layouts.app')
@section('title', 'HOME')

@section('header')
@include('components.header')
@endsection

@section('content')
    <!-- ============= Booking Section ================= -->
        <div class="container-fluid booking pb-5 wow fadeIn" id="booking">
            <div class="container">
                <div class="bg-white shadow pb-3" style="padding: 35px;">
                    <div class="row g-2">
                        <div class="col-md-12">
                            <div class="row g-2">

                                <div class="col-12">
                                    <marquee class="mb-4 bg-primary rounded" behavior="scroll">
                                        <h4 class="p-2 text-white">If you face any problem, please contact us. Call In this contact number: +8801745513701</h4>
                                    </marquee>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ================== About Section ================== -->
        <div class="container-xxl py-5" id="about">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <h6 class="section-title text-start text-primary text-uppercase">
                            About us
                        </h6>
                        <h1 class="mb-4" style="font-size: 35px;">Welcome to <span class="text-primary text-uppercase">Save Life BD</span></h1>
                        <p class="mb-4">Our work of LPI Blood is to serve the helpless people.  We are bringing a huge opportunity to those who cannot arrange blood for their close relatives due to lack of blood donors. <a href="about.php">see more...</a></p>

                        <div class="row g-3 pb-4">
                            <div class="col-sm-4 wow fadeIn">
                                <div class="border rounded p-1">
                                    <div class="border rounded text-center p-3">
                                        <img src="img/icon/donor.png" class="icon-img mb-1" alt="..">

                                        <h2 class="mb-1" data-toggle="counter-up">756</h2>
                                        <p class="mb-0">Donar</p>
                                    </div>
                                </div>
                            </div>


                            <div class="col-sm-4 wow fadeIn">
                                <div class="border rounded p-1">
                                    <div class="border rounded text-center p-3">
                                        <img src="img/icon/donator.png" class="icon-img mb-1" alt="..">
                                        

                                        <h2 class="mb-1" data-toggle="counter-up">1758</h2>
                                        <p class="mb-0">Blood Donated</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4 wow fadeIn">
                                <div class="border rounded p-1">
                                    <div class="border rounded text-center p-3">
                                        <img src="img/icon/blood-bank.png" class="icon-img mb-1" alt="..">

                                        <h2 class="mb-1" data-toggle="counter-up">6</h2>
                                        <p class="mb-0">Blood Bank</p>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- some-images -->
                        <a href="/about" class="btn btn-primary py-3 px-5 mt-2">Explore More</a>

                    </div>
                    <div class="col-lg-6">
                        <div class="row g-3">

                            <div class="col-6 text-end">
                                <img src="img/my-donated.jpg" alt="Image" style="margin-top: 25%;" class="img-fluid rounded w-75 wow zoomIn">
                            </div>


                            <div class="col-6 text-start">
                                <img src="img/use1.jpeg" alt="Image" class="img-fluid rounded h-75 wow zoomIn" style="overflow: hidden">
                            </div>
                            

                            <div class="col-6 text-end">
                                <img src="img/about-3.jpg" alt="Image" class="img-fluid rounded w-50 wow zoomIn">
                            </div>
                            

                            <div class="col-6 text-start">
                                <img src="img/use2.jpeg" alt="Image" class="img-fluid rounded w-75 wow zoomIn">
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- =============== Video Start =========== -->
        <div class="container-xxl py-5 px-0 wow zoomIn" data-wow-delay="0.1s">
            <div class="row g-0">
                <div class="col-md-6 bg-dark d-flex align-items-center">
                    <div class="p-5">
                        <h6 class="section-title text-start text-white text-uppercase mb-3">Benefits of donating blood.</h6>
                        <h1 class="text-white mb-4">One Video For Blood Donation!</h1>
                        <p class="text-white mb-4">Regular blood donation reduces the risk of heart disease and heart attack.  Another study found that people who donate blood twice a year have a lower risk of developing cancer than others.  In particular, the risk of lung, liver, colon, stomach and throat cancer has been observed to be much lower in regular blood donars. <a href="#">See more...</a></p>
                        <a href="/about" class="btn btn-primary py-md-3 px-md-4 px-lg-5 me-3 problem-btn">About Us</a>
                        <a href="/contact" class="btn btn-light d-lg-inline-block d-none py-md-3 px-md-4 px-lg-5 mt-md-4 mt-lg-0">Contact Me</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="video">
                        <button type="button" class="btn-play" data-bs-toggle="modal" data-src="https://www.youtube.com/embed/ODRb1fP31L0" data-bs-target="#videoModal">
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Youtube Video</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- 16:9 aspect ratio -->
                        <div class="ratio ratio-16x9">
                            <iframe class="embed-responsive-item" src="" id="video" allowfullscreen allowscriptaccess="always"
                                allow="autoplay"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- ============ Service Section ============= -->
        <div class="container-xxl py-5" id="services">
            <div class="container">

                <div class="text-center wow fadeInUp">
                    <h6 class="section-title text-center text-primary text-uppercase">
                        Our Services
                    </h6>
                    <h1 class="mb-5">Explore Our <span class="text-primary text-uppercase">Services</span></h1>
                </div>

                <div class="row g-4">

                    <div class="col-lg-4 col-md-6 wow fadeInUp">
                        <a href="https://www.facebook.com/groups/669389887932317" target="_blank" class="service-item rounded">
                            <div class="service-icon bg-transparent border rounded p-1">
                                <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                    <!-- <i class="fa fa-hotel fa-2x text-primary"></i> -->
                                    <img src="img/lpi.png" alt=".." class="img-fluid" style="width: 250px;">

                                </div>
                            </div>

                            <h5 class="mb-3">LPI - Blood Group</h5>
                            <p class="text-body mb-0">
                                Every person in danger is helpless, Helping the needy We all have a moral responsibility.
                            </p>

                        </a>
                    </div>


                    <div class="col-lg-4 col-md-6 wow fadeInUp">
                        <a href="https://www.facebook.com/socialdevelopmentsociety.bd" target="_blank" class="service-item rounded">
                            <div class="service-icon bg-transparent border rounded p-1">
                                <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                    <img src="img/bondhu.jpeg" alt=".." class="img-fluid rounded" style="width: 250px; height: 120px;">

                                </div>
                            </div>

                            <h5 class="mb-3">Bondhu Mohol Blood Donation</h5>
                            <p class="text-body mb-0">
                                My country is alert in blood donation. At the level of society, we are all at the level of the country.
                            </p>

                        </a>
                    </div>
                    

                    <div class="col-lg-4 col-md-6 wow fadeInUp">
                        <a href="https://www.facebook.com/groups/2803758869931673" target="_blank" class="service-item rounded">
                            <div class="service-icon bg-transparent border rounded p-1">
                                <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                    <img src="img/khulna-blood.png" alt=".." class="img-fluid" style="height: 150px; width: 250px;">

                                </div>
                            </div>

                            <h5 class="mb-3">Shahinur Foundation Lakshmipur</h5>
                            <p class="text-body mb-0">
                               🥰 We are in the service of people for the pleasure of Lord 😊
                            </p>

                        </a>
                    </div>
                    

                    <div class="col-lg-4 col-md-6 wow fadeInUp">
                        <a href="https://www.facebook.com/profile.php?id=100053884909865" target="_blank" class="service-item rounded">
                            <div class="service-icon bg-transparent border rounded p-1">
                                <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                    <img src="img/loog.png" alt=".." class="img-fluid" style="width: 250px;">

                                </div>
                            </div>

                            <h5 class="mb-3">Adorso Torun Sproting Club</h5>
                            <p class="text-body mb-0">
                                (These are sports, education, cultural and service organizations) 
                            </p>

                        </a>
                    </div>
                    

                    <div class="col-lg-4 col-md-6 wow fadeInUp">
                        <a href="https://www.facebook.com/lpibloodbank" target="_blank" class="service-item rounded">
                            <div class="service-icon bg-transparent border rounded p-1">
                                <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                    <img src="img/lpi-b.png" alt=".." class="img-fluid" style="width: 200px; height: 180px;">
                                </div>
                            </div>

                            <h5 class="mb-3">Save Life BD</h5>
                            <p class="text-body mb-0">
                               "Come to the bonds of brotherhood, to the welfare of humanity." 
                            </p>

                        </a>
                    </div>
                    

                    <div class="col-lg-4 col-md-6 wow fadeInUp">
                        <a href="https://www.facebook.com/profile.php?id=100067986714120" target="_blank" class="service-item rounded">
                            <div class="service-icon bg-transparent border rounded p-1">
                                <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                    <img src="img/aman.png" alt=".." class="img-fluid" style="width: 200px; height: 180px;">
                                </div>
                            </div>

                            <h5 class="mb-1">Amanullahpur Development Foundation</h5>
                            <p class="text-body mb-0">
                               "Come to the bonds of brotherhood, to the welfare of humanity." 
                            </p>

                        </a>
                    </div>
                    
                </div>

            </div>
        </div>


        <!-- ============ Testimonisl Section ============= -->
        <div class="container-xxl testimonial my-5 py-5 bg-dark wow zoomIn d-lg-block d-none" id="testimonial">
            <div class="container">
                <div class="owl-carousel testimonial-carousel py-5" style="display: block;">

                    <!-- 1st -->
                    <div class="testimonial-item position-relative bg-white rounded overflow-hidden">
                        <p>This Application is very helpful for finding blood. Very good job.</p>
                        <div class="d-flex align-items-center">
                            <img src="img/Sohag.jpg" alt="images" class="img-fluid flex-shrink-0 rounded" style="width: 45px; height: 45px;">

                            <div class="ps-3">
                                <h6 class="fw-bold mb-1">Sohag Hosen</h6>
                                <small>CST-5th / 1st shift</small>
                            </div>
                        </div>

                        <i class="fa fa-quote-right fa-3x text-primary position-absolute end-0 bottom-0 me-4 mb-n1"></i>
                    </div>


                    <!-- 2nd -->
                    <div class="testimonial-item position-relative bg-white rounded overflow-hidden">
                        <p>I got blood very fast through this application. Features was really useful.</p>
                        <div class="d-flex align-items-center">
                            <img src="img/orin.jpg" alt="images" class="img-fluid flex-shrink-0 rounded" style="width: 45px; height: 45px;">

                            <div class="ps-3">
                                <h6 class="fw-bold mb-1">Orin Akter Srity</h6>
                                <small>CST-5th / 1st shift</small>
                            </div>
                        </div>

                        <i class="fa fa-quote-right fa-3x text-primary position-absolute end-0 bottom-0 me-4 mb-n1"></i>
                    </div>
                    

                    <!-- 3rd -->
                    <div class="testimonial-item position-relative bg-white rounded overflow-hidden">
                        <p>আমার বিপদের সময় এই অ্যাপ্লিকেশনটি আমাকে সহায়তা করেছে। খুব দ্রুতই ডোনারদের সাথে যোগাযোগ করতে পারছি।</p>
                        <div class="d-flex align-items-center">
                            <img src="img/sinan.jpg" alt="images" class="img-fluid flex-shrink-0 rounded" style="width: 45px; height: 45px;">

                            <div class="ps-3">
                                <h6 class="fw-bold mb-1">Tasnim Hasan</h6>
                                <small>CST-5th / 1st shift</small>
                            </div>
                        </div>

                        <i class="fa fa-quote-right fa-3x text-primary position-absolute end-0 bottom-0 me-4 mb-n1"></i>
                    </div>

                    <!-- 4th -->
                    <div class="testimonial-item position-relative bg-white rounded overflow-hidden">
                        <p>This application has been a lifesaver for me. It's so easy to use and the blood availability information is always up-to-date.</p>
                        <div class="d-flex align-items-center">
                            <img src="img/sumaiya.jpg" alt="images" class="img-fluid flex-shrink-0 rounded" style="width: 45px; height: 45px;">

                            <div class="ps-3">
                                <h6 class="fw-bold mb-1">Sumaiya Akter Rabeya</h6>
                                <small>CST-5th / 1st shift</small>
                            </div>
                        </div>

                        <i class="fa fa-quote-right fa-3x text-primary position-absolute end-0 bottom-0 me-4 mb-n1"></i>
                    </div>


                    <!-- 5th -->
                    <div class="testimonial-item position-relative bg-white rounded overflow-hidden">
                        <p>Ai integration is very good. It helps a lot in finding blood donors.</p>
                        <div class="d-flex align-items-center">
                            <img src="img/tanha.jpg" alt="images" class="img-fluid flex-shrink-0 rounded" style="width: 45px; height: 45px;">

                            <div class="ps-3">
                                <h6 class="fw-bold mb-1">Tanha Tarannum</h6>
                                <small>CST-5th / 1st shift</small>
                            </div>
                        </div>

                        <i class="fa fa-quote-right fa-3x text-primary position-absolute end-0 bottom-0 me-4 mb-n1"></i>
                    </div>
                    

                    <!-- 6th -->
                    <div class="testimonial-item position-relative bg-white rounded overflow-hidden">
                        <p>Blood donation app is very useful. It helps people in need of blood to find donors quickly.</p>
                        <div class="d-flex align-items-center">
                            <img src="img/hasan.jpg" alt="images" class="img-fluid flex-shrink-0 rounded" style="width: 45px; height: 45px;">

                            <div class="ps-3">
                                <h6 class="fw-bold mb-1">Hasan Shahriyar</h6>
                                <small>CST-5th / 1st shift</small>
                            </div>
                        </div>

                        <i class="fa fa-quote-right fa-3x text-primary position-absolute end-0 bottom-0 me-4 mb-n1"></i>
                    </div>

                    <!-- 7th -->
                    <div class="testimonial-item position-relative bg-white rounded overflow-hidden">
                        <p>রক্ত প্রয়োজন হলে এই অ্যাপ্লিকেশনটি খুবই সহায়ক। অনেক তথ্যবহুল একটি অ্যাপ</p>
                        <div class="d-flex align-items-center">
                            <img src="img/yeasisn.jpeg" alt="images" class="img-fluid flex-shrink-0 rounded" style="width: 45px; height: 45px;">

                            <div class="ps-3">
                                <h6 class="fw-bold mb-1">Yeasin Arafat</h6>
                                <small>CST-5th / 1st shift</small>
                            </div>
                        </div>

                        <i class="fa fa-quote-right fa-3x text-primary position-absolute end-0 bottom-0 me-4 mb-n1"></i>
                    </div>

                    <!-- 8th -->
                    <div class="testimonial-item position-relative bg-white rounded overflow-hidden">
                        <p>আমি এই অ্যাপের মাধ্যমে ব্লাড ডোনেট করেছি। খুবই সহায়ক একটি অ্যাপ</p>
                        <div class="d-flex align-items-center">
                            <img src="img/nahid.jpg" alt="images" class="img-fluid flex-shrink-0 rounded" style="width: 45px; height: 45px;">

                            <div class="ps-3">
                                <h6 class="fw-bold mb-1">Naifur Rahman Nahid</h6>
                                <small>CST-5th / 1st shift</small>
                            </div>
                        </div>

                        <i class="fa fa-quote-right fa-3x text-primary position-absolute end-0 bottom-0 me-4 mb-n1"></i>
                    </div>
                    
                </div>
            </div>
        </div>


        <!-- ============= Team Section ============ -->
        <div class="container-xxl py-5" id="team">
            <div class="container">
                <div class="text-center wow fadeInUp">
                    
                    <h1 class="mb-5">People Who <span class="text-primary text-uppercase">Worked</span> On This Project</h1>
                </div>
                <div class="row g-4">

                    <div class="col-lg-3 col-md-6 wow fadeInUp">
                        <div class="rounded shadow overflow-hidden">
                            <div class="position-relative">
                                <img src="img/Sohag.jpg" alt="images" class="img-fluid h-100 w-100">
                                <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                                    <a href="https://www.facebook.com/programmer.sohaghosen" class="btn btn-primary btn-square mx-1">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a href="https://twitter.com/sohag_sosen" class="btn btn-primary btn-square mx-1">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a href="https://www.youtube.com/@Hi-TechIT-ks8gx" class="btn btn-primary btn-square mx-1">
                                        <i class="fab fa-youtube"></i>
                                    </a>
                                    <a href="#" class="btn btn-primary btn-square mx-1">
                                        <i class="fab fa-linkedin"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="text-center p-4 mt-2">
                                <h5 class="mb-0 fw-bold pt-2">Sohag Hossen</h5>
                                <small>Main Leader</small>
                                <p>Project Idea generator and First developer</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp">
                        <div class="rounded shadow overflow-hidden">
                            <div class="position-relative">
                                <img src="img/saddam sir.enc" alt="images" class="img-fluid" style="height: 400px;">
                                <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                                    <a href="#" class="btn btn-primary btn-square mx-1">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a href="#" class="btn btn-primary btn-square mx-1">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a href="#" class="btn btn-primary btn-square mx-1">
                                        <i class="fab fa-youtube"></i>
                                    </a>
                                    <a href="#" class="btn btn-primary btn-square mx-1">
                                        <i class="fab fa-linkedin"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="text-center p-4 mt-2">
                                <h5 class="mb-0 fw-bold">Saddam Hossain</h5>
                                <small>Support Teacher</small>
                                <p>Our Mentor and support teacher</p>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-3 col-md-6 wow fadeInUp">
                        <div class="rounded shadow overflow-hidden">
                            <div class="position-relative">
                                <img src="img/asif.jpeg" alt="images" class="img-fluid">
                                <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                                    <a href="https://www.facebook.com/khaled.sudon" target="_blank" class="btn btn-primary btn-square mx-1">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a href="#" class="btn btn-primary btn-square mx-1">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a href="#" class="btn btn-primary btn-square mx-1">
                                        <i class="fab fa-youtube"></i>
                                    </a>
                                    <a href="https://www.linkedin.com/in/khaled-hossain-3abaaa59/" target="_blank" class="btn btn-primary btn-square mx-1">
                                        <i class="fab fa-linkedin"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="text-center p-4 mt-3">
                                <h5 class="mb-0 fw-bold">Asiful Mowla</h5>
                                <small>Junior Developer</small>
                                <p>Second developer. Developed and added some feature</p>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 wow fadeInUp">
                        <div class="rounded shadow overflow-hidden">
                            <div class="position-relative">
                                <img src="img/jihad.jpeg" alt="images" class="img-fluid">
                                <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                                    <a href="#" class="btn btn-primary btn-square mx-1">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a href="#" class="btn btn-primary btn-square mx-1">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a href="#" class="btn btn-primary btn-square mx-1">
                                        <i class="fab fa-youtube"></i>
                                    </a>
                                    <a href="#" class="btn btn-primary btn-square mx-1">
                                        <i class="fab fa-linkedin"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="text-center p-4 mt-3">
                                <h5 class="mb-0 fw-bold">Abdullah Al Mahbub Jihad</h5>
                                <small>Logistic</small>
                                <p>Designer And Logistic support</p>
                            </div>
                        </div>
                    </div>
                    
                    

                </div>
            </div>
        </div>
@endsection
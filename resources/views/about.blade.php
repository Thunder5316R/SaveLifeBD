@extends('layouts.app')
@section('title', 'About')


@section('content')
        <!-- ===================== Header Section =================== -->
        <div class="about">
            <div class="wrap">
                <h4>Home > <span>About</span></h4>
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
                        <h1 class="mb-4" style="font-size: 35px;">Welcome to <span class="text-primary text-uppercase">LPI Blood Bank</span></h1>
                        <p class="mb-2">Our work of LPI Blood Bank is to serve the helpless people. We are bringing a huge opportunity to those who cannot arrange blood for their close relatives due to lack of blood donors. Users can easily find their nearest donor by using our website. We have here the list of all blood warriors of the country. Those who willingly donate their precious blood. We are here with 100+ Blood Donation Organizations. They always help people to donate blood using our website.</p>
                        <p class="mb-2">This website is created by us 4th phase 1st shift students of computer department of Lakshmipur Polytechnic Institute.</p>
                        <p class="mb2">You can easily find your nearest blood donor by submitting the blood group, patient name, blood donation date, mobile number and where the blood is required. It is our responsibility to send the blood donor's name, mobile number, photo and address to you. which will reach the satellite within a few seconds.</p>
                        <p>Hopefully, no one from here will die empty-handed without a blood donar. <a href="img/thankyou.gif" target="_blank">Thank you!</a></p>

                    </div>
                    <div class="col-lg-6">
                         <img src="img/about-1.jpg" alt="Image" class="img-fluid rounded w-100 wow zoomIn">
                    </div>
                </div>
            </div>
        </div>


        <!-- =============== Video Start =========== -->
        <div class="container-xxl py-5 px-0 wow zoomIn" data-wow-delay="0.1s">
            <div class="row g-0">

                <!-- text-part -->
                <div class="col-md-6 bg-dark d-flex align-items-center video-part">
                    <div class="p-5">
                        <h6 class="section-title text-start text-white text-uppercase mb-3">One Video For Me</h6>
                        <h1 class="text-white mb-4">What do you want to know about our work?</h1>
                        <p class="text-white mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
                        <a href="doner.html" class="btn d-lg-inline-block d-none btn-primary py-md-3 px-md-4 px-lg-5 me-3 problem-btn">Become a Donar</a>
                        <a href="contact.html" class="btn btn-light py-md-3 px-md-4 px-lg-5 mt-md-4 mt-lg-0">Contact Us</a>
                    </div>
                </div>

                <!-- video-part -->
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



        <!-- ================== About Section ================== -->
        <div class="container-xxl py-5" id="about">
            <div class="container">
                <div class="row g-5 align-items-center">

                    <div class="col-lg-6">
                         <img src="img/blood-d.jpg" alt="Image" class="img-fluid rounded w-100 wow zoomIn">
                    </div>

                    <div class="col-lg-6">
                        <h6 class="section-title text-start text-primary text-uppercase">
                            Benefits of donating blood
                        </h6>
                        <h1 class="mb-4 h3 w-md-75 w-100">
                               We are in the service of people for the pleasure of God! 😊
                        </h1>
                        <p class="mb-1">Regular blood donation reduces the risk of heart disease and heart attack.  Another study found that people who donate blood twice a year have a lower risk of developing cancer than others.  In particular, the risk of lung, liver, colon, stomach and throat cancer has been observed to be much lower in regular blood donars.</p>
                        <p class="mb-2">First and foremost reason for donating blood: One person's donated blood will save another person's life.Blood donation is very beneficial for health. Donating blood 3 times a year increases the vitality of red blood cells in your body as well as increases the rate of new blood cell production.Regular blood donation reduces the risk of heart disease and heart attack.The study was conducted on 1,200 people over four years.Through regular voluntary blood donation, it is known free of cost if there is any major disease in one's body.For example: Hepatitis-B, Hepatitis-C, Syphilis, HIV (AIDS) etc.  Each pint (one-eighth of a gallon) of blood expended is 650 calories.</p>
                        
                    </div>
                </div>
            </div>
        </div>

        <!-- ============ Question & Answer Testimonisl Section ============= -->
        <div class="container-xxl testimonial my-5 py-5 bg-dark wow zoomIn d-lg-block d-none" id="testimonial">
            <div class="container">
                <h2 class="text-white text-center text-capitalize"><span>Questions</span> and <span>answers</span> related to blood <span>donation</span>:</h2>
                <div class="owl-carousel testimonial-carousel py-5" style="display: block;">

                    <!-- 1st -->
                    <div class="testimonial-item position-relative bg-white rounded overflow-hidden" style="height: 220px;">
                        <h5>What is the correct age for blood donation?</h5>
                        <p class="ps-4 mt-3">The correct age of blood donation is 18 to 60 years old healthy healthy people can donate blood and their body weight should be more than 50 kg.</p>

                        <i class="fa fa-quote-right fa-3x text-primary position-absolute end-0 bottom-0 me-4 mb-n1"></i>
                    </div>


                    <!-- 2nd -->
                    <div class="testimonial-item position-relative bg-white rounded overflow-hidden" style="height: 220px;">
                        <h5>Is blood donation safe?</h5>
                        <p class="ps-4">Yes of course blood donation is safe. Boys have 76 ml of blood per kg of body weight and girls have 66 ml of blood per kg of body weight. Voluntary blood donation involves collecting 380 to 400 milliliters of blood from a donor, which is 1/10 of the total blood in the body and half or less of the surplus blood.</p>

                        <i class="fa fa-quote-right fa-3x text-primary position-absolute end-0 bottom-0 me-4 mb-n1"></i>
                    </div>

                    <!-- 3rd -->
                    <div class="testimonial-item position-relative bg-white rounded overflow-hidden" style="height: 220px;">
                        <h5>Does blood donation have any side effects?</h5>
                        <p class="ps-4 mt-3">No, blood donation has no side effects. Rather, it has many benefits. Blood donation has many benefits for our body. As a result, the risk of bad diseases in our body is less.</p>

                        <i class="fa fa-quote-right fa-3x text-primary position-absolute end-0 bottom-0 me-4 mb-n1"></i>
                    </div>


                    <!-- 4th -->
                    <div class="testimonial-item position-relative bg-white rounded overflow-hidden" style="height: 220px;">
                        <h5>How much blood is taken in blood donation?</h5>
                        <p class="ps-4">About 380-400ml from your body. Blood is taken. Which is 1/10th of your body's blood volume. Because of this, most blood donars do not feel anything after donating blood and it is completely safe. The amount of fluid that is taken from the blood returns to normal within 48 hours.</p>

                        <i class="fa fa-quote-right fa-3x text-primary position-absolute end-0 bottom-0 me-4 mb-n1"></i>
                    </div>

                    <!-- 5th -->
                    <div class="testimonial-item position-relative bg-white rounded overflow-hidden" style="height: 220px;">
                        <h5>After how many days blood can be donated?</h5>
                        <p class="ps-4 mt-3">You can donate blood after 3 months. But according to the World Health Organization, a healthy man can donate blood every 3 months and women every 4 months. But according to us everyone should donate blood every 4 months. If there is no special need.</p>

                        <i class="fa fa-quote-right fa-3x text-primary position-absolute end-0 bottom-0 me-4 mb-n1"></i>
                    </div>


                    <!-- 6th -->
                    <div class="testimonial-item position-relative bg-white rounded overflow-hidden" style="height: 220px;">
                        <h5>How long does it take to donate blood?</h5>
                        <p class="ps-4">Takes 5 to 7 minutes, maximum 15 minutes. Taking rest and other times may take 1 hour in total. By donating blood, everyone should look forward and serve people. Two lives can save you 1 hour.</p>

                        <i class="fa fa-quote-right fa-3x text-primary position-absolute end-0 bottom-0 me-4 mb-n1"></i>
                    </div>

                    <!-- 7th -->
                    <div class="testimonial-item position-relative bg-white rounded overflow-hidden" style="height: 220px;">
                        <h5>Can I faint as a result of blood donation?</h5>
                        <p class="ps-4 mt-3">A very small number of people can lose consciousness if they donate blood. Since the blood collection is done by a doctor, there is no fear of getting sick. But after donating blood, rest must be done.</p>

                        <i class="fa fa-quote-right fa-3x text-primary position-absolute end-0 bottom-0 me-4 mb-n1"></i>
                    </div>


                    <!-- 8th -->
                    <div class="testimonial-item position-relative bg-white rounded overflow-hidden" style="height: 220px;">
                        <h5>How is blood taken?</h5>
                        <p class="ps-4">First a semi-series of blood is drawn from the left arm, for cross-matching and other tests. Blood is then drawn through a syringe in your right arm. There is slight pain when the needle is inserted. Then there will be no more pain. Your blood is easily collected through a tube into a saline-like bag.</p>

                        <i class="fa fa-quote-right fa-3x text-primary position-absolute end-0 bottom-0 me-4 mb-n1"></i>
                    </div>


                    <!-- 9th -->
                    <div class="testimonial-item position-relative bg-white rounded overflow-hidden" style="height: 220px;">
                        <h5>What is the minimum weight for blood donation?</h5>
                        <p class="ps-4">Although it depends on the height of the blood donor, the body weight of the blood donor should be minimum 47 kg for girls and 50 kg or more for boys. But weight should be at least 55 kg if platylat is applied, boy/girl.</p>

                        <i class="fa fa-quote-right fa-3x text-primary position-absolute end-0 bottom-0 me-4 mb-n1"></i>
                    </div>

                    <!-- 10th -->
                    <div class="testimonial-item position-relative bg-white rounded overflow-hidden" style="height: 220px;">
                        <h5>Can smokers donate?</h5>
                        <p class="ps-4 mt-3">The lungs are particularly damaged by smoking nicotine, but a very small part of the consumed nicotine enters the blood, the amount of nicotine in the cells is in micrograms, but in the blood it is in nanograms, which is a thousand times less than the tissue, so the smoker can donate blood without hesitation.</p>

                        <i class="fa fa-quote-right fa-3x text-primary position-absolute end-0 bottom-0 me-4 mb-n1"></i>
                    </div>


                    <!-- 11th -->
                    <div class="testimonial-item position-relative bg-white rounded overflow-hidden" style="height: 220px;">
                        <h5>Can diabetic patients donate blood?</h5>
                        <p class="ps-4">No, Diabetic patients taking insulin should not donate blood. However, they can donate blood for special needs. However, if blood glucose remains normal through food control, blood can be donated</p>

                        <i class="fa fa-quote-right fa-3x text-primary position-absolute end-0 bottom-0 me-4 mb-n1"></i>
                    </div>

                    <!-- 12th -->
                    <div class="testimonial-item position-relative bg-white rounded overflow-hidden" style="height: 220px;">
                        <h5>What should I do before donating blood?</h5>
                        <p class="ps-4 mt-3">Sleep well the night before. Have a good breakfast in the morning. Do not drink caffeinated drinks (tea, coffee). Do not eat too much fatty food. Drink enough water. Platelet donors should note whether they have taken aspirin within the last 2 days. It is better not to donate.</p>

                        <i class="fa fa-quote-right fa-3x text-primary position-absolute end-0 bottom-0 me-4 mb-n1"></i>
                    </div>
                    
                </div>
            </div>
        </div>


        <!-- ============= LPI About Section ============ -->
        <div class="container-xxl py-5" id="team">
            <div class="container">
                <div class="text-center wow fadeInUp">
                    <h6 class="section-title text-center text-primary text-uppercase">Our LPI</h6>
                    <h1 class="mb-5">About our <span class="text-primary text-uppercase">Collage</span> campus</h1>
                </div>
                <div class="row g-4">

                    <div class="col-lg-12 wow fadeInUp">
                        <img src="img/collage.jpg" alt="..." style="width: 100%; height: 65vh;">
                    </div>
                    
                    <div class="container fadeInUp">
                        <div class="row g-5 align-items-center">
                            <div class="col-lg-12">
                                <h6 class="section-title text-start text-primary text-uppercase">
                                    About to LPI
                                </h6>
                                <h1 class="mb-4">Lakshmipur <span class="text-primary">Polytechnic</span> Institute</h1>
                                <p class="mb-4">Lakshmipur polytechnic institute was established in 2006. This institute conducts 4 years Diploma in Engineering course under Bangladesh technical education board.</p>
                                <p class="mb-4">In addition to technical education every technology has a Non technical education department for teaching compulsory subjects such as Bangla, English, Mathematics, Physics, Chemistry, Social Science etc to the students. Students are taught in two shifts Morning and Afternoon. Departments - Computer science technology, Civil technology, Electronics technology, Architecture technology, Electrical technology.</p>
                                <p class="mb-4">Lakshmipur polytechnic institute is located at Baishmara, 2 km east of lakshmipur district town. There are 23 labs with a five-storey administrative and an academic building, two storey workshops. There are also principal bus buildings, two storey staff quarters, a "Shaheed Minar", a sub-station and a pump house.</p>
                                <p>Every year after the release of the SSC exam results, Bangladesh directorate of technical education starts the online admission process in the Government polytechnics of the country. By filling the online admission form, students choose various departments and polytechnics. Departments and institutes are selected on the basis of merit and preference. Thus every year 600 students are admitted in Lakshmipur polytechnic institute in first and second shift according to the number of seats assigned in various departments.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- ========== Teacher Section =========== -->

        <div class="teacher d-lg-block d-none">
            <div class="wrap">
    
            <!-- ===== Teacher Counter ==== -->
                
                <div class="row pb-4 text-white">

                    <div class="col-sm-3 wow fadeIn box-tech mt-lg-4">
                        <div class="border rounded p-1">
                            <div class="border rounded text-center p-3">
                                <img src="img/icon/teacher.png" class="icon-img mb-1" alt="..">

                                <h2 class="mb-1" data-toggle="counter-up">35</h2>

                                <p class="mb-0">Teachers</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 wow fadeIn box-tech mt-lg-4">
                        <div class="border rounded p-1">
                            <div class="border rounded text-center p-3">
                                <img src="img/icon/classroom.png" class="icon-img mb-1" alt="..">

                                <h2 class="mb-1" data-toggle="counter-up">12</h2>
                                <p class="mb-0">Instructor</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 wow fadeIn box-tech mt-lg-4">
                        <div class="border rounded p-1">
                            <div class="border rounded text-center p-3">
                                <img src="img/icon/audience.png" class="icon-img mb-1" alt="..">

                                <h2 class="mb-1" data-toggle="counter-up">5000</h2>
                                <p class="mb-0">Students</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 wow fadeIn box-tech mt-lg-4 me-lg-0">
                        <div class="border rounded p-1">
                            <div class="border rounded text-center p-3">
                                <img src="img/icon/networking.png" class="icon-img mb-1" alt="..">

                                <h2 class="mb-1" data-toggle="counter-up">5</h2>
                                <p class="mb-0">Department</p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <!-- ======== Image Gallery ========= -->
        <div class="gallery">
            <div class="container wow fadeIn">
                <h1 class="p-5 text-center">Image Gallery</h1>
                <div class="row fadeInUp">

                    <div class="col-12 col-md-6 col-lg-4 wow fadeInUp mb-3">
                        <a href="img/gellary-1.jpg" target="_blank" id="img-gall">
                            <img src="img/gellary-1.jpg" alt="..." class="img-fluid rounded img-g">
                            <i class='bx bx-screenshot'></i>
                        </a>
                    </div>

                    <div class="col-12 col-md-6 col-lg-4 wow fadeInUp mb-3">
                        <a href="img/gellary-2.jpg" target="_blank" id="img-gall">
                            <img src="img/gellary-2.jpg" alt="..." class="img-fluid rounded">
                            <i class='bx bx-screenshot'></i>
                        </a>
                    </div>

                    <div class="col-12 col-md-6 col-lg-4 wow fadeInUp mb-3">
                        <a href="img/gellary-6.jpg" target="_blank" id="img-gall">
                            <img src="img/gellary-6.jpg" alt="..." class="img-fluid rounded">
                            <i class='bx bx-screenshot'></i>
                        </a>
                    </div>

                    <div class="col-12 col-md-6 col-lg-4 wow fadeInUp mb-3">
                        <a href="img/gellary-3.jpg" target="_blank" id="img-gall">
                            <img src="img/gellary-3.jpg" alt="..." class="img-fluid rounded">
                            <i class='bx bx-screenshot'></i>
                        </a>
                    </div>

                    <div class="col-12 col-md-6 col-lg-4 wow fadeInUp mb-3">
                        <a href="img/gellary-4.jpg" target="_blank" id="img-gall">
                            <img src="img/gellary-4.jpg" alt="..." class="img-fluid rounded">
                            <i class='bx bx-screenshot'></i>
                        </a>
                    </div>

                    <div class="col-12 col-md-6 col-lg-4 wow fadeInUp">
                        <a href="img/col-img.jpg" target="_blank" id="img-gall">
                            <img src="img/col-img.jpg" alt="..." class="img-fluid rounded">
                            <i class='bx bx-screenshot'></i>
                        </a>
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
                        👉  How many bags of blood may be required for a patient:-
                    </a>
                    <a href="#">
                        👉  How to find a blood donar from our site?
                    </a>
                    <a href="#">
                        👉  Some precautions or awareness of blood donors Why donate blood?
                    </a>
                    <a href="#">
                        👉  Why should you donate blood?
                    </a>
                    <a href="#">
                        👉  What should be done after donating blood?
                    </a>
                </div>
            </div>
        </div>

@endsection
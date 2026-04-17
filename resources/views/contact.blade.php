@extends('layouts.app')
@section('title', 'Contact')


@section('content')
        <!-- ===================== Header Section =================== -->
        <div class="about contact">
            <div class="wrap">
                <h4>Home > <span>Contact</span></h4>
            </div>
        </div>

        <!-- ================== About Section ================== -->
        <div class="container-xxl py-5" id="about">
            <div class="container">
                <h5 class="section-title text-start text-primary text-uppercase">
                            Contact Us
                </h5>
                <marquee class="mb-4 bg-primary" behavior="scroll">
                    <h4 class="p-2 text-white">For any requirement call: 01750965595 or Mail to <a href="">connectwithsohag@gmail.com</a>. Thank You!</h4>
                </marquee>
            </div>
        </div>

       <!-- ++++++++++ contact form +++++++ -->

       <section class="contact-us py-5">
            <div class="container">
                <div class="row wow fadeInUp">
                    <div class="col-12 col-lg-8">
                        <div class="card text-center">
                            <div class="card-body">
                                <h3 class="h4">Please fill out this form to contact us</h3>
                                <form action="#" method="POST">
                                    <div class="row">
                                        <div class="col-12 col-md-6 mt-2">
                                            <input type="text" placeholder="First Name" class="form-control">
                                        </div>
                                        <div class="col-12 col-md-6 mt-2">
                                            <input type="text" placeholder="Last Name" class="form-control" required>
                                        </div>
                                        <div class="col-12 col-md-6 mt-2">
                                            <input type="number" placeholder="Mobile Number" class="form-control" required>
                                        </div>
                                        <div class="col-12 col-md-6 mt-2">
                                            <input type="email" placeholder="Email" class="form-control">
                                        </div>
                                        <div class="col-12 col-md-6 mt-2">
                                            <input type="text" placeholder="Present Address" class="form-control" required>
                                        </div>
                                        <div class="col-12 col-md-6 mt-2">
                                            <select name="" id="" class="form-select">
                                                <option value="" selected>Blood Group</option>
                                                <option value="1">A+</option>
                                                <option value="2">A-</option>
                                                <option value="3">B+</option>
                                                <option value="4">B-</option>
                                                <option value="5">O+</option>
                                                <option value="6">O-</option>
                                                <option value="7">AB+</option>
                                                <option value="8">AB-</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 mt-2">
                                            <textarea name="" id="" cols="30" rows="5" placeholder="Massage" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 mt-2">
                                            <input type="submit" value="Send" class="form-control d-grid bg-primary text-uppercase text-white">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 ms-0 mt-lg-0 mt-3 address">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="h4">Get In Touch</h4>
                                <p>Keep in touch with us and call or mail us for any requirement. We are ready to assist you.</p>
                                <h4 class="h4">Address</h4>
                                <p>Lakshmipur Polytechnic Institute - Baismara, Lakshmipur Sadar - 3700, Lakshmipur</p>
                                <h4>Email</h4>
                                <p>lpiblood@gmail.com <br> connectwithsohag@gmail.com</p>
                                <h4>Phone</h4>
                                <p>01750965595 </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 wow fadeInUp mt-4">
                        <a href="doner.php" class="btn btn-primary w-100">Become a Donor</a>
                    </div>
                </div>
            </div>
        </section>
@endsection
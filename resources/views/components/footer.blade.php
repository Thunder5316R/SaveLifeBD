<!-- ============= NewsLetter Section ============= -->
<div class="container newsletter mt-5 wow fadeIn">
    <div class="row justify-content-center">
        <div class="col-lg-10 border rounded p-1">
            <div class="border rounded text-center p-5 bg-white">

                <h4 class="mb-4">
                    Subscribe to give
                    <span class="text-primary text-uppercase">your opinion</span>
                </h4>

                <div class="mx-auto position-relative" style="max-width: 400px;">

                    <input type="email" id="subscribeEmail" class="form-control w-100 py-3 ps-4 pe-5"
                        placeholder="Enter Your Email">

                    <button type="button" id="subscribeBtn"
                        class="btn btn-primary py-2 px-3 position-absolute top-0 end-0 mt-2 me-2">
                        Submit
                    </button>

                </div>

            </div>
        </div>
    </div>
</div>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.getElementById('subscribeBtn').addEventListener('click', function () {

            let email = document.getElementById('subscribeEmail').value;

            // Email empty check
            if (email.trim() === '') {

                Swal.fire({
                    icon: 'warning',
                    title: 'Email Required',
                    text: 'Please enter your email address!',
                    confirmButtonColor: '#3085d6'
                });

                return;
            }

            // Email validation
            let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (!emailPattern.test(email)) {

                Swal.fire({
                    icon: 'error',
                    title: 'Invalid Email',
                    text: 'Please enter a valid email address!',
                    confirmButtonColor: '#d33'
                });

                return;
            }

            // Success Alert
            Swal.fire({
                icon: 'success',
                title: 'Subscribed Successfully!',
                text: 'Thank you for subscribing with us ❤️',
                confirmButtonColor: '#198754'
            });

            // Clear input
            document.getElementById('subscribeEmail').value = '';
        });
</script>

<!-- ============= Footer section ================ -->
<div class="container-xxl bg-dark text-light footer wow fadeIn" id="contact">
    <div class="container pb-5">
        <div class="row g-5">

            <div class="col-lg-4 col-md-6">
                <div class="bg-primary rounded p-4">
                    <a href="#">
                        <h1 class="text-white text-uppercase mb-3" style="font-size: 25px;">Save Life BD
                            <span style="font-size: 9px;" class="d-block text-white">Lakshmipur Polytechnic
                                Institute</span>
                        </h1>
                    </a>

                    <p class="text-white mb-0">
                        Download our App <a href="{{ asset('app/app.apk') }}" download class="text-dark fw-medium">
                            Save Life BD - App
                        </a>
                        Use our Save Life BD app on your mobile phone and contact us for any need. Thank you for
                        visiting my website!
                    </p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <h6 class="section-title text-start text-primary text-uppercase mb-4">Contact</h6>
                <p class="mb-2">
                    <i class="fa fa-map-marker-alt me-3"></i>
                    3700 Lakshmipur Sadar
                </p>
                <p class="mb-2">
                    <i class="fa fa-phone me-3"></i>
                    +88017 5096 5595
                </p>
                <p class="mb-2">
                    <i class="fa fa-envelope me-3"></i>
                    connectwithsohag@gmail.com
                </p>

                <div class="d-flex pt-2">
                    <a href="https://twitter.com/SohagHo86222109" target="_blank"
                        class="btn btn-outline-light btn-social">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="https://www.facebook.com/programmer.sohaghosen" target="_blank"
                        class="btn btn-outline-light btn-social">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://www.youtube.com/channel/UCLF3Q534eH1d5xKKY2CTMUA" target="_blank"
                        class="btn btn-outline-light btn-social">
                        <i class="fab fa-youtube"></i>
                    </a>
                    <a href="https://www.linkedin.com/in/sohag-hosen-9535b4245/" target="_blank"
                        class="btn btn-outline-light btn-social">
                        <i class="fab fa-linkedin"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-5 col-md-12">
                <div class="row gy-5 g-4">

                    <div class="col-md-6">
                        <h6 class="section-title text-start text-primary text-uppercase mb-4">Save Life BD</h6>
                        <a href="/about" class="btn btn-link">About Us</a>
                        <a href="/contact" class="btn btn-link">Contact Us</a>
                        <a href="/privacy" class="btn btn-link">Privacy Policy</a>
                        <a href="/terms" class="btn btn-link">Teams & Condition</a>
                        <a href="https://wa.me/8801750965595?text=Hello%20I%20need%20support" target="_blank"
                            class="btn btn-link">
                            Support
                        </a>
                    </div>


                    <div class="col-md-6">
                        <h6 class="section-title text-start text-primary text-uppercase mb-4">Services</h6>
                        <a href="https://www.facebook.com/groups/669389887932317" target="_blank"
                            class="btn btn-link">LPI - Blood Group</a>
                        <a href="https://www.facebook.com/socialdevelopmentsociety.bd" target="_blank"
                            class="btn btn-link">Social Development Society</a>
                        <a href="https://www.facebook.com/profile.php?id=100053884909865" target="_blank"
                            class="btn btn-link">Adorsho Torun Sproting Club</a>
                        <a href="https://www.facebook.com/lpibloodbank" target="_blank" class="btn btn-link">Save Life
                            BD</a>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <!-- copyright -->
    <div class="container">
        <div class="copyright">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a href="#" class="border-bottom">Save Life BD,</a> All Right Reserved. Developed By <a
                        href="https://www.facebook.com/programmer.sohaghosen" target="_blank"
                        class="border-bottom">Sohag Hosen</a>
                </div>

                <div class="col-md-6 text-center text-md-end">
                    <div class="footer-menu">
                        <a href="/home">Home</a>
                        <a href="/contact">Contact Us</a>
                        <a href="https://wa.me/8801750965595?text=Hello%20I%20need%20help" target="_blank">
                            Help
                        </a>
                        {{-- <a href="#">FAQs</a> --}}
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
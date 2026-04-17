@extends('layouts.app')
@section('title', 'Blog')


@section('content')
        <!-- ===================== Header Section =================== -->
        <div class="about blogs">
            <div class="wrap">
                <h4>Home > <span>Blogs</span></h4>
            </div>
        </div>

        <!-- ================== About Section ================== -->
        <div class="container-xxl py-5" id="about">
            <div class="container">
                <h5 class="section-title text-start text-primary text-uppercase">
                            Blogs Part
                </h5>

                <!-- ========= page-number-part ============= -->

                <nav aria-label="Page navigation example" class="bg-primary d-flex justify-content-center">
                  <ul class="pagination mt-3">
                    <li class="page-item d-none d-md-inline-block"><a class="page-link text-dark">Go To Page :</a></li>
                    <li class="page-item"><a class="page-link text-primary" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link text-primary" href="#">1</a></li>
                    <li class="page-item"><a class="page-link text-primary" href="#">2</a></li>
                    <li class="page-item"><a class="page-link text-primary" href="#">3</a></li>
                    <li class="page-item"><a class="page-link text-primary" href="#">4</a></li>
                    <li class="page-item"><a class="page-link text-primary" href="#">5</a></li>
                    <li class="page-item d-none d-md-inline-block"><a class="page-link text-primary" href="#">6</a></li>
                    <li class="page-item d-none d-md-inline-block"><a class="page-link text-primary" href="#">7</a></li>
                    <li class="page-item d-none d-md-inline-block"><a class="page-link text-primary" href="#">8</a></li>
                    <li class="page-item d-none d-md-inline-block"><a class="page-link text-primary" href="#">9</a></li>
                    <li class="page-item d-none d-md-inline-block"><a class="page-link text-primary" href="#">10</a></li>
                    <li class="page-item"><a class="page-link text-primary" href="#">Next</a></li>
                  </ul>
                </nav>

                <!-- ++++++++++ 1st Blogs part +++++++++++++ -->

                <div class="container-xxl p-5 mt-lg-4 border-bottom border-danger">
                    
                    <div class="row wow fadeInUp">
                        <div class="col-12">
                            <h2><span>"</span> Blood-man <span>"</span></h2>
                            <p>Every country has some superheroes; Super-Man, Spider-Man, Bat-Man, Iron-Man, Invisible-Man, Plastic-Man... Thousands of such super heroes... Children of the country are inspired by seeing or reading their stories...</p>
                            <p>Our country also has such a super hero; "Blood-Man" :)</p>
                            <p>Sacrificing his precious time, travel hassles, travel expenses, mobile phone expenses, needle stick pain, donating his body's precious 1 bag of blood and everything, a "Blood-Man" donates blood to a comatose patient... not expecting anything in return, but completely selflessly. . :)</p>
                            <p>Salute to all "Blood-men"...</p>
                            <p><span>(</span> Blood-man does not mean only male blood-donars, but also blood-donars <span>)</span></p>
                            <a href="#">Read more...</a>
                        </div>
                    </div>

                    <div class="row wow fadeInUp mt-3">

                        <div class="col-lg-4 col-md-7 col-10 offset-md-3 offset-lg-4 offset-1">
                            <!-- Button trigger modal -->
                            <a href="#" data-bs-toggle="modal" data-bs-target="#modal1">
                                <img src="img/bloodman.jpg" alt="..." class="img-fluid">
                                <p class="text-center mt-2 text-dark"><span>(</span> Click on the image for larger view <span>)</span></p>
                            </a>
                        <!-- Modal -->
                        <div class="modal fade" id="modal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h3 class="modal-title fs-5" id="exampleModalLabel">Blood <span>Man</span></h3>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <img src="img/bloodman.jpg" alt="..." class="img-fluid">
                              </div>
                              <div class="modal-footer">
                                  <h6>Blood-man does not mean only male blood-donars, but also blood-donars</h6>
                              </div>
                            </div>
                          </div>
                        </div>

                            
                        </div>
                    </div>

                </div>

                <!-- ++++++++++ 2nd Blogs part +++++++++++++ -->

                <div class="container-xxl p-5 mt-lg-4 border-bottom border-danger">
                    
                    <div class="row wow fadeInUp">
                        <div class="col-12">
                            <h4>" <span>If there are two blood donars ready, the life of the expectant mother will be assured</span>"... (Maximum share wanted...)</h4>
                            <p>By <a href="#">Sohag Hosen</a></p>
                            
                            <p><span>(</span> Want maximum share... <span>)</span></p>
                            <p>"If there are two blood donars ready, The life of the pregnant mother will be guaranteed."</p>
                            <p>70% of pregnant mothers need blood during childbirth... and many pregnant women die from lack of necessary blood... So think of finding 2 blood donars in advance... Ask friends and known blood donars to always be ready so that they can be the first to come forward in case of any physical complications of the pregnant woman...</p>
                            <p>We have taken the initiative on behalf of <a href="#">www.lpibloodbank.com</a>, Rakat Din, Jeeban Bachan and <span>Call For Blood</span> page... All our volunteers, well wishers and social workers come together...hope to help us in raising awareness about blood donation :)</p>
                            <p>Let's create awareness all over Bangladesh together... 64 districts everywhere... find blood donars for pregnant patients in advance - build this awareness all over Bangladesh...</p>
                            <p>What to do all the volunteers, well wishers and social workers?</p>
                            <h4><span>-------------</span></h4>
                            <p>Online:</p>
                            <p>Share this image as much as possible to create awareness among people by seeing this image... Spread this image on Facebook... Share this post, or upload the image from your profile or post it on different pages... Any way you can, by all means. Spread the...</p>
                            <h4><span>-------------</span></h4>
                            <p>Offline:</p>
                            <ol>
                                <li>Print this image on A4 paper... photocopy as many copies as you can... (Image has been blackened for everyone's convenience)</li>
                                <li>
                                    Put pictures on the walls of the following places:
                                    <div class="wrap">
                                        <p>- At the gates of various hospitals, clinics, diagnostic centers</p>
                                        <p>- In front of pathology department</p>
                                        <p>- On the notice board of the chambers of various doctors (especially gynecologists).</p>
                                    </div>
                                </li>
                                <li>Arrange for notices inside the pharmacy or on the outside wall...</li>
                                <li>Request doctors to inform expectant mothers in advance to find blood donors...</li>
                            </ol>
                            <p>If awareness is created, no pregnant mother in Bangladesh will die due to lack of blood, inshallah...</p>
                             <h4><span>-------------</span></h4>
                            <p>If you want to print the picture, I have given the link of good quality picture in the first comment... Download from there, print and photocopy and distribute in your area..</p>

                            <a href="#">Read more...</a>
                        </div>
                    </div>

                    <div class="row wow fadeInUp mt-3">

                        <div class="col-lg-4 col-md-7 col-10 offset-md-3 offset-lg-4 offset-1">
                            <!-- Button trigger modal -->
                            <a href="#" data-bs-toggle="modal" data-bs-target="#modal2">
                                <img src="img/pregnancy-blood-management.jpg" alt="..." class="img-fluid">
                                <p class="text-center mt-2 text-dark"><span>(</span> Click on the image for larger view <span>)</span></p>
                            </a>
                        <!-- Modal -->
                        <div class="modal fade" id="modal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h3 class="modal-title fs-5" id="exampleModalLabel"><span>Donating</span> Blood</h3>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <img src="img/pregnancy-blood-management.jpg" alt="..." class="img-fluid">
                              </div>
                              <div class="modal-footer">
                                  <h6>Blood-man does not mean only male blood-donars, but also blood-donars</h6>
                              </div>
                            </div>
                          </div>
                        </div>

                            
                        </div>
                    </div>

                </div>

                <!-- ++++++++++ 3rd Blogs part +++++++++++++ -->

                <div class="container-xxl p-5 mt-lg-4 border-bottom border-danger">
                    
                    <div class="row wow fadeInUp">
                        <div class="col-12">
                            <h2><span>'</span> Bloody <span>'</span></h2>
                            <p>'Selfie' - Taking a picture of oneself with a smartphone is 'Selfie'... Facebook is flooded with selfies... a popular trend of this era... Interestingly, this word has been selected as the word of the year in the Oxford dictionary this year. .. :)</p>
                            <p>I took a lot of selfies, let's start taking 'Bloodfi' :)</p>
                            <p>A blood donor goes alone most of the time to donate blood... lying on the hospital bed with a needle in one hand... but don't leave the other hand idle and keep this beautiful memory of blood donation in your mobile :D Hold the mobile phone with the other hand. Throw in the blood donation selfie, meaning 'Bloodfi' :D</p>
                            <p>Then share it with your friends on Facebook if you want... After seeing 'Bloodfy', your friend may also come forward to donate blood to keep a 'Bloodfy' memory of his own 😊</p>
                            <p>Someday we will be old, but this 'Bloodfi' will take us back to the old sweet memories of blood donation :)</p>
                            <h4><span>----</span></h4>
                            <p>Let the era of 'Bloodfy' begin...I'll make a humble request, don't forget to tag me on your 'Bloodfy' :)</p>
                            <a href="#">Read more...</a>
                        </div>
                    </div>

                </div>


                <!-- ++++++++++ 4th Blogs part +++++++++++++ -->

                <div class="container-xxl p-5 mt-lg-4 border-bottom border-danger">
                    
                    <div class="row wow fadeInUp">
                        <div class="col-12">
                            <h2><span>"</span> A request to popular personalities on Facebook <span>"</span></h2>
                            <p>There are some of our dear Facebook personalities who are very popular on Facebook through their writings... They have thousands of followers... I have a humble request to them today...</p>
                            <p>When I look at the home page on Facebook, I see blood requests for various patients... Little brothers and sisters are constantly working to find blood for the sick patient... The blood post means that 90% of people will pass it by, some will be upset; The remaining 10% people will see the request for blood... It is very difficult to get cure even from this 10% people... How much effort is required to find a bag of blood - we who are working with blood know very well, understand that...</p>
                            <p>Facebook popular brothers and sisters, you have a huge army, i mean followers... you have come forward thousands of times out of your sense of responsibility to collect blood for the dying patients... but also know that you can't post every blood request... even post every day. It is not possible to do... But there is an easy way by which you can help collect blood every day, with little effort... :)</p>
                            <p>"If you see a request for blood on your home page, do not hesitate to comment on that post... As many blood posts as you see on the home page, do so... The comment can be "Happy, blood donating", or "Inshallah blood donors will be found" or "trying" - or something like that... What will happen to it? :)</p>
                            <p>This will show that blood post in your friend list and follower list home page news feed... the blood post will reach a large number of people, and many may come forward to donate blood :) <br> But this method is tested and works... :) <br> Re-refresh your home page once every hour and comment on the blood post... See how easy we can make the work of those working with blood... You'll feel good about yourself too... Guaranteed :)</p>
                            <h4><span>----</span></h4>
                            <p>Those of you who I have added in the post, you can start this trend and encourage others if you want... I believe you have that power... :) <br> Help dementia sufferers with a simple comment everyday 🩸</p>
                            <a href="#">Read more...</a>
                        </div>
                    </div>

                </div>


                <!-- ++++++++++ 5th Blogs part +++++++++++++ -->

                <div class="container-xxl p-5 mt-lg-4 border-bottom border-danger">
                    
                    <div class="row wow fadeInUp">
                        <div class="col-12">
                            <h4><span>"</span> Happy Blood Donating Day <span>"</span></h4>
                            
                            <p>June 14 is World Blood Donar Day. The purpose of this day is to encourage the general public to donate blood, including those who are saving millions of lives by donating blood voluntarily and for free.</p>
                            <p>World Blood Donar Day was first celebrated in 2004 following the experience of International Blood Donor Day since 1995 and World Health Day celebrated in 2000 with the theme 'Safe Blood'. Every year since the World Health Assembly in 2005, the World Health Organization has been urging to observe this day.</p>
                            <p>80 million units of blood are voluntarily donated every year, but only 38 percent of it is collected from developing countries, home to 82 percent of the world's population. Apart from this, still in many countries of the world, if people need blood, they have to rely on the blood donation of their family members or their friends, and in many countries, professional blood donors have been donating blood to patients in exchange for money. However, by collecting data from various countries of the world, it is known that the main basis of 'safe blood supply' is voluntary and free blood donation. Because their blood is relatively safe and the risk of life-threatening infections, such as HIV and hepatitis, in recipients is very low.</p>
                            <p>World Blood Donor Day on June 14 is dedicated to those hidden heroes who voluntarily and freely donate blood, to these unsung heroes. The celebration of 14th June has another significance. Scientist Carl Lundsteiner was born on this day. This Nobel laureate scientist discovered the blood group 'A, B, O, AB'. Donating blood is a great gift. Donating blood does not cause any harm to the body. In fact, blood cells are destroyed after a certain period of time. <br> <span>So donate blood, save the patient's life.</span></p>

                            <a href="#">Read more...</a>
                        </div>
                    </div>

                    <div class="row wow fadeInUp mt-3">

                        <div class="col-lg-4 col-md-7 col-10 offset-md-3 offset-lg-4 offset-1">
                            <!-- Button trigger modal -->
                            <a href="#" data-bs-toggle="modal" data-bs-target="#modal3">
                                <img src="img/blogd.jpg" alt="..." class="img-fluid">
                                <p class="text-center mt-2 text-dark"><span>(</span> Click on the image for larger view <span>)</span></p>
                            </a>
                        <!-- Modal -->
                        <div class="modal fade" id="modal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h3 class="modal-title fs-5" id="exampleModalLabel">Happy <span>Blood</span> Donating Day</h3>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <img src="img/blogd.jpg" alt="..." class="img-fluid">
                              </div>
                              <div class="modal-footer">
                                  <h6>Give <span>Blood</span> and Safe <span>Life</span></h6>
                              </div>
                            </div>
                          </div>
                        </div>

                            
                        </div>
                    </div>

                </div>
                
            </div>
        </div>


                <!-- ========= page-number-part ============= -->

                <nav aria-label="Page navigation example" class="bg-primary d-flex justify-content-center">
                  <ul class="pagination mt-3">
                    <li class="page-item d-none d-md-inline-block">
                        <a class="page-link text-dark">Go To Page :</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link text-primary" href="#">Previous</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link text-primary" href="#">1</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link text-primary" href="#">2</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link text-primary" href="#">3</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link text-primary" href="#">4</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link text-primary" href="#">5</a>
                    </li>
                    <li class="page-item d-none d-md-inline-block">
                        <a class="page-link text-primary" href="#">6</a>
                    </li>
                    <li class="page-item d-none d-md-inline-block">
                        <a class="page-link text-primary" href="#">7</a>
                    </li>
                    <li class="page-item d-none d-md-inline-block">
                        <a class="page-link text-primary" href="#">8</a>
                    </li>
                    <li class="page-item d-none d-md-inline-block">
                        <a class="page-link text-primary" href="#">9</a>
                    </li>
                    <li class="page-item d-none d-md-inline-block">
                        <a class="page-link text-primary" href="#">10</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link text-primary" href="#">Next</a>
                    </li>
                  </ul>
                </nav>
@endsection
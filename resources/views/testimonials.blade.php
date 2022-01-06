@extends('layouts.landing')

@section('content')

    <section class="banner banner-secondary" id="top" style="background-image: url(img/banner-image-3-1920x300.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="banner-caption">
                        <div class="line-dec"></div>
                        <h2>Testimonials</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <main>
        <section class="popular-places" id="popular">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="item popular-item">
                            <div class="thumb">
                                <div class="thumb-img">
                                    <img src="img/popular_item_1.jpg" alt="">
                                </div>
                                <div class="text-content">
                                    <h4>M.D Geneith Pharma limited</h4>
                                    <span>"KiyiX has delivered the highest value to my company in recruitment"</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="item popular-item">
                            <div class="thumb">
                                <div class="thumb-img">
                                    <img src="img/popular_item_2.jpg" alt="">
                                </div>
                                <div class="text-content">
                                    <h4>MD TRICARE LIMITED</h4>
                                    <span>"My top five sales reps all came from KiyiX."</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="item popular-item">
                            <div class="thumb">
                                <div class="thumb-img">
                                    <img src="img/popular_item_3.jpg" alt="">
                                </div>
                                <div class="text-content">
                                    <h4>MD Crosslink Group</h4>
                                    <span>"KiyiX has been a dependable partner."</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="item popular-item">
                            <div class="thumb">
                                <div class="thumb-img">
                                    <img src="img/popular_item_4.jpg" alt="">
                                </div>
                                <div class="text-content">
                                    <h4>PHARM JOSEPH ABU</h4>
                                    <span>"KiyiX took me out of the job market"</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- <section id="video-container">
            <div class="video-overlay"></div>
            <div class="video-content">
                <div class="inner">
                      <div class="section-heading">
                          <span>Lorem ipsum dolor.</span>
                          <h2>Vivamus nec vehicula felis</h2>
                      </div>
                      Modal button

                      <div class="container">
                        <div class="row">
                            <div class="col-lg-10 col-lg-offset-1">
                                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi blanditiis, esse deserunt assumenda! Tempora nulla natus illum soluta quasi, nisi, in quaerat cumque corrupti ipsum impedit necessitatibus expedita minus harum, fuga id aperiam autem architecto odio. Perferendis eius possimus ex itaque tenetur saepe id quis dicta voluptas, corrupti sapiente hic!</p>
                            </div>
                        </div>
                      </div>
                </div>
            </div>
        </section> -->

        <section class="popular-places">
            <div class="container text-center">
                <h4>We are open for business 24/7</h4>

                <br>

                <div class="blue-button">
                    <a href="{{route('contact-page')}}">Contact Us</a>
                </div>
            </div>
        </section>
    </main>
@endsection
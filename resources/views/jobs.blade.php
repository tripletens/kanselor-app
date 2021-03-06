
@extends('layouts.landing')

@section('content')
      
    <section class="banner banner-secondary" id="top" style="background-image: url(img/banner-image-1-1920x300.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="banner-caption">
                        <div class="line-dec"></div>
                        <h2>Jobs</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <main>
        <section class="featured-places">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-xs-12">
                        <form action="#">
                         <h4 style="margin-bottom: 15px">Type</h4>

                         <div>
                              <label>
                                   <input type="checkbox">

                                   <span>Contract (5)</span>
                              </label>
                         </div>

                         <div>
                              <label>
                                   <input type="checkbox">

                                   <span>Full time (5)</span>
                              </label>
                         </div>

                         <div>
                              <label>
                                   <input type="checkbox">

                                   <span>Internship (5)</span>
                              </label>
                         </div>

                         <br>

                         <h4 style="margin-bottom: 15px">Category</h4>

                         <div>
                              <label>
                                   <input type="checkbox">

                                   <span>Accounting / Finance / Insurance Jobs (5)</span>
                              </label>
                         </div>

                         <div>
                              <label>
                                   <input type="checkbox">

                                   <span>Accounting / Finance / Insurance Jobs (5)</span>
                              </label>
                         </div>

                         <div>
                              <label>
                                   <input type="checkbox">

                                   <span>Accounting / Finance / Insurance Jobs (5)</span>
                              </label>
                         </div>

                         <br>

                         <h4 style="margin-bottom: 15px">Career levels</h4>

                         <div>
                              <label>
                                   <input type="checkbox">

                                   <span>Entry Level (5)</span>
                              </label>
                         </div>

                         <div>
                              <label>
                                   <input type="checkbox">

                                   <span>Entry Level (5)</span>
                              </label>
                         </div>

                         <div>
                              <label>
                                   <input type="checkbox">

                                   <span>Entry Level (5)</span>
                              </label>
                         </div>

                         <br>

                         <h4 style="margin-bottom: 15px">Education levels</h4>

                         <div>
                              <label>
                                   <input type="checkbox">

                                   <span>Associate Degree (5)</span>
                              </label>
                         </div>

                         <div>
                              <label>
                                   <input type="checkbox">

                                   <span>Associate Degree (5)</span>
                              </label>
                         </div>

                         <div>
                              <label>
                                   <input type="checkbox">

                                   <span>Associate Degree (5)</span>
                              </label>
                         </div>

                         <br>


                         <h4 style="margin-bottom: 15px">Years of experience</h4>

                         <div>
                              <label>
                                   <input type="checkbox">

                                    <span>&lt; 1 (5)</span>
                              </label>
                         </div>

                         <div>
                              <label>
                                   <input type="checkbox">

                                    <span>&lt; 1 (5)</span>
                              </label>
                         </div>

                         <div>
                              <label>
                                   <input type="checkbox">

                                    <span>&lt; 1 (5)</span>
                              </label>
                         </div>
                        </form>
                    </div>

                    <div class="col-md-8 col-xs-12">
                        <div class="row">
                            <div class="col-sm-6 col-xs-12">
                                <div class="featured-item">
                                    <div class="thumb">
                                        <div class="thumb-img">
                                            <img src="{{asset('img/product-1-720x480.jpg')}}" alt="">
                                        </div>

                                        <div class="overlay-content">
                                         <strong title="Posted on"><i class="fa fa-calendar"></i> 15-06-2020</strong> &nbsp;&nbsp;&nbsp;&nbsp;
                                         <strong title="Type"><i class="fa fa-file"></i> Contract</strong> &nbsp;&nbsp;&nbsp;&nbsp;
                                         <strong title="Location"><i class="fa fa-map-marker"></i> London</strong>
                                        </div>
                                    </div>

                                    <div class="down-content">
                                        <h4>Job Title</h4>

                                        <p> Medical / Health Jobs</p>

                                        <p><span><strong><sup>&#8358;</sup>60 000</strong></span></p>

                                        <div class="text-button">
                                            <a href="#">View More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-xs-12">
                                <div class="featured-item">
                                    <div class="thumb">
                                        <div class="thumb-img">
                                            <img src="{{asset('img/product-2-720x480.jpg')}}" alt="">
                                        </div>

                                        <div class="overlay-content">
                                         <strong title="Posted on"><i class="fa fa-calendar"></i> 15-06-2020</strong> &nbsp;&nbsp;&nbsp;&nbsp;
                                         <strong title="Type"><i class="fa fa-file"></i> Contract</strong> &nbsp;&nbsp;&nbsp;&nbsp;
                                         <strong title="Location"><i class="fa fa-map-marker"></i> London</strong>
                                        </div>
                                    </div>
                                    
                                    <div class="down-content">
                                        <h4>Job Title</h4>

                                        <p> Medical / Health Jobs</p>

                                        <p><span><strong><sup>&#8358;</sup>60 000</strong></span></p>

                                        <div class="text-button">
                                            <a href="#">View More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-xs-12">
                                <div class="featured-item">
                                    <div class="thumb">
                                        <div class="thumb-img">
                                            <img src="{{asset('img/product-3-720x480.jpg')}}" alt="">
                                        </div>

                                        <div class="overlay-content">
                                         <strong title="Posted on"><i class="fa fa-calendar"></i> 15-06-2020</strong> &nbsp;&nbsp;&nbsp;&nbsp;
                                         <strong title="Type"><i class="fa fa-file"></i> Contract</strong> &nbsp;&nbsp;&nbsp;&nbsp;
                                         <strong title="Location"><i class="fa fa-map-marker"></i> London</strong>
                                        </div>
                                    </div>
                                    
                                    <div class="down-content">
                                        <h4>Job Title</h4>

                                        <p> Medical / Health Jobs</p>

                                        <p><span><strong><sup>&#8358;</sup>60 000</strong></span></p>

                                        <div class="text-button">
                                            <a href="#">View More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-6 col-xs-12">
                                <div class="featured-item">
                                    <div class="thumb">
                                        <div class="thumb-img">
                                            <img src="{{asset('img/product-4-720x480.jpg')}}" alt="">
                                        </div>

                                        <div class="overlay-content">
                                         <strong title="Posted on"><i class="fa fa-calendar"></i> 15-06-2020</strong> &nbsp;&nbsp;&nbsp;&nbsp;
                                         <strong title="Type"><i class="fa fa-file"></i> Contract</strong> &nbsp;&nbsp;&nbsp;&nbsp;
                                         <strong title="Location"><i class="fa fa-map-marker"></i> London</strong>
                                        </div>
                                    </div>

                                    <div class="down-content">
                                        <h4>Job Title</h4>

                                        <p> Medical / Health Jobs</p>

                                        <p><span><strong><sup>&#8358;</sup>60 000</strong></span></p>

                                        <div class="text-button">
                                            <a href="#">View More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-xs-12">
                                <div class="featured-item">
                                    <div class="thumb">
                                        <div class="thumb-img">
                                            <img src="{{asset('img/product-5-720x480.jpg')}}" alt="">
                                        </div>

                                        <div class="overlay-content">
                                         <strong title="Posted on"><i class="fa fa-calendar"></i> 15-06-2020</strong> &nbsp;&nbsp;&nbsp;&nbsp;
                                         <strong title="Type"><i class="fa fa-file"></i> Contract</strong> &nbsp;&nbsp;&nbsp;&nbsp;
                                         <strong title="Location"><i class="fa fa-map-marker"></i> London</strong>
                                        </div>
                                    </div>
                                    
                                    <div class="down-content">
                                        <h4>Job Title</h4>

                                        <p> Medical / Health Jobs</p>

                                        <p><span><strong><sup>&#8358;</sup>60 000</strong></span></p>

                                        <div class="text-button">
                                            <a href="#">View More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-xs-12">
                                <div class="featured-item">
                                    <div class="thumb">
                                        <div class="thumb-img">
                                            <img src="{{asset('img/product-6-720x480.jpg')}}" alt="">
                                        </div>

                                        <div class="overlay-content">
                                         <strong title="Posted on"><i class="fa fa-calendar"></i> 15-06-2020</strong> &nbsp;&nbsp;&nbsp;&nbsp;
                                         <strong title="Type"><i class="fa fa-file"></i> Contract</strong> &nbsp;&nbsp;&nbsp;&nbsp;
                                         <strong title="Location"><i class="fa fa-map-marker"></i> London</strong>
                                        </div>
                                    </div>
                                    
                                    <div class="down-content">
                                        <h4>Job Title</h4>

                                        <p> Medical / Health Jobs</p>

                                        <p><span><strong><sup>&#8358;</sup>60 000</strong></span></p>

                                        <div class="text-button">
                                            <a href="#">View More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection
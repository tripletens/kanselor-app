@extends('layouts.landing')

@section('content')

<section class="banner" id="top" style="background:linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url({{asset('images/kaneslor_hero_section.jpg')}}); background-position:center;">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="banner-caption">
                    <div class="line-dec"></div>
                    <h2 style="font-weight:bolder;">PICK YOUR DREAM JOB AND KIYIX FINDS IT FOR YOU </h2>
                    <div class="row" style="width:50%;">
                        <div class="col-md-6">
                            <div class="blue-button">
                                <a href="{{route('employer.register')}}" style="height:auto;font-size:16px; font-weight:bolder;text-align:center;width:auto;">Register as an Employer</a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="blue-button">
                                <a href="{{route('register')}}" style="height:auto;font-size:16px; font-weight:bolder;text-align:center;width:auto;">Register as an Applicant</a>
                            </div>
                        </div>
                        <!-- <div class="col-md-6">
                            <div class="blue-button">
                                <a href="{{route('register')}}" style="height:70px;font-size:16px; font-weight:bolder;text-align:center;">Register as an Applicant</a>
                            </div>
                        </div> -->
                        <!-- <div class="blue-button">
                                <a href="{{route('contact-page')}}">Register as an Employer</a>
                            </div> -->
                        <!-- <div class="blue-button">
                                <a href="{{route('contact-page')}}">Register as an Applicant </a>
                            </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<main>
    @include('const.landing-ourservices')

    <section class="featured-places">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <span>Why Choose us</span>
                        <h2> We Provide Jobs to over 10 million Nigerians</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="featured-item">
                        <div class="down-content" style="height:auto;">

                            <h2 class="text-center my-4 mx-5">KIYIX FOR EMPLOYERS </h2>

                            <p class="text-center">As an employer, we provide you with immediate access to top-quality candidates</p>
                            
                            <div class="row my-5 mx-5">
                                <div class="col-6">
                                    <ul>
                                        <li style="font-size: larger;"> <span style="font-weight:bolder;">STEP ONE</span> <p>- Visit the Kiyix website</p> </li>
                                        <li style="font-size: larger;"> <span style="font-weight:bolder;"> STEP TWO</span> <p> - Fill out your business information <p></li>
                                        <li style="font-size: larger;"> <span style="font-weight:bolder;">STEP THREE</span> <p> - List the Vacancies you want to fill </p> </li>
                                        <li style="font-size: larger;"> <span style="font-weight:bolder;">STEP FOUR</span> <p> - Make the commitment </p> </li>
                                        <br/>
                                    </ul>
                                </div>
                                <div class="col-6">
                                    <ul class="justify-content-center">
                                        <li style="font-size: larger;"> <span style="font-weight:bolder;">STEP FIVE</span>  <p>- Get list of PRE-QUALIFIED candidates </p></li>
                                        <li style="font-size: larger;"> <span style="font-weight:bolder;">STEP SIX</span>  <p> - Pick a date to meet the Candidates</p></li>
                                        <li style="font-size: larger;"> <span style="font-weight:bolder;">STEP SEVEN</span> <p>- Interview the candidates </p></li>
                                        <li style="font-size: larger;"> <span style="font-weight:bolder;">STEP EIGHT</span> <p> - Close the opening </p> </li>
                                    </ul>
                                </div>
                            </div>  
                            <div class="blue-button" style="margin-bottom:10px;display:flex; flex-direction:row; align:center;justify-content:center;">
                                <a href="{{route('employer.register')}}">Get Started</a>
                            </div>
                            <br />
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="featured-item">

                        <div class="down-content" style="height:auto;">
                            <h2 class="text-center my-4 mx-2">KIYIX FOR NIGERIAN JOB SEEKERS</h2>

                            <p class="text-center">We make it easier to get jobs that suits you</p>
                            
                            <div class="row  mx-1">
                                <div class="col-6">
                                    <ul>
                                        <li style="font-size: larger;"> <span style="font-weight:bolder;">STEP ONE</span> <p>- Visit the Kiyix website</p> </li>
                                        <li style="font-size: larger;"> <span style="font-weight:bolder;"> STEP TWO</span> <p> - Fill in the CV template on the app <p></li>
                                        <li style="font-size: larger;"> <span style="font-weight:bolder;">STEP THREE</span> <p> - Choose from a list of jobs that come up </p> </li>
                                        <li style="font-size: larger;"> <span style="font-weight:bolder;">STEP FOUR</span> <p> - Take a mock interview </p> </li>
                                        <li style="font-size: larger;"> <span style="font-weight:bolder;">STEP FIVE</span>  <p>- Get a performance score and areas of improvement </p></li>
                                    </ul>
                                </div>
                                <div class="col-6">
                                    <ul class="justify-content-center">
                                        <li style="font-size: larger;"> <span style="font-weight:bolder;">STEP SIX</span>  <p> - Take free courses to improve performance</p></li>
                                        <li style="font-size: larger;"> <span style="font-weight:bolder;">STEP SEVEN</span> <p>- Attend a virtual interview for a Job </p></li>
                                        <li style="font-size: larger;"> <span style="font-weight:bolder;">STEP EIGHT</span> <p> - Attend a real interview with an employer </p> </li>
                                        <li style="font-size: larger;"> <span style="font-weight:bolder;">STEP NINE</span> <p> - Start the job</p> </li>
                                    </ul>
                                </div>
                            </div> 
                            <div class="blue-button mt-1" style="margin-bottom:10px; margin-top:-50px;display:flex; flex-direction:row; align:center;justify-content:center;">
                                <a href="{{route('register')}}">Get Started</a>
                            </div>
                            <br />
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="featured-item">
                        <div class="down-content p-5" style="height:auto;">

                            <h2 class="text-center my-3 mx-5 mb-3">THE KIYIX BUSINESS MASTERCLASS </h2>

                            <p class="text-center">This is a weekly Business and Work improvement classes designed to 10X the current results and income you are generating.

                            </p>
                            <p class="text-center">It's a practical hands-on session that equip both the job seeker and business owners with business improvement skills</p>

                            <div class="blue-button" style="margin-bottom:10px;display:flex; flex-direction:row; align:center;justify-content:center;">
                                <a href="{{route('trainings')}}">Get Started</a>
                            </div>
                            <br />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

        <section id="video-container">
            <div class="video-overlay"></div>
            <div class="video-content d-flex justify-content-center flex-row">
                <div class="inner">
                    <iframe width="60%" height="60%" src="https://www.youtube.com/embed/G8W5hAdSMkc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    
                </div>
            </div>
        </section>


    <section class="featured-places">
        <div class="container-fluid">
            <div class="row mt-5 mb-0">
                <div class="col-md-4 col-sm-12 col-xs-12 d-flex justify-content-center">
                    <div class="featured-item counter-div mx-auto  ">
                        <h2 class="text-center">No of Companies</h2>
                        <p class="text-center counter-no"> 60</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12 d-flex justify-content-center">
                    <div class="featured-item mx-auto ">
                        <h2 class="text-center">Number of Jobseekers</h2>
                        <p class="text-center  counter-no"> 2300 </p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12 d-flex justify-content-center">
                    <div class="featured-item mx-auto  ">
                        <h2 class="text-center">Number of Jobs Secured</h2>
                        <p class="text-center counter-no">1000</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('const.landing-testimonials')
    @include('const.landing-map')
</main>
@endsection
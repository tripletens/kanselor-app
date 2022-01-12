
@extends('layouts.landing')

@section('content')
    <section class="banner banner-secondary" id="top" style="background-image: url(img/banner-image-1-1920x300.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="banner-caption">
                        <div class="line-dec"></div>
                        <h2>About Us</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <main>
        <section class="our-services">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <div class="left-content">
                            <br>
                            <h4>WELCOME TO KIYIX VACANCY</h4>
                            <p> where Jobs are created for unemployed graduates and Businesses are made more profitable for Nigerian business owner
                            </p>
                            <p>At KIYIX VACANCY, we work with Business owners to create jobs for unemployed graduates and we prepare unemployed Nigerian graduates to make businesses more profitable when business owners employ them</p>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <img src="img/about-1-720x480.jpg" class="img-fluid" alt="">
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
    </main>

    

@endsection
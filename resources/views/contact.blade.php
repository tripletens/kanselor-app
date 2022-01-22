@extends('layouts.landing')

@section('content')
<section class="banner banner-secondary" id="top" style="background-image: url(img/banner-image-3-1920x300.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="banner-caption">
                    <div class="line-dec"></div>
                    <h2>Contact Us</h2>
                </div>
            </div>
        </div>
    </div>
</section>

<main>
    <section class="popular-places">
        <div class="container">
            <div class="contact-content">
                <div class="row">
                    <div class="col-md-8">
                        <div class="left-content">
                            <form method="POST" action="{{route('send-contact-mail')}}">
                                @csrf

                                @if (session('error'))
                                    <div class="alert alert-danger " style="font-size: 18px;">{{session('error')}}</div>
                                    <br/><br/>
                                @endif
                                @if (session('success'))
                                    <div class="alert alert-success " style="font-size: 18px;">{{session('success')}}</div>
                                    <br/><br/>
                                @endif
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <fieldset>
                                            <input name="name" type="text" class="form-control" id="name" placeholder="Your name..." required="">
                                            <span class="text-danger">*</span>
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </fieldset>
                                    </div>
                                    <div class="col-md-6">
                                        <fieldset>
                                            <input name="subject" type="text" class="form-control" id="subject" placeholder="Subject..." required="">
                                            <span class="text-danger">*</span>
                                            @error('subject')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </fieldset>
                                    </div>
                                    <div class="col-md-12">
                                        <fieldset>
                                            <input name="email" type="email" class="form-control" id="email" placeholder="Email Address..." required="">
                                            <span class="text-danger">*</span>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </fieldset>
                                    </div>
                                    <div class="col-md-12">
                                        <fieldset>
                                            <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your message..." required=""></textarea>
                                            <span class="text-danger">*</span>
                                            @error('message')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </fieldset>
                                    </div>

                                    <div class="col-md-12">
                                        <fieldset>
                                            <span class="alert alert-info mb-3" style="font-size:28px;"> {{$code}}</span>
                                            <input type="hidden" name="real_code" value="{{$code}}"/>
                                            <input name="code" rows="6" class="form-control mt-5" id="code" placeholder="Please write the text code in blue" required=""></textarea>
                                            @error('code')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </fieldset>
                                    </div>
                                    <div class="col-md-12">
                                        <fieldset>
                                            <div class="blue-button">
                                                <button type="submit" id="form-submit" class="btn btn-lg btn-danger">Send Message</button>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="right-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="content">
                                        <p>Kanselor Vacancy</p>
                                        <ul>
                                            <li><span>Phone:</span><a href="tel:+234 802 362 2171">+234 802 362 2171</a></li>
                                            <li><span>Email:</span><a href="mailto:admin@kaneslor.com">admin@kaneslor.com</a></li>
                                            <li><span>Address:</span><i class="fa fa-map-marker"></i> Kanselor University Campus, Lakeview Estate, Phase two 101015, Lagos</li>
                                        </ul>
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
@extends('layouts.landing')

@section('content')
<section class="banner banner-secondary" id="top" style="background-image: url({{asset('storage/images/')}}/{{$training->image}});">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="banner-caption">
                    <div class="line-dec"></div>
                    <h2>Trainings - {{$training->title}}</h2>
                </div>
            </div>
        </div>
    </div>
</section>

<main>
    <section class="featured-places">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-xs-12">
                    <h1 class="text-center "> Apply for this Training </h1><br/><br/>
                    <form action="{{route('apply-training')}}" method="POST">
                        @csrf
                        @if (session('success'))
                            <span class="alert alert-success" style="font-size:22px;">{{session('success')}}</span><br/><br/>
                        @endif

                        @if (session('error'))
                            <span class="alert alert-danger" style="font-size:22px;">{{session('error')}}</span><br/><br/>
                        @endif

                        <input type="hidden" name="training_id" value="{{$training->id}}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fullname" style="font-size:22px;"> Fullname: </label>
                                    <input type="text" class="form-control" style="font-size:18px;" name="fullname" placeholder="Enter  your full name i.e firstname lastname" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email" style="font-size:22px;"> Email Address: </label>
                                    <input type="email" class="form-control" style="font-size:18px;" name="email" placeholder="Enter  your email address" required />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone" style="font-size:22px;"> Phone Number: </label>
                                    <input type="number" min="0" class="form-control" style="font-size:18px;" name="phone" placeholder="Enter  your phone number" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address" style="font-size:22px;"> Home Address: </label>
                                   <textarea name="address" style="font-size:18px;" placeholder="Enter your home address" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-block btn-danger d-flex flex-row justify-content-center pull-right" style="font-size:22px;" type="submit"> Submit Application</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
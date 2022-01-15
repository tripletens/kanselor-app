@extends('layouts.landing')

@section('content')
    <section class="banner banner-secondary" id="top" style="background-image: url(img/banner-image-1-1920x300.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="banner-caption">
                        <div class="line-dec"></div>
                        <h2>Trainings</h2>
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
                        <div class="row">
                            @if (count($trainings) > 0)
                                @foreach ($trainings as $training)
                                <div class="col-sm-6 col-xs-12">
                                    <div class="featured-item">
                                        <div class="thumb">
                                            <div class="thumb-img">
                                                <img src="{{asset('storage/images/')}}/{{$training->image}}" alt="Training image" style="height:300px;background:cover;">
                                            </div>
                                        </div>

                                        <div class="down-content">
                                            <h4>{{ucwords($training->title)}}</h4>

                                            <p>{{ucfirst($training->description)}}</p>

                                            <div class="text-button">
                                                <a href="#">Apply</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                @endforeach

                                {{$trainings->links('pagination::bootstrap-4')}}
                            @else
                                <div class="alert alert-info d-flex justify-content-center" > 
                                    <h3 class="text-center" style="font-size: 24px;text-align:center;"> No Trainings Available at the Moment</h3></div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
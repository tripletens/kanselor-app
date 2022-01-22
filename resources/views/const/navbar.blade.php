<div class="wrap">
        <header id="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <button id="primary-nav-button" type="button">Menu</button>
                        <a href="{{route('landing-page')}}"><div class="logo">
                            <img src="{{asset('images/Kiyix_logo.png')}}" style="height:100px;width:auto;" alt="Kaneslor Logo">
                        </div></a>
                        <nav id="primary-nav" class="dropdown cf">
                            <ul class="dropdown menu">
                                <li class='active'><a href="{{route('landing-page')}}">Home</a></li>

                                

                                <li>
                                    <a href="#">About</a>
                                    <ul class="sub-menu">
                                        <li><a href="{{route('about-page')}}">About Us</a></li>
                                        <li><a href="{{route('team-page')}}">Team</a></li>
                                        <li><a href="{{route('blog-page')}}">Blog</a></li>
                                        <li><a href="{{route('testimonials-page')}}">Testimonials</a></li>
                                        <li><a href="{{route('terms-page')}}">Terms</a></li>
                                    </ul>
                                </li>

                                <li><a href="{{route('training-page')}}">Trainings</a></li>

                                <li><a href="{{route('contact-page')}}">Contact Us</a></li>

                                @if (Auth('admin')->check())
                                    <li>
                                        <a href="{{route('admin.home')}}">
                                            <button class="btn btn-lg btn-outline-danger" style="height:50px; width:auto; font-size:medium;background:#F60E0F;color:#fff;"> Go to Dashboard</button>
                                        </a>
                                    </li>
                                @elseif(Auth('employer')->check())
                                    <li>
                                        <a href="{{route('employer.home')}}">
                                            <button class="btn btn-lg btn-outline-danger" style="height:50px; width:auto; font-size:medium;background:#F60E0F;color:#fff;"> Go to Dashboard</button>
                                        </a>
                                    </li>
                                @elseif(Auth('web')->check())
                                    <li>
                                        <a href="{{route('home')}}">
                                            <button class="btn btn-lg btn-outline-danger" style="height:50px; width:auto; font-size:medium;background:#F60E0F;color:#fff;"> Go to Dashboard</button>
                                        </a>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{route('login')}}">
                                            <button class="btn btn-lg btn-outline-danger" style="height:50px; width:100px; font-size:medium;background:#F60E0F;color:#fff;"> Login</button>
                                        </a>
                                    </li>
                                @endif
                                
                            </ul>
                        </nav><!-- / #primary-nav -->
                    </div>
                </div>
            </div>
        </header>
    </div>
      
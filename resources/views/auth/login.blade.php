@extends('layouts.auth')

@section('content')
<div class="container ">
    <!-- Outer Row -->
    <div class="row my-5 justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5 ">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-2"><a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('landing-page')}}">
                                            <img src="{{asset('images/Kiyix_logo.png')}}" style="height:50px;width:auto;padding:0px;" alt="Kiyix Logo">
                                        </a>{{$title}}</h1>
                                </div>

                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <button class="nav-link active text-success" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Job Seeker</button>
                                        <button class="nav-link text-success" id="nav-employer-tab" data-bs-toggle="tab" data-bs-target="#nav-employer" type="button" role="tab" aria-controls="nav-employer" aria-selected="false">Employer</button>
                                        <button class="nav-link text-success" id="nav-admin-tab" data-bs-toggle="tab" data-bs-target="#nav-admin" type="button" role="tab" aria-controls="nav-admin" aria-selected="false">Admin</button>
                                    </div>
                                </nav>
                                <div class="tab-content mt-3" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <form class="user" method="POST" action="{{ route($loginRoute) }}">
                                            @csrf
                                            <div class="form-group">
                                                <input type="email" class="form-control  form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" id="exampleInputPassword" placeholder="Password">
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox small">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                    <label class="custom-control-label" for="customCheck">Remember
                                                        Me</label>
                                                </div>
                                            </div>
                                            <input class="btn btn-success btn-user btn-block" type="submit" value="Login" />
                                            <!-- <a href="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                            </a> -->
                                            <!-- <hr>
                                            <a href="index.html" class="btn btn-google btn-user btn-block">
                                                <i class="fab fa-google fa-fw"></i> Login with Google
                                            </a>
                                            <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                                <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                            </a> -->
                                            <hr />
                                            @if (Route::has('password.request'))
                                            <div class="text-center">
                                                <a class="small" href="{{ route($forgotPasswordRoute) }}">Forgot Password?</a>
                                            </div>
                                            @endif

                                            @if(isset($registerRoute))
                                            <div class="text-center">
                                                <a class="small" href="{{route('register')}}">Create an Account!</a>
                                            </div>
                                            @endif
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="nav-employer" role="tabpanel" aria-labelledby="nav-employer-tab">
                                        <form class="user" method="POST" action="{{ route('employer.login') }}">
                                            @csrf
                                            <div class="form-group">
                                                <input type="email" class="form-control  form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" id="exampleInputPassword" placeholder="Password">
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox small">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                    <label class="custom-control-label" for="customCheck">Remember
                                                        Me</label>
                                                </div>
                                            </div>
                                            <input class="btn btn-success btn-user btn-block" type="submit" value="Login" />
                                            <hr />
                                            <!-- @if (Route::has('password.request'))
                                            <div class="text-center">
                                                <a class="small" href="{{ route('employer.password.request') }}">Forgot Password?</a>
                                            </div>
                                            @endif -->

                                            @if(isset($registerRoute))
                                            <div class="text-center">
                                                <a class="small" href="{{route('employer.register')}}">Create an Account!</a>
                                            </div>
                                            @endif

                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="nav-admin" role="tabpanel" aria-labelledby="nav-admin-tab">
                                        <form class="user" method="POST" action="{{ route('admin.login') }}">
                                            @csrf
                                            <div class="form-group">
                                                <input type="email" class="form-control  form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" id="exampleInputPassword" placeholder="Password">
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox small">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                    <label class="custom-control-label" for="customCheck">Remember
                                                        Me</label>
                                                </div>
                                            </div>
                                            <input class="btn btn-success btn-user btn-block" type="submit" value="Login" />
                                        
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
@endsection
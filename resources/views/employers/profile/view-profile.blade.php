@extends('layouts.dashboard-employer')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">View Profile</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>

    <div class="row">
        <div class="col-md-6 my-3">
            <div class="card d-flex mx-auto justify-content-center">
                <div class="card-body shadow ">
                    <!-- {{ $user }} -->
                    <table class="table table-responsive d-flex justify-content-center">
                        <tr>
                            <td colspan="2" class="">
                                @if($user->image)
                                <img src='{{asset("storage/images/$user->image")}}' class=" d-flex justify-content-center img mx-auto img-responseive img-rounded" style="height:200px;width:250px;" />
                                @else
                                <p class="alert alert-info">Picture Not Available</p>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th> Name : </th>
                            <td> {{ ucwords($user->name) }}</td>
                        </tr>
                        <tr>
                            <th> Email : </th>
                            <td> {{ ucwords($user->email) }}</td>
                        </tr>
                        <tr>
                            <th> Date Registered : </th>
                            <td> {{ $user->created_at ? niceday($user->created_at) : "Not Available" }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6 my-3">
            <div class="card shadow p-3">
                <h3 class="card-title text-center"> Edit Profile</h3>
                <div class="card-body">
                    <form class="form" method="POST" action="{{route('employer.update-profile')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="name">Full Name:</label>
                                <input type="text" value="{{$user->name}}" class="form-control form-control-user @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocusid="exampleFirstName" placeholder="Full Name">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label for="email">Email Address:</label>
                                <input type="email" value="{{$user->email}}" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" id="exampleInputEmail" placeholder="Email Address">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <label for="image">Picture:</label>
                                <input type="file" class="form-control form-control-user @error('email') is-invalid @enderror" name="image" value="{{ old('image') }}" required autocomplete="image" id="exampleInputimage" placeholder="Picture">
                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <!-- profession , home address , state , status, is_complete , gender , image -->
                            </div>
                        </div>
                        <div class="form-group row">
                           
                        </div>
                        <button class="btn bg-gradient-success text-white" type="submit">Save Details</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <h3 class="card-title text-center"> Change Password </h3>
                    
                    <form class="form" method="POST" action="{{route('employer.change_password')}}">
                        @csrf
                        <div class="form-group">
                            <label for="oldpassword"> Old Password: </label>
                            <input type="password" class="form-control" name="old_password" required placeholder="Enter Old Password" />
                            @error('old_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="password"> New Password: </label>
                                <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" id="exampleInputPassword" placeholder="Password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label for="password_confirmation"> Confirm New Password: </label>
                                <input type="password" class="form-control form-control-user" id="password-confirm" name="password_confirmation" required autocomplete="new-password" id="exampleRepeatPassword" placeholder="Repeat Password">
                            </div>
                        </div>
                        <span class="alert alert-info "><i class="fas fa-exclamation-triangle"></i> Please write down your password in a safe place </span>
                        <button class="btn bg-gradient-success text-white my-3"> Change Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection
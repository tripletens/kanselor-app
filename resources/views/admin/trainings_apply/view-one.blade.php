@extends('layouts.dashboard-admin')

@section('content')
<style type="text/css" rel="stylesheet">
    .hover-primary:hover {
        color: #fff;
    }
</style>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">View Training's Details</h1>
        <div class="btn-group" role="group" aria-label="Basic outlined example">
            <a class="btn btn-primary text-white hover-primary" style="text-decoration: none;" href="{{route('admin.fetch_all_trainings')}}">View all trainings</a>

            <a class="btn btn-secondary text-white" data-toggle="modal" data-target="#edittrainingModal" style="text-decoration: none;">Edit</a>
            
            @if($training->status == '0')
            <a class="btn btn-success text-white" data-toggle="modal" data-target="#ApprovecategryModal" style="text-decoration: none;">Activate </a>
            @else
            <a class="btn btn-danger text-white" data-toggle="modal" data-target="#rejectapplicationModal" style="text-decoration: none;">Deactivate </a>
            @endif

           
        </div>


        <div class="modal fade" id="ApprovecategryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Activate training - {{$training->name}} </h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-info">Are you Sure you want to Activate this training - {{$training->name}}? </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <form method="POST" action="{{route('admin.activate_training')}}">
                            @csrf
                            <input type="hidden" name="training_id" value="{{$training->id}}">
                            <button class="btn bg-success text-white" type="submit">Yes! Activate</button>
                        </form>
                    </div>
                    <!-- </form> -->
                </div>
            </div>
        </div>


        <div class="modal fade" id="rejectapplicationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Deactivate training - {{$training->name}} </h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-warning">Are you Sure you want to Deactivate this training - {{$training->name}}? </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <form method="POST" action="{{route('admin.deactivate_training')}}">
                            @csrf
                            <input type="hidden" name="training_id" value="{{$training->id}}">
                            <button class="btn bg-success text-white" type="submit">Yes! Deactivate</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="edittrainingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Training</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{route('admin.edit_training')}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="training_id" value="{{$training->id}}"/>
                            <div class="form-group">
                                <label for="Title"> Title: <span class="text-danger">*</span></label>
                                <input type="text" required class="form-control" name="title" value="{{$training->title}}" placeholder="Enter Training Title" />
                            </div>
                            <div class="form-group">
                                <label for="Description"> Description: </label>
                                <textarea type="text" class="form-control" name="description" placeholder="Enter Training Description">{{$training->description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="Image"> Image: <span class="text-danger">*</span></label>
                                <input type="file" required class="form-control" name="image" placeholder="Enter Training Image" />
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success"> Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>

    <div class="row">
        <div class="col-md-6 col-xs-12 col-lg-6">
            <div class="card p-1">
                <!-- <h4 class="card-title p-4 mb-0 pb-0 text-center">Full training Details</h4> -->
                <div class="card-body">
                    <!-- <img class="img img-responsive"  src=""/> -->
                    <img class="img-profile rounded d-flex justify-self-center mx-auto mt-0" style="height:200px; width:auto;" alt="Applicant Image" src="{{asset('storage/images/')}}/{{$training->image}}">
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xs-12 col-lg-6">
            <div class="card ">
                <!-- <h4 class="card-title p-4 mb-0 pb-0 text-center">View Job Application Details</h4> -->
                <div class="card-body">
                    <table class="table table-responsive table-striped d-flex justify-content-center mx-auto">
                        <!-- `name`, `phone`, `email`, `is_admin`, `is_staff`, `email_verified_at`, `password`, `remember_token`, 
                    `created_at`, `updated_at`, `profession`, `home_address`, `state`, `gender`, `status`, `is_complete`, `image`  -->
                        <tr>
                            <th>Title: </th>
                            <td>{{ucfirst($training->title)}}</td>
                        </tr>
                        <tr>
                            <th>Description: </th>
                            <td>{{ucfirst($training->description)}}</td>
                        </tr>

                        <tr>
                            <th>Status: </th>
                            <th>@if($training->status == 1) <span class="badge badge-success"> Active </span> @elseif($training->status == 0) <span class="badge badge-danger"> Inactive </span> @endif</td>
                        </tr>

                        <tr>
                            <th>Account Created on: </th>
                            <td>{{$training->created_at ? niceday($training->created_at) : N/A}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <br /><br />
    <hr>
</div>
<!-- /.container-fluid -->
@push('head')

@endpush
@endsection
@extends('layouts.dashboard-admin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">View All Trainings</h1>
        <button class="btn btn-primary" data-toggle="modal" data-target="#trainingModal"><i
                class="fas fa-plus fa-sm text-white-50"></i> Create Training</button>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>
    <div class="row">
        <div class="col-md-12 col-xs-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    
                    <!-- <div class="btn-group float-right"> -->
                        
                            <!-- training Modal-->
                        <div class="modal fade" id="trainingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Create a Training</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{route('admin.create_training')}}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="Title"> Title: <span class="text-danger">*</span></label>
                                                <input type="text" required class="form-control" name="title" placeholder="Enter Training Title"/>
                                            </div>
                                            <div class="form-group">
                                                <label for="Description"> Description: </label>
                                                <textarea type="text" class="form-control" name="description" placeholder="Enter Training Description"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="Image"> Image: <span class="text-danger">*</span></label>
                                                <input type="file" required class="form-control" name="image" placeholder="Enter Training Image"/>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-success"> Create</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- </div> -->
                    @if(count($trainings) > 0)
                    <!-- `title`, `description`, `image`, `status`, `created_at`, `updated_at` -->
                    <table id="view_jobs_training" class="table table-responsive table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Description</th>
                                <!-- <th>Image</th> -->
                                <th>Status</th>
                                <th>Date Created</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($trainings as $key => $training)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td> {{ ucwords($training->title)}}</td>
                                <td> {{$training->description ? $training->description : N/A }}</td>
                                <!-- <td>  @if($training->image) {{$training->image}}  @else N/A @endif </td> -->
                                <td> @if($training->status == 1)
                                    <span class="badge badge-success">Active</span>
                                    @else
                                    <span class="badge badge-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>{{niceday( $training->created_at)}}</td>
                                <th>
                                    <div class="btn-group" role="group" aria-label="Basic outlined example">
                                        <a href="{{route('admin.fetch_one_training',$training->id)}}" title="View training Details">
                                            <button type="button" class="btn btn-danger">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                                </svg>
                                            </button>
                                        </a>
                                    </div>
                                </th>
                            </tr>
                            @endforeach


                        </tbody>
                    </table>
                    @else
                    <div class="col-md-12 col-xs-12 col-lg-12">
                        <div class="d-flex  justify-content-center">
                            <span class="text-center alert alert-info m-3"> Sorry no Trainings Available</span>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

@endsection
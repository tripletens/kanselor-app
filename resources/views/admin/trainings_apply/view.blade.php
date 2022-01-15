@extends('layouts.dashboard-admin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">View All Training Applications</h1>
        
    </div>
    <div class="row">
        <div class="col-md-12 col-xs-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    @if(count($training_applications) > 0)
                    <table id="view_jobs_training" class="table table-responsive table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Training</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Date Created</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($training_applications as $key => $training)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td> {{ ucwords($training->title)}}</td>
                                <td> {{$training->fullname ? $training->fullname : N/A }}</td>
                                <td>  @if($training->email) {{$training->email}}  @else N/A @endif </td>
                                <td> {{$training->phone ? $training->phone : N/A }}</td>
                                <td> {{$training->address ? $training->address : N/A }}</td>
                                <td> @if($training->status == 1)
                                    <span class="badge badge-success">Active</span>
                                    @else
                                    <span class="badge badge-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>{{niceday( $training->created_at)}}</td>
                            </tr>
                            @endforeach


                        </tbody>
                    </table>
                    @else
                    <div class="col-md-12 col-xs-12 col-lg-12">
                        <div class="d-flex  justify-content-center">
                            <span class="text-center alert alert-info m-3"> Sorry no Training Applications Available</span>
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
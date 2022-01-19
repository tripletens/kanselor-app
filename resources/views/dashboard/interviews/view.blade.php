@extends('layouts.dashboard')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">View All Job Interviews</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>

    <div class="row">
            @if(count($interviews) > 0)
                @foreach($interviews as $interview)
                <div class="col-md-6 col-xs-12 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <!-- `title`, `application_code`, `type`, `link`, `address`, `time`, `date`, `status`, -->
                            <table class="table table-striped p-5">
                                <tr class="p-5">
                                    <th><p> Title </p></th>
                                    <td><p>{{$interview->title}}</p></td>
                                </tr>
                                <tr class="p-5">
                                    <th><p>Application Code</p></th>
                                    <td><p class="alert alert-danger">{{ucwords($interview->application_code)}}</p></td>
                                </tr>
                                <tr class="p-5">
                                    <th><p> Interview Type </p></th>
                                    <td><p> @if($interview->type == "virtual") {{ucword($interview->type)}} @else 'In-Person' @endif</p></td>
                                </tr>
                                <tr class="p-5">
                                    <th><p>Meeting Details</p></th>
                                    <td>
                                        @if($interview->type == "virtual")
                                            <a href="{{$interview->link}}">Open meeting link here {{$interview->link}}</a>
                                        @else
                                            <div class="alert alert-info">{{ucwords($interview->address)}}</div>
                                        @endif
                                    </td>
                                </tr>
                                <tr class="p-5">
                                    <th><p>Time: </p></th>
                                    <td><p class="alert alert-danger">{{$interview->time}}</p></td>
                                </tr>
                                <tr class="p-5">
                                    <th><p>Date: </p></th>
                                    <td><p class="alert alert-danger">{{niceday($interview->date)}}</p></td>
                                </tr>
                                <tr class="p-5">
                                    <th><p>Status: </p></th>
                                    <td> 
                                        @if($interview->status == '1')
                                            <div class="alert alert-success">Active</div>
                                        @else
                                            <div class="alert alert-danger">Expired</div>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
            <div class="col-md-12 col-xs-12 col-lg-12">
                <div class="d-flex card justify-content-center">
                    <span class="text-center alert alert-info m-5"> Sorry No Interviews Available </span>
                </div>
            </div>
            @endif
    </div>
</div>
<!-- /.container-fluid -->
@endsection
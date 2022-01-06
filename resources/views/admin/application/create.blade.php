@extends('layouts.dashboard-admin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">View Jobs Application Details</h1>
        <a class="btn btn-outline-danger text-red" style="text-decoration: none;" href="{{route('view-applications')}}">View all Applications</a>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>

     <!-- +"user_id": 1 -->
                        <!-- +"code": "KAN-kMSwf228"
                    +"name": "test"
                    +"email": "tripletens.kc@gmail.com"
                    +"position": "teacher"
                    +"category": "16"
                    +"dob": "2021-12-08"
                    +"phone": "09038883483483"
                    +"altphone": "0949394394093"
                    +"nokphone": "094909043904903904"
                    +"gender": "male"
                    +"marital_status": "single"
                    +"social_media": "linkedin"
                    +"salary": "900000"
                    +"address": "esiri crescent"
                    +"history": "aladdin"
                    +"qualification": "bsc csc"
                    +"certification": "ican"
                    +"qualified": null
                    +"referees": "Mr Okafor"
                    +"status": 2
                    +"created_at": "2021-12-07 20:59:52"
                    +"updated_at": "2021-12-07 20:59:52"
                    +"category_name": "PHARMACISTS" -->
    <div class="row">
        <div class="col-md-6 col-xs-12 col-lg-6">
            <div class="card ">
                <h4 class="card-title p-4 mb-0 pb-0 text-center">Full Application Details</h4>
                <div class="card-body">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

@endsection
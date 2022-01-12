@extends('layouts.dashboard-admin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">View All Employers Vacancies</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>
    <div class="row">
        @if (count($employer_vacancies) > 0)
        @foreach ($employer_vacancies as $employer_vacancy)
        <!-- `title`, `description`, `experience`, `qualification`, `status`, 
            `from_age`, `to_age`, `is_admin`, `is_employer`, `uploader_id`, 
            `employer_id`, `tribe`, `created_at`, `updated_at` -->
        <div class="col-md-6 col-xs-12 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <table class="table table-responsive table-striped">
                        <tr>
                            <th>Vacancy ID: </th>
                            <td><span class="badge badge-info">{{ucwords($employer_vacancy->code)}}</span></td>
                        </tr>
                        <tr>
                            <th>Title: </th>
                            <td>{{ucwords($employer_vacancy->title)}}</td>
                        </tr>
                        <tr>
                            <th>Description: </th>
                            <td>{{ucwords($employer_vacancy->description)}}</td>
                        </tr>
                        <tr>
                            <th>No of Years of Experience : </th>
                            <td>{{intval($employer_vacancy->experience)}} year(s)</td>
                        </tr>
                        <tr>
                            <th>Minimum Qualification: </th>
                            <td>{{ucwords($employer_vacancy->qualification)}}</td>
                        </tr>
                        <tr>
                            <th>Age Limit: </th>
                            <td>
                                @if ($employer_vacancy->from_age  == $employer_vacancy->to_age)
                                    Minimum of <span class="badge badge-info">{{$employer_vacancy->from_age}}</span> years old 
                                @else
                                    <span class="badge badge-info">{{intval($employer_vacancy->from_age)}}</span> - 

                                    <span class="badge badge-info">{{intval($employer_vacancy->to_age)}}</span> years 
                                @endif
                            </td>
                        </tr>
                        @if ($employer_vacancy->is_admin == 0)
                            <tr >
                                <td colspan="2" aria-colspan="2" class="text-center">
                                    <span class="badge badge-success">Uploaded By Admin</span>
                                </td>
                            </tr>
                        @endif
                       
                    </table>
                </div>
            </div>
        </div>
        @endforeach
        <div class="d-flex justify-content-center">{{ $employer_vacancies->links() }}</div>
        @else
        <div class="d-flex justify-content-center">
            <span class="alert alert-info"> No Admin Vacancies Available</span>
        </div>
        @endif
    </div>
</div>
<!-- /.container-fluid -->

@endsection
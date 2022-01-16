@extends('layouts.dashboard-admin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">View All Admin Vacancies</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>
    <div class="row">
        @if (count($admin_vacancies) > 0)
        @foreach ($admin_vacancies as $admin_vacancy)
        <!-- `title`, `description`, `experience`, `qualification`, `status`, 
            `from_age`, `to_age`, `is_admin`, `is_employer`, `uploader_id`, 
            `employer_id`, `tribe`, `created_at`, `updated_at` -->
        <div class="col-md-6 col-xs-12 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <table class="table table-responsive table-striped">
                        <tr>
                            <th>Vacancy ID: </th>
                            <td><span class="badge badge-info">{{ucwords($admin_vacancy->code)}}</span></td>
                        </tr>
                        <tr>
                            <th>Title: </th>
                            <td>{{ucwords($admin_vacancy->title)}}</td>
                        </tr>
                        <tr>
                            <th>Description: </th>
                            <td>{{ucwords($admin_vacancy->description)}}</td>
                        </tr>
                        <tr>
                            <th>No of Years of Experience : </th>
                            <td>{{intval($admin_vacancy->experience)}} year(s)</td>
                        </tr>
                        <tr>
                            <th>Minimum Qualification: </th>
                            <td>{{ucwords($admin_vacancy->qualification)}}</td>
                        </tr>
                        <tr>
                            <th>Age Limit: </th>
                            <td>
                                @if ($admin_vacancy->from_age  == $admin_vacancy->to_age)
                                    Minimum of <span class="badge badge-info">{{$admin_vacancy->from_age}}</span> years old 
                                @else
                                    <span class="badge badge-info">{{intval($admin_vacancy->from_age)}}</span> - 

                                    <span class="badge badge-info">{{intval($admin_vacancy->to_age)}}</span> years 
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" aria-colspan="2">
                                <div class="text-center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{$admin_vacancy->id}}">
                                            Edit
                                        </button>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{$admin_vacancy->id}}">
                                            Delete
                                        </button>
                                    </div>
                                </div>
                                

                                <!-- Modal -->
                                <div class="modal fade" id="editModal{{$admin_vacancy->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModal{{$admin_vacancy->id}}">Edit {{$admin_vacancy->title}}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            ...
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                       
                        @if ($admin_vacancy->is_admin == 1)
                            <tr >
                                <!-- <th> </th> -->
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
        <div class="d-flex justify-content-center">{{ $admin_vacancies->links() }}</div>
        @else
        <div class="d-flex justify-content-center">
            <span class="alert alert-info"> No Admin Vacancies Available</span>
        </div>
        @endif
    </div>
</div>
<!-- /.container-fluid -->

@endsection
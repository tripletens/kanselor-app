@extends('layouts.dashboard-admin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">View All Employer's Vacancies</h1>
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
                <div class="card-body ">
                    <table class=" pt-3 table table-responsive table-striped d-flex justify-content-center">
                        <tr>
                            <th>Vacancy ID: </th>
                            <td><span class="badge badge-info">{{ucwords($employer_vacancy->code)}}</span></td>
                        </tr>
                        <tr>
                            <th>Category Name: </th>
                            <td>
                                <span class="badge badge-info">{{ucwords($employer_vacancy->category_name)}} </span>
                            </td>
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
                                @if ($employer_vacancy->from_age == $employer_vacancy->to_age)
                                Minimum of <span class="badge badge-info">{{$employer_vacancy->from_age}}</span> years old
                                @else
                                <span class="badge badge-info">{{intval($employer_vacancy->from_age)}}</span> -

                                <span class="badge badge-info">{{intval($employer_vacancy->to_age)}}</span> years
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Status: </th>
                            <td>@if ($employer_vacancy->status == 1)
                                <span class="badge badge-success"> Approved </span>
                            @else
                                <span class="badge badge-info"> Not Approved </span>
                            @endif</td>
                        </tr>
                        <tr>
                            <!-- <th> </th> -->
                            <td colspan="2" aria-colspan="2" class="text-center">
                                <span class="badge badge-success">Uploaded By {{$employer_vacancy->name}}</span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" aria-colspan="2">
                                <div class="text-center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#approveModal{{$employer_vacancy->id}}">
                                            Approve
                                        </button>
                                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#rejectModal{{$employer_vacancy->id}}">
                                            Reject
                                        </button>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{$employer_vacancy->id}}">
                                            Edit
                                        </button>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{$employer_vacancy->id}}">
                                            Delete
                                        </button>
                                    </div>
                                </div>


                                <div class="modal fade" id="editModal{{$employer_vacancy->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">{{ucwords($employer_vacancy->title)}} <span class="badge badge-success"> {{$employer_vacancy->code}}</span></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="{{route('admin.edit_vacancy')}}">
                                                    @csrf
                                                    <input type="hidden" name="vacancy_id" value="{{$employer_vacancy->id}}" />
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label for="title"> Title: <span class="text-danger"> *</span></label>
                                                                <input type="text" name="title" value="{{ucwords($employer_vacancy->title)}}" required class="form-control @error('title') is-invalid @enderror" placeholder="Enter Vacancy Title i.e Driver Needed" />
                                                                @error('title')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="description"> Description: <span class="text-danger"> *</span></label>
                                                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Give us more details about the position">{{ucfirst($employer_vacancy->description) }}</textarea>
                                                                @error('description')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label for="experience"> Minimum Number of years of Experience: <span class="text-danger"> *</span></label>
                                                                <input type="number" min="0" name="experience" required class="form-control @error('experience') is-invalid @enderror" value="{{$employer_vacancy->experience}}" placeholder="What's the minimum number of years of experience" />
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="qualification">Qualification: <span class="text-danger"> *</span></label>
                                                                <select name="qualification" class="form-control @error('experience') is-invalid @enderror" required value="{{$employer_vacancy->qualification}}">
                                                                    <option name="qualification[]" value="">-- Select your lowest qualification -- </option>
                                                                    <option name="qualification[]" value="olevels">O'Levels (WAEC,NECO,etc) </option>
                                                                    <!-- <option name="qualification[]" value="neco">NECO </option> -->
                                                                    <option name="qualification[]" value="ond">National Diploma (OND) </option>
                                                                    <option name="qualification[]" value="bsc">Bachelors Degree (BSc) </option>
                                                                    <option name="qualification[]" value="msc">Masters Degree (MSc) </option>
                                                                    <option name="qualification[]" value="doc">Doctorate Degree (PHD) </option>
                                                                </select>
                                                                @error('qualification')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label for="from_age"> Minimum Age Limit: <span class="text-danger"> *</span> </label>
                                                                <input type="number" placeholder="Enter minimum age limit" class="form-control @error('from_age') is-invalid @enderror" value="{{$employer_vacancy->from_age}}" min="18" name="from_age">
                                                                @error('from_age')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="to_age"> Maximum Age limit: <span class="text-danger"> *</span></label>
                                                                <input type="number" placeholder="Enter maximum age limit" class="form-control @error('to_age') is-invalid @enderror" value="{{$employer_vacancy->to_age}}" min="18" name="to_age">
                                                                @error('to_age')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label for="tribe">Tribe: <span class="text-danger"> *</span></label>
                                                                <select name="tribe" class="form-control @error('tribe') is-invalid @enderror">
                                                                    <option name="tribe[]" value=""> -- Select a tribe -- </option>
                                                                    <option name="tribe[]" value="igbo"> Igbo </option>
                                                                    <option name="tribe[]" value="yoruba"> Yoruba </option>
                                                                    <option name="tribe[]" value="hausa"> Hausa </option>
                                                                    <option name="tribe[]" value="other"> Others </option>
                                                                    <option name="tribe[]" value="any"> Any Tribe </option>
                                                                </select>
                                                                @error('tribe')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="category_id">Select Category <span class="text-danger">*</span></label>
                                                                <select name="category_id" required class="form-control">
                                                                    <option name="category_id[]" value="">-- Select a Category --</option>
                                                                    @if(count($categories) > 0 )
                                                                        @foreach ($categories as $category)
                                                                        <option name="category_id[]" value="{{$category->id}}"> {{ $category->name}}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>
                                                        </div>

                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <div class="form-group">
                                                    <div class="d-flex flex-end flex-row">
                                                        <button type="submit" class="btn btn-block btn-danger pull-right">Save</button>
                                                    </div>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="deleteModal{{$employer_vacancy->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">{{ucwords($employer_vacancy->title)}} <span class="badge badge-success"> {{$employer_vacancy->code}}</span></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="d-flex justify-content-center alert alert-warning">
                                                    <p>Are you sure you want to delete this Vacancy?</p>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <form method="POST" action="{{route('admin.delete_vacancy')}}">
                                                    @csrf
                                                    <input type="hidden" name="vacancy_id" value="{{$employer_vacancy->id}}">
                                                    <button type="submit" class="btn btn-danger">Yes! Delete Vacancy</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="approveModal{{$employer_vacancy->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">{{ucwords($employer_vacancy->title)}} <span class="badge badge-success"> {{$employer_vacancy->code}}</span></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="d-flex justify-content-center alert alert-info">
                                                    <p>Are you sure you want to Approve this Vacancy?</p>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <form method="POST" action="{{route('admin.approve_vacancy')}}">
                                                    @csrf
                                                    <input type="hidden" name="vacancy_id" value="{{$employer_vacancy->id}}">
                                                    <button type="submit" class="btn btn-danger">Yes! Approve Vacancy</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="rejectModal{{$employer_vacancy->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">{{ucwords($employer_vacancy->title)}} <span class="badge badge-success"> {{$employer_vacancy->code}}</span></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="d-flex justify-content-center alert alert-info">
                                                    <p>Are you sure you want to Reject this Vacancy?</p>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <form method="POST" action="{{route('admin.reject_vacancy')}}">
                                                    @csrf
                                                    <input type="hidden" name="vacancy_id" value="{{$employer_vacancy->id}}">
                                                    <button type="submit" class="btn btn-danger">Yes! Reject Vacancy</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        @if ($employer_vacancy->is_admin == 1)
                        <tr>
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
        <div class="d-flex justify-content-center">{{ $employer_vacancies->links() }}</div>
        @else
        <div class="d-flex justify-content-center">
            <span class="alert alert-info"> No Employer's Vacancies Available</span>
        </div>
        @endif
    </div>
</div>
<!-- /.container-fluid -->

@endsection
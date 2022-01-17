@extends('layouts.dashboard-employer')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">View My Vacancies</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>
    <div class="row">
        @if (count($my_vacancies) > 0)
        @foreach ($my_vacancies as $my_vacancy)
        <!-- `title`, `description`, `experience`, `qualification`, `status`, 
            `from_age`, `to_age`, `is_admin`, `is_employer`, `uploader_id`, 
            `employer_id`, `tribe`, `created_at`, `updated_at` -->
        <div class="col-md-6 col-xs-12 col-lg-6">
            <div class="card ">
                <div class="card-body ">
                    <table class="table table-responsive table-striped d-flex justify-content-center pt-3">
                        <tr>
                            <th>Vacancy ID: </th>
                            <td><span class="badge badge-info">{{ucwords($my_vacancy->code)}}</span></td>
                        </tr>
                        <tr>
                            <th>Title: </th>
                            <td>{{ucwords($my_vacancy->title)}}</td>
                        </tr>
                        <tr>
                            <th>Description: </th>
                            <td>{{ucwords($my_vacancy->description)}}</td>
                        </tr>
                        <tr>
                            <th>No of Years of Experience : </th>
                            <td>{{intval($my_vacancy->experience)}} year(s)</td>
                        </tr>
                        <tr>
                            <th>Minimum Qualification: </th>
                            <td>{{ucwords($my_vacancy->qualification)}}</td>
                        </tr>
                        <tr>
                            <th>Age Limit: </th>
                            <td>
                                @if ($my_vacancy->from_age == $my_vacancy->to_age)
                                Minimum of <span class="badge badge-info">{{$my_vacancy->from_age}}</span> years old
                                @else
                                <span class="badge badge-info">{{intval($my_vacancy->from_age)}}</span> -

                                <span class="badge badge-info">{{intval($my_vacancy->to_age)}}</span> years
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" aria-colspan="2">
                                <div class="text-center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{$my_vacancy->id}}">
                                            Edit
                                        </button>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{$my_vacancy->id}}">
                                            Delete
                                        </button>
                                    </div>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="editModal{{$my_vacancy->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">{{ucwords($my_vacancy->title)}} <span class="badge badge-success"> {{$my_vacancy->code}}</span></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="{{route('employer.edit_vacancy')}}">
                                                    @csrf
                                                    <input type="hidden" name="vacancy_id" value="{{$my_vacancy->id}}"/>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label for="title"> Title: <span class="text-danger"> *</span></label>
                                                                <input type="text" name="title" value="{{ucwords($my_vacancy->title)}}" required class="form-control @error('title') is-invalid @enderror" placeholder="Enter Vacancy Title i.e Driver Needed" />
                                                                @error('title')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="description"> Description: <span class="text-danger"> *</span></label>
                                                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Give us more details about the position">{{ucfirst($my_vacancy->description) }}</textarea>
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
                                                                <input type="number" min="0" name="experience" required class="form-control @error('experience') is-invalid @enderror" value="{{$my_vacancy->experience}}" placeholder="What's the minimum number of years of experience" />
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="qualification">Qualification: <span class="text-danger"> *</span></label>
                                                                <select name="qualification" class="form-control @error('experience') is-invalid @enderror" required value="{{$my_vacancy->qualification}}">
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
                                                                <input type="number" placeholder="Enter minimum age limit" class="form-control @error('from_age') is-invalid @enderror" value="{{$my_vacancy->from_age}}" min="18" name="from_age">
                                                                @error('from_age')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="to_age"> Maximum Age limit: <span class="text-danger"> *</span></label>
                                                                <input type="number" placeholder="Enter maximum age limit" class="form-control @error('to_age') is-invalid @enderror" value="{{$my_vacancy->to_age}}" min="18" name="to_age">
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
                                                                    <option name="tribe[]" value="igbo" > Igbo </option>
                                                                    <option name="tribe[]" value="yoruba" > Yoruba </option>
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

                                <div class="modal fade" id="deleteModal{{$my_vacancy->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">{{ucwords($my_vacancy->title)}} <span class="badge badge-success"> {{$my_vacancy->code}}</span></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="d-flex justify-content-center alert alert-warning">
                                                    <p>Are you sure you want to delete this Vacancy?</p>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <form method="POST" action="{{route('employer.delete_vacancy')}}">
                                                    @csrf
                                                    <input type="hidden" name="vacancy_id" value="{{$my_vacancy->id}}">
                                                    <button type="submit" class="btn btn-danger">Yes! Delete Vacancy</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        @endforeach
        <div class="d-flex justify-content-center">{{ $my_vacancies->links() }}</div>
        @else
        <div class="d-flex justify-content-center">
            <span class="alert alert-info"> You don't have any Vacancy Available</span>
        </div>
        @endif
    </div>
</div>
<!-- /.container-fluid -->

@endsection
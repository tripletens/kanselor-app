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
        <h1 class="h3 mb-0 text-gray-800">Create Job Vacancy</h1>
    </div>

    <div class="row">
        <div class="col-md-12 col-xs-12 col-lg-12">
            <div class="card ">
                <h4 class="card-title p-4 mb-0 pb-0 text-center">Create Job Vacancy</h4>
                <div class="card-body">
                    <form method="POST" action="{{route('admin.create_job_vacancy')}}">
                        @csrf
                        <!-- `title`, `descripition`, `experience`, 
                    `qualification`, `status`, `from_age`, 
                    `to_age`, `is_admin`, `is_employer`, `uploader_id`,`employer_id` -->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="title"> Title: <span class="text-danger"> *</span></label>
                                    <input type="text" name="title" value="{{ old('title') }}" required class="form-control @error('title') is-invalid @enderror" placeholder="Enter Vacancy Title i.e Driver Needed" />
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="description"> Description: <span class="text-danger"> *</span></label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" placeholder="Give us more details about the position"></textarea>
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
                                    <input type="number" min="0" name="experience" required class="form-control @error('experience') is-invalid @enderror" value="{{ old('experience') }}" placeholder="What's the minimum number of years of experience" />
                                </div>
                                <div class="col-md-6">
                                    <label for="qualification">Qualification: <span class="text-danger"> *</span></label>
                                    <select name="qualification" class="form-control @error('experience') is-invalid @enderror" required value="{{ old('qualification') }}">
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
                                    <input type="number" placeholder="Enter minimum age limit" class="form-control @error('from_age') is-invalid @enderror"  value="{{ old('from_age') }}" min="18" name="from_age">
                                    @error('from_age')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="to_age"> Maximum Age limit: <span class="text-danger"> *</span></label>
                                    <input type="number" placeholder="Enter maximum age limit" class="form-control @error('to_age') is-invalid @enderror"  value="{{ old('to_age') }}" min="18" name="to_age">
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
                                    <select name="tribe" class="form-control @error('tribe') is-invalid @enderror"  value="{{ old('tribe') }}">
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
                                    <label for="employer_id">Select Employer <span class="text-danger"> *</span></label>
                                    <select name="employer_id" required class="form-control">
                                        <option name="employer_id[]" value="">-- Select an Employer --</option>
                                        @if(count($employers) > 0 )
                                            @foreach ($employers as $employer)
                                            <option name="employer_id[]" value="{{$employer->id}}"> {{ $employer->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                            </div>

                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="category_id">Select Category <span class="text-danger"> *</span></label>
                                    <select name="category_id" required class="form-control">
                                        <option name="category_id[]" value="">-- Select an category --</option>
                                        @if(count($categories) > 0 )
                                            @foreach ($categories as $category)
                                            <option name="category_id[]" value="{{$category->id}}"> {{ $category->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>


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
</div>
<!-- /.container-fluid -->
@push('head')

@endpush
@endsection
@extends('user.layouts.master')
@section('title', 'Update Profile')
@section('content')

    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Update Profile</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('user.profile') }}">Profile</a>
                                </li>
                                <li class="breadcrumb-item active">Update Profile
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <div class="row" id="basic-table">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="head-label">
                                <h4 class="mb-0">Update Profile</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('user.update.profile') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="card card-body" style="border:2px dotted #ddd; background:#fafafa"
                                    id="personal_info">
                                    <h5 class="mb-2 text-primary">Personal Information</h5>
                                    <!-- header section -->
                                    <div class="d-flex mb-2">
                                        <a href="#" class="me-25">
                                            <img src="@if ($user->image) {{ asset($user->image) }}
                                            @else
                                            {{ asset('defaults/avatar/avatar.png') }} @endif"
                                                id="upImg1" class="upImg1 rounded me-50" alt="profile image"
                                                height="100" width="100" />
                                        </a>
                                        <!-- upload and reset button -->
                                        <div class="d-flex align-items-end mt-75 ms-1">
                                            <div>
                                                <label for="upImgInput1"
                                                    class="btn btn-sm btn-primary mb-75 me-75">Upload</label>
                                                <input type="file" id="upImgInput1" name="image" class="hidden">
                                                <button type="button" id="upImgReset1"
                                                    class="btn btn-sm btn-outline-secondary mb-75">Reset</button>
                                                <p class="mb-0">Allowed file types: png, jpg, jpeg.</p>
                                            </div>
                                            @error('image')
                                                <div class="text-danger"><small>{{ $message }}</small></div>
                                            @enderror
                                        </div>
                                        <!--/ upload and reset button -->
                                    </div>
                                    <!--/ header section -->
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-1">
                                                <label class="form-label" for="">Full Name</label>
                                                <input type="text" name="name" placeholder="Enter full name"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    value="{{ old('name', $user->name) }}">

                                                @error('name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-1">
                                                <label class="form-label" for="">Email</label>
                                                <input type="text" name="email" placeholder="Enter email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    value="{{ old('email', $user->email) }}">

                                                @error('email')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-1">
                                                <label class="form-label" for="">Mobile</label>
                                                <input type="text" name="mobile" placeholder="Enter number"
                                                    class="form-control @error('mobile') is-invalid @enderror"
                                                    value="{{ old('mobile', $user->mobile) }}">

                                                @error('mobile')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-1">
                                                <label class="form-label">Gender</label>
                                                <select id="is_service" name="gender"
                                                    class="form-control @error('gender') is-invalid @enderror">
                                                    <option value="">
                                                        Select Gender
                                                    </option>
                                                    <option value="Male"
                                                        @if (old('gender', $user->gender) == 'Male') selected @endif>
                                                        Male
                                                    </option>
                                                    <option value="Female"
                                                        @if (old('gender', $user->gender) == 'Female') selected @endif>
                                                        Female
                                                    </option>
                                                    <option value="Others"
                                                        @if (old('gender', $user->gender) == 'Others') selected @endif>
                                                        Others
                                                    </option>
                                                </select>
                                                @error('gender')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-1">
                                                <label class="form-label">Marital Status</label>
                                                <select id="marital_status" name="marital_status"
                                                    class="form-control @error('marital_status') is-invalid @enderror">
                                                    <option value="">
                                                        Select Marital Status
                                                    </option>
                                                    <option value="Married"
                                                        @if (old('marital_status', $user->marital_status) == 'Married') selected @endif>
                                                        Married
                                                    </option>
                                                    <option value="Unmarried"
                                                        @if (old('marital_status', $user->marital_status) == 'Unmarried') selected @endif>
                                                        Unmarried
                                                    </option>
                                                </select>
                                                @error('marital_status')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-1">
                                                <label class="form-label" for="">Current Institution</label>
                                                <input type="text" name="current_institution"
                                                    placeholder="Enter current institution"
                                                    class="form-control @error('current_institution') is-invalid @enderror"
                                                    value="{{ old('current_institution', $user->current_institution) }}">

                                                @error('current_institution')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-1">
                                                <label class="form-label" for="">Current Studing Subject</label>
                                                <input type="text" name="current_subject"
                                                    placeholder="Enter current subject"
                                                    class="form-control @error('current_subject') is-invalid @enderror"
                                                    value="{{ old('current_subject', $user->current_subject) }}">

                                                @error('current_subject')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-1">
                                                <label class="form-label" for="">Highest
                                                    Qualification/Degree</label>
                                                <input type="text" name="highest_qualification"
                                                    placeholder="Enter highest qualification"
                                                    class="form-control @error('highest_qualification') is-invalid @enderror"
                                                    value="{{ old('highest_qualification', $user->highest_qualification) }}">

                                                @error('highest_qualification')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror

                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label" for="fp-default">Date of Birth</label>
                                        <input type="text" id="fp-default" name="dob"
                                            class="form-control flatpickr-basic @error('present_location') is-invalid @enderror"
                                            placeholder="YYYY-MM-DD" value="{{ old('dob', $user->dob) }}" />
                                        @error('dob')
                                            <div class="text-danger"><small>{{ $message }}</small></div>
                                        @enderror
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label">Present Location</label>
                                        <textarea name="present_location" class="form-control @error('present_location') is-invalid @enderror"
                                            placeholder="Enter present location...">{{ old('present_location', $user->present_location) }}</textarea>
                                        @error('present_location')
                                            <div class="text-danger"><small>{{ $message }}</small></div>
                                        @enderror
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label">Permanent Address</label>
                                        <textarea name="permanent_address" class="form-control @error('permanent_address') is-invalid @enderror"
                                            placeholder="Enter permanent address...">{{ old('permanent_address', $user->permanent_address) }}</textarea>
                                        @error('permanent_address')
                                            <div class="text-danger"><small>{{ $message }}</small></div>
                                        @enderror
                                    </div>

                                    <div class="mb-1">
                                        <label class="form-label">About</label>
                                        <textarea name="about" class="form-control @error('about') is-invalid @enderror" placeholder="Enter about...">{{ old('about', $user->about) }}</textarea>
                                        @error('about')
                                            <div class="text-danger"><small>{{ $message }}</small></div>
                                        @enderror
                                    </div>

                                </div>

                                <div class="mt-2 float-end">
                                    <button type="submit" class="btn btn-info sub-btn"><i data-feather='save'></i>
                                        Update</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

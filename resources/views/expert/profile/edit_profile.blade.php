@extends('expert.layouts.master')
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
                                <li class="breadcrumb-item"><a href="{{ route('expert.dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('expert.profile') }}">Profile</a>
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
                            <form action="{{ route('expert.update.profile') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="card card-body mb-3" style="border:2px dotted #ddd; background:#fafafa"
                                    id="personal_infos">
                                    <h5 class="mb-2 text-primary">Personal Information</h5>

                                    <div class="card card-body mb-3" style="border:2px dotted #ddd; background:#fafafa" id="personal_info">
                                        <!-- header section -->
                                        <div class="d-flex mb-2">
                                            <a href="#" class="me-25">
                                                <img src="@if($expert->image) {{ asset($expert->image) }}
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
                                                        value="{{ old('name', $expert->name) }}">

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
                                                        value="{{ old('email', $expert->email) }}">

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
                                                        value="{{ old('mobile', $expert->mobile) }}">

                                                    @error('mobile')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror

                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-1">
                                                    <label class="form-label" for="">ID No</label>
                                                    <input type="text" name="id_number" placeholder="Enter id number"
                                                        class="form-control @error('id_number') is-invalid @enderror"
                                                        value="{{ old('id_number', $expert->id_number) }}">

                                                    @error('id_number')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror

                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-1">
                                                    <label class="form-label" for="">Father Name</label>
                                                    <input type="text" name="father_name" placeholder="Enter father_name"
                                                        class="form-control @error('father_name') is-invalid @enderror"
                                                        value="{{ old('father_name', $expert->father_name) }}">

                                                    @error('email')
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
                                                            @if (old('gender', $expert->gender) == 'Male') selected @endif>
                                                            Male
                                                        </option>
                                                        <option value="Female"
                                                            @if (old('gender', $expert->gender) == 'Female') selected @endif>
                                                            Female
                                                        </option>
                                                        <option value="Others"
                                                            @if (old('gender', $expert->gender) == 'Others') selected @endif>
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
                                                            @if (old('marital_status', $expert->marital_status) == 'Married') selected @endif>
                                                            Married
                                                        </option>
                                                        <option value="Unmarried"
                                                            @if (old('marital_status', $expert->marital_status) == 'Unmarried') selected @endif>
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
                                                    <label class="form-label" for="">Husband Name</label>
                                                    <input type="text" name="husband_name" placeholder="Enter full husband_name"
                                                        class="form-control @error('husband_name') is-invalid @enderror"
                                                        value="{{ old('husband_name', $expert->husband_name) }}">

                                                    @error('husband_name')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror

                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-1">
                                                    <label class="form-label">Nationality</label>
                                                    <select id="nationality" name="nationality"
                                                        class="form-control @error('nationality') is-invalid @enderror">
                                                        <option value="">
                                                            Select Nationality
                                                        </option>
                                                        <option value="Bangladesh"
                                                            @if (old('nationality', $expert->nationality) == 'Bangladesh') selected @endif>
                                                            Bangladesh
                                                        </option>
                                                        <option value="Others"
                                                            @if (old('nationality', $expert->nationality) == 'Others') selected @endif>
                                                            Others
                                                        </option>
                                                    </select>
                                                    @error('nationality')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-1">
                                                    <label class="form-label" for="">Country Name</label>
                                                    <input type="text" name="country_name"
                                                        placeholder="Enter current subject"
                                                        class="form-control @error('country_name') is-invalid @enderror"
                                                        value="{{ old('country_name', $expert->country_name) }}">

                                                    @error('country_name')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-1">
                                                    <label class="form-label" for="">NID/Passport Number</label>
                                                    <input type="text" name="nid_passport_number"
                                                        placeholder="Enter highest qualification"
                                                        class="form-control @error('nid_passport_number') is-invalid @enderror"
                                                        value="{{ old('nid_passport_number', $expert->nid_passport_number) }}">

                                                    @error('nid_passport_number')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror

                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for='upImgInput2'>NID/Passport Front</label>
                                                    <input type="file" id="upImgInput2" name="nid_passport_front"
                                                        class="form-control @error('nid_passport_front') is-invalid @enderror">
                                                    @error('nid_passport_front')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="mb-1">
                                                    <img src="@if ($expert->nid_passport_front) {{ asset($expert->nid_passport_front) }} @else {{ asset('defaults/noimage/no_img.jpg') }} @endif" id="upImg2"
                                                        class="upImg2 rounded me-50 border" alt="profile image" height="100">
                                                </div>
                                                <div class="mb-1">
                                                    <button type="button" id="upImgReset1"
                                                        class="btn btn-sm btn-outline-secondary mb-75 waves-effect">Reset</button>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for='upImgInput3'>NID/Passport Back</label>
                                                    <input type="file" id="upImgInput3" name="nid_passport_back"
                                                        class="form-control @error('nid_passport_back') is-invalid @enderror">
                                                    @error('nid_passport_back')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="mb-1">
                                                    <img src="@if ($expert->nid_passport_back) {{ asset($expert->nid_passport_back) }} @else {{ asset('defaults/noimage/no_img.jpg') }} @endif" id="upImg3"
                                                        class="upImg3 rounded me-50 border" alt="profile image" height="100">
                                                </div>
                                                <div class="mb-1">
                                                    <button type="button" id="upImgReset3"
                                                        class="btn btn-sm btn-outline-secondary mb-75 waves-effect">Reset</button>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="fp-default">Date of Birth</label>
                                                    <input type="text" id="fp-default" name="dob"
                                                        class="form-control flatpickr-basic @error('present_location') is-invalid @enderror"
                                                        placeholder="YYYY-MM-DD" value="{{ old('dob', $expert->dob) }}" />
                                                    @error('dob')
                                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-1">
                                                    <label class="form-label">Division</label>
                                                    <select id="division_id" name="division_id"
                                                        class="form-control @error('division_id') is-invalid @enderror">
                                                        @foreach ($divisions as $d)
                                                        <option value="{{ $d->id }}"@if($expert->division_id == $d->id) selected @endif>
                                                            {{ $d->name }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                    @error('division_id')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-1">
                                                    <label class="form-label">District</label>
                                                    <select id="district_id" name="district_id"
                                                        class="form-control @error('district_id') is-invalid @enderror">
                                                        <option value="{{ $expert->district->id }}" selected hidden>
                                                            {{ $expert->district->name }}
                                                        </option>
                                                    </select>
                                                    @error('district_id')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-1">
                                            <label class="form-check-label mb-50" for="fp-customSwitch10">Designation</label>
                                            <div class="d-flex justify-content-around">
                                                <div class="form-check mb-1">
                                                    <input class="form-check-input" type="radio"
                                                        name="format" id="is_lawyer"
                                                        value="is_lawyer" checked>
                                                    <label class="form-check-label"
                                                        for="is_lawyer">
                                                        Lawer
                                                    </label>
                                                </div>
                                                <div class="form-check mb-1">
                                                    <input class="form-check-input" type="radio"
                                                        name="format" id="is_consultant" value="is_consultant"
                                                        {{ old('is_consultant', $expert->is_consultant) }}>
                                                    <label class="form-check-label" for="is_consultant">
                                                        Consultant
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                        name="format" id="is_trainer"
                                                        value="is_trainer"
                                                        {{ old('is_trainer', $expert->is_trainer)}}>
                                                    <label class="form-check-label" for="is_trainer">
                                                        Learner
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                        name="format" id="is_writer"
                                                        value="is_writer"
                                                        {{ old('is_writer', $expert->is_writer) }}>
                                                    <label class="form-check-label" for="is_writer">
                                                        Writer
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-1">
                                            <label class="form-label">Present Location</label>
                                            <textarea name="present_location" class="form-control @error('present_location') is-invalid @enderror"
                                                placeholder="Enter present location...">{{ old('present_location', $expert->present_location) }}</textarea>
                                            @error('present_location')
                                                <div class="text-danger"><small>{{ $message }}</small></div>
                                            @enderror
                                        </div>
                                        <div class="mb-1">
                                            <label class="form-label">Permanent Address</label>
                                            <textarea name="permanent_address" class="form-control @error('permanent_address') is-invalid @enderror"
                                                placeholder="Enter permanent address...">{{ old('permanent_address', $expert->permanent_address) }}</textarea>
                                            @error('permanent_address')
                                                <div class="text-danger"><small>{{ $message }}</small></div>
                                            @enderror
                                        </div>

                                        <div class="mb-1">
                                            <label class="form-label">About</label>
                                            <textarea name="about" class="form-control @error('about') is-invalid @enderror" placeholder="Enter about...">{{ old('about', $expert->about) }}</textarea>
                                            @error('about')
                                                <div class="text-danger"><small>{{ $message }}</small></div>
                                            @enderror
                                        </div>
                                        <div class="mb-1">
                                            <label class="form-label">Key Profile</label>
                                            <textarea name="key_profile" class="form-control @error('key_profile') is-invalid @enderror" placeholder="Enter key profile...">{{ old('key_profile', $expert->key_profile) }}</textarea>
                                            @error('key_profile')
                                                <div class="text-danger"><small>{{ $message }}</small></div>
                                            @enderror
                                        </div>






                                        {{-- <!-- <div class="form-group mb-1 row">
                                            <label for="editor" class="control-label mb-1">Specializations</label>
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                    <label class="control-label">
                                                        <input class="form-check-input" type="checkbox" name="specializations[]" value="Civil Litigation" @if (!empty(($expert->specializations)) && (@in_array('"Civil Litigation"', json_decode($expert->specializations)))) checked @else  @endif>
                                                        Civil Litigation 
                                                    </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                    <label class="control-label">
                                                        <input class="form-check-input" type="checkbox" name="specializations[]" value="Criminal Litigation"  @if (!empty(($expert->specializations)) && (@in_array('Criminal Litigation', json_decode($expert->specializations)))) checked @else  @endif >
                                                        Criminal Litigation 
                                                    </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                    <label class="control-label">
                                                        <input class="form-check-input" type="checkbox" name="specializations[]" value="Banking & Financial"  @if (!empty(($expert->specializations)) && (@in_array('Banking & Financial', json_decode($expert->specializations)))) checked @else  @endif >
                                                        Banking & Financial 
                                                    </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                    <label class="control-label">
                                                        <input class="form-check-input" type="checkbox" name="specializations[]" value="Corporate & Commercial"  @if (!empty(($expert->specializations)) && (@in_array('Corporate & Commercial', json_decode($expert->specializations)))) checked @else  @endif >
                                                        Corporate & Commercial 
                                                    </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                    <label class="control-label">
                                                        <input class="form-check-input" type="checkbox" name="specializations[]" value="Tax & VAT"  @if (!empty(($expert->specializations)) && (@in_array('Tax & VAT', json_decode($expert->specializations)))) checked @else  @endif >
                                                        Tax & VAT 
                                                    </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                    <label class="control-label">
                                                        <input class="form-check-input" type="checkbox" name="specializations[]" value="Land Law"  @if (!empty(($expert->specializations)) && (@in_array('Land Law', json_decode($expert->specializations)))) checked @else  @endif >
                                                        Land Law 
                                                    </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                    <label class="control-label">
                                                        <input class="form-check-input" type="checkbox" name="specializations[]" value="ADR Consultant"  @if (!empty(($expert->specializations)) && (@in_array('ADR Consultant', json_decode($expert->specializations)))) checked @else  @endif >
                                                        ADR Consultant 
                                                    </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                    <label class="control-label">
                                                        <input class="form-check-input" type="checkbox" name="specializations[]" value="Family Law"  @if (!empty(($expert->specializations)) && (@in_array('Family Law', json_decode($expert->specializations)))) checked @else  @endif >
                                                        Family Law 
                                                    </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                    <label class="control-label">
                                                        <input class="form-check-input" type="checkbox" name="specializations[]" value="Labour & Employment Law"  @if (!empty(($expert->specializations)) && (@in_array('Labour & Employment Law', json_decode($expert->specializations)))) checked @else  @endif >
                                                        Labour & Employment Law 
                                                    </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                    <label class="control-label">
                                                        <input class="form-check-input" type="checkbox" name="specializations[]" value="HR Policy Consultant"  @if (!empty(($expert->specializations)) && (@in_array('HR Policy Consultant', json_decode($expert->specializations)))) checked @else  @endif >
                                                        HR Policy Consultant 
                                                    </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                    <label class="control-label">
                                                        <input class="form-check-input" type="checkbox" name="specializations[]" value="Regulatory Compliance Expert"  @if (!empty(($expert->specializations)) && (@in_array('Regulatory Compliance Expert', json_decode($expert->specializations)))) checked @else  @endif >
                                                        Regulatory Compliance Expert 
                                                    </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                    <label class="control-label">
                                                        <input class="form-check-input" type="checkbox" name="specializations[]" value="Income Tax Practitioner"  @if (!empty(($expert->specializations)) && (@in_array('Income Tax Practitioner', json_decode($expert->specializations)))) checked @else  @endif >
                                                        Income Tax Practitioner 
                                                    </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                    <label class="control-label">
                                                        <input class="form-check-input" type="checkbox" name="specializations[]" value="Intellectual Property Lawyer"  @if (!empty(($expert->specializations)) && (@in_array('Intellectual Property Lawyer', json_decode($expert->specializations)))) checked @else  @endif >
                                                        Intellectual Property Lawyer 
                                                    </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                    <label class="control-label">
                                                        <input class="form-check-input" type="checkbox" name="specializations[]" value="Real Estate"  @if (!empty(($expert->specializations)) && (@in_array('Real Estate', json_decode($expert->specializations)))) checked @else  @endif >
                                                        Real Estate 
                                                    </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                    <label class="control-label">
                                                        <input class="form-check-input" type="checkbox" name="specializations[]" value="Compliance Auditor"  @if (!empty(($expert->specializations)) && (@in_array('Compliance Auditor', json_decode($expert->specializations)))) checked @else  @endif >
                                                        Compliance Auditor 
                                                    </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                    <label class="control-label">
                                                        <input class="form-check-input" type="checkbox" name="specializations[]" value="Construction Lawyer"  @if (!empty(($expert->specializations)) && (@in_array('Construction Lawyer', json_decode($expert->specializations)))) checked @else  @endif >
                                                        Construction Lawyer 
                                                    </label>
                                                    </div>
                                                </div>
                                            @error('specializations')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div> --> --}}



                                        <div class="row">
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="password">Password</label>
                                                <input type="password" id="password" name="password"
                                                    class="form-control flatpickr-basic @error('present_location') is-invalid @enderror"
                                                     value="{{ old('password', $expert->password) }}" />
                                                @error('password')
                                                    <div class="text-danger"><small>{{ $message }}</small></div>
                                                @enderror
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="con_password">Confirm Password</label>
                                                <input type="password" id="con_password" name="con_password"
                                                    class="form-control flatpickr-basic @error('present_location') is-invalid @enderror"
                                                     value="{{ old('password', $expert->password) }}" />
                                                @error('con_password')
                                                    <div class="text-danger"><small>{{ $message }}</small></div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card card-body mb-3" style="border:2px dotted #ddd; background:#fafafa" id="emergency_contact">
                                    <h5 class="mb-2 text-secondary">Emergency Contact Information</h5>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-1">
                                                    <label class="form-label" for="">Emergency Contact</label>
                                                    <input type="text" name="emergency_contact" placeholder="Enter full emergency_contact"
                                                        class="form-control @error('emergency_contact') is-invalid @enderror"
                                                        value="{{ old('emergency_contact', $expert->emergency_contact) }}">

                                                    @error('emergency_contact')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-1">
                                                    <label class="form-label" for="">Emergency Contact Relation</label>
                                                    <input type="text" name="emergency_contact_relation" placeholder="Enter emergency_contact_relation"
                                                        class="form-control @error('emergency_contact_relation') is-invalid @enderror"
                                                        value="{{ old('emergency_contact_relation', $expert->emergency_contact_relation) }}">

                                                    @error('emergency_contact_relation')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="card card-body mb-3" style="border:2px dotted #ddd; background:#fafafa"
                                    id="educational_info">
                                    <h5 class="mb-2 text-primary">Educational Information</h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-1">
                                                <label class="form-label" for="">Latest Educational Year</label>
                                                <input type="text" name="latest_edu_year" placeholder="Enter latest educational year"
                                                    class="form-control @error('latest_edu_year') is-invalid @enderror"
                                                    value="{{ old('latest_edu_year', $expert->latest_edu_year) }}">

                                                @error('latest_edu_year')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-1">
                                                <label class="form-label" for="">Latest Educational Institute</label>
                                                <input type="text" name="latest_edu_institute" placeholder="Enter latest educational institute"
                                                    class="form-control @error('latest_edu_institute') is-invalid @enderror"
                                                    value="{{ old('latest_edu_institute', $expert->latest_edu_institute) }}">

                                                @error('latest_edu_institute')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-1">
                                                <label class="form-label" for="">Latest Educational Group Subject</label>
                                                <input type="text" name="latest_edu_group_subject" placeholder="Enter latest educational group subject"
                                                    class="form-control @error('latest_edu_group_subject') is-invalid @enderror"
                                                    value="{{ old('latest_edu_group_subject', $expert->latest_edu_group_subject) }}">

                                                @error('latest_edu_group_subject')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror

                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-1">
                                                <label class="form-label" for="">SSC Year</label>
                                                <input type="text" name="ssc_year"
                                                    placeholder="Enter ssc year"
                                                    class="form-control @error('ssc_year') is-invalid @enderror"
                                                    value="{{ old('ssc_year', $expert->ssc_year) }}">

                                                @error('ssc_year')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-1">
                                                <label class="form-label" for="">SSC Institute</label>
                                                <input type="text" name="ssc_institute"
                                                    placeholder="Enter ssc institute"
                                                    class="form-control @error('ssc_institute') is-invalid @enderror"
                                                    value="{{ old('ssc_institute', $expert->ssc_institute) }}">

                                                @error('ssc_institute')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-1">
                                                <label class="form-label" for="">HSC Group</label>
                                                <input type="text" name="hsc_group"
                                                    placeholder="Enter hsc group"
                                                    class="form-control @error('hsc_group') is-invalid @enderror"
                                                    value="{{ old('hsc_group', $expert->hsc_group) }}">

                                                @error('hsc_group')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-1">
                                                <label class="form-label" for="">Graduate Year</label>
                                                <input type="text" name="graduate_year"
                                                    placeholder="Enter graduate year"
                                                    class="form-control @error('graduate_year') is-invalid @enderror"
                                                    value="{{ old('graduate_year', $expert->graduate_year) }}">

                                                @error('graduate_year')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-1">
                                                <label class="form-label" for="">Graduate Institute</label>
                                                <input type="text" name="graduate_institute"
                                                    placeholder="Enter graduate institute"
                                                    class="form-control @error('graduate_institute') is-invalid @enderror"
                                                    value="{{ old('graduate_institute', $expert->graduate_institute) }}">

                                                @error('graduate_institute')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-1">
                                                <label class="form-label" for="">Graduate Group Subject</label>
                                                <input type="text" name="graduate_group_subject"
                                                    placeholder="Enter graduate group subject"
                                                    class="form-control @error('graduate_group_subject') is-invalid @enderror"
                                                    value="{{ old('graduate_group_subject', $expert->graduate_group_subject) }}">

                                                @error('graduate_group_subject')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-1">
                                                <label class="form-label" for="">Post Graduate Year</label>
                                                <input type="text" name="post_graduate_year"
                                                    placeholder="Enter post graduate year"
                                                    class="form-control @error('post_graduate_year') is-invalid @enderror"
                                                    value="{{ old('post_graduate_year', $expert->post_graduate_year) }}">

                                                @error('post_graduate_year')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-1">
                                                <label class="form-label" for="">Post Graduate Institute</label>
                                                <input type="text" name="post_graduate_institute"
                                                    placeholder="Enter post graduate institute"
                                                    class="form-control @error('post_graduate_institute') is-invalid @enderror"
                                                    value="{{ old('post_graduate_institute', $expert->post_graduate_institute) }}">

                                                @error('post_graduate_institute')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-1">
                                                <label class="form-label" for="">Post Graduate Subject</label>
                                                <input type="text" name="post_graduate_subject"
                                                    placeholder="Enter post graduate subject"
                                                    class="form-control @error('post_graduate_subject') is-invalid @enderror"
                                                    value="{{ old('post_graduate_subject', $expert->post_graduate_subject) }}">

                                                @error('post_graduate_subject')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-1">
                                                <label class="form-label" for="">Other Degree Year</label>
                                                <input type="text" name="other_degree_year"
                                                    placeholder="Enter other degree year"
                                                    class="form-control @error('other_degree_year') is-invalid @enderror"
                                                    value="{{ old('other_degree_year', $expert->other_degree_year) }}">

                                                @error('other_degree_year')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-1">
                                                <label class="form-label" for="">Other Degree Institute</label>
                                                <input type="text" name="other_degree_institute"
                                                    placeholder="Enter other degree institute"
                                                    class="form-control @error('other_degree_institute') is-invalid @enderror"
                                                    value="{{ old('other_degree_institute', $expert->other_degree_institute) }}">

                                                @error('other_degree_institute')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="">Other Degree Group Subject</label>
                                                <input type="text" name="other_degree_group_subject"
                                                    placeholder="Enter other degree group subject"
                                                    class="form-control @error('other_degree_group_subject') is-invalid @enderror"
                                                    value="{{ old('other_degree_group_subject', $expert->other_degree_group_subject) }}">

                                                @error('other_degree_group_subject')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror

                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="card card-body mb-3" style="border:2px dotted #ddd; background:#fafafa"
                                    id="professional_info">
                                    <h5 class="mb-2 text-primary">Professional Information</h5>
                                    <div class="row">
                                        <div class="mb-1">
                                            <label class="form-label">Profession Type</label>
                                            <select id="profession_type" name="profession_type"
                                                class="form-control @error('profession_type') is-invalid @enderror">
                                                <option value="Lawyer"
                                                    @if (old('profession_type', $expert->profession_type) == 'Lawyer') selected @endif>
                                                    Lawyer
                                                </option>
                                                <option value="Others"
                                                    @if (old('profession_type', $expert->profession_type) == 'Others') selected @endif>
                                                    Others
                                                </option>
                                            </select>
                                            @error('profession_type')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- For Others -->
                                    <div class="row" id="others">
                                        <div class="col-md-4">
                                            <div class="mb-1">
                                                <label class="form-label" for="">Company Organization</label>
                                                <input type="text" name="company_organization" placeholder="Enter company organization"
                                                    class="form-control @error('company_organization') is-invalid @enderror"
                                                    value="{{ old('company_organization', $expert->company_organization) }}">

                                                @error('company_organization')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-1">
                                                <label class="form-label" for="">Designation</label>
                                                <input type="text" name="designation" placeholder="Enter designation"
                                                    class="form-control @error('designation') is-invalid @enderror"
                                                    value="{{ old('designation', $expert->designation) }}">

                                                @error('designation')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-1">
                                                <label class="form-label" for="">Profession Document</label>
                                                <input type="text" name="profession_doc" placeholder="Enter profession document"
                                                    class="form-control @error('profession_doc') is-invalid @enderror"
                                                    value="{{ old('profession_doc', $expert->profession_doc) }}">

                                                @error('profession_doc')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group mb-1">
                                                <label for="job_from">Job Duration</label>

                                                    <div class="input-group input-daterange">
                                                        <input type="date" name="job_from" class="form-control @error('job_from') is-invalid @enderror" value="{{ $expert->job_from }}">
                                                    <div class="input-group-append"><div class="input-group-text">to</div></div>
                                                        <input type="date" name="job_to" class="form-control @error('job_to') is-invalid @enderror" value="{{ $expert->job_to }}">
                                                    </div>
                                                    @error('job_from')
                                                    <div class="text-danger"><small>{{ $message }}</small></div>
                                                    @enderror
                                                    @error('job_to')
                                                    <div class="text-danger"><small>{{ $message }}</small></div>
                                                    @enderror
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- For Lowyers -->
                                    <div id="lawyer">
                                        <div class="card card-body mb-3" style="border:2px dotted #ddd; background:#fafafa"
                                        id='bar_council_enrollment'>
                                            <h5 class="mb-2 text-secondary">Bar Council Enrollment</h5>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="">Bar Council Enrollment Date</label>
                                                        <input type="date" name="bce_date"
                                                            class="form-control @error('bce_date') is-invalid @enderror"
                                                            value="{{ old('bce_date', $expert->bce_date) }}">

                                                        @error('bce_date')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror

                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="">Bar Council Enrollment Sanad No</label>
                                                        <input type="text" name="bce_sanad_no" placeholder="Enter bar council enrollment sanad no"
                                                            class="form-control @error('bce_sanad_no') is-invalid @enderror"
                                                            value="{{ old('bce_sanad_no', $expert->bce_sanad_no) }}">

                                                        @error('bce_sanad_no')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror

                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="">Bar Council Enrollment Document</label>
                                                        <input type="text" name="bce_doc" placeholder="Enter bar council enrollment document"
                                                            class="form-control @error('bce_doc') is-invalid @enderror"
                                                            value="{{ old('bce_doc', $expert->bce_doc) }}">

                                                        @error('bce_doc')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card card-body mb-3" style="border:2px dotted #ddd; background:#fafafa"
                                        id='mother_bar_association'>
                                            <h5 class="mb-2 text-secondary">Mother Bar Association</h5>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-1">
                                                        <label class="form-label">MBA Division</label>
                                                        <select id="mba_division" name="mba_division"
                                                            class="form-control @error('mba_division') is-invalid @enderror">
                                                            @foreach ($divisions as $d)
                                                            <option value="{{ $d->id }}"@if($expert->mba_division == $d->id) selected @endif>
                                                                {{ $d->name }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                        @error('mba_division')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-1">
                                                        <label class="form-label">MBA District</label>
                                                        <select id="mba_district" name="mba_district"
                                                            class="form-control @error('mba_district') is-invalid @enderror">
                                                            <option value="{{ $expert->district->id }}" selected hidden>
                                                                {{ $expert->district->name }}
                                                            </option>
                                                        </select>
                                                        @error('mba_district')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="">Mother Bar Association Membership No</label>
                                                        <input type="text" name="mba_membership_no"
                                                            class="form-control @error('mba_membership_no') is-invalid @enderror"
                                                            value="{{ old('mba_membership_no', $expert->mba_membership_no) }}" placeholder="Enter mother bar association membership no">

                                                        @error('mba_membership_no')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror

                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="">Mother Bar Association Document</label>
                                                        <input type="text" name="mba_doc" placeholder="Enter mother bar association document"
                                                            class="form-control @error('mba_doc') is-invalid @enderror"
                                                            value="{{ old('mba_doc', $expert->mba_doc) }}">

                                                        @error('mba_doc')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card card-body mb-3" style="border:2px dotted #ddd; background:#fafafa"
                                        id='second_bar_association'>
                                            <h5 class="mb-2 text-secondary">Second Bar Association</h5>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-1">
                                                        <label class="form-label">SBA Division</label>
                                                        <select id="sba_division" name="sba_division"
                                                            class="form-control @error('sba_division') is-invalid @enderror">
                                                            @foreach ($divisions as $d)
                                                            <option value="{{ $d->id }}"@if($expert->sba_division == $d->id) selected @endif>
                                                                {{ $d->name }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                        @error('sba_division')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-1">
                                                        <label class="form-label">SBA District</label>
                                                        <select id="sba_district" name="sba_district"
                                                            class="form-control @error('sba_district') is-invalid @enderror">
                                                            <option value="{{ $expert->district->id }}" selected hidden>
                                                                {{ $expert->district->name }}
                                                            </option>
                                                        </select>
                                                        @error('sba_district')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="">Second Bar Association Membership No</label>
                                                        <input type="text" name="sba_membership_no"
                                                            class="form-control @error('sba_membership_no') is-invalid @enderror"
                                                            value="{{ old('sba_membership_no', $expert->sba_membership_no) }}" placeholder="Enter second bar association membership no">

                                                        @error('sba_membership_no')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror

                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="">Second Bar Association Document</label>
                                                        <input type="text" name="sba_doc" placeholder="Enter second bar association document"
                                                            class="form-control @error('sba_doc') is-invalid @enderror"
                                                            value="{{ old('sba_doc', $expert->sba_doc) }}">

                                                        @error('sba_doc')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card card-body mb-3" style="border:2px dotted #ddd; background:#fafafa"
                                        id='high_court_enrollment'>
                                            <h5 class="mb-2 text-secondary">High Court Enrollment</h5>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="">High Court Enrollment Date</label>
                                                        <input type="date" name="hce_date"
                                                            class="form-control @error('hce_date') is-invalid @enderror"
                                                            value="{{ old('hce_date', $expert->hce_date) }}">

                                                        @error('hce_date')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror

                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="">High Court Enrollment Sanad No</label>
                                                        <input type="text" name="hce_sanad_no" placeholder="Enter high court enrollment sanad no"
                                                            class="form-control @error('hce_sanad_no') is-invalid @enderror"
                                                            value="{{ old('hce_sanad_no', $expert->hce_sanad_no) }}">

                                                        @error('hce_sanad_no')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror

                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="">High Court Enrollment Document</label>
                                                        <input type="text" name="hce_doc" placeholder="Enter high court enrollment document"
                                                            class="form-control @error('hce_doc') is-invalid @enderror"
                                                            value="{{ old('hce_doc', $expert->hce_doc) }}">

                                                        @error('hce_doc')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card card-body mb-3" style="border:2px dotted #ddd; background:#fafafa"
                                        id='supreme_court_bar_association'>
                                            <h5 class="mb-2 text-secondary">Supreme Court Bar Association</h5>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="">Supreme Court Bar Association Date</label>
                                                        <input type="date" name="scba_date"
                                                            class="form-control @error('scba_date') is-invalid @enderror"
                                                            value="{{ old('scba_date', $expert->scba_date) }}">

                                                        @error('scba_date')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror

                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="">Supreme Court Bar Association Membership No</label>
                                                        <input type="text" name="scba_membership_no" placeholder="Enter supreme court bar association membership no"
                                                            class="form-control @error('scba_membership_no') is-invalid @enderror"
                                                            value="{{ old('scba_membership_no', $expert->scba_membership_no) }}">

                                                        @error('scba_membership_no')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror

                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="">Supreme Court Bar Association Document</label>
                                                        <input type="text" name="scba_doc" placeholder="Enter supreme court bar association document"
                                                            class="form-control @error('scba_doc') is-invalid @enderror"
                                                            value="{{ old('scba_doc', $expert->scba_doc) }}">

                                                        @error('scba_doc')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card card-body mb-3" style="border:2px dotted #ddd; background:#fafafa"
                                        id='bar_council_fee'>
                                            <h5 class="mb-2 text-secondary">Bar Council Fee</h5>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="">Bar Council Fee Payment Date</label>
                                                        <input type="date" name="bcf_payment_date"
                                                            class="form-control @error('bcf_payment_date') is-invalid @enderror"
                                                            value="{{ old('bcf_payment_date', $expert->bcf_payment_date) }}">

                                                        @error('bcf_payment_date')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror

                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="">Bar Council Fee Reciept No</label>
                                                        <input type="text" name="bcf_receipt_no" placeholder="Enter bar council fee reciept no"
                                                            class="form-control @error('bcf_receipt_no') is-invalid @enderror"
                                                            value="{{ old('bcf_receipt_no', $expert->bcf_receipt_no) }}">

                                                        @error('bcf_receipt_no')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror

                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="">Bar Council Fee Document</label>
                                                        <input type="text" name="bcf_doc" placeholder="Enter bar council fee document"
                                                            class="form-control @error('bcf_doc') is-invalid @enderror"
                                                            value="{{ old('bcf_doc', $expert->bcf_doc) }}">

                                                        @error('bcf_doc')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card card-body mb-3" style="border:2px dotted #ddd; background:#fafafa"
                                        id='practicing_bar_membership_fee'>
                                            <h5 class="mb-2 text-secondary">Practicing Bar Membership Fee</h5>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="">Practicing Bar Membership Fee Payment Date</label>
                                                        <input type="date" name="pbmf_payment_date"
                                                            class="form-control @error('pbmf_payment_date') is-invalid @enderror"
                                                            value="{{ old('pbmf_payment_date', $expert->pbmf_payment_date) }}">

                                                        @error('pbmf_payment_date')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror

                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="">Practicing Bar Membership Fee Reciept No</label>
                                                        <input type="text" name="pbmf_receipt_no" placeholder="Enter practicing bar membership fee reciept no"
                                                            class="form-control @error('pbmf_receipt_no') is-invalid @enderror"
                                                            value="{{ old('pbmf_receipt_no', $expert->pbmf_receipt_no) }}">

                                                        @error('pbmf_receipt_no')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror

                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="">Practicing Bar Membership Fee Document</label>
                                                        <input type="text" name="pbmf_doc" placeholder="Enter practicing bar membership fee document"
                                                            class="form-control @error('pbmf_doc') is-invalid @enderror"
                                                            value="{{ old('pbmf_doc', $expert->pbmf_doc) }}">

                                                        @error('pbmf_doc')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card card-body mb-3" style="border:2px dotted #ddd; background:#fafafa"
                                        id='SCBA_membership_fee'>
                                            <h5 class="mb-2 text-secondary">SCBA Membership Fee</h5>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="">SCBA Membership Fee Payment Date</label>
                                                        <input type="date" name="pbmf_payment_date"
                                                            class="form-control @error('pbmf_payment_date') is-invalid @enderror"
                                                            value="{{ old('pbmf_payment_date', $expert->pbmf_payment_date) }}">

                                                        @error('pbmf_payment_date')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror

                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="">SCBA Membership Fee Reciept No</label>
                                                        <input type="text" name="scba_mf_receipt_no" placeholder="Enter SCBA membership fee reciept no"
                                                            class="form-control @error('scba_mf_receipt_no') is-invalid @enderror"
                                                            value="{{ old('scba_mf_receipt_no', $expert->scba_mf_receipt_no) }}">

                                                        @error('scba_mf_receipt_no')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror

                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="">SCBA Membership Fee Document</label>
                                                        <input type="text" name="scba_mf_doc" placeholder="Enter SCBA membership fee document"
                                                            class="form-control @error('scba_mf_doc') is-invalid @enderror"
                                                            value="{{ old('scba_mf_doc', $expert->scba_mf_doc) }}">

                                                        @error('scba_mf_doc')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card card-body mb-3" style="border:2px dotted #ddd; background:#fafafa"
                                        id='chamber_details'>
                                            <h5 class="mb-2 text-secondary">Chamber Details</h5>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="">Chamber Name</label>
                                                        <input type="text" name="chamber_name" placeholder="Enter chamber name"
                                                            class="form-control @error('chamber_name') is-invalid @enderror"
                                                            value="{{ old('chamber_name', $expert->chamber_name) }}">

                                                        @error('chamber_name')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror

                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="">Chamber Role</label>
                                                        <input type="text" name="chamber_role" placeholder="Enter chamber role"
                                                            class="form-control @error('chamber_role') is-invalid @enderror"
                                                            value="{{ old('chamber_role', $expert->chamber_role) }}">

                                                        @error('chamber_role')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror

                                                    </div>
                                                </div>
                                                <div class="mb-1">
                                                    <label class="form-label">Chamber Address</label>
                                                    <textarea name="chamber_address" class="form-control @error('chamber_address') is-invalid @enderror" placeholder="Enter chamber address">{{ old('chamber_address', $expert->chamber_address) }}</textarea>
                                                    @error('chamber_address')
                                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card card-body mb-3" style="border:2px dotted #ddd; background:#fafafa"
                                    id="contact_info">
                                    <h5 class="mb-2 text-primary">Contact Information</h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-1">
                                                <label class="form-label" for="">Contact Number</label>
                                                <input type="text" name="contact_number" placeholder="Enter your contact number"
                                                    class="form-control @error('contact_number') is-invalid @enderror"
                                                    value="{{ old('contact_number', $expert->contact_number) }}">

                                                @error('contact_number')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-1">
                                                <label class="form-label" for="">Contact Email</label>
                                                <input type="text" name="contact_email" placeholder="Enter contact email"
                                                    class="form-control @error('contact_email') is-invalid @enderror"
                                                    value="{{ old('contact_email', $expert->contact_email) }}">

                                                @error('contact_email')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror

                                            </div>
                                        </div>
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

@section('scripts')
<script>
    $(function() {
        $(document).on('change', '#profession_type', function() {
            var value = $(this).val();
            if(value == 'Lawyer'){
                $('#lawyer').show();
                $('#others').hide();
            }else{
                $('#lawyer').hide();
                $('#others').show();
            }
        });
    });
</script>
<script>
        // Division to District onChange
        $(function() {
            $(document).on('change', '#division_id', function() {
                var id = $(this).val();
                if (id == '') {
                    var html = '<option value="" selected disabled>Select District</option>';
                    $('#district_id').html(html);
                } else {
                    $.ajax({
                        type: "Get",
                        url: "{{ url('/get/division/district') }}/" + id,
                        dataType: "json",
                        success: function(data) {
                            var html = '<option value="" selected disabled>Select District</option>';
                            $.each(data, function(key, val) {
                                html += '<option value="' + val.id + '">' + val
                                    .title + '</option>';
                            });
                            $('#district_id').html(html);
                        },
                    });
                }

            });
        });

        // MBA Division to MBA District
        $(function() {
            $(document).on('change', '#mba_division', function() {
                var id = $(this).val();
                if (id == '') {
                    var html = '<option value="" selected disabled>Select MBA District</option>';
                    $('#mba_district').html(html);
                } else {
                    $.ajax({
                        type: "Get",
                        url: "{{ url('/get/division/district') }}/" + id,
                        dataType: "json",
                        success: function(data) {
                            var html = '<option value="" selected disabled>Select MBA District</option>';
                            $.each(data, function(key, val) {
                                html += '<option value="' + val.id + '">' + val
                                    .title + '</option>';
                            });
                            $('#mba_district').html(html);
                        },
                    });
                }

            });
        });

        // SBA Division to SBA District
        $(function() {
            $(document).on('change', '#sba_division', function() {
                var id = $(this).val();
                if (id == '') {
                    var html = '<option value="" selected disabled>Select SBA District</option>';
                    $('#sba_district').html(html);
                } else {
                    $.ajax({
                        type: "Get",
                        url: "{{ url('/get/division/district') }}/" + id,
                        dataType: "json",
                        success: function(data) {
                            var html = '<option value="" selected disabled>Select SBA District</option>';
                            $.each(data, function(key, val) {
                                html += '<option value="' + val.id + '">' + val
                                    .title + '</option>';
                            });
                            $('#sba_district').html(html);
                        },
                    });
                }

            });
        });
    </script>
@endsection
@endsection

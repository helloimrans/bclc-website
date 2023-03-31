@extends('learner.layouts.master')
@section('title', 'Profile')
@section('content')
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Profile</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('learner.dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">Profile
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <section class="app-user-view-account">
                <div class="row">
                    <!-- User Sidebar -->
                    <div class="col-xl-4 col-lg-5 col-md-5">
                        <!-- User Card -->
                        <div class="card sticky-top">
                            <div class="card-body">
                                <div class="user-avatar-section">
                                    <div class="d-flex align-items-center flex-column">
                                        <img class="img-fluid rounded mt-3 mb-2"
                                            src="@if ($learner->image) {{ asset($learner->image) }}
                                            @else
                                            {{ asset('defaults/avatar/avatar.png') }} @endif"
                                            height="110" width="110" alt="User avatar" />
                                        <div class="user-info text-center">
                                            <h4>{{ $learner->name }}</h4>
                                            <span class="badge bg-light-secondary">Tutor</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-around my-2 pt-75">
                                    <div class="d-flex align-items-start me-2">
                                        <span class="badge bg-light-primary p-75 rounded">
                                            <i data-feather="eye" class="font-medium-2"></i>
                                        </span>
                                        <div class="ms-75">
                                            <h4 class="mb-0">{{ $learner->total_view }}</h4>
                                            <small>Total View</small>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-start">
                                        <span class="badge bg-light-primary p-75 rounded">
                                            <i data-feather="briefcase" class="font-medium-2"></i>
                                        </span>
                                        <div class="ms-75">
                                            <h4 class="mb-0">0</h4>
                                            <small>Others</small>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="fw-bolder border-bottom pb-50 mb-1">Details</h4>
                                <div class="info-container">
                                    <ul class="list-unstyled">
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Username:</span>
                                            <span>{{ $learner->slug }}</span>
                                        </li>
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Auth Email:</span>
                                            <span>{{ $learner->email }}</span>
                                        </li>
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Status:</span>
                                            @if ($learner->status == 1)
                                                <span class="badge bg-light-success">Active</span>
                                            @else
                                                <span class="badge bg-light-danger">Inactive</span>
                                            @endif
                                        </li>
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Premium:</span>
                                            <span>
                                                @if ($learner->is_premium == 1)
                                                    Yes
                                                @else
                                                    No
                                                @endif
                                            </span>
                                        </li>
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Contact:</span>
                                            <span>{{ $learner->mobile }}</span>
                                        </li>
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Verified:</span>
                                            <span>
                                                @if ($learner->is_verified == 1)
                                                    Yes
                                                @else
                                                    No
                                                @endif
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /User Card -->
                    </div>
                    <!--/ User Sidebar -->

                    <!-- User Content -->
                    <div class="col-xl-8 col-lg-7 col-md-7">
                        <!-- Personal Information -->
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-50">Personal Information</h4>
                                <a href="{{ route('learner.edit.profile') }}" class="btn btn-primary btn-sm">
                                    <i data-feather='edit-3'></i> Update Profile
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-6 col-12">
                                        <dl class="row mb-0">
                                            <dt class="col-sm-4 fw-bolder mb-1">ID:</dt>
                                            <dd class="col-sm-8 mb-1">{{ $learner->id_number }}</dd>

                                            <dt class="col-sm-4 fw-bolder mb-1">Name:</dt>
                                            <dd class="col-sm-8 mb-1">{{ $learner->name }}</dd>

                                            <dt class="col-sm-4 fw-bolder mb-1">Email:</dt>
                                            <dd class="col-sm-8 mb-1">{{ $learner->email }}</dd>

                                            <dt class="col-sm-4 fw-bolder mb-1">Mobile:</dt>
                                            <dd class="col-sm-8 mb-1">{{ $learner->mobile }}</dd>

                                            <dt class="col-sm-4 fw-bolder mb-1">Gender:</dt>
                                            <dd class="col-sm-8 mb-1">{{ $learner->gender }}
                                            </dd>
                                            <dt class="col-sm-4 fw-bolder mb-1">Marital Status:</dt>
                                            <dd class="col-sm-8 mb-1">{{ $learner->marital_status }}</dd>

                                            <dt class="col-sm-4 fw-bolder mb-1">Date of Birth:</dt>
                                            <dd class="col-sm-8 mb-1">
                                                {{ \Carbon\Carbon::parse($learner->dob)->format('d M Y') }}</dd>


                                        </dl>
                                    </div>
                                    <div class="col-xl-6 col-12">
                                        <dl class="row mb-0">

                                            <dt class="col-sm-4 fw-bolder mb-1">Institution:</dt>
                                            <dd class="col-sm-8 mb-1">{{ $learner->current_institution }}</dd>

                                            <dt class="col-sm-4 fw-bolder mb-1">Subject:</dt>
                                            <dd class="col-sm-8 mb-1">{{ $learner->current_subject }}</dd>

                                            <dt class="col-sm-4 fw-bolder mb-1">Qualification:</dt>
                                            <dd class="col-sm-8 mb-1">{{ $learner->highest_qualification }}</dd>

                                            <dt class="col-sm-4 fw-bolder mb-1">Present Location:</dt>
                                            <dd class="col-sm-8 mb-1">{{ $learner->present_location }}</dd>

                                            <dt class="col-sm-4 fw-bolder mb-1">Permanent Address:</dt>
                                            <dd class="col-sm-8 mb-1">{{ $learner->permanent_address }}</dd>

                                            <dt class="col-sm-4 fw-bolder mb-1">About:</dt>
                                            <dd class="col-sm-8 mb-1">{{ $learner->about }}</dd>

                                        </dl>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ User Content -->
                </div>
            </section>
        </div>
    </div>
@endsection

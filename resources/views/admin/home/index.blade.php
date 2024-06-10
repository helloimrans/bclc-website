@extends('admin.layouts.master')
@section('title', 'Dashboard')
@section('styles')
<style>
    p.card-text {
    font-weight: 500;
    color: #000;
}
</style>
@endsection
@section('content')
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Dashboard</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Dashboard
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- For Admin -->
            @if (Auth::user()->user_type == App\Models\User::ADMIN)
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <div>
                                    <h2 class="fw-bolder mb-0">{{ $totalUser }}</h2>
                                    <p class="card-text">Total Users</p>
                                </div>
                                <div class="avatar bg-light-primary p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="fa fa-users"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <div>
                                    <h2 class="fw-bolder mb-0">{{ $totalAdmin }}</h2>
                                    <p class="card-text">Total Admin</p>
                                </div>
                                <div class="avatar bg-light-success p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="fa fa-users"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <div>
                                    <h2 class="fw-bolder mb-0">{{ $totalExpert }}</h2>
                                    <p class="card-text">Total Expert</p>
                                </div>
                                <div class="avatar bg-light-danger p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="fa fa-users"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <div>
                                    <h2 class="fw-bolder mb-0">{{ $totalNormalUser }}</h2>
                                    <p class="card-text">Total Normal User</p>
                                </div>
                                <div class="avatar bg-light-warning p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="fa fa-users"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <div>
                                    <h2 class="fw-bolder mb-0">{{ $totalCourses }}</h2>
                                    <p class="card-text">Total Courses</p>
                                </div>
                                <div class="avatar bg-light-primary p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="fa fa-graduation-cap"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <div>
                                    <h2 class="fw-bolder mb-0">{{ $totalEnrolledCourses }}</h2>
                                    <p class="card-text">Total Enrolled</p>
                                </div>
                                <div class="avatar bg-light-success p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="fa fa-graduation-cap"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <div>
                                    <h2 class="fw-bolder mb-0">{{ $totalPendingCourses }}</h2>
                                    <p class="card-text">Enrolled Pending</p>
                                </div>
                                <div class="avatar bg-light-danger p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="fa fa-graduation-cap"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <div>
                                    <h2 class="fw-bolder mb-0">{{ $totalRunningCourses }}</h2>
                                    <p class="card-text">Running Courses</p>
                                </div>
                                <div class="avatar bg-light-warning p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="fa fa-graduation-cap"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <div>
                                    <h2 class="fw-bolder mb-0">{{ $totalCompleteCourses }}</h2>
                                    <p class="card-text">Completed Courses</p>
                                </div>
                                <div class="avatar bg-light-primary p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="fa fa-graduation-cap"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <div>
                                    <h2 class="fw-bolder mb-0">{{ $totalLaws }}</h2>
                                    <p class="card-text">Total Laws & Rules</p>
                                </div>
                                <div class="avatar bg-light-success p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="fa fa-gavel"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <div>
                                    <h2 class="fw-bolder mb-0">{{ $totalArticles }}</h2>
                                    <p class="card-text">Total Article</p>
                                </div>
                                <div class="avatar bg-light-danger p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="fa fa-pen-nib"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <div>
                                    <h2 class="fw-bolder mb-0">{{ $totalBlogs }}</h2>
                                    <p class="card-text">Total Legal Blogs</p>
                                </div>
                                <div class="avatar bg-light-warning p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="fa fa-pen-nib"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <div>
                                    <h2 class="fw-bolder mb-0">{{ $totalWriteUps }}</h2>
                                    <p class="card-text">Total Legal Write Ups</p>
                                </div>
                                <div class="avatar bg-light-primary p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="fa fa-pen-nib"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <div>
                                    <h2 class="fw-bolder mb-0">{{ $totalNews }}</h2>
                                    <p class="card-text">Total Legal News</p>
                                </div>
                                <div class="avatar bg-light-success p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="fa fa-pen-nib"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <div>
                                    <h2 class="fw-bolder mb-0">{{ $totalReviews }}</h2>
                                    <p class="card-text">Total Legal Reviews</p>
                                </div>
                                <div class="avatar bg-light-danger p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="fa fa-pen-nib"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <div>
                                    <h2 class="fw-bolder mb-0">{{ $totalUnreadContactMessage }}</h2>
                                    <p class="card-text">Unread Message</p>
                                </div>
                                <div class="avatar bg-light-warning p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="fa fa-address-book"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <!-- For Expert -->
            @if (Auth::user()->user_type == App\Models\User::EXPERT)
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <div>
                                    <h2 class="fw-bolder mb-0">{{ 0 }}</h2>
                                    <p class="card-text">Total Assigned Courses</p>
                                </div>
                                <div class="avatar bg-light-primary p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="fa fa-school"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <div>
                                    <h2 class="fw-bolder mb-0">{{ 0 }}</h2>
                                    <p class="card-text">Running Courses</p>
                                </div>
                                <div class="avatar bg-light-danger p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="fa fa-school"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <div>
                                    <h2 class="fw-bolder mb-0">{{ 0 }}</h2>
                                    <p class="card-text">Pending Courses</p>
                                </div>
                                <div class="avatar bg-light-warning p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="fa fa-school"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <div>
                                    <h2 class="fw-bolder mb-0">{{ 0 }}</h2>
                                    <p class="card-text">Total Students</p>
                                </div>
                                <div class="avatar bg-light-success p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="fa fa-graduation-cap"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <!-- For Normal User -->
            @if (Auth::user()->user_type == App\Models\User::NORMAL_USER)
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <div>
                                    <h2 class="fw-bolder mb-0">{{ $totalUserEnrolledCourses }}</h2>
                                    <p class="card-text">Total Enrolled Courses</p>
                                </div>
                                <div class="avatar bg-light-primary p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="fa fa-registered"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <div>
                                    <h2 class="fw-bolder mb-0">{{ $totalUserCompleteCourses }}</h2>
                                    <p class="card-text">Total Complete Courses</p>
                                </div>
                                <div class="avatar bg-light-success p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="fa fa-check-circle"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <div>
                                    <h2 class="fw-bolder mb-0">{{ $totalUserRunningCourses }}</h2>
                                    <p class="card-text">Total Running Courses</p>
                                </div>
                                <div class="avatar bg-light-danger p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="fa fa-check"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <div>
                                    <h2 class="fw-bolder mb-0">{{ $totalUserPendingCourses }}</h2>
                                    <p class="card-text">Total Pending Courses</p>
                                </div>
                                <div class="avatar bg-light-warning p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="fa fa-clock"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

@extends('learner.layouts.master')
@section('title', 'Dashboard')
@section('content')
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Dashboard</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a>
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
            <!-- Stats Horizontal Card -->
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-header">
                            <div>
                                <h2 class="fw-bolder mb-0">86%</h2>
                                <p class="card-text">CPU Usage</p>
                            </div>
                            <div class="avatar bg-light-primary p-50 m-0">
                                <div class="avatar-content">
                                    <i data-feather="cpu" class="font-medium-5"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-header">
                            <div>
                                <h2 class="fw-bolder mb-0">1.2gb</h2>
                                <p class="card-text">Memory Usage</p>
                            </div>
                            <div class="avatar bg-light-success p-50 m-0">
                                <div class="avatar-content">
                                    <i data-feather="server" class="font-medium-5"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-header">
                            <div>
                                <h2 class="fw-bolder mb-0">0.1%</h2>
                                <p class="card-text">Downtime Ratio</p>
                            </div>
                            <div class="avatar bg-light-danger p-50 m-0">
                                <div class="avatar-content">
                                    <i data-feather="activity" class="font-medium-5"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-header">
                            <div>
                                <h2 class="fw-bolder mb-0">13</h2>
                                <p class="card-text">Issues Found</p>
                            </div>
                            <div class="avatar bg-light-warning p-50 m-0">
                                <div class="avatar-content">
                                    <i data-feather="alert-octagon" class="font-medium-5"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Stats Horizontal Card -->
        </div>
    </div>
@endsection

@extends('admin.layouts.master')
@section('title', 'Update Profile')
@section('content')

    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Profile</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('user.profile') }}">Profile</a>
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
            <div class="row" id="basic-table">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="head-label">
                                <h4 class="mb-0">Profile</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            @if (Auth::user()->user_type == App\Models\User::NORMAL_USER)
                                @include('admin.profile.normal-user-profile')
                            @elseif (Auth::user()->user_type == App\Models\User::EXPERT)
                                @include('admin.profile.expert-profile')
                            @elseif (Auth::user()->user_type == App\Models\User::ADMIN)
                                @include('admin.profile.admin-profile')
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('user.layouts.master')
@section('title', 'Your Course')
@section('content')

    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">You Courses</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">You Courses
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
                                <h5 class="mb-0">You Courses</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Course Title</th>
                                            <th>Image</th>
                                            <th>Service</th>
                                            <th>Service Category</th>
                                            <th>Expert</th>
                                            <th>Fee</th>
                                            <th>Discount Fee</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($courseOrderDetails as $course)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $course->courses->title }}</td>
                                                <td><img class="rounded" width="60"
                                                    src="@if ($course->courses->image) {{ asset($course->courses->image) }} @else {{ asset('defaults/noimage/no_img.jpg') }} @endif"
                                                    alt="{{ $course->courses->title }}">
                                                </td>
                                                <td>{{ $course->courses->service->title }}</td>
                                                <td>{{ $course->courses->serviceCategory->name }}</td>
                                                <td>{{ $course->courses->expert->name }}</td>
                                                <td>{{ $course->courses->fee }}</td>
                                                <td>{{ $course->courses->discount_fee ?? 'N/A' }}</td>
                                                <td></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

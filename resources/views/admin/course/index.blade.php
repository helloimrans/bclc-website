@extends('admin.layouts.master')
@section('title', 'Training Course')
@section('content')

    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Training Course</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Training Course
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
                                <h5 class="mb-0">Training Course</h5>
                            </div>
                            <div class="dt-action-buttons text-end">
                                <div class="dt-buttons d-inline-flex">
                                    <a href="
                                    {{ route('courses.create') }}"
                                     class="btn btn-info btn-sm"><i data-feather='plus-square'></i> Add New
                                    </a>
                                </div>
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
                                            <th>Status</th>
                                            <th>Created By</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($courses as $course)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $course->title }}</td>
                                                <td><img class="rounded" width="60"
                                                    src="@if ($course->image) {{ Storage::url($course->image) }} @else {{ asset('defaults/noimage/no_img.jpg') }} @endif"
                                                    alt="{{ $course->title }}">
                                                </td>
                                                <td>{{ $course->service->title }}</td>
                                                <td>{{ $course->serviceCategory->name }}</td>
                                                <td>{{ $course->expert->name }}</td>
                                                <td>{{ $course->fee }}</td>
                                                <td>{{ $course->discount_fee ?? 'N/A' }}</td>
                                                <td>
                                                    @if($course->status == 1)
                                                        <span class="badge badge-light-success">Active</span>
                                                    @else
                                                        <span class="badge badge-light-warning">Deactive</span>
                                                    @endif
                                                </td>
                                                <td>{{ $course->createdBy->name }}</td>
                                                <td>
                                                    <a class="me-1" href="
                                                    {{ route('courses.show',$course->id) }}
                                                    " data-bs-toggle="tooltip"
                                                        data-bs-original-title="Edit">
                                                        <i class="far fa-eye text-dark"></i>
                                                    </a>
                                                    <a class="me-1" href="
                                                    {{ route('courses.edit',$course->id) }}
                                                    " data-bs-toggle="tooltip"
                                                        data-bs-original-title="Edit">
                                                        <i class="far fa-edit text-dark"></i>
                                                    </a>
                                                    <form class="d-inline" id="delForm" action="
                                                    {{ route('courses.destroy',$course->id) }}
                                                        " method="POST">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button id="delete" type="submit" class="me-1 dlt-btn" data-bs-toggle="tooltip"
                                                        data-bs-original-title="Delete"><i class="far fa-trash-alt text-danger"></i></button>
                                                    </form>
                                                </td>
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

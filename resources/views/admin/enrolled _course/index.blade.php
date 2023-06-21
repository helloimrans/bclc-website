@extends('admin.layouts.master')
@section('title', 'Enrolled Course')
@section('content')

    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Enrolled Course</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Enrolled Course
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
                                <h5 class="mb-0">Enrolled Course</h5>
                            </div>
                            <div class="dt-action-buttons text-end">
                                <div class="dt-buttons d-inline-flex">
                                    <a href=""
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
                                            <th>Course Name</th>
                                            <th>Participant Number</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($enrolledCourses as $enrolledCourse)

                                        @php
                                            $participant = App\Models\CourseOrderDetail::where('course_id', $enrolledCourse->course_id);
                                        @endphp
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $enrolledCourse->courses->title }}</td>
                                                <td>
                                                    <span class="badge bg-secondary">Total: {{$participant->count()}}</span>
                                                    <span class="badge bg-warning">Pending: {{$participant->where('status', 'Pending')->count()}}</span>
                                                </td>
                                                <td>
                                                    <a class="me-1 btn btn-info btn-sm" href="" data-bs-toggle="tooltip"
                                                        data-bs-original-title="Classroom">
                                                        Classroom
                                                    </a>
                                                    <a class="me-1 btn btn-primary btn-sm" href="{{route('enrolled.courses.details',$enrolledCourse->course_id)}}" data-bs-toggle="tooltip"
                                                        data-bs-original-title="Details">
                                                        Details
                                                    </a>
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

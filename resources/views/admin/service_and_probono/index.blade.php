@extends('admin.layouts.master')
@section('title', 'Service & Pro-Bono')
@section('content')

    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Service & Pro-Bono</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Service & Pro-Bono
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
                                <h5 class="mb-0">Service & Pro-Bono</h5>
                            </div>
                            <div class="dt-action-buttons text-end">
                                <div class="dt-buttons d-inline-flex"><a href="{{ route('service.create') }}"
                                        class="btn btn-info btn-sm"><i data-feather='plus-square'></i> Add New</a></div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Title</th>
                                            <th>Thumbnail</th>
                                            <th>Type</th>
                                            <th>Category</th>
                                            <th>Status</th>
                                            <th>Created By</th>
                                            <th>Updated By</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($services as $service)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $service->title }}</td>
                                                <td><img class="rounded" width="60"
                                                    src="@if ($service->thumbnail_image) {{ asset($service->thumbnail_image) }} @else {{ asset('defaults/noimage/no_img.jpg') }} @endif"
                                                    alt="{{ $service->title }}"></td>
                                                <td>
                                                    @if ($service->is_service == 1)
                                                        <span class="badge badge-light-success">Service</span>
                                                    @elseif($service->is_service == 2)
                                                        <span class="badge badge-light-warning">Pro-Bono</span>
                                                    @endif
                                                </td>
                                                <td> {{ $service->category->name ?? 'None' }}</td>
                                                <td>
                                                    @if ($service->status == 1)
                                                        <span class="badge badge-light-success">Active</span>
                                                    @else
                                                        <span class="badge badge-light-warning">Deactive</span>
                                                    @endif
                                                </td>
                                                <td>{{ @$service->createdBy->email }}</td>
                                                <td>{{ @$service->updatedBy->email }}</td>
                                                <td>
                                                    <a class="me-1"
                                                        href="{{ route('service.edit', $service->id) }}"
                                                        data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                                        <i class="far fa-edit text-dark"></i>
                                                    </a>
                                                    <form class="d-inline" id="delForm"
                                                        action="{{ route('service.destroy', $service->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button id="delete" type="submit" class="me-1 dlt-btn"
                                                            data-bs-toggle="tooltip" data-bs-original-title="Delete"><i
                                                                class="far fa-trash-alt text-danger"></i></button>
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

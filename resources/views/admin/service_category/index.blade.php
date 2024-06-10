@extends('admin.layouts.master')
@section('title', 'Service category')
@section('content')

    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Service Category</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Service Category
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
                                <h5 class="mb-0">Service Category</h5>
                            </div>
                            <div class="dt-action-buttons text-end">
                                <div class="dt-buttons d-inline-flex"><a href="{{ route('service.category.create') }}"
                                        class="btn btn-info btn-sm"><i data-feather='plus-square'></i> Add New</a></div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Name</th>
                                            <th>Category Type</th>
                                            <th>Image</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th>Sort</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $category->name }}</td>
                                                <td>
                                                    @if ($category->is_service == 1)
                                                    <span class="badge badge-light-success">Service</span>
                                                    @endif
                                                    @if ($category->is_pro_bono == 1)
                                                    <span class="badge badge-light-warning">Pro-Bono</span>
                                                    @endif
                                                </td>
                                                <td><img class="rounded" width="60"
                                                        src="@if ($category->image) {{ Storage::url($category->image) }} @else {{ asset('defaults/noimage/no_img.jpg') }} @endif"
                                                        alt="{{ $category->name }}"></td>
                                                <td>{{ $category->description }}</td>
                                                <td>
                                                    @if ($category->status == 1)
                                                        <span class="badge badge-light-success">Active</span>
                                                    @else
                                                        <span class="badge badge-light-warning">Deactive</span>
                                                    @endif
                                                </td>
                                                <td>{{ $category->sort }}</td>
                                                <td>
                                                    <a class="me-1"
                                                        href="{{ route('service.category.edit', $category->id) }}"
                                                        data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                                        <i class="far fa-edit text-dark"></i>
                                                    </a>
                                                    <form class="d-inline" id="delForm" action="{{ route('service.category.destroy',$category->id) }}" method="POST">
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

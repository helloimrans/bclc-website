@extends('admin.layouts.master')
@section('title', 'Blog')
@section('content')

    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Blog</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Blog
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
                                <h5 class="mb-0">Blog</h5>
                            </div>
                            <div class="dt-action-buttons text-end">
                                <div class="dt-buttons d-inline-flex"><a href="{{ route('abrwn.blog.create') }}"
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
                                        @foreach ($abrwns as $abrwn)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ \Str::limit($abrwn->title,40) }}</td>
                                                <td><img class="rounded" width="60"
                                                    src="@if ($abrwn->thumbnail_image) {{ asset($abrwn->thumbnail_image) }} @else {{ asset('defaults/noimage/no_img.jpg') }} @endif"
                                                    alt="{{ $abrwn->title }}"></td>
                                                <td>
                                                    @if ($abrwn->is_abrwn == 1)
                                                        <span class="badge badge-light-success">Article</span>
                                                    @elseif($abrwn->is_abrwn == 2)
                                                        <span class="badge badge-light-warning">Blog</span>
                                                    @elseif($abrwn->is_abrwn == 3)
                                                        <span class="badge badge-light-success">Review</span>
                                                    @elseif($abrwn->is_abrwn == 4)
                                                        <span class="badge badge-light-success">Write Up</span>
                                                    @elseif($abrwn->is_abrwn == 5)
                                                        <span class="badge badge-light-success">News</span>
                                                    @endif
                                                </td>
                                                <td> {{ $abrwn->category->name ?? 'None' }}</td>
                                                <td>
                                                    @if ($abrwn->status == 1)
                                                        <span class="badge badge-light-success">Active</span>
                                                    @else
                                                        <span class="badge badge-light-warning">Deactive</span>
                                                    @endif
                                                </td>
                                                <td>{{ @$abrwn->createdBy->email }}</td>
                                                <td>{{ @$abrwn->updatedBy->email }}</td>
                                                <td>
                                                    <a class="me-1"
                                                        href="{{ route('abrwn.blog.edit', $abrwn->id) }}"
                                                        data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                                        <i class="far fa-edit text-dark"></i>
                                                    </a>
                                                    <form class="d-inline" id="delForm"
                                                        action="{{ route('abrwn.destroy', $abrwn->id) }}"
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

@extends('admin.layouts.master')
@section('title', 'Abrwn category')
@section('content')

    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start">Abrwn Category</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Abrwn Category
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
                                <h5 class="">Abrwn Category</h5>
                                <span><small>( Article, Blog, Review, Write Up, News )</small></span>
                            </div>
                            <div class="dt-action-buttons text-end">
                                <div class="dt-buttons d-inline-flex"><a href="{{ route('abrwn.category.create') }}"
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
                                                    @if ($category->is_article == 1)
                                                    <span class="badge badge-light-success">Article</span>
                                                    @endif
                                                    @if ($category->is_blog == 1)
                                                    <span class="badge badge-light-warning">Blog</span>
                                                    @endif
                                                    @if ($category->is_review == 1)
                                                    <span class="badge badge-light-success">Review</span>
                                                    @endif
                                                    @if ($category->is_writeup == 1)
                                                    <span class="badge badge-light-warning">Write Up</span>
                                                    @endif
                                                    @if ($category->is_news == 1)
                                                    <span class="badge badge-light-success">News</span>
                                                    @endif
                                                </td>
                                                <td><img class="rounded" width="60"
                                                        src="@if ($category->image) {{ asset($category->image) }} @else {{ asset('defaults/noimage/no_img.jpg') }} @endif"
                                                        alt="{{ $category->name }}"></td>
                                                <td>{{ \Str::limit($category->description,20) }}</td>
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
                                                        href="{{ route('abrwn.category.edit', $category->id) }}"
                                                        data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                                        <i class="far fa-edit text-dark"></i>
                                                    </a>
                                                    <form class="d-inline" id="delForm" action="{{ route('abrwn.category.destroy',$category->id) }}" method="POST">
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

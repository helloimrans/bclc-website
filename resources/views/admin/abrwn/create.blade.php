@php
    $route = Route::currentRouteName();
@endphp
@extends('admin.layouts.master')
@if($route == 'abrwn.edit')
        @section('title','Create ABRWN')
    @endif
    @if($route == 'abrwn.article.create')
        @section('title','Create Article')
    @endif
    @if($route == 'abrwn.blog.create')
        @section('title','Create Blog')
    @endif
    @if($route == 'abrwn.review.create')
        @section('title','Create Review')
    @endif
    @if($route == 'abrwn.write_up.create')
        @section('title','Create Write_up')
    @endif
    @if($route == 'abrwn.news.create')
        @section('title','Create News')
    @endif
@section('content')

    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">
                            @if($route == 'abrwn.create')
                                Create ABRWN
                            @endif
                            @if($route == 'abrwn.article.create')
                                Create Article
                            @endif
                            @if($route == 'abrwn.blog.create')
                                Create Blog
                            @endif
                            @if($route == 'abrwn.review.create')
                                Create Review
                            @endif
                            @if($route == 'abrwn.write_up.create')
                                Create Write_up
                            @endif
                            @if($route == 'abrwn.news.create')
                                Create News
                            @endif
                        </h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">
                                @if($route == 'abrwn.create')
                                    Create ABRWN
                                @endif
                                @if($route == 'abrwn.article.create')
                                    Create Article
                                @endif
                                @if($route == 'abrwn.blog.create')
                                    Create Blog
                                @endif
                                @if($route == 'abrwn.review.create')
                                    Create Review
                                @endif
                                @if($route == 'abrwn.write_up.create')
                                    Create Write_up
                                @endif
                                @if($route == 'abrwn.news.create')
                                    Create News
                                @endif
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
                    <div class="card p-2">
                        <div class="card-header">
                            <div class="head-label">
                                @if($route == 'abrwn.create')
                                        <h5 class="mb-0">Create ABRWN</h5>
                                        <span><small>( Article, Blog, Review, Write Up, News )</small></span>
                                @endif
                                @if($route == 'abrwn.article.create')
                                    <h5 class="mb-0">Create Article</h5>
                                @endif
                                @if($route == 'abrwn.blog.create')
                                    <h5 class="mb-0">Create Blog</h5>
                                @endif
                                @if($route == 'abrwn.review.create')
                                    <h5 class="mb-0">Create Review</h5>
                                @endif
                                @if($route == 'abrwn.write_up.create')
                                    <h5 class="mb-0">Create Write_up</h5>
                                @endif
                                @if($route == 'abrwn.news.create')
                                    <h5 class="mb-0">Create News</h5>
                                @endif
                            </div>
                            <div class="dt-action-buttons text-end">
                                <div class="dt-buttons d-inline-flex"><a href="{{ url()->previous() }}"
                                        class="btn btn-success btn-sm"><i data-feather='corner-up-left'></i> Back</a></div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('abrwn.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-1">
                                            <label class="form-label">Select Type</label>
                                            <select id="is_abrwn" name="is_abrwn"
                                                class="form-control @error('is_abrwn') is-invalid @enderror">
                                                <option value="">
                                                    Select Type
                                                </option>
                                                <option value="1">
                                                    Article
                                                </option>
                                                <option value="2">
                                                    Blog
                                                </option>
                                                <option value="3">
                                                    Review
                                                </option>
                                                <option value="4">
                                                    Write Up
                                                </option>
                                                <option value="5">
                                                    News
                                                </option>
                                            </select>
                                            @error('is_abrwn')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-1">
                                            <label class="form-label">Category</label>
                                            <select id="abrwn_category_id" name="abrwn_category_id"
                                                class="form-control @error('abrwn_category_id') is-invalid @enderror">
                                            </select>
                                            @error('abrwn_category_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-1">
                                    <label class="form-label" for="">Title</label>
                                    <input type="text" name="title" placeholder="Enter title"
                                        class="form-control @error('title') is-invalid @enderror"
                                        value="{{ old('title') }}">

                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                </div>

                                <div class="mb-1">
                                    <label class="form-label" for="">Description</label>
                                    <textarea name="description" rows="2" class="summernote @error('description') is-invalid @enderror"
                                        placeholder="Enter description">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-1">
                                            <label class="form-label">Thumbnail Image</label>
                                            <input type="file" id="upImgInput1" name="thumbnail_image"
                                                class="form-control @error('thumbnail_image') is-invalid @enderror">
                                            @error('thumbnail_image')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-1">
                                            <img src="{{ asset('defaults/noimage/no_img.jpg') }}" id="upImg1"
                                                class="upImg1 rounded me-50 border" alt="profile image" height="100">
                                        </div>
                                        <div class="mb-1">
                                            <button type="button" id="upImgReset1"
                                                class="btn btn-sm btn-outline-secondary mb-75 waves-effect">Reset</button>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-1">
                                            <label class="form-label">Status</label>
                                            <select name="status" class="form-control">
                                                <option value="1" @if (old('status') == '1') selected @endif>
                                                    Active
                                                </option>
                                                <option value="0" @if (old('status') == '0') selected @endif>
                                                    Deactive
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-2 float-end">
                                    <button type="submit" class="btn btn-info sub-btn"><i data-feather='save'></i>
                                        Save</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


@section('scripts')
    <script>
        $(function() {
            $(document).on('change', '#is_abrwn', function() {
                var id = $(this).val();
                if (id == '') {
                    var html = '<option value="">Select Category</option>';
                    $('#abrwn_category_id').html(html);
                } else {
                    $.ajax({
                        type: "Get",
                        url: "{{ url('/get/abrwn/category') }}/" + id,
                        dataType: "json",
                        success: function(data) {
                            var html = '<option value="">Select Category</option>';
                            $.each(data, function(key, val) {
                                html += '<option value="' + val.id + '">' + val
                                    .name + '</option>';
                            });
                            $('#abrwn_category_id').html(html);
                        },
                    });
                }

            });
        });
    </script>

@endsection
@endsection

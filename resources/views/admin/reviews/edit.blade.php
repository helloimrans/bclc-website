@php
    $route = Route::currentRouteName();
@endphp
@extends('admin.layouts.master')
@section('title','Edit Review')
@section('content')

    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">
                            Edit Review
                        </h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    Edit Review
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
                                <h5 class="mb-0">Edit Review</h5>
                            </div>
                            <div class="dt-action-buttons text-end">
                                <div class="dt-buttons d-inline-flex"><a href="{{route('reviews.index')}}"
                                        class="btn btn-success btn-sm"><i data-feather='corner-up-left'></i> Back</a></div>
                            </div>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('reviews.update', $review->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-1">
                                            <label class="form-label">Writer</label>
                                            <select id="user_id" name="user_id"
                                                class="form-control select2 @error('user_id') is-invalid @enderror">
                                                <option value="">Select</option>
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->id }}"
                                                        {{ old('user_id', $review->user_id) == $user->id ? 'selected' : '' }}>
                                                        {{ $user->name }}
                                                        {{ $user->designation ? "($user->designation)" : '' }}</option>
                                                @endforeach
                                            </select>
                                            @error('user_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-1">
                                            <label class="form-label">Category</label>
                                            <select id="review_category_id" name="review_category_id"
                                                class="form-control @error('review_category_id') is-invalid @enderror">
                                                <option value="">Select</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}" @if (old('review_category_id',$review->review_category_id) == $category->id) @selected(true) @endif>{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('review_category_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-1">
                                            <label class="form-label" for="">Title</label>
                                            <input type="text" name="title" placeholder="Enter title"
                                                class="form-control @error('title') is-invalid @enderror"
                                                value="{{ old('title', $review->title) }}">

                                            @error('title')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror

                                        </div>
                                    </div>
                                </div>

                                <div class="mb-1">
                                    <label class="form-label" for="">Description</label>
                                    <textarea name="description" rows="2" class="summernote @error('description') is-invalid @enderror"
                                        placeholder="Enter description">{{ old('description', $review->description) }}</textarea>
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
                                            <img src="@if ($review->thumbnail_image) {{ Storage::url($review->thumbnail_image) }}
                                            @else
                                            {{ asset('defaults/noimage/no_img.jpg') }} @endif"
                                                id="upImg1" class="upImg1 rounded me-50 border" alt="image"
                                                height="100">
                                        </div>
                                        <div class="mb-1">
                                            <button type="button" id="upImgReset1"
                                                class="btn btn-sm btn-outline-secondary mb-75 waves-effect">Reset</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-2 float-end">
                                    <button type="submit" class="btn btn-info sub-btn"><i data-feather='save'></i>
                                        Update</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

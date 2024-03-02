@php
    $route = Route::currentRouteName();
@endphp
@extends('admin.layouts.master')
@section('title','Edit Article')
@section('content')

    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">
                            Edit Article
                        </h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    Edit Article
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
                                <h5 class="mb-0">Edit Article</h5>
                            </div>
                            <div class="dt-action-buttons text-end">
                                <div class="dt-buttons d-inline-flex"><a href="{{route('articles.index')}}"
                                        class="btn btn-success btn-sm"><i data-feather='corner-up-left'></i> Back</a></div>
                            </div>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('articles.update', $article->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-1">
                                            <label class="form-label">Category</label>
                                            <select id="article_category_id" name="article_category_id"
                                                class="form-control @error('article_category_id') is-invalid @enderror">
                                                <option value="">Select</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}" @if (old('article_category_id',$article->article_category_id) == $category->id) @selected(true) @endif>{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('article_category_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-1">
                                            <label class="form-label" for="">Title</label>
                                            <input type="text" name="title" placeholder="Enter title"
                                                class="form-control @error('title') is-invalid @enderror"
                                                value="{{ old('title', $article->title) }}">

                                            @error('title')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror

                                        </div>
                                    </div>
                                </div>

                                <div class="mb-1">
                                    <label class="form-label" for="">Description</label>
                                    <textarea name="description" rows="2" class="summernote @error('description') is-invalid @enderror"
                                        placeholder="Enter description">{{ old('description', $article->description) }}</textarea>
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
                                            <img src="@if ($article->thumbnail_image) {{ Storage::url($article->thumbnail_image) }}
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

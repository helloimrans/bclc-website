@extends('admin.layouts.master')
@section('title', 'Edit Review Category')
@section('content')

    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Edit Review Category</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Edit Review Category
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
                                <h5 class="mb-0">Edit Review Category</h5>
                            </div>
                            <div class="dt-action-buttons text-end">
                                <div class="dt-buttons d-inline-flex"><a href="{{ route('review.categories.index') }}"
                                        class="btn btn-success btn-sm"><i data-feather='corner-up-left'></i> Back</a></div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('review.categories.update', $category->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-1">
                                    <label class="form-label" for="">Name</label>
                                    <input type="text" name="name" placeholder="Enter name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name', $category->name) }}">

                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}
                                        </div>
                                    @enderror

                                </div>

                                <div class="mb-1">
                                    <label class="form-label" for="">Description</label>
                                    <textarea name="description" rows="2" class="form-control @error('description') is-invalid @enderror"
                                        placeholder="Enter description">{{ old('description', $category->description) }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-1">
                                            <label class="form-label">Sort</label>
                                            <input type="number" min="0" placeholder="[0,1,2,3]"
                                                class="form-control @error('sort') is-invalid @enderror" name="sort"
                                                value="{{ old('sort', $category->sort) }}">
                                            @error('sort')
                                                <div class="invalid-feedback">
                                                    {{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-1">
                                            <label class="form-label">Status</label>
                                            <select name="is_active" class="form-control">
                                                <option value="1" @if (old('is_active', $category->is_active) == 1) selected @endif>
                                                    Active
                                                </option>
                                                <option value="0" @if (old('is_active', $category->is_active) == 0) selected @endif>
                                                    Deactive
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-1">
                                            <label class="form-label">Image</label>
                                            <input type="file" id="upImgInput2" name="image"
                                                class="form-control @error('image') is-invalid @enderror">
                                            @error('image')
                                                <div class="invalid-feedback">
                                                    {{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-1">
                                            <img src="@if ($category->image) {{ Storage::url($category->image) }}
                                                                                @else
                                                                                {{ asset('defaults/noimage/no_img.jpg') }} @endif"
                                                id="upImg2" class="upImg2 rounded me-50 border" alt="profile image"
                                                height="100">
                                        </div>
                                        <div class="mb-1">
                                            <button type="button" id="upImgReset2"
                                                class="btn btn-sm btn-outline-secondary mb-75 waves-effect">Reset</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-2 text-end">
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
@extends('admin.layouts.master')
@section('title', 'Create Service Category')
@section('content')

    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Create Service Category</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Create Service Category
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
                                <h5 class="mb-0">Create Service Category</h5>
                            </div>
                            <div class="dt-action-buttons text-end">
                                <div class="dt-buttons d-inline-flex"><a href="{{ route('service.category.index') }}"
                                        class="btn btn-success btn-sm"><i data-feather='corner-up-left'></i> Back</a></div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('office.category.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="mb-1">
                                    <label class="form-label" for="">Name</label>
                                    <input type="text" name="name" placeholder="Enter name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name') }}">

                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                </div>

                                <div class="mb-1">
                                    <label class="form-label" for="">Description</label>
                                    <textarea name="description" rows="2" class="form-control @error('description') is-invalid @enderror"
                                        placeholder="Enter description">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-1">
                                            <label class="form-label">Sort</label>
                                            <input type="number" min="0" placeholder="[0,1,2,3]"
                                                class="form-control @error('sort') is-invalid @enderror" name="sort"
                                                value="{{ old('sort') }}">
                                            @error('sort')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
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
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-1">
                                            <label class="form-label">Image</label>
                                            <input type="file" id="upImgInput1" name="image"
                                                class="form-control @error('image') is-invalid @enderror"
                                                value="{{ old('image') }}">
                                            @error('image')
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
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="card border">
                                            <div class="card-header">
                                                <h6>Category Type</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="d-flex flex-column">
                                                            <label class="form-check-label mb-50"
                                                                for="customSwitch10">Service Category</label>
                                                            <div class="form-check form-switch form-check-success">
                                                                <input type="checkbox" class="form-check-input"  id="customSwitch10" value="1" name="is_service"
                                                                @if (old('is_service') == '1') checked @endif  />
                                                                <label class="form-check-label" for="customSwitch10">
                                                                    <span class="switch-icon-left"><i
                                                                            data-feather="check"></i></span>
                                                                    <span class="switch-icon-right"><i
                                                                            data-feather="x"></i></span>
                                                                </label>
                                                            </div>
                                                        </div>

                                                        @error('is_service')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="d-flex flex-column">
                                                            <label class="form-check-label mb-50"
                                                                for="customSwitch11">Pro-Bono Category</label>
                                                            <div class="form-check form-switch form-check-success">
                                                                <input type="checkbox" class="form-check-input"
                                                                    id="customSwitch11" name="is_pro_bono"
                                                                    value="1"  @if (old('is_pro_bono') == '1') checked @endif  />
                                                                <label class="form-check-label" for="customSwitch11">
                                                                    <span class="switch-icon-left"><i
                                                                            data-feather="check"></i></span>
                                                                    <span class="switch-icon-right"><i
                                                                            data-feather="x"></i></span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        @error('is_pro_bono')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
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
@endsection

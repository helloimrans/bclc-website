@extends('admin.layouts.master')
@section('title', 'Service & Facility Category')
@section('content')

    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Service & Facility Category</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Service & Facility Category
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
                                <h5 class="mb-0">Service & Facility Category</h5>
                            </div>
                            <div class="dt-action-buttons text-end">
                                <div class="dt-buttons d-inline-flex"><a href="{{ route('service-&-facility.index') }}" class="btn btn-success btn-sm"><i data-feather='corner-up-left'></i> Back</a></div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('service-&-facility.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-1">
                                            <label class="form-label">Service & Facility Category</label>
                                            <select id="service_facility_category_id" name="service_facility_category_id"
                                                class="form-control @error('service_facility_category_id') is-invalid @enderror">
                                                <option value="" selected hidden>
                                                    Select Service & Facility Category
                                                </option>
                                                @foreach ($service_facility_cats as $sf_cat)
                                                <option value="{{ $sf_cat->id }}">{{ $sf_cat->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('service_facility_category_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-1">
                                            <label class="form-label" for="">Service</label>
                                            <input type="text" name="service" placeholder="Enter service"
                                                class="form-control @error('service') is-invalid @enderror" value="{{ old('service') }}">
        
                                            @error('service')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
        
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-1">
                                    <label class="form-label" for="">Title</label>
                                    <input type="text" name="title" placeholder="Enter title"
                                        class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">

                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <label class="form-label" for="">Authority</label>
                                    <input type="text" name="authority" placeholder="Enter authority"
                                        class="form-control @error('authority') is-invalid @enderror" value="{{ old('authority') }}">

                                    @error('authority')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <label class="form-label" for="">Contact Info</label>
                                    <input type="text" name="contact_info" placeholder="Enter contact info"
                                        class="form-control @error('contact_info') is-invalid @enderror" value="{{ old('contact_info') }}">

                                    @error('contact_info')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <label class="form-label" for="">Source Link</label>
                                    <input type="text" name="source_link" placeholder="Enter source link"
                                        class="form-control @error('source_link') is-invalid @enderror" value="{{ old('source_link') }}">

                                    @error('source_link')
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
                                <div class="mb-1">
                                    <label class="form-label">Select File</label>
                                    <input type="file" name="file"
                                        class="form-control @error('file') is-invalid @enderror">
                                    @error('file')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <label class="form-label">Status</label>
                                    <select name="status" class="form-control">
                                        <option value="1" @if (old('status') == '1') selected @endif>Active
                                        </option>
                                        <option value="0" @if (old('status') == '0') selected @endif>Deactive
                                        </option>
                                    </select>
                                </div>


                                <div class="mt-2 text-end">
                                    <button type="submit" class="btn btn-info sub-btn"><i class="fa fa-save"></i> Save</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

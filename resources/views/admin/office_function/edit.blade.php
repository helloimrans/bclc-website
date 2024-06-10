@extends('admin.layouts.master')
@section('title', 'Edit Office & Function')
@section('content')

    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Edit Office & Function</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Edit Office & Function
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
                                <h5 class="mb-0">Edit Office & Function</h5>
                            </div>
                            <div class="dt-action-buttons text-end">
                                <div class="dt-buttons d-inline-flex"><a href="{{ route('office.function.index') }}"
                                        class="btn btn-success btn-sm"><i data-feather='corner-up-left'></i> Back</a></div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('office.function.update', $office_function->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-1">
                                            <label class="form-label">Sector</label>
                                            <select id="office_function_sector_id" name="office_function_sector_id"
                                                class="form-control @error('office_function_sector_id') is-invalid @enderror">
                                                <option value="">
                                                    Select Sector
                                                </option>
                                                @foreach ($of_sectors as $of_sector)
                                                    <option value="{{ $of_sector->id }}"@if ($of_sector->id == $office_function->office_function_sector_id) selected @endif>{{ $of_sector->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('office_function_sector_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-1">
                                            <label class="form-label">Category</label>
                                            <select id="office_function_category_id" name="office_function_category_id"
                                                class="form-control @error('office_function_category_id') is-invalid @enderror">
                                                <option value="">
                                                    Select Category
                                                </option>
                                                @foreach ($of_categories as $of_category)
                                                    <option value="{{ $of_category->id }}"
                                                        @if ($of_category->id == $office_function->office_function_category_id) selected @endif>
                                                        {{ $of_category->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('office_function_category_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-1">
                                    <label class="form-label" for="">Title</label>
                                    <input type="text" name="title" placeholder="Enter title"
                                        class="form-control @error('title') is-invalid @enderror"
                                        value="{{ old('title', $office_function->title) }}">

                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <label class="form-label" for="">Ministry/Dept./Authority</label>
                                    <input type="text" name="ministry_dept_authority" placeholder="Enter authority"
                                        class="form-control @error('ministry_dept_authority') is-invalid @enderror"
                                        value="{{ old('ministry_dept_authority', $office_function->ministry_dept_authority) }}">

                                    @error('ministry_dept_authority')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <label class="form-label" for="">Address/Remarks</label>
                                    <input type="text" name="address" placeholder="Enter address"
                                        class="form-control @error('address') is-invalid @enderror"
                                        value="{{ old('address', $office_function->address) }}">

                                    @error('address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <label class="form-label" for="">Communications</label>
                                    <textarea name="communications" rows="2" class="summernote @error('communications') is-invalid @enderror"
                                        placeholder="Enter...">{{ old('communications',$office_function->communications) }}</textarea>
                                    @error('communications')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <label class="form-label" for="">Activities/Services/Functions</label>
                                    <textarea name="service" rows="2" class="summernote @error('service') is-invalid @enderror"
                                        placeholder="Enter activities/service/functions">{{ old('service', $office_function->service) }}</textarea>
                                    @error('service')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <label class="form-label" for="">Description</label>
                                    <textarea name="description" rows="2" class="summernote @error('description') is-invalid @enderror"
                                        placeholder="Enter description">{{ old('description', $office_function->description) }}</textarea>
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
                                    <label class="form-label" for="">Sort</label>
                                    <input type="number" name="sort" placeholder="Enter sort"
                                        class="form-control @error('sort') is-invalid @enderror"
                                        value="{{ old('sort', $office_function->sort) }}">

                                    @error('sort')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                </div>
                                <div class="mb-1">
                                    <label class="form-label">Status</label>
                                    <select name="status" class="form-control">
                                        <option value="1" @if (old('status', $office_function->status) == '1') selected @endif>Active
                                        </option>
                                        <option value="0" @if (old('status', $office_function->status) == '0') selected @endif>Deactive
                                        </option>
                                    </select>
                                </div>


                                <div class="mt-2 text-end">
                                    <button type="submit" class="btn btn-info sub-btn"><i class="fa fa-save"></i>
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

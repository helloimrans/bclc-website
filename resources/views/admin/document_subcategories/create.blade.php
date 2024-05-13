@extends('admin.layouts.master')
@section('title', 'Create Document SubCategory')
@section('content')

    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Create Document SubCategory</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Create Document SubCategory
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
                                <h5 class="mb-0">Create Document SubCategory</h5>
                            </div>
                            <div class="dt-action-buttons text-end">
                                <div class="dt-buttons d-inline-flex"><a href="{{ route('document.subcategories.index') }}"
                                        class="btn btn-success btn-sm"><i data-feather='corner-up-left'></i> Back</a></div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('document.subcategories.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-1">
                                            <label class="form-label">Categories</label>
                                            <select id="document_category_id" name="document_category_id"
                                                class="form-control @error('document_category_id') is-invalid @enderror">
                                                <option value="" selected hidden>
                                                    Select Category
                                                </option>
                                                @foreach ($categories as $cat)
                                                <option value="{{ $cat->id }}">
                                                    {{ $cat->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('document_category_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-1">
                                            <label class="form-label" for="">Name</label>
                                            <input type="text" name="name" placeholder="Enter name"
                                                class="form-control @error('name') is-invalid @enderror"
                                                value="{{ old('name') }}">
        
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
        
                                        </div>
                                    </div>
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
                                    <div class="mt-2 float-end">
                                        <button type="submit" class="btn btn-info sub-btn"><i data-feather='save'></i>
                                            Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

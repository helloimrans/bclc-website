@extends('admin.layouts.master')
@section('title', 'Edit Profession')
@section('content')

    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Edit Profession</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Edit Profession
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
                                <h5 class="mb-0">Edit Profession</h5>
                            </div>
                            <div class="dt-action-buttons text-end">
                                <div class="dt-buttons d-inline-flex"><a href="{{ route('profession.index') }}"
                                        class="btn btn-success btn-sm"><i data-feather='corner-up-left'></i> Back</a></div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('profession.update', $profession->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-1">
                                    <label class="form-label" for="">Name</label>
                                    <input type="text" name="name" placeholder="Enter name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name', $profession->name) }}">

                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}
                                        </div>
                                    @enderror

                                </div>
                                <div class="mb-1">
                                    <label class="form-label" for="">Sort</label>
                                    <input type="number" name="sort" placeholder="Enter sort"
                                        class="form-control @error('sort') is-invalid @enderror"
                                        value="{{ old('sort', $profession->sort) }}">

                                    @error('sort')
                                        <div class="invalid-feedback">{{ $message }}
                                        </div>
                                    @enderror

                                </div>
                                <div class="mb-1">
                                    <label class="form-label">Status</label>
                                    <select name="status" class="form-control">
                                        <option value="1" @if (old('status', $profession->status) == '1') selected @endif>
                                            Active
                                        </option>
                                        <option value="0" @if (old('status', $profession->status) == '0') selected @endif>
                                            Deactive
                                        </option>
                                    </select>
                                </div>
                                <div class="mt-2 text-end">
                                    <button type="submit" class="btn btn-info sub-btn"><i data-feather='save'></i>Update</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

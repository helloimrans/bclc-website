@extends('admin.layouts.master')
@section('title', 'Edit ABRWN')
@section('content')

    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Edit ABRWN</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Edit ABRWN
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
                                <h5 class="mb-0">Edit ABRWN</h5>
                                <span><small>( Article, Blog, Review, Write Up, News )</small></span>
                            </div>
                            <div class="dt-action-buttons text-end">
                                <div class="dt-buttons d-inline-flex"><a href="{{ route('abrwn.index') }}"
                                        class="btn btn-success btn-sm"><i data-feather='corner-up-left'></i> Back</a></div>
                            </div>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('abrwn.update', $abrwn->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-1">
                                            <label class="form-label">Select Type</label>
                                            <select id="is_abrwn" name="is_abrwn"
                                                class="form-control @error('is_abrwn') is-invalid @enderror">
                                                <option value="">
                                                    Select Type
                                                </option>
                                                <option value="1" @if ($abrwn->is_abrwn == 1) selected @endif>
                                                    Article
                                                </option>
                                                <option value="2" @if ($abrwn->is_abrwn == 2) selected @endif>
                                                    Blog
                                                </option>
                                                <option value="3" @if ($abrwn->is_abrwn == 3) selected @endif>
                                                    Review
                                                </option>
                                                <option value="4" @if ($abrwn->is_abrwn == 4) selected @endif>
                                                    Write Up
                                                </option>
                                                <option value="5" @if ($abrwn->is_abrwn == 5) selected @endif>
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
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        @if ($abrwn->abrwn_category_id == $category->id) @selected(true) @endif>
                                                        {{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('service_category_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-1">
                                    <label class="form-label" for="">Title</label>
                                    <input type="text" name="title" placeholder="Enter title"
                                        class="form-control @error('title') is-invalid @enderror"
                                        value="{{ old('title', $abrwn->title) }}">

                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                </div>

                                <div class="mb-1">
                                    <label class="form-label" for="">Description</label>
                                    <textarea name="description" rows="2" class="summernote @error('description') is-invalid @enderror"
                                        placeholder="Enter description">{{ old('description', $abrwn->description) }}</textarea>
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
                                            <img src="@if ($abrwn->thumbnail_image) {{ asset($abrwn->thumbnail_image) }}
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
                                        Update</button>
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

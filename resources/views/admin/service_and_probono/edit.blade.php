@extends('admin.layouts.master')
@section('title', 'Edit Service or Pro-Bono')
@section('content')

    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Edit Service or Pro-Bono</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Edit Service or Pro-Bono
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
                                <h5 class="mb-0">Edit Service or Pro-Bono</h5>
                            </div>
                            <div class="dt-action-buttons text-end">
                                <div class="dt-buttons d-inline-flex"><a href="{{ route('service.index') }}"
                                        class="btn btn-success btn-sm"><i data-feather='corner-up-left'></i> Back</a></div>
                            </div>
                        </div>
                        <div class="card-body">
                            @if (count($errors->get('slider_images.*')) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{ route('service.update', $service->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-1">
                                            <label class="form-label">Select Type</label>
                                            <select id="is_service" name="is_service"
                                                class="form-control @error('is_service') is-invalid @enderror">
                                                <option value="">
                                                    Select Type
                                                </option>
                                                <option value="1"
                                                    @if ($service->is_service == '1') @selected(true) @endif>
                                                    Service
                                                </option>
                                                <option value="2"
                                                    @if ($service->is_service == '2') @selected(true) @endif>
                                                    Pro-Bono
                                                </option>
                                            </select>
                                            @error('is_service')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-1">
                                            <label class="form-label">Category</label>
                                            <select id="service_category_id" name="service_category_id"
                                                class="form-control @error('service_category_id') is-invalid @enderror">
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        @if ($service->service_category_id == $category->id) @selected(true) @endif>
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
                                        value="{{ old('title', $service->title) }}">

                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                </div>

                                <div class="mb-1">
                                    <label class="form-label" for="">Description</label>
                                    <textarea name="description" rows="2" class="summernote @error('description') is-invalid @enderror"
                                        placeholder="Enter description">{{ old('description', $service->description) }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="mb-1">
                                            <label class="form-label">Thumbnail Image</label>
                                            <input type="file" id="upImgInput1" name="thumbnail_image"
                                                class="form-control @error('thumbnail_image') is-invalid @enderror">
                                            @error('thumbnail_image')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-1">
                                            <img src="@if ($service->thumbnail_image) {{ asset($service->thumbnail_image) }}
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
                                    <div class="col-md-7">
                                        <div class="mb-1">
                                            <label class="form-label">Select Multiple Image For Slider</label>
                                            <input type="file" name="slider_images[]"
                                                class="form-control @error('slider_images') is-invalid @enderror" multiple>
                                            @error('slider_images')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="row">
                                            @foreach ($service->images as $image)
                                                <div class="col-sm-4 col-md-3">
                                                    <div class="mb-1 text-center border rounded">
                                                        <img src=" {{ asset($image->image) }}"
                                                            class="rounded me-50 border-bottom img-fluid" alt="image">
                                                        <a id="confirm_first"
                                                            href="{{ route('service.image.remove', $image->id) }}"
                                                            class="text-danger"><span>Delete</span></a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-1">
                                    <label class="form-label">Select Associated Service</label>
                                    <select name="associated_service[]" class="select2 form-select" multiple>
                                        @foreach ($associated_services as $associated_service)
                                            <option value="{{ $associated_service->id }}"
                                                @foreach ($service->associated_service as $ass) {{ $ass->pivot->associated_service_id == $associated_service->id ? 'selected' : '' }} @endforeach>
                                                {{ $associated_service->title }}</option>
                                        @endforeach
                                        </optgroup>
                                    </select>
                                    @error('associated_service')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>

                                <div class="mb-1">
                                    <label class="form-label">Select Keywords</label>
                                    <select name="keywords[]" class="select2 form-select" multiple>
                                        <optgroup label="Select Keywords">
                                            @foreach ($keywords as $keyword)
                                                <option value="{{ $keyword->id }}"
                                                    @foreach ($service->keywords as $kwd) {{ $kwd->pivot->keyword_id == $keyword->id ? 'selected' : '' }} @endforeach>
                                                    {{ $keyword->title }}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                    @error('keywords')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>

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
            $(document).on('change', '#is_service', function() {
                var id = $(this).val();
                if (id == '') {
                    var html = '<option value="">Select Category</option>';
                    $('#service_category_id').html(html);
                } else {
                    $.ajax({
                        type: "Get",
                        url: "{{ url('/get/service/category') }}/" + id,
                        dataType: "json",
                        success: function(data) {
                            var html = '<option value="">Select Category</option>';
                            $.each(data, function(key, val) {
                                html += '<option value="' + val.id + '">' + val
                                    .name + '</option>';
                            });
                            $('#service_category_id').html(html);
                        },
                    });
                }

            });
        });
    </script>

@endsection
@endsection

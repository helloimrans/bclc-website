@extends('admin.layouts.master')
@section('title', 'Create Documents')
@section('content')

    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Create Documents</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Create Documents
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
                                <h5 class="mb-0">Create Documents</h5>
                            </div>
                            <div class="dt-action-buttons text-end">
                                <div class="dt-buttons d-inline-flex"><a href="{{route('document.index')}}"
                                        class="btn btn-success btn-sm"><i data-feather='corner-up-left'></i> Back</a></div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('document.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-1">
                                            <label class="form-label">Category</label>
                                            <select id="document_category_id" name="document_category_id"
                                                class="form-control @error('document_category_id') is-invalid @enderror">
                                                <option value="">Select</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}" {{old('document_category_id') ? 'selected' : ''}} >{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('document_category_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-1">
                                            <label class="form-label">SubCategory</label>
                                            <select id="document_sub_category_id" name="document_sub_category_id"
                                                class="form-control @error('document_sub_category_id') is-invalid @enderror">
                                                <option value="">Select SubCategory</option>
                                            </select>
                                            @error('document_sub_category_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-1">
                                            <label class="form-label" for="">Title</label>
                                            <input type="text" name="title" placeholder="Enter title"
                                                class="form-control @error('title') is-invalid @enderror"
                                                value="{{ old('title') }}">

                                            @error('title')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-1">
                                            <label class="form-label">File</label>
                                            <input type="file" id="file" name="file"
                                                class="form-control @error('file') is-invalid @enderror">
                                            @error('file')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-1">
                                    <label class="form-label" for="">Description</label>
                                    <textarea name="description" rows="2" class="form-control @error('description') is-invalid @enderror"
                                        placeholder="Enter description">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
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

@section('scripts')
    <script>
        $(function() {
            $(document).on('change', '#document_category_id', function() {
                var id = $(this).val();
                if (id == '') {
                    var html = '<option value="">Select SubCategory</option>';
                    $('#document_sub_category_id').html(html);
                } else {
                    $.ajax({
                        type: "Get",
                        url: "{{ url('/dashboard/document-subcategories/get-by-category/') }}/" + id,
                        dataType: "json",
                        success: function(data) {
                            var html = '<option value="">Select SubCategory</option>';
                            $.each(data, function(key, val) {
                                html += '<option value="' + val.id + '">' + val
                                    .name + '</option>';
                            });
                            $('#document_sub_category_id').html(html);
                        },
                    });
                }

            });
        });
    </script>

@endsection

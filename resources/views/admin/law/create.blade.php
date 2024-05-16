@extends('admin.layouts.master')
@section('title', 'Create Laws & Rules')
@section('content')

    <style>
        .default_lang_show {
            display: none;
        }
    </style>

    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Create Laws & Rules</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Create Laws & Rules
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
                                <h5 class="mb-0">Create Laws & Rules</h5>
                            </div>
                            <div class="dt-action-buttons text-end">
                                <div class="dt-buttons d-inline-flex"><a href="{{ route('law.index') }}"
                                        class="btn btn-success btn-sm"><i data-feather='corner-up-left'></i> Back</a></div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('law.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-1">
                                    <label class="form-label">Category</label>
                                    <select name="law_category_id"
                                        class="form-control @error('law_category_id') is-invalid @enderror">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('law_category_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="row">
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
                                            <label class="form-label" for="">Sort Form</label>
                                            <input type="text" name="short_form" placeholder="Enter short form"
                                                class="form-control @error('short_form') is-invalid @enderror"
                                                value="{{ old('short_form') }}">

                                            @error('short_form')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-1">
                                            <label class="form-label" for="">Act No</label>
                                            <input type="text" name="act_no" placeholder="Enter act no"
                                                class="form-control @error('act_no') is-invalid @enderror"
                                                value="{{ old('act_no') }}">

                                            @error('act_no')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-1">
                                            <label class="form-label" for="">Act Year</label>
                                            <input type="test" name="act_year" placeholder="Enter act year"
                                                class="form-control @error('act_no') is-invalid @enderror"
                                                value="{{ old('act_year') }}">

                                            @error('act_year')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-1">
                                            <label class="form-label" for="">Act Date</label>
                                            <input type="date" name="act_date" placeholder="Enter act date"
                                                class="form-control @error('act_date') is-invalid @enderror"
                                                value="{{ old('act_date') }}">

                                            @error('act_date')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-1">
                                            <label class="form-label" for="">Last Amendment</label>
                                            <input type="date" name="last_amendment"
                                                class="form-control @error('last_amendment') is-invalid @enderror"
                                                value="{{ old('last_amendment') }}">

                                            @error('last_amendment')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-1">
                                            <label class="form-label" for="">Total Part</label>
                                            <input type="text" name="total_part" placeholder="Enter total part"
                                                class="form-control @error('total_part') is-invalid @enderror"
                                                value="{{ old('total_part') }}">

                                            @error('total_part')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-1">
                                            <label class="form-label" for="">Total Chapter</label>
                                            <input type="text" name="total_chapter" placeholder="Enter total chapter"
                                                class="form-control @error('total_chapter') is-invalid @enderror"
                                                value="{{ old('total_chapter') }}">

                                            @error('total_chapter')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-1">
                                            <label class="form-label" for="">Total Section</label>
                                            <input type="text" name="total_section" placeholder="Enter total section"
                                                class="form-control @error('total_section') is-invalid @enderror"
                                                value="{{ old('total_section') }}">

                                            @error('total_section')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-1">
                                            <label class="form-label" for="">Total Schedule</label>
                                            <input type="text" name="total_schedule"
                                                placeholder="Enter total schedule"
                                                class="form-control @error('total_schedule') is-invalid @enderror"
                                                value="{{ old('total_schedule') }}">

                                            @error('total_schedule')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-1">
                                            <label class="form-label" for="">Total Form</label>
                                            <input type="text" name="total_form" placeholder="Enter total form"
                                                class="form-control @error('total_form') is-invalid @enderror"
                                                value="{{ old('total_form') }}">

                                            @error('total_form')
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

                                </div>


                                <div class="mb-1">
                                    <label class="form-label" for="">Description</label>
                                    <textarea name="description" rows="2" class="summernote @error('description') is-invalid @enderror"
                                        placeholder="Enter description">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="card border">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="d-flex flex-column mb-2">
                                                            <label class="form-check-label mb-50"
                                                                for="customSwitch10"><strong>Law Format</strong></label>
                                                            <div class="form-check mb-1">
                                                                <input class="form-check-input" type="radio"
                                                                    name="format" id="part_chapter_section"
                                                                    value="part_chapter_section" checked>
                                                                <label class="form-check-label"
                                                                    for="part_chapter_section">
                                                                    Part > Chapter > Section
                                                                </label>
                                                            </div>
                                                            <div class="form-check mb-1">
                                                                <input class="form-check-input" type="radio"
                                                                    name="format" id="part_section"
                                                                    value="part_section" {{old('format')=="part_section" ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="part_section">
                                                                    Part > Section
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="format" id="chapter_section"
                                                                    value="chapter_section" {{old('format')=="chapter_section" ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="chapter_section">
                                                                    Chapter > Section
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="d-flex flex-column mb-2">
                                                            <label class="form-check-label mb-50"
                                                                for="customSwitch10"><strong>Language</strong></label>
                                                            <div class="form-check mb-1">
                                                                <input class="form-check-input" type="radio"
                                                                    name="lang" id="en" value="en" checked>
                                                                <label class="form-check-label" for="en">
                                                                    English
                                                                </label>
                                                            </div>
                                                            <div class="form-check mb-1">
                                                                <input class="form-check-input" type="radio"
                                                                    name="lang" id="bn" value="bn" {{old('lang')=="bn" ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="bn">
                                                                    Bangla
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="lang" id="both" value="both" {{old('lang')=="both" ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="both">
                                                                    Both
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="default_lang_show"
                                                        @if (old('lang') == 'both') style="display:block;" @else style="display:none;" @endif>
                                                            <div class="d-flex flex-column mb-2">
                                                                <label class="form-check-label mb-50"
                                                                    for="customSwitch10"><strong>Default
                                                                        Language</strong></label>
                                                                <div class="form-check mb-1">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="default_lang" id="den"
                                                                        value="en" checked>
                                                                    <label class="form-check-label" for="den">
                                                                        English
                                                                    </label>
                                                                </div>
                                                                <div class="form-check mb-1">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="default_lang" id="dbn"
                                                                        value="bn" {{old('default_lang')=="bn" ? 'checked' : '' }}>
                                                                    <label class="form-check-label" for="dbn">
                                                                        Bangla
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="card border">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="d-flex flex-column mb-2">
                                                            <label class="form-check-label mb-50"
                                                                for="customSwitch10"><strong>Are there
                                                                    rules?</strong></label>
                                                            <div class="form-check form-switch form-check-success">
                                                                <input type="checkbox"
                                                                    class="form-check-input rules_status"
                                                                    id="customSwitch10" value="1" name="is_rules"
                                                                    @if (old('is_rules') == '1') checked @endif />
                                                                <label class="form-check-label" for="customSwitch10">
                                                                    <span class="switch-icon-left"><i
                                                                            data-feather="check"></i></span>
                                                                    <span class="switch-icon-right"><i
                                                                            data-feather="x"></i></span>
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="rules_show mt-3"
                                                            @if (old('is_rules') == 1) style="display:block;" @else style="display:none;" @endif>

                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="mb-1">
                                                                        <label class="form-label" for="">Rules
                                                                            No</label>
                                                                        <input type="test" name="rules_no"
                                                                            placeholder="Enter rules no"
                                                                            class="form-control @error('rules_no') is-invalid @enderror"
                                                                            value="{{ old('rules_no') }}">

                                                                        @error('rules_no')
                                                                            <div class="invalid-feedback">{{ $message }}
                                                                            </div>
                                                                        @enderror

                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="mb-1">
                                                                        <label class="form-label" for="">Rules
                                                                            Title</label>
                                                                        <input type="test" name="rules_title"
                                                                            placeholder="Enter rules title"
                                                                            class="form-control @error('rules_title') is-invalid @enderror"
                                                                            value="{{ old('rules_title') }}">

                                                                        @error('rules_title')
                                                                            <div class="invalid-feedback">{{ $message }}
                                                                            </div>
                                                                        @enderror

                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="mb-1">
                                                                        <label class="form-label" for="">Rules
                                                                            Short Form</label>
                                                                        <input type="test" name="rules_short_form"
                                                                            placeholder="Enter rules short form"
                                                                            class="form-control @error('rules_short_form') is-invalid @enderror"
                                                                            value="{{ old('rules_short_form') }}">

                                                                        @error('rules_short_form')
                                                                            <div class="invalid-feedback">{{ $message }}
                                                                            </div>
                                                                        @enderror

                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="mb-1">
                                                                        <label class="form-label" for="">Rules
                                                                            Year</label>
                                                                        <input type="test" name="rules_year"
                                                                            placeholder="Enter rules year"
                                                                            class="form-control @error('rules_year') is-invalid @enderror"
                                                                            value="{{ old('rules_year') }}">

                                                                        @error('rules_year')
                                                                            <div class="invalid-feedback">{{ $message }}
                                                                            </div>
                                                                        @enderror

                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="mb-1">
                                                                        <label class="form-label" for="">Rules
                                                                            Date</label>
                                                                        <input type="date" name="rules_date"
                                                                            placeholder="Enter rules date"
                                                                            class="form-control @error('rules_date') is-invalid @enderror"
                                                                            value="{{ old('rules_date') }}">

                                                                        @error('rules_date')
                                                                            <div class="invalid-feedback">{{ $message }}
                                                                            </div>
                                                                        @enderror

                                                                    </div>
                                                                </div>


                                                                <div class="col-md-6">
                                                                    <div class="mb-1">
                                                                        <label class="form-label" for="">Rules Last Amendment</label>
                                                                        <input type="date" name="rules_last_amendment"
                                                                            class="form-control @error('rules_last_amendment') is-invalid @enderror"
                                                                            value="{{ old('rules_last_amendment') }}">

                                                                        @error('rules_last_amendment')
                                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                                        @enderror

                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="mb-1">
                                                                        <label class="form-label" for="">Rules Total Part</label>
                                                                        <input type="text" name="rules_total_part" placeholder="Enter rules total part"
                                                                            class="form-control @error('rules_total_part') is-invalid @enderror"
                                                                            value="{{ old('rules_total_part') }}">

                                                                        @error('rules_total_part')
                                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                                        @enderror

                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="mb-1">
                                                                        <label class="form-label" for="">Rules Total Chapter</label>
                                                                        <input type="text" name="rules_total_chapter" placeholder="Enter rules total chapter"
                                                                            class="form-control @error('rules_total_chapter') is-invalid @enderror"
                                                                            value="{{ old('rules_total_chapter') }}">

                                                                        @error('rules_total_chapter')
                                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                                        @enderror

                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="mb-1">
                                                                        <label class="form-label" for="">Rules Total Section</label>
                                                                        <input type="text" name="rules_total_section" placeholder="Enter rules total section"
                                                                            class="form-control @error('rules_total_section') is-invalid @enderror"
                                                                            value="{{ old('rules_total_section') }}">

                                                                        @error('rules_total_section')
                                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                                        @enderror

                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="mb-1">
                                                                        <label class="form-label" for="">Rules Total Schedule</label>
                                                                        <input type="text" name="rules_total_schedule"
                                                                            placeholder="Enter rules total schedule"
                                                                            class="form-control @error('rules_total_schedule') is-invalid @enderror"
                                                                            value="{{ old('rules_total_schedule') }}">

                                                                        @error('rules_total_schedule')
                                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                                        @enderror

                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="mb-1">
                                                                        <label class="form-label" for="">Rules Total Form</label>
                                                                        <input type="text" name="rules_total_form" placeholder="Enter rules total form"
                                                                            class="form-control @error('rules_total_form') is-invalid @enderror"
                                                                            value="{{ old('rules_total_form') }}">

                                                                        @error('rules_total_form')
                                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                                        @enderror

                                                                    </div>
                                                                </div>


                                                            </div>
                                                            <div class="mb-1">
                                                                <label class="form-label" for="">Rules Description</label>
                                                                <textarea name="rules_description" rows="2" class="summernote @error('rules_description') is-invalid @enderror"
                                                                    placeholder="Enter rules_description">{{ old('rules_description') }}</textarea>
                                                                @error('rules_description')
                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                                        Save</button>
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
        $(document).ready(function() {
            $('input[name="lang"]').click(function() {
                if ($(this).val() == 'both') {
                    $(".default_lang_show").show();
                } else {
                    $(".default_lang_show").hide();
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $(".rules_status").click(function() {
                if ($(this).is(":checked")) {
                    $(".rules_show").slideDown();
                } else {
                    $(".rules_show").slideUp();
                }
            });
        });
    </script>
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

@extends('admin.layouts.master')
@section('title', 'Edit Laws & Rules')
@section('content')

    <style>
        .nav-pills.nav-justified .nav-link {
            display: block;
            border: 1px solid #ddd;
        }

        .chapter-with {
            text-transform: lowercase;
        }

        .chapter-with::first-line {
            text-transform: capitalize
        }

        .tab-content .card-header {
            padding: 10px;
        }
    </style>

    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Edit Laws & Rules</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Edit Laws & Rules
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
                    <div class="card">
                        <div class="card-header">
                            <div class="head-label">
                                <h5 class="mb-0"><strong>Edit Laws & Rules</strong></h5>
                            </div>
                            <div class="dt-action-buttons text-end">
                                <div class="dt-buttons d-inline-flex">
                                    <a href="{{ route('law.show', $law->id) }}" class="btn btn-info btn-sm me-1"><i
                                            data-feather='eye'></i> View</a>
                                    <a href="{{ route('law.index') }}" class="btn btn-success btn-sm"><i
                                            data-feather='corner-up-left'></i> Back</a>
                                </div>
                            </div>
                        </div>

                        {{-- start main law update part --}}
                        <div class="card-body">
                            <form action="{{ route('law.update', $law->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-1">
                                    <label class="form-label">Category</label>
                                    <select name="law_category_id"
                                        class="form-control @error('law_category_id') is-invalid @enderror">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                @if ($law->law_category_id == $category->id) @selected(true) @endif>
                                                {{ $category->name }}</option>
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
                                                value="{{ old('title', $law->title) }}">

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
                                                value="{{ old('short_form', $law->short_form) }}">

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
                                                value="{{ old('act_no', $law->act_no) }}">

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
                                                value="{{ old('act_year', $law->act_year) }}">

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
                                                value="{{ old('act_date', $law->act_date) }}">

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
                                                value="{{ old('last_amendment', $law->last_amendment) }}">

                                            @error('last_amendment')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-1">
                                            <label class="form-label" for="">Total Chapter</label>
                                            <input type="text" name="total_chapter" placeholder="Enter total chapter"
                                                class="form-control @error('total_chapter') is-invalid @enderror"
                                                value="{{ old('total_chapter', $law->total_chapter) }}">

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
                                                value="{{ old('total_section', $law->total_section) }}">

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
                                                value="{{ old('total_schedule', $law->total_schedule) }}">

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
                                                value="{{ old('total_form', $law->total_form) }}">

                                            @error('total_form')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror

                                        </div>
                                    </div>
                                </div>
                                <div class="mb-1">
                                    <label class="form-label">Sort</label>
                                    <input type="number" min="0" placeholder="[0,1,2,3]"
                                        class="form-control @error('sort') is-invalid @enderror" name="sort"
                                        value="{{ old('sort', $law->sort) }}">
                                    @error('sort')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <label class="form-label" for="">Description</label>
                                    <textarea name="description" rows="2" class="summernote @error('description') is-invalid @enderror"
                                        placeholder="Enter description">{{ old('description', $law->description) }}</textarea>
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
                                                                    name="format" id="part_section" value="part_section"
                                                                    {{ old('format', $law->format) == 'part_section' ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="part_section">
                                                                    Part > Section
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="format" id="chapter_section"
                                                                    value="chapter_section"
                                                                    {{ old('format', $law->format) == 'chapter_section' ? 'checked' : '' }}>
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
                                                                    name="lang" id="bn" value="bn"
                                                                    {{ old('lang', $law->lang) == 'bn' ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="bn">
                                                                    Bangla
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="lang" id="both" value="both"
                                                                    {{ old('lang', $law->lang) == 'both' ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="both">
                                                                    Both
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="default_lang_show"
                                                            @if (old('lang', $law->lang) == 'both') style="display:block;" @else style="display:none;" @endif>
                                                            <div class="d-flex flex-column mb-2">
                                                                <label class="form-check-label mb-50"
                                                                    for="customSwitch10"><strong>Default
                                                                        Language</strong></label>
                                                                <div class="form-check mb-1">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="default_lang" id="den" value="en"
                                                                        checked>
                                                                    <label class="form-check-label" for="den">
                                                                        English
                                                                    </label>
                                                                </div>
                                                                <div class="form-check mb-1">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="default_lang" id="dbn" value="bn"
                                                                        {{ old('default_lang', $law->default_lang) == 'bn' ? 'checked' : '' }}>
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
                                                                    @if (old('is_rules', $law->is_rules) == '1') checked @endif />
                                                                <label class="form-check-label" for="customSwitch10">
                                                                    <span class="switch-icon-left"><i
                                                                            data-feather="check"></i></span>
                                                                    <span class="switch-icon-right"><i
                                                                            data-feather="x"></i></span>
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="rules_show mt-3"
                                                            @if (old('is_rules', $law->is_rules) == 1) style="display:block;" @else style="display:none;" @endif>

                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="mb-1">
                                                                        <label class="form-label" for="">Rules
                                                                            Title</label>
                                                                        <input type="test" name="rules_title"
                                                                            placeholder="Enter rules title"
                                                                            class="form-control @error('rules_title') is-invalid @enderror"
                                                                            value="{{ old('rules_title', $law->rules_title) }}">

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
                                                                            value="{{ old('rules_short_form', $law->rules_short_form) }}">

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
                                                                            value="{{ old('rules_year', $law->rules_year) }}">

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
                                                                            value="{{ old('rules_date', $law->rules_date) }}">

                                                                        @error('rules_date')
                                                                            <div class="invalid-feedback">{{ $message }}
                                                                            </div>
                                                                        @enderror

                                                                    </div>
                                                                </div>
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
                                        Update</button>
                                </div>
                            </form>
                        </div>
                        {{-- end main law update part --}}


                        {{-- start law part, chapter, section update --}}
                        <div class="card-body">
                            <ul class="nav nav-pills mb-3 nav-justified" id="pills-tab" role="tablist">

                                {{-- for act tab btn --}}
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-home" type="button" role="tab"
                                        aria-controls="pills-home" aria-selected="true">{{ $law->title }}</button>
                                </li>

                                {{-- for rules tab btn --}}
                                @if ($law->is_rules == 1)
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-profile" type="button" role="tab"
                                            aria-controls="pills-profile"
                                            aria-selected="false">{{ $law->rules_title }}</button>
                                    </li>
                                @endif

                            </ul>

                            <div class="tab-content" id="pills-tabContent">

                                {{-- start  act tab content --}}
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                    aria-labelledby="pills-home-tab">
                                    <div class="card-body rounded" style="background: #f5f5f5; border:1px dotted #7367f0">
                                        <h4 class="text-center">{{ $law->title }}</h4>

                                        {{-- start add part for law act --}}
                                        <div class="card-header px-0">
                                            <div class="head-label">
                                                <h5 class="mb-0 text-success"><strong>Parts</strong></h5>
                                            </div>
                                            <div class="dt-action-buttons text-end">
                                                <div class="dt-buttons d-inline-flex"><a href="#!"
                                                        class="btn btn-success btn-sm pAddBtn" bla="1"
                                                        blr="" data-bs-toggle="modal"
                                                        data-bs-target="#pAddModal"><i data-feather='plus-square'></i> Add
                                                        Part</a></div>
                                            </div>
                                        </div>
                                        <div class="card rounded">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-borderless example" id="loadPart">
                                                        <thead>
                                                            <tr>
                                                                <th>SL</th>
                                                                <th>Part No</th>
                                                                <th>Part Title</th>
                                                                <th>Sort</th>
                                                                <th>Status</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($law->actPart as $part)
                                                                <tr>
                                                                    <td>
                                                                        {{ $loop->iteration }}
                                                                    </td>
                                                                    <td>
                                                                        @if ($law->lang == 'en')
                                                                            {{ $part->part_no }}
                                                                        @elseif ($law->lang == 'bn')
                                                                            {{ $part->part_no_bn }}
                                                                        @elseif ($law->lang == 'both')
                                                                            @if ($law->default_lang == 'en')
                                                                                {{ $part->part_no }}
                                                                            @elseif ($law->default_lang == 'bn')
                                                                                {{ $part->part_no_bn }}
                                                                            @endif
                                                                        @endif
                                                                    </td>
                                                                    <td>

                                                                        @if ($law->lang == 'en')
                                                                            {{ $part->title }}
                                                                        @elseif ($law->lang == 'bn')
                                                                            {{ $part->title_bn }}
                                                                        @elseif ($law->lang == 'both')
                                                                            @if ($law->default_lang == 'en')
                                                                                {{ $part->title }}
                                                                            @elseif ($law->default_lang == 'bn')
                                                                                {{ $part->title_bn }}
                                                                            @endif
                                                                        @endif

                                                                    </td>
                                                                    <td>{{ $part->sort }}</td>
                                                                    <td>
                                                                        @if ($part->status == 1)
                                                                            <span
                                                                                class="badge badge-light-success">Active</span>
                                                                        @else
                                                                            <span
                                                                                class="badge badge-light-warning">Deactive</span>
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        <a class="me-1 editPart" href="#!"
                                                                            id="{{ $part->id }}"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-original-title="Edit">
                                                                            <i class="far fa-edit text-dark"></i>
                                                                        </a>
                                                                        <a class="me-1 deletePart"
                                                                            href="{{ $part->id }}"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-original-title="Delete">
                                                                            <i class="far fa-trash-alt text-danger"></i>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>
                                        </div>
                                        {{-- end add part for law act --}}


                                        {{-- start part with chapter with section for law act --}}
                                        <div class="card-header px-0">
                                            <div class="head-label">
                                                <h5 class="mb-0 text-success"><strong>Part > Chapter > Section</strong></h5>
                                            </div>
                                        </div>
                                        <div id="loadSection">
                                            @foreach ($law->actPart as $part)
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5 class="text-primary" style="font-size: 18px">

                                                            @if ($law->lang == 'en')
                                                                {{ $part->part_no }}
                                                            @elseif ($law->lang == 'bn')
                                                                {{ $part->part_no_bn }}
                                                            @elseif ($law->lang == 'both')
                                                                @if ($law->default_lang == 'en')
                                                                    {{ $part->part_no }}
                                                                @elseif ($law->default_lang == 'bn')
                                                                    {{ $part->part_no_bn }}
                                                                @endif
                                                            @endif
                                                            :

                                                            @if ($law->lang == 'en')
                                                                {{ $part->title }}
                                                            @elseif ($law->lang == 'bn')
                                                                {{ $part->title_bn }}
                                                            @elseif ($law->lang == 'both')
                                                                @if ($law->default_lang == 'en')
                                                                    {{ $part->title }}
                                                                @elseif ($law->default_lang == 'bn')
                                                                    {{ $part->title_bn }}
                                                                @endif
                                                            @endif

                                                        </h5>
                                                        <div class="heading-elements">
                                                            <ul class="list-inline mb-0">
                                                                <li>
                                                                    <a href="#!"
                                                                        class="btn btn-success btn-sm cAddBtn"
                                                                        bla="1" part_id="{{ $part->id }}"
                                                                        blr="" data-bs-toggle="modal"
                                                                        data-bs-target="#cAddModal"><i
                                                                            data-feather='plus-square'></i> Add
                                                                        Chapter</a>
                                                                </li>
                                                                <li>
                                                                    <a data-action="collapse"><i
                                                                            data-feather="chevron-down"></i></a>
                                                                </li>

                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="card-content collapse">
                                                        @foreach ($part->chapter as $chapter)
                                                            <div class="card border bg-light" style="margin:15px 7px">
                                                                <div class="card-header">
                                                                    <h5 class="text-info">

                                                                        @if ($law->lang == 'en')
                                                                            {{ $chapter->chapter_no }}
                                                                        @elseif ($law->lang == 'bn')
                                                                            {{ $chapter->chapter_no_bn }}
                                                                        @elseif ($law->lang == 'both')
                                                                            @if ($law->default_lang == 'en')
                                                                                {{ $chapter->chapter_no }}
                                                                            @elseif ($law->default_lang == 'bn')
                                                                                {{ $chapter->chapter_no_bn }}
                                                                            @endif
                                                                        @endif

                                                                        :

                                                                        @if ($law->lang == 'en')
                                                                            {{ $chapter->title }}
                                                                        @elseif ($law->lang == 'bn')
                                                                            {{ $chapter->title_bn }}
                                                                        @elseif ($law->lang == 'both')
                                                                            @if ($law->default_lang == 'en')
                                                                                {{ $chapter->title }}
                                                                            @elseif ($law->default_lang == 'bn')
                                                                                {{ $chapter->title_bn }}
                                                                            @endif
                                                                        @endif

                                                                    </h5>
                                                                    <div class="heading-elements">
                                                                        <ul class="list-inline mb-0">
                                                                            <li>
                                                                                <a class="btn btn-success btn-sm sAddBtn"
                                                                                    href="#!" bla="1"
                                                                                    blr=""
                                                                                    chapter_id="{{ $chapter->id }}"
                                                                                    part_id="{{ $part->id }}"><i
                                                                                        data-feather='plus-square'></i>
                                                                                    Add
                                                                                    Section</a>
                                                                            </li>
                                                                            <li>
                                                                                <a data-action="collapse"><i
                                                                                        data-feather="chevron-down"></i></a>
                                                                            </li>

                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <div class="card-content collapse">
                                                                    <div class="card-body bg-white">
                                                                        <div class="table-responsive">
                                                                            <table class="table table-borderless example">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>SL</th>
                                                                                        <th>Title</th>
                                                                                        <th>Parent</th>
                                                                                        <th>Description</th>
                                                                                        <th>Sort</th>
                                                                                        <th>Status</th>
                                                                                        <th>Actions</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>

                                                                                    @foreach ($chapter->section->where('parent_id', 0) as $section)
                                                                                        <tr>
                                                                                            <td>
                                                                                                {{ $loop->iteration }}
                                                                                            </td>
                                                                                            <td>
                                                                                                @if ($law->lang == 'en')
                                                                                                    {{ $section->title }}
                                                                                                    @elseif ($law->lang == 'bn')
                                                                                                    {{ $section->title_bn }}
                                                                                                    @elseif ($law->lang == 'both')
                                                                                                    @if ($law->default_lang == 'en')
                                                                                                        {{ $section->title }}
                                                                                                        @elseif ($law->default_lang == 'bn')
                                                                                                        {{ $section->title_bn }}
                                                                                                    @endif
                                                                                                @endif
                                                                                            </td>
                                                                                            <td>
                                                                                                @if ($law->lang == 'en')
                                                                                                    {{ $section->parent->title }}
                                                                                                    @elseif ($law->lang == 'bn')
                                                                                                    {{ $section->parent->title_bn }}
                                                                                                    @elseif ($law->lang == 'both')
                                                                                                    @if ($law->default_lang == 'en')
                                                                                                        {{ $section->parent->title }}
                                                                                                        @elseif ($law->default_lang == 'bn')
                                                                                                        {{ $section->parent->title_bn }}
                                                                                                    @endif
                                                                                                @endif
                                                                                            </td>
                                                                                            <td>
                                                                                                @if ($law->lang == 'en')
                                                                                                    {!! substr(strip_tags($section->description), 0, 50) !!}
                                                                                                    @elseif ($law->lang == 'bn')
                                                                                                    {!! substr(strip_tags($section->description_bn), 0, 50) !!}
                                                                                                    @elseif ($law->lang == 'both')
                                                                                                    @if ($law->default_lang == 'en')
                                                                                                        {!! substr(strip_tags($section->description), 0, 50) !!}
                                                                                                        @elseif ($law->default_lang == 'bn')
                                                                                                        {!! substr(strip_tags($section->description_bn), 0, 50) !!}
                                                                                                    @endif
                                                                                                @endif

                                                                                                <a class="text-primary"
                                                                                                    type="button"
                                                                                                    data-bs-toggle="modal"
                                                                                                    data-bs-target="#sectionDesc2_{{ $section->id }}">Read
                                                                                                    more</a>

                                                                                                <div class="modal fade"
                                                                                                    id="sectionDesc2_{{ $section->id }}"
                                                                                                    tabindex="-1"
                                                                                                    aria-labelledby="exampleModalLabel"
                                                                                                    aria-hidden="true">
                                                                                                    <div
                                                                                                        class="modal-dialog modal-lg">
                                                                                                        <div
                                                                                                            class="modal-content">
                                                                                                            <div
                                                                                                                class="modal-header">
                                                                                                                <h5 class="modal-title"
                                                                                                                    id="exampleModalLabel">
                                                                                                                    @if ($law->lang == 'en')
                                                                                                                        {{ $section->title }}
                                                                                                                        @elseif ($law->lang == 'bn')
                                                                                                                        {{ $section->title_bn }}
                                                                                                                        @elseif ($law->lang == 'both')
                                                                                                                        @if ($law->default_lang == 'en')
                                                                                                                            {{ $section->title }}
                                                                                                                            @elseif ($law->default_lang == 'bn')
                                                                                                                            {{ $section->title_bn }}
                                                                                                                        @endif
                                                                                                                    @endif
                                                                                                                </h5>
                                                                                                                <button
                                                                                                                    type="button"
                                                                                                                    class="btn-close"
                                                                                                                    data-bs-dismiss="modal"
                                                                                                                    aria-label="Close"></button>
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="modal-body">
                                                                                                                @if ($law->lang == 'en')
                                                                                                                    {!! substr(strip_tags($section->description), 0, 50) !!}
                                                                                                                    @elseif ($law->lang == 'bn')
                                                                                                                    {!! substr(strip_tags($section->description_bn), 0, 50) !!}
                                                                                                                    @elseif ($law->lang == 'both')
                                                                                                                    @if ($law->default_lang == 'en')
                                                                                                                        {!! substr(strip_tags($section->description), 0, 50) !!}
                                                                                                                        @elseif ($law->default_lang == 'bn')
                                                                                                                        {!! substr(strip_tags($section->description_bn), 0, 50) !!}
                                                                                                                    @endif
                                                                                                                @endif
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="modal-footer">
                                                                                                                <button
                                                                                                                    type="button"
                                                                                                                    class="btn btn-secondary"
                                                                                                                    data-bs-dismiss="modal">Close</button>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                            <td>{{ $section->sort }}</td>
                                                                                            <td>
                                                                                                @if ($section->status == 1)
                                                                                                    <span
                                                                                                        class="badge badge-light-success">Active</span>
                                                                                                @else
                                                                                                    <span
                                                                                                        class="badge badge-light-warning">Deactive</span>
                                                                                                @endif
                                                                                            </td>
                                                                                            <td>
                                                                                                <a class="me-1 editSection"
                                                                                                    href="javascript:;"
                                                                                                    id="{{ $section->id }}"
                                                                                                    data-bs-toggle="tooltip"
                                                                                                    data-bs-original-title="Edit">
                                                                                                    <i
                                                                                                        class="far fa-edit text-dark"></i>
                                                                                                </a>
                                                                                                <a class="me-1 deleteSection"
                                                                                                    id="{{ $section->id }}"
                                                                                                    href="javascript:;"
                                                                                                    data-bs-toggle="tooltip"
                                                                                                    data-bs-original-title="Delete">
                                                                                                    <i
                                                                                                        class="far fa-trash-alt text-danger"></i>
                                                                                                </a>
                                                                                            </td>
                                                                                        </tr>
                                                                                        @if (count($section->childs))
                                                                                            @include(
                                                                                                'admin.law.child_section',
                                                                                                [
                                                                                                    'childs' =>
                                                                                                        $section->childs,
                                                                                                ]
                                                                                            )
                                                                                        @endif
                                                                                    @endforeach
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        {{-- end chapter with section for law act --}}

                                    </div>
                                </div>
                                {{-- end  act tab content --}}

                                {{-- start rules tab content --}}
                                @if ($law->is_rules == 1)
                                    <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                        aria-labelledby="pills-profile-tab">
                                        <div class="card-body rounded"
                                            style="background: #f5f5f5; border:1px dotted #7367f0">
                                            <h4 class="text-center">{{ $law->rules_title }}</h4>

                                            {{-- start add part for law rules --}}
                                            <div class="card-header px-0">
                                                <div class="head-label">
                                                    <h5 class="mb-0 text-success"><strong>Parts</strong></h5>
                                                </div>
                                                <div class="dt-action-buttons text-end">
                                                    <div class="dt-buttons d-inline-flex"><a href="#!"
                                                            class="btn btn-success btn-sm pAddBtn" bla="0"
                                                            blr="1" data-bs-toggle="modal"
                                                            data-bs-target="#pAddModal"><i data-feather='plus-square'></i>
                                                            Add
                                                            Part</a></div>
                                                </div>
                                            </div>
                                            <div class="card rounded">
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-borderless example" id="loadPart">
                                                            <thead>
                                                                <tr>
                                                                    <th>SL</th>
                                                                    <th>Part No</th>
                                                                    <th>Part Title</th>
                                                                    <th>Sort</th>
                                                                    <th>Status</th>
                                                                    <th>Actions</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($law->rulesPart as $part)
                                                                    <tr>
                                                                        <td>
                                                                            {{ $loop->iteration }}
                                                                        </td>
                                                                        <td>
                                                                            @if ($law->lang == 'en')
                                                                                {{ $part->part_no }}
                                                                            @elseif ($law->lang == 'bn')
                                                                                {{ $part->part_no_bn }}
                                                                            @elseif ($law->lang == 'both')
                                                                                @if ($law->default_lang == 'en')
                                                                                    {{ $part->part_no }}
                                                                                @elseif ($law->default_lang == 'bn')
                                                                                    {{ $part->part_no_bn }}
                                                                                @endif
                                                                            @endif
                                                                        </td>
                                                                        <td>

                                                                            @if ($law->lang == 'en')
                                                                                {{ $part->title }}
                                                                            @elseif ($law->lang == 'bn')
                                                                                {{ $part->title_bn }}
                                                                            @elseif ($law->lang == 'both')
                                                                                @if ($law->default_lang == 'en')
                                                                                    {{ $part->title }}
                                                                                @elseif ($law->default_lang == 'bn')
                                                                                    {{ $part->title_bn }}
                                                                                @endif
                                                                            @endif

                                                                        </td>
                                                                        <td>{{ $part->sort }}</td>
                                                                        <td>
                                                                            @if ($part->status == 1)
                                                                                <span
                                                                                    class="badge badge-light-success">Active</span>
                                                                            @else
                                                                                <span
                                                                                    class="badge badge-light-warning">Deactive</span>
                                                                            @endif
                                                                        </td>
                                                                        <td>
                                                                            <a class="me-1 editPart" href="#!"
                                                                                id="{{ $part->id }}"
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-original-title="Edit">
                                                                                <i class="far fa-edit text-dark"></i>
                                                                            </a>
                                                                            <a class="me-1 deletePart"
                                                                                href="{{ $part->id }}"
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-original-title="Delete">
                                                                                <i
                                                                                    class="far fa-trash-alt text-danger"></i>
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                </div>
                                            </div>
                                            {{-- end add part for law rules --}}


                                            {{-- start part with chapter with section for law rules --}}
                                            <div class="card-header px-0">
                                                <div class="head-label">
                                                    <h5 class="mb-0 text-success"><strong>Part > Chapter > Section</strong>
                                                    </h5>
                                                </div>
                                            </div>
                                            <div id="loadSection">
                                                @foreach ($law->rulesPart as $part)
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h5 class="text-primary" style="font-size: 18px">

                                                                @if ($law->lang == 'en')
                                                                    {{ $part->part_no }}
                                                                @elseif ($law->lang == 'bn')
                                                                    {{ $part->part_no_bn }}
                                                                @elseif ($law->lang == 'both')
                                                                    @if ($law->default_lang == 'en')
                                                                        {{ $part->part_no }}
                                                                    @elseif ($law->default_lang == 'bn')
                                                                        {{ $part->part_no_bn }}
                                                                    @endif
                                                                @endif

                                                                :

                                                                @if ($law->lang == 'en')
                                                                    {{ $part->title }}
                                                                @elseif ($law->lang == 'bn')
                                                                    {{ $part->title_bn }}
                                                                @elseif ($law->lang == 'both')
                                                                    @if ($law->default_lang == 'en')
                                                                        {{ $part->title }}
                                                                    @elseif ($law->default_lang == 'bn')
                                                                        {{ $part->title_bn }}
                                                                    @endif
                                                                @endif

                                                            </h5>
                                                            <div class="heading-elements">
                                                                <ul class="list-inline mb-0">
                                                                    <li>
                                                                        <a href="#!"
                                                                            class="btn btn-success btn-sm cAddBtn"
                                                                            bla="" part_id="{{ $part->id }}"
                                                                            blr="1" data-bs-toggle="modal"
                                                                            data-bs-target="#cAddModal"><i
                                                                                data-feather='plus-square'></i> Add
                                                                            Chapter</a>
                                                                    </li>
                                                                    <li>
                                                                        <a data-action="collapse"><i
                                                                                data-feather="chevron-down"></i></a>
                                                                    </li>

                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="card-content collapse">
                                                            @foreach ($part->chapter as $chapter)
                                                                <div class="card border bg-light" style="margin:15px 7px">
                                                                    <div class="card-header">
                                                                        <h5 class="text-info">

                                                                            {{ $chapter->chapter_no }}

                                                                            @if ($law->lang == 'en')
                                                                                {{ $chapter->chapter_no }}
                                                                            @elseif ($law->lang == 'bn')
                                                                                {{ $chapter->chapter_no_bn }}
                                                                            @elseif ($law->lang == 'both')
                                                                                @if ($law->default_lang == 'en')
                                                                                    {{ $chapter->chapter_no }}
                                                                                @elseif ($law->default_lang == 'bn')
                                                                                    {{ $chapter->chapter_no_bn }}
                                                                                @endif
                                                                            @endif

                                                                            :

                                                                            @if ($law->lang == 'en')
                                                                                {{ $chapter->title }}
                                                                            @elseif ($law->lang == 'bn')
                                                                                {{ $chapter->title_bn }}
                                                                            @elseif ($law->lang == 'both')
                                                                                @if ($law->default_lang == 'en')
                                                                                    {{ $chapter->title }}
                                                                                @elseif ($law->default_lang == 'bn')
                                                                                    {{ $chapter->title_bn }}
                                                                                @endif
                                                                            @endif

                                                                        </h5>
                                                                        <div class="heading-elements">
                                                                            <ul class="list-inline mb-0">
                                                                                <li>
                                                                                    <a class="btn btn-success btn-sm sAddBtn"
                                                                                        href="#!" bla="0"
                                                                                        blr="1"
                                                                                        chapter_id="{{ $chapter->id }}"
                                                                                        part_id="{{ $part->id }}"><i
                                                                                            data-feather='plus-square'></i>
                                                                                        Add
                                                                                        Section</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a data-action="collapse"><i
                                                                                            data-feather="chevron-down"></i></a>
                                                                                </li>

                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-content collapse">
                                                                        <div class="card-body bg-white">
                                                                            <div class="table-responsive">
                                                                                <table
                                                                                    class="table table-borderless example">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th>SL</th>
                                                                                            <th>Title</th>
                                                                                            <th>Parent</th>
                                                                                            <th>Description</th>
                                                                                            <th>Sort</th>
                                                                                            <th>Status</th>
                                                                                            <th>Actions</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>

                                                                                        @foreach ($chapter->section->where('parent_id', 0) as $section)
                                                                                            <tr>
                                                                                                <td>
                                                                                                    {{ $loop->iteration }}
                                                                                                </td>
                                                                                                <td>
                                                                                                    @if ($law->lang == 'en')
                                                                                                        {{ $section->title }}
                                                                                                        @elseif ($law->lang == 'bn')
                                                                                                        {{ $section->title_bn }}
                                                                                                        @elseif ($law->lang == 'both')
                                                                                                        @if ($law->default_lang == 'en')
                                                                                                            {{ $section->title }}
                                                                                                            @elseif ($law->default_lang == 'bn')
                                                                                                            {{ $section->title_bn }}
                                                                                                        @endif
                                                                                                    @endif
                                                                                                </td>
                                                                                                <td>
                                                                                                    @if ($law->lang == 'en')
                                                                                                        {{ $section->parent->title }}
                                                                                                        @elseif ($law->lang == 'bn')
                                                                                                        {{ $section->parent->title_bn }}
                                                                                                        @elseif ($law->lang == 'both')
                                                                                                        @if ($law->default_lang == 'en')
                                                                                                            {{ $section->parent->title }}
                                                                                                            @elseif ($law->default_lang == 'bn')
                                                                                                            {{ $section->parent->title_bn }}
                                                                                                        @endif
                                                                                                    @endif
                                                                                                </td>
                                                                                                <td>
                                                                                                    @if ($law->lang == 'en')
                                                                                                        {!! substr(strip_tags($section->description), 0, 50) !!}
                                                                                                        @elseif ($law->lang == 'bn')
                                                                                                        {!! substr(strip_tags($section->description_bn), 0, 50) !!}
                                                                                                        @elseif ($law->lang == 'both')
                                                                                                        @if ($law->default_lang == 'en')
                                                                                                            {!! substr(strip_tags($section->description), 0, 50) !!}
                                                                                                            @elseif ($law->default_lang == 'bn')
                                                                                                            {!! substr(strip_tags($section->description_bn), 0, 50) !!}
                                                                                                        @endif
                                                                                                    @endif

                                                                                                    <a class="text-primary"
                                                                                                        type="button"
                                                                                                        data-bs-toggle="modal"
                                                                                                        data-bs-target="#sectionDesc2_{{ $section->id }}">Read
                                                                                                        more</a>

                                                                                                    <div class="modal fade"
                                                                                                        id="sectionDesc2_{{ $section->id }}"
                                                                                                        tabindex="-1"
                                                                                                        aria-labelledby="exampleModalLabel"
                                                                                                        aria-hidden="true">
                                                                                                        <div
                                                                                                            class="modal-dialog modal-lg">
                                                                                                            <div
                                                                                                                class="modal-content">
                                                                                                                <div
                                                                                                                    class="modal-header">
                                                                                                                    <h5 class="modal-title"
                                                                                                                        id="exampleModalLabel">
                                                                                                                        @if ($law->lang == 'en')
                                                                                                                            {{ $section->title }}
                                                                                                                            @elseif ($law->lang == 'bn')
                                                                                                                            {{ $section->title_bn }}
                                                                                                                            @elseif ($law->lang == 'both')
                                                                                                                            @if ($law->default_lang == 'en')
                                                                                                                                {{ $section->title }}
                                                                                                                                @elseif ($law->default_lang == 'bn')
                                                                                                                                {{ $section->title_bn }}
                                                                                                                            @endif
                                                                                                                        @endif
                                                                                                                    </h5>
                                                                                                                    <button
                                                                                                                        type="button"
                                                                                                                        class="btn-close"
                                                                                                                        data-bs-dismiss="modal"
                                                                                                                        aria-label="Close"></button>
                                                                                                                </div>
                                                                                                                <div
                                                                                                                    class="modal-body">
                                                                                                                    @if ($law->lang == 'en')
                                                                                                                        {!! substr(strip_tags($section->description), 0, 50) !!}
                                                                                                                        @elseif ($law->lang == 'bn')
                                                                                                                        {!! substr(strip_tags($section->description_bn), 0, 50) !!}
                                                                                                                        @elseif ($law->lang == 'both')
                                                                                                                        @if ($law->default_lang == 'en')
                                                                                                                            {!! substr(strip_tags($section->description), 0, 50) !!}
                                                                                                                            @elseif ($law->default_lang == 'bn')
                                                                                                                            {!! substr(strip_tags($section->description_bn), 0, 50) !!}
                                                                                                                        @endif
                                                                                                                    @endif
                                                                                                                </div>
                                                                                                                <div
                                                                                                                    class="modal-footer">
                                                                                                                    <button
                                                                                                                        type="button"
                                                                                                                        class="btn btn-secondary"
                                                                                                                        data-bs-dismiss="modal">Close</button>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </td>
                                                                                                <td>{{ $section->sort }}
                                                                                                </td>
                                                                                                <td>
                                                                                                    @if ($section->status == 1)
                                                                                                        <span
                                                                                                            class="badge badge-light-success">Active</span>
                                                                                                    @else
                                                                                                        <span
                                                                                                            class="badge badge-light-warning">Deactive</span>
                                                                                                    @endif
                                                                                                </td>
                                                                                                <td>
                                                                                                    <a class="me-1 editSection"
                                                                                                        href="javascript:;"
                                                                                                        id="{{ $section->id }}"
                                                                                                        data-bs-toggle="tooltip"
                                                                                                        data-bs-original-title="Edit">
                                                                                                        <i
                                                                                                            class="far fa-edit text-dark"></i>
                                                                                                    </a>
                                                                                                    <a class="me-1 deleteSection"
                                                                                                        id="{{ $section->id }}"
                                                                                                        href="javascript:;"
                                                                                                        data-bs-toggle="tooltip"
                                                                                                        data-bs-original-title="Delete">
                                                                                                        <i
                                                                                                            class="far fa-trash-alt text-danger"></i>
                                                                                                    </a>
                                                                                                </td>
                                                                                            </tr>
                                                                                            @if (count($section->childs))
                                                                                                @include(
                                                                                                    'admin.law.child_section',
                                                                                                    [
                                                                                                        'childs' =>
                                                                                                            $section->childs,
                                                                                                    ]
                                                                                                )
                                                                                            @endif
                                                                                        @endforeach
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            {{-- end chapter with section for law rules --}}

                                        </div>
                                    </div>
                                @endif
                                {{-- end rules tab content --}}
                            </div>
                        </div>
                        {{-- start law part, chapter, section update --}}

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Add Part Modal -->
    <div class="modal fade" id="pAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Part</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="pAddForm">
                    @csrf
                    <input type="hidden" name="law_id" value="{{ $law->id }}">
                    <input type="hidden" name="is_act" id="p_is_act" value="">
                    <input type="hidden" name="is_rules" id="p_is_rules" value="">
                    <div class="modal-body">
                        <div class="alert alert-danger" id="p_validation-errors"></div>
                        <div class="alert alert-success" id="p_validation-success"></div>

                        <div class="mb-1">
                            <label class="form-label" for="">Part No</label>
                            <input type="text" name="part_no" placeholder="Enter part no" class="form-control">
                        </div>
                        <div class="mb-1">
                            <label class="form-label" for="">Part No (BN)</label>
                            <input type="text" name="part_no_bn" placeholder="Enter part no (bn)"
                                class="form-control">
                        </div>
                        <div class="mb-1">
                            <label class="form-label" for="">Part Title</label>
                            <input type="text" name="title" placeholder="Enter part title" class="form-control">
                        </div>

                        <div class="mb-1">
                            <label class="form-label" for="">Part Title (BN)</label>
                            <input type="text" name="title_bn" placeholder="Enter part (bn)" class="form-control">
                        </div>

                        <div class="mb-1">
                            <label class="form-label">Sort</label>
                            <input type="number" min="0" placeholder="[0,1,2,3]" class="form-control"
                                name="sort">
                        </div>

                        <div class="mb-1">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-control">
                                <option value="1">
                                    Active
                                </option>
                                <option value="0">
                                    Deactive
                                </option>
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i
                                data-feather='x'></i> Close</button>
                        <button type="submit" class="btn btn-primary btn-sm"><i data-feather='save'></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--Edit Part Modal -->
    <div class="modal fade" id="pEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Part</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="pEditForm">
                    @csrf
                    <div class="modal-body">
                        <div class="alert alert-danger" id="p_edit-errors"></div>
                        <div class="alert alert-success" id="p_edit-errors"></div>

                        <div class="mb-1">
                            <label class="form-label" for="">Part No</label>
                            <input type="text" name="part_no" placeholder="Enter part no" id="part_no"
                                class="form-control">
                        </div>
                        <div class="mb-1">
                            <label class="form-label" for="">Part No (BN)</label>
                            <input type="text" name="part_no_bn" placeholder="Enter part no (bn)" id="part_no_bn"
                                class="form-control">
                        </div>

                        <div class="mb-1">
                            <label class="form-label" for="">Part Title</label>
                            <input type="text" name="title" placeholder="Enter part title" id="part_title"
                                class="form-control">
                        </div>

                        <div class="mb-1">
                            <label class="form-label" for="">Part Title (BN)</label>
                            <input type="text" name="title_bn" placeholder="Enter part title (bn)" id="part_title_bn"
                                class="form-control">
                        </div>

                        <div class="mb-1">
                            <label class="form-label">Sort</label>
                            <input type="number" min="0" placeholder="[0,1,2,3]" class="form-control"
                                name="sort" id="part_sort">
                        </div>

                        <div class="mb-1">
                            <label class="form-label">Status</label>
                            <select name="status" id="part_status" class="form-control">

                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i
                                data-feather='x'></i> Close</button>
                        <button type="submit" class="btn btn-primary btn-sm"><i data-feather='save'></i> Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--Add Chapter Modal -->
    <div class="modal fade" id="cAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Chapter</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="cAddForm">
                    @csrf
                    <input type="hidden" name="law_id" value="{{ $law->id }}">
                    <input type="hidden" name="is_act" id="is_act" value="">
                    <input type="hidden" name="is_rules" id="is_rules" value="">
                    <input type="hidden" id="c_part_id" name="law_part_id" value="">

                    <div class="modal-body">
                        <div class="alert alert-danger" id="c_validation-errors"></div>
                        <div class="alert alert-success" id="c_validation-success"></div>

                        <div class="mb-1">
                            <label class="form-label" for="">Chapter No</label>
                            <input type="text" name="chapter_no" placeholder="Enter chapter no" class="form-control">
                        </div>
                        <div class="mb-1">
                            <label class="form-label" for="">Chapter No (BN)</label>
                            <input type="text" name="chapter_no_bn" placeholder="Enter chapter no (bn)"
                                class="form-control">
                        </div>
                        <div class="mb-1">
                            <label class="form-label" for="">Chapter Title</label>
                            <input type="text" name="title" placeholder="Enter chapter title" class="form-control">
                        </div>

                        <div class="mb-1">
                            <label class="form-label" for="">Chapter Title (BN)</label>
                            <input type="text" name="title_bn" placeholder="Enter chapter (bn)" class="form-control">
                        </div>

                        <div class="mb-1">
                            <label class="form-label">Sort</label>
                            <input type="number" min="0" placeholder="[0,1,2,3]" class="form-control"
                                name="sort">
                        </div>

                        <div class="mb-1">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-control">
                                <option value="1">
                                    Active
                                </option>
                                <option value="0">
                                    Deactive
                                </option>
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i
                                data-feather='x'></i> Close</button>
                        <button type="submit" class="btn btn-primary btn-sm"><i data-feather='save'></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--Edit Chapter Modal -->
    <div class="modal fade" id="cEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Chapter</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="cEditForm">
                    @csrf
                    <div class="modal-body">
                        <div class="alert alert-danger" id="c_edit-errors"></div>
                        <div class="alert alert-success" id="c_edit-errors"></div>

                        <div class="mb-1">
                            <label class="form-label" for="">Chapter No</label>
                            <input type="text" name="chapter_no" placeholder="Enter chapter no" id="chapter_no"
                                class="form-control">
                        </div>
                        <div class="mb-1">
                            <label class="form-label" for="">Chapter No (BN)</label>
                            <input type="text" name="chapter_no_bn" placeholder="Enter chapter no (bn)"
                                id="chapter_no_bn" class="form-control">
                        </div>

                        <div class="mb-1">
                            <label class="form-label" for="">Chapter Title</label>
                            <input type="text" name="title" placeholder="Enter chapter title" id="chapter_title"
                                class="form-control">
                        </div>

                        <div class="mb-1">
                            <label class="form-label" for="">Chapter Title (BN)</label>
                            <input type="text" name="title_bn" placeholder="Enter chapter title (bn)"
                                id="chapter_title_bn" class="form-control">
                        </div>

                        <div class="mb-1">
                            <label class="form-label">Sort</label>
                            <input type="number" min="0" placeholder="[0,1,2,3]" class="form-control"
                                name="sort" id="chapter_sort">
                        </div>

                        <div class="mb-1">
                            <label class="form-label">Status</label>
                            <select name="status" id="chapter_status" class="form-control">

                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i
                                data-feather='x'></i> Close</button>
                        <button type="submit" class="btn btn-primary btn-sm"><i data-feather='save'></i> Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--Add Section Modal -->
    <div class="modal fade" id="sAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Section/Rules</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="sAddForm">
                    @csrf
                    <input type="hidden" name="law_id" value="{{ $law->id }}">
                    <input type="hidden" id="s_chapter_id" name="chapter_id" value="">
                    <input type="hidden" id="s_part_id" name="part_id" value="">

                    <input type="hidden" name="s_is_act" id="s_is_act" value="">
                    <input type="hidden" name="s_is_rules" id="s_is_rules" value="">

                    <div class="modal-body">
                        <div class="alert alert-danger" id="s_validation-errors"></div>
                        <div class="alert alert-success" id="s_validation-success"></div>

                        <div class="mb-1">
                            <label class="form-label">Parent Section</label>
                            <select name="parent_id" id="s_parent_id" class="form-control">
                                <option value="0">Select Parent Section</option>
                            </select>
                        </div>

                        <div class="mb-1">
                            <label class="form-label" for="">Section No</label>
                            <input type="text" name="section_no" placeholder="Ex: 12" class="form-control">
                        </div>

                        <div class="mb-1">
                            <label class="form-label" for="">Section No (BN)</label>
                            <input type="text" name="section_no_bn" placeholder="Ex: ১২" class="form-control">
                        </div>

                        <div class="mb-1">
                            <label class="form-label" for="">Title</label>
                            <input type="text" name="title" placeholder="Enter title" class="form-control">

                        </div>

                        <div class="mb-1">
                            <label class="form-label" for="">Title (BN)</label>
                            <input type="text" name="title_bn" placeholder="Enter title (bn)" class="form-control">
                        </div>

                        <div class="mb-1">
                            <label class="form-label" for="">Description</label>
                            <textarea name="description" class="form-control summernote" rows="3" placeholder="Description..."></textarea>

                        </div>

                        <div class="mb-1">
                            <label class="form-label" for="">Description (BN)</label>
                            <textarea name="description_bn" class="form-control summernote" rows="3" placeholder="Description bangla..."></textarea>

                        </div>

                        <div class="mb-1">
                            <label class="form-label">Sort</label>
                            <input type="number" min="0" placeholder="[0,1,2,3]" class="form-control"
                                name="sort">
                        </div>

                        <div class="mb-1">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-control">
                                <option value="1">
                                    Active
                                </option>
                                <option value="0">
                                    Deactive
                                </option>
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i
                                data-feather='x'></i> Close</button>
                        <button type="submit" class="btn btn-primary btn-sm"><i data-feather='save'></i>
                            Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--Edit Section Modal -->
    <div class="modal fade" id="sEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Section/Rules</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="sEditForm">
                    @csrf
                    <div class="modal-body">
                        <div class="alert alert-danger" id="s_edit-errors"></div>
                        <div class="alert alert-success" id="s_edit-errors"></div>

                        <div class="mb-1">
                            <label class="form-label">Parent Section</label>
                            <select name="parent_id" id="s_parent_edit_id" class="form-control">
                                <option value="0">Select Parent Section</option>
                            </select>
                        </div>

                        <div class="mb-1">
                            <label class="form-label" for="">Section No</label>
                            <input type="text" name="section_no" placeholder="Ex: 12" id="section_no"
                                class="form-control">
                        </div>

                        <div class="mb-1">
                            <label class="form-label" for="">Section No (BN)</label>
                            <input type="text" name="section_no_bn" placeholder="Ex: ১২" id="section_no_bn"
                                class="form-control">
                        </div>



                        <div class="mb-1">
                            <label class="form-label" for="">Title</label>
                            <input type="text" name="title" id="section_title" placeholder="Enter title"
                                class="form-control">

                        </div>

                        <div class="mb-1">
                            <label class="form-label" for="">Title (BN)</label>
                            <input type="text" name="title_bn" placeholder="Enter title (bn)"
                                id="section_title_bn" class="form-control">
                        </div>

                        <div class="mb-1">
                            <label class="form-label" for="">Description</label>
                            <textarea name="description" id="section_description" class="form-control summernote" rows="3"
                                placeholder="Description..."></textarea>

                        </div>

                        <div class="mb-1">
                            <label class="form-label" for="">Description (BN)</label>
                            <textarea name="description_bn" id="section_description_bn" class="form-control summernote" rows="3"
                                placeholder="Description bangla..."></textarea>

                        </div>

                        <div class="mb-1">
                            <label class="form-label">Sort</label>
                            <input type="number" min="0" id="section_sort" placeholder="[0,1,2,3]"
                                class="form-control" name="sort">
                        </div>

                        <div class="mb-1">
                            <label class="form-label">Status</label>
                            <select name="status" id="section_status" class="form-control">

                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i
                                data-feather='x'></i> Close</button>
                        <button type="submit" class="btn btn-primary btn-sm"><i data-feather='save'></i>
                            Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@section('scripts')

    {{-- start check lang status for show default lang field --}}
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
    {{-- end check lang status for show default lang field --}}

    {{-- start check rules status for show others field --}}
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
    {{-- start check rules status for show others field --}}

    {{-- start active tab after reload --}}
    <script>
        const pillsTab = document.querySelector('#pills-tab');
        const pills = pillsTab.querySelectorAll('button[data-bs-toggle="pill"]');

        pills.forEach(pill => {
            pill.addEventListener('shown.bs.tab', (event) => {
                const {
                    target
                } = event;
                const {
                    id: targetId
                } = target;

                savePillId(targetId);
            });
        });

        const savePillId = (selector) => {
            localStorage.setItem('activePillId', selector);
        };

        const getPillId = () => {
            const activePillId = localStorage.getItem('activePillId');

            // if local storage item is null, show default tab
            if (!activePillId) return;

            // call 'show' function
            const someTabTriggerEl = document.querySelector(`#${activePillId}`)
            const tab = new bootstrap.Tab(someTabTriggerEl);

            tab.show();
        };

        // get pill id on load
        getPillId();
    </script>
    {{-- end active tab after reload --}}


    {{-- Start law part ajax --}}
    <script>
        //Part Add button
        $('.pAddBtn').on('click', function() {
            $('#p_validation-errors').html('');
            $('#p_validation-success').html('');

            var is_act = $(this).attr('bla');
            var is_rules = $(this).attr('blr');

            $('#p_is_act').val(is_act);
            $('#p_is_rules').val(is_rules);
        });
        //Part ADD DATA
        $("#pAddForm").on("submit", function(e) {
            e.preventDefault();
            $.ajax({
                url: "{{ route('law.part.store') }}",
                data: new FormData(this),
                type: "POST",
                contentType: false,
                cache: false,
                processData: false,
                dataType: "JSON",
                success: function(data) {
                    $('#pAddModal').modal('hide');
                    $('#p_validation-errors').html('');
                    $('#p_validation-errors').hide();
                    $('#pAddForm')[0].reset();
                    $('#p_validation-success').append('<ul><li>Success</li></ul>');
                    toastr.success('Successfully data inserted !', 'Success', {
                        timeOut: 3000
                    });
                    location.reload();
                    // $('#loadChapter').load(location.href + " #loadChapter");
                    // $('#loadSection').load(location.href + " #loadSection");
                },
                error: function(xhr) {
                    $('#p_validation-errors').html('');
                    $('#p_validation-errors').fadeOut(100);
                    $('#p_validation-errors').fadeIn(100);
                    toastr.error('Something went wrong. Please try again later.', 'Opps!', {
                        timeOut: 3000
                    });
                    $.each(xhr.responseJSON.errors, function(key, value) {
                        $('#p_validation-errors').append('<ul><li>' + value[0] + '</li></ul>');
                    });
                },
            });
        });
        //Part EDIT DATA
        $(document).on('click', '.editPart', function(e) {
            e.preventDefault();
            $('#pEditModal').modal('show');
            $('#p_edit-errors').html('');
            $('#part_status').html('');
            $('#p_edit-errors').fadeOut(100);
            $('#pEditForm')[0].reset();
            var id = $(this).attr('id');
            var url = "{{ route('law.part.edit', ':id') }}";
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                method: "GET",
                dataType: "JSON",
                success: function(data) {
                    if (data != "") {
                        $('#part_no').val(data.part_no);
                        $('#part_no_bn').val(data.part_no_bn);
                        $('#part_title').val(data.title);
                        $('#part_title_bn').val(data.title_bn);
                        $('#part_sort').val(data.sort);
                        $('#part_status').append(`
                            <option value="1" ${data.status == 1 ? 'selected' : ''}> Active</option>
                            <option value="0" ${data.status == 0 ? 'selected' : ''}> Deactive </option>
                        `)
                        $('#pEditModal').attr('data_id', data.id);

                    }
                },
            });
        });
        //Part UPDATE DATA
        $("#pEditForm").on("submit", function(e) {
            e.preventDefault();
            var id = $('#pEditModal').attr('data_id');
            var url = "{{ route('law.part.update', ':id') }}";
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                data: new FormData(this),
                type: "POST",
                contentType: false,
                cache: false,
                processData: false,
                dataType: "JSON",
                success: function(data) {
                    $('#pEditModal').modal('hide');
                    $('#p_edit-errors').html('');
                    $('#p_edit-errors').hide();
                    $('#p_edit-success').append('<ul><li>Success</li></ul>');
                    toastr.success('Successfully data updated !', 'Success', {
                        timeOut: 3000
                    });
                    location.reload();
                    // $('#loadChapter').load(location.href + " #loadChapter");
                    // $('#loadSection').load(location.href + " #loadSection");
                },
                error: function(xhr) {
                    $('#p_edit-errors').html('');
                    $('#p_edit-errors').fadeOut(100);
                    $('#p_edit-errors').fadeIn(100);
                    toastr.error('Something went wrong. Please try again later.', 'Opps!', {
                        timeOut: 3000
                    });
                    $.each(xhr.responseJSON.errors, function(key, value) {
                        $('#p_edit-errors').append('<ul><li>' + value[0] + '</li></ul>');
                    });
                },
            });
        });

        //Part DELETE DATA
        $(document).on('click', '.deletePart', function(e) {
            e.preventDefault();
            var id = $(this).attr('href');
            var url = "{{ route('law.part.destroy', ':id') }}";
            url = url.replace(':id', id);
            Swal.fire({
                title: 'Are you sure?',
                text: "Delete this data!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: url,
                        method: "GET",
                        success: function(data) {
                            toastr.success('Successfully data Deleted !', 'Success', {
                                timeOut: 3000
                            });
                            location.reload();
                            // $('#loadChapter').load(location.href + " #loadChapter");
                            // $('#loadSection').load(location.href + " #loadSection");
                        },
                    });
                }
            });


        });
    </script>
    {{-- End law part ajax --}}


    {{-- Start law chapter ajax --}}
    <script>
        //Chapter Add button
        $('.cAddBtn').on('click', function() {
            $('#c_validation-errors').html('');
            $('#c_validation-success').html('');

            var is_act = $(this).attr('bla');
            var is_rules = $(this).attr('blr');
            var part_id = $(this).attr('part_id');

            $('#is_act').val(is_act);
            $('#is_rules').val(is_rules);
            $('#c_part_id').val(part_id);
        });
        //Chapter ADD DATA
        $("#cAddForm").on("submit", function(e) {
            e.preventDefault();
            $.ajax({
                url: "{{ route('law.chapter.store') }}",
                data: new FormData(this),
                type: "POST",
                contentType: false,
                cache: false,
                processData: false,
                dataType: "JSON",
                success: function(data) {
                    $('#cAddModal').modal('hide');
                    $('#c_validation-errors').html('');
                    $('#c_validation-errors').hide();
                    $('#cAddForm')[0].reset();
                    $('#c_validation-success').append('<ul><li>Success</li></ul>');
                    toastr.success('Successfully data inserted !', 'Success', {
                        timeOut: 3000
                    });
                    location.reload();
                    // $('#loadChapter').load(location.href + " #loadChapter");
                    // $('#loadSection').load(location.href + " #loadSection");
                },
                error: function(xhr) {
                    $('#c_validation-errors').html('');
                    $('#c_validation-errors').fadeOut(100);
                    $('#c_validation-errors').fadeIn(100);
                    toastr.error('Something went wrong. Please try again later.', 'Opps!', {
                        timeOut: 3000
                    });
                    $.each(xhr.responseJSON.errors, function(key, value) {
                        $('#c_validation-errors').append('<ul><li>' + value[0] + '</li></ul>');
                    });
                },
            });
        });
        //Chapter EDIT DATA
        $(document).on('click', '.editChapter', function(e) {
            e.preventDefault();
            $('#cEditModal').modal('show');
            $('#c_edit-errors').html('');
            $('#chapter_status').html('');
            $('#c_edit-errors').fadeOut(100);
            $('#cEditForm')[0].reset();
            var id = $(this).attr('id');
            var url = "{{ route('law.chapter.edit', ':id') }}";
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                method: "GET",
                dataType: "JSON",
                success: function(data) {
                    if (data != "") {
                        $('#chapter_no').val(data.chapter.chapter_no);
                        $('#chapter_no_bn').val(data.chapter.chapter_no_bn);
                        $('#chapter_title').val(data.chapter.title);
                        $('#chapter_title_bn').val(data.chapter.title_bn);
                        $('#chapter_sort').val(data.chapter.sort);
                        $('#chapter_status').append(`
                            <option value="1" ${data.chapter.status == 1 ? 'selected' : ''}> Active</option>
                            <option value="0" ${data.chapter.status == 0 ? 'selected' : ''}> Deactive </option>
                        `);

                        $('#cEditModal').attr('data_id', data.chapter.id);

                    }
                },
            });
        });
        //Chapter UPDATE DATA
        $("#cEditForm").on("submit", function(e) {
            e.preventDefault();
            var id = $('#cEditModal').attr('data_id');
            var url = "{{ route('law.chapter.update', ':id') }}";
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                data: new FormData(this),
                type: "POST",
                contentType: false,
                cache: false,
                processData: false,
                dataType: "JSON",
                success: function(data) {
                    $('#cEditModal').modal('hide');
                    $('#c_edit-errors').html('');
                    $('#c_edit-errors').hide();
                    $('#c_edit-success').append('<ul><li>Success</li></ul>');
                    toastr.success('Successfully data updated !', 'Success', {
                        timeOut: 3000
                    });
                    location.reload();
                    // $('#loadChapter').load(location.href + " #loadChapter");
                    // $('#loadSection').load(location.href + " #loadSection");
                },
                error: function(xhr) {
                    $('#c_edit-errors').html('');
                    $('#c_edit-errors').fadeOut(100);
                    $('#c_edit-errors').fadeIn(100);
                    toastr.error('Something went wrong. Please try again later.', 'Opps!', {
                        timeOut: 3000
                    });
                    $.each(xhr.responseJSON.errors, function(key, value) {
                        $('#c_edit-errors').append('<ul><li>' + value[0] + '</li></ul>');
                    });
                },
            });
        });

        //Chapter DELETE DATA
        $(document).on('click', '.deleteChapter', function(e) {
            e.preventDefault();
            var id = $(this).attr('href');
            var url = "{{ route('law.chapter.destroy', ':id') }}";
            url = url.replace(':id', id);
            Swal.fire({
                title: 'Are you sure?',
                text: "Delete this data!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: url,
                        method: "GET",
                        success: function(data) {
                            toastr.success('Successfully data Deleted !', 'Success', {
                                timeOut: 3000
                            });
                            location.reload();
                            // $('#loadChapter').load(location.href + " #loadChapter");
                            // $('#loadSection').load(location.href + " #loadSection");
                        },
                    });
                }
            });


        });
    </script>
    {{-- End law chapter ajax --}}

    {{-- Start law section ajax --}}
    <script>
        //Section Add button
        $('.sAddBtn').on('click', function() {
            $('#s_validation-errors').html('');
            $('#s_validation-success').html('');
            $('#sAddModal').modal('show');

            var chapter_id = $(this).attr('chapter_id');
            var part_id = $(this).attr('part_id');

            var is_act = $(this).attr('bla');
            var is_rules = $(this).attr('blr');

            $('#s_chapter_id').val(chapter_id);
            $('#s_part_id').val(part_id);

            $('#s_is_act').val(is_act);
            $('#s_is_rules').val(is_rules);

            // get parent section
            var url = "{{ route('law.section.get', ':id') }}";
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                method: "GET",
                dataType: "JSON",
                success: function(data) {
                    var html = '<option value="0">Select Parent Section</option>';
                    $.each(data, function(key, val) {
                        html += '<option value="' + val.id + '">' + val
                            .title + '</option>';
                    });
                    $('#s_parent_id').html(html);
                },
            });
        });


        //Section ADD DATA
        $("#sAddForm").on("submit", function(e) {
            e.preventDefault();
            $.ajax({
                url: "{{ route('law.section.store') }}",
                data: new FormData(this),
                type: "POST",
                contentType: false,
                cache: false,
                processData: false,
                dataType: "JSON",
                success: function(data) {
                    $('#sAddModal').modal('hide');
                    $('#s_validation-errors').html('');
                    $('#s_validation-errors').hide();
                    $('#sAddForm')[0].reset();
                    $('#s_validation-success').append('<ul><li>Success</li></ul>');
                    toastr.success('Successfully data inserted !', 'Success', {
                        timeOut: 3000
                    });
                    location.reload();
                    // $('#loadSection').load(location.href + " #loadSection");
                },
                error: function(xhr) {
                    $('#s_validation-errors').html('');
                    $('#s_validation-errors').fadeOut(100);
                    $('#s_validation-errors').fadeIn(100);
                    toastr.error('Something went wrong. Please try again later.', 'Opps!', {
                        timeOut: 3000
                    });
                    $.each(xhr.responseJSON.errors, function(key, value) {
                        $('#s_validation-errors').append('<ul><li>' + value[0] + '</li></ul>');
                    });
                },
            });
        });

        //SECTION EDIT DATA
        $(document).on('click', '.editSection', function(e) {
            e.preventDefault();
            $('#sEditModal').modal('show');
            $('#s_edit-errors').html('');
            $('#section_status').html('');
            $('#s_parent_edit_id').html('');
            $('#s_edit-errors').fadeOut(100);
            $('#sEditForm')[0].reset();
            var id = $(this).attr('id');
            var url = "{{ route('law.section.edit', ':id') }}";
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                method: "GET",
                dataType: "JSON",
                success: function(data) {
                    if (data.section != "") {
                        $('#section_no').val(data.section.section_no);
                        $('#section_no_bn').val(data.section.section_no_bn);
                        $('#section_title').val(data.section.title);
                        $('#section_title_bn').val(data.section.title_bn);
                        $('#section_description').summernote('code', data.section.description);
                        $('#section_description_bn').summernote('code', data.section.description_bn);
                        $('#section_sort').val(data.section.sort);
                        $('#section_status').append(`
                            <option value="1" ${data.section.status == 1 ? 'selected' : ''}> Active</option>
                            <option value="0" ${data.section.status == 0 ? 'selected' : ''}> Deactive </option>
                        `);

                        var html = '<option value="0">Select Parent Section</option>';
                        $.each(data.parent, function(key, value) {
                            html +=
                                `<option value="${value.id}" ${value.id == data.section.parent_id ? 'selected' : ''}>${value.title}</option>`;
                        });
                        $('#s_parent_edit_id').html(html);

                        $('#sEditModal').attr('data_id', data.section.id);

                    }
                },
            });
        });
        //Section UPDATE DATA
        $("#sEditForm").on("submit", function(e) {
            e.preventDefault();
            var id = $('#sEditModal').attr('data_id');
            var url = "{{ route('law.section.update', ':id') }}";
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                data: new FormData(this),
                type: "POST",
                contentType: false,
                cache: false,
                processData: false,
                dataType: "JSON",
                success: function(data) {
                    $('#sEditModal').modal('hide');
                    $('#s_edit-errors').html('');
                    $('#s_edit-errors').hide();
                    $('#s_edit-success').append('<ul><li>Success</li></ul>');
                    toastr.success('Successfully data updated !', 'Success', {
                        timeOut: 3000
                    });
                    location.reload();
                    // $('#loadChapter').load(location.href + " #loadChapter");
                },
                error: function(xhr) {
                    $('#s_edit-errors').html('');
                    $('#s_edit-errors').fadeOut(100);
                    $('#s_edit-errors').fadeIn(100);
                    toastr.error('Something went wrong. Please try again later.', 'Opps!', {
                        timeOut: 3000
                    });
                    $.each(xhr.responseJSON.errors, function(key, value) {
                        $('#s_edit-errors').append('<ul><li>' + value[0] + '</li></ul>');
                    });
                },
            });
        });

        //Chapter DELETE DATA
        $(document).on('click', '.deleteSection', function(e) {
            e.preventDefault();
            var id = $(this).attr('id');
            var url = "{{ route('law.section.destroy', ':id') }}";
            url = url.replace(':id', id);
            Swal.fire({
                title: 'Are you sure?',
                text: "Delete this data!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: url,
                        method: "GET",
                        success: function(data) {
                            toastr.success('Successfully data Deleted !', 'Success', {
                                timeOut: 3000
                            });
                            location.reload();
                        },
                    });
                }
            });


        });
    </script>
    {{-- End law section ajax --}}

@endsection
@endsection

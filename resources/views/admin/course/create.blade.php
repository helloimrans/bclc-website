@extends('admin.layouts.master')
@section('title', 'Training Course Create')
@section('content')

    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Training Course Create</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Training Course Create
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
                                <h5 class="mb-0">Training Course Create</h5>
                            </div>
                            <div class="dt-action-buttons text-end">
                                <div class="dt-buttons d-inline-flex"><a href="
                                    {{ route('courses.index') }}
                                    " class="btn btn-success btn-sm"><i data-feather='corner-up-left'></i> Back</a></div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="
                            {{ route('courses.store') }}
                            " method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-1">
                                            <label class="form-label">Service Categories</label>
                                            <select id="service_category_id" name="service_category_id"
                                                class="form-control @error('service_category_id') is-invalid @enderror">
                                                <option value="" selected hidden>
                                                    Select Service category
                                                </option>
                                                @foreach ($service_categories as $sc)
                                                <option value="{{ $sc->id }}">
                                                    {{ $sc->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('service_category_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-1">
                                            <label class="form-label">Services</label>
                                            <select id="service_id" name="service_id"
                                                class="form-control @error('service_id') is-invalid @enderror" disabled>
                                                <option value="" selected hidden>
                                                    Select Service
                                                </option>
                                            </select>
                                            @error('service_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-1">
                                    <label class="form-label" for="">Course Title</label>
                                    <input type="text" name="title" placeholder="Enter title"
                                        class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <label class="form-label">Select Expert</label>
                                    <select name="expert_id"
                                        class="form-control @error('expert_id') is-invalid @enderror">
                                        <option value="" selected hidden>
                                            Select Expert
                                        </option>
                                        @foreach ($experts as $expert)
                                            <option value="{{ $expert->id }}">{{ $expert->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('expert_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <label class="form-label" for="">Course Duration</label>
                                    <input type="text" name="duration" placeholder="Enter course duration"
                                        class="form-control @error('duration') is-invalid @enderror" value="{{ old('duration') }}">
                                    @error('duration')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <label class="form-label">Select Schedules</label>
                                    <select name="schedule[]" class="select2 form-select" multiple>
                                        <optgroup label="Select Schedules">
                                                <option value="Saturday">Saturday</option>
                                                <option value="Sunday">Sunday</option>
                                                <option value="Monday">Monday</option>
                                                <option value="Tuesday">Tuesday</option>
                                                <option value="Wednesday">Wednesday</option>
                                                <option value="Thursday">Thursday</option>
                                                <option value="Friday">Friday</option>
                                        </optgroup>
                                    </select>
                                    @error('schedule')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                                <div class="form-group mb-1">
                                    <label for="class_start_time">Class Time</label>

                                        <div class="input-group input-daterange">
                                            <input type="time" name="class_start_time" class="form-control @error('class_start_time') is-invalid @enderror" value="{{ old('class_start_time') }}">
                                        <div class="input-group-append"><div class="input-group-text">to</div></div>
                                            <input type="time" name="class_end_time" class="form-control @error('class_end_time') is-invalid @enderror" value="{{ old('class_end_time') }}">
                                        </div>
                                        @error('class_start_time')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                        @enderror
                                        @error('class_end_time')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                        @enderror
                                </div>
                                <div class="mb-1">
                                    <label class="form-label" for="">Venue</label>
                                    <input type="text" name="venue" placeholder="Enter venue"
                                        class="form-control @error('venue') is-invalid @enderror" value="{{ old('venue') }}">
                                    @error('venue')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <label class="form-label">Boarding</label>
                                    <select name="boarding"
                                        class="form-control @error('boarding') is-invalid @enderror">
                                        <option value="" selected hidden>Select boarding</option>
                                        <option value="Virtual Class Room">Virtual Class Room </option>
                                        <option value="Physical Class Room">Physical Class Room</option>
                                        <option value="Distance  Learning">Distance  Learning</option>
                                        <option value="Remote Learning">Remote Learning</option>
                                    </select>
                                    @error('boarding')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <label class="form-label" for="">Meeting Link</label>
                                    <input type="text" name="meeting_link"
                                        class="form-control @error('meeting_link') is-invalid @enderror" value="{{ old('meeting_link') }}" placeholder="Enter meeting link">
                                    @error('meeting_link')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-1">
                                    <label for="total_hours">Total Hours</label>
                                    <div class="d-flex">
                                        <input type="number" step="0.01" name="total_hours" placeholder="Enter total hours"
                                        class="form-control @error('total_hours') is-invalid @enderror" value="{{ old('total_hours') }}" min="0.00">
                                        <div class="input-group-append">
                                            <select name="hour_minute" class="form-control @error('hour_minute') is-invalid @enderror">
                                                <option value="1"
                                                    @if (old('hour_minute') == 1) selected @endif>Hours</option>
                                                <option value="2"
                                                    @if (old('hour_minute') == 2) selected @endif>Minutes</option>
                                            </select>
                                        </div>
                                    </div>
                                    @error('total_hours')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    @error('hour_minute')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <label class="form-label" for="">Class Start Date</label>
                                    <input type="date" name="class_start_date"
                                        class="form-control @error('class_start_date') is-invalid @enderror" value="{{ old('class_start_date') }}">
                                    @error('class_start_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <label class="form-label" for="">Class End Date</label>
                                    <input type="date" name="class_end_date"
                                        class="form-control @error('class_end_date') is-invalid @enderror" value="{{ old('class_end_date') }}">
                                    @error('class_end_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <label class="form-label" for="">Last Registration Date</label>
                                    <input type="date" name="last_reg_date"
                                        class="form-control @error('last_reg_date') is-invalid @enderror" value="{{ old('last_reg_date') }}">
                                    @error('last_reg_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <label class="form-label" for="">Course Fee</label>
                                    <input type="number" step="any" name="fee" id="fee"
                                        class="form-control @error('fee') is-invalid @enderror" value="{{ old('fee') }}" placeholder="Enter course fee">
                                    @error('fee')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <div class="form-group">
                                        <label for="">Discount Type</label>
                                        <select name="discount_type" id="discount_type" onchange="offer()"
                                            class="form-control @error('fee') is-invalid @enderror">
                                            <option value="">Select Type</option>
                                            <option value="1">Tk</option>
                                            <option value="2">Percentage (%)</option>
                                        </select>
                                    @error('discount_type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    </div>
                                </div>
                                <div class="mb-1">
                                    <div class="form-group">
                                        <label for="">Discount</label>
                                        <input type="number" name="discount" id="discount" value="0"
                                            min="0" class="form-control @error('fee') is-invalid @enderror" placeholder="Enter Discount">
                                        @error('discount')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                </div>
                                <div class="mb-1">
                                    <div class="form-group">
                                        <label for="">Discount Price</label>
                                        <input type="number" name="discount_fee" value="0"
                                            id="discount_fee" class="form-control @error('fee') is-invalid @enderror" placeholder="Discount Price"
                                            readonly>
                                        @error('discount_fee')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-1">
                                    <div class="form-group">
                                        <label for="">Active Price</label>
                                        <select name="active_fee" id="" class="form-control @error('fee') is-invalid @enderror">
                                            <option value="1">Main Fee</option>
                                            <option value="2"> Discount Fee</option>
                                        </select>
                                        @error('active_fee')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-1">
                                    <label class="form-label" for="">Short Description</label>
                                    <textarea name="short_description" rows="2" class="summernote @error('short_description') is-invalid @enderror"
                                        placeholder="Enter short description">{{ old('short_description') }}</textarea>
                                    @error('short_description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <label class="form-label" for="">Key Takeways</label>
                                    <textarea name="key_takeaways" rows="2" class="summernote @error('key_takeaways') is-invalid @enderror"
                                        placeholder="Enter key takeaways">{{ old('key_takeaways') }}</textarea>
                                    @error('key_takeaways')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <label class="form-label" for="">Curriculum</label>
                                    <textarea name="curriculum" rows="2" class="summernote @error('curriculum') is-invalid @enderror"
                                        placeholder="Enter curriculum">{{ old('curriculum') }}</textarea>
                                    @error('curriculum')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <label class="form-label">Course Thumbnail Image</label>
                                    <input type="file" id="upImgInput1" name="image"
                                        class="form-control @error('image') is-invalid @enderror">
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

                                <div class="form-group mb-1">
                                    <div class="col-sm-2">
                                        <label for="editor" class="control-label mb-1">Suitable Course</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <div class="row">
                                            @foreach($suitables as $key => $row)
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                    <label class="control-label" for="suitable_course{{$key}}">
                                                        <input class="form-check-input" type="checkbox" name="suitable_course[]" value="{{$row->name}}" id="suitable_course{{$key}}">
                                                        {{$row->name}} 
                                                    </label>
                                                    </div>
                                                </div>
                                            @endforeach
                                            @error('suitable_course')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <div class="form-check mb-1">
                                    <input class="form-check-input" name="provide_certificate" type="checkbox" value="1" id="provide_certificate">
                                    <label class="form-check-label" for="provide_certificate">
                                        Provide Certificate
                                    </label>
                                </div>
                                <div class="form-check mb-1">
                                    <input class="form-check-input" name="comming_soon" type="checkbox" value="1" id="comming_soon">
                                    <label class="form-check-label" for="comming_soon">
                                        Comming Soon
                                    </label>
                                </div>
                                <div class="form-check mb-1">
                                    <input class="form-check-input" name="home_slider" type="checkbox" value="1" id="home_slider">
                                    <label class="form-check-label" for="home_slider">
                                        Home Slider
                                    </label>
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
    @section('scripts')
    <script>
        // Service Category to Servoce onChange
        $(function() {
            $(document).on('change', '#service_category_id', function() {
                var id = $(this).val();
                if (id == '') {
                    var html = '<option value="" selected disabled>Select Service</option>';
                    $('#service_id').html(html);
                    $('#service_id').prop('disabled', true);
                } else {
                    $.ajax({
                        type: "Get",
                        url: "{{ url('/get/category/service') }}/" + id,
                        dataType: "json",
                        success: function(data) {
                            var html = '<option value="" selected disabled>Select Service</option>';
                            $('#service_id').prop('disabled', false);
                            $.each(data, function(key, val) {
                                html += '<option value="' + val.id + '">' + val
                                    .title + '</option>';
                            });
                            $('#service_id').html(html);
                        },
                    });
                }

            });
        });
    </script>
    <script>
        function offer() {
            var fee = $('#fee').val();
            var discount_type = $('#discount_type').val();
            var discount = $('#discount').val();
    
            if (discount_type == 1) {
                var discount_fee = fee - discount;
            } else if (discount_type == 2) {
                var price_cal = ((fee * discount) / 100);
                var discount_fee = fee - price_cal;
            } else {
                var discount_fee = 0;
            }
    
            if (!isNaN(discount_fee)) {
                $('#discount_fee').val(discount_fee);
            }
        }
    
        $('#fee, #discount_type, #discount, #discount_fee').on('keyup change', function() {
            offer();
        });
    
    </script>

@endsection
@endsection

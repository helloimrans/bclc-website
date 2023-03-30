@extends('admin.layouts.master')
@section('title', 'Edit Training Course')
@section('content')

    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Edit Training Course</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Edit Training Course
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
                                <h5 class="mb-0">Edit Training Course</h5>
                            </div>
                            <div class="dt-action-buttons text-end">
                                <div class="dt-buttons d-inline-flex"><a href="
                                    {{ route('courses.index') }}
                                    " class="btn btn-success btn-sm"><i data-feather='corner-up-left'></i> Back</a></div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="
                            {{ route('courses.update',$course->id) }}
                            " method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-1">
                                            <label class="form-label">Service Categories</label>
                                            <select id="service_category_id" name="service_category_id"
                                                class="form-control @error('service_category_id') is-invalid @enderror">
                                                @foreach ($service_categories as $sc)
                                                <option value="{{ $sc->id }}"@if($course->service_category_id == $sc->id) selected @endif>
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
                                                class="form-control @error('service_id') is-invalid @enderror">
                                                <option value="{{ $course->service->id }}" selected hidden>
                                                    {{ $course->service->title }}
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
                                        class="form-control @error('title') is-invalid @enderror" value="{{ $course->title }}">
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <label class="form-label" for="">Course Id</label>
                                    <input type="text" name="course_id" id="course_id" placeholder="Generate course id"
                                        class="form-control @error('course_id') is-invalid @enderror" value="{{ $course->course_id }}">
                                    <a href="javascript:void(0)" onclick="generateId()" class="btn btn-sm btn-outline-warning waves-effect mt-1">Course ID</a>

                                    @error('course_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <label class="form-label">Select Expert</label>
                                    <select name="expert_id"
                                        class="form-control @error('expert_id') is-invalid @enderror">
                                        @foreach ($experts as $expert)
                                            <option value="{{ $expert->id }}" @if($expert->id == $course->expert_id) selected @endif>{{ $expert->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('expert_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <label class="form-label" for="">Course Duration</label>
                                    <input type="text" name="duration" placeholder="Enter course duration"
                                        class="form-control @error('duration') is-invalid @enderror" value="{{ $course->duration }}">
                                    @error('duration')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <label class="form-label">Select Schedules</label>
                                    <select name="schedule[]" class="select2 form-select" multiple>
                                        <optgroup label="Select Schedules">
                                                <option value="Saturday" @if (@in_array('Saturday', json_decode($course->schedule))) selected @endif>Saturday</option>
                                                <option value="Sunday" @if (@in_array('Sunday', json_decode($course->schedule))) selected @endif>Sunday</option>
                                                <option value="Monday" @if (@in_array('Monday', json_decode($course->schedule))) selected @endif >Monday</option>
                                                <option value="Tuesday" @if (@in_array('Tuesday', json_decode($course->schedule))) selected @endif >Tuesday</option>
                                                <option value="Wednesday" @if (@in_array('Wednesday', json_decode($course->schedule))) selected @endif >Wednesday</option>
                                                <option value="Thursday" @if (@in_array('Thursday', json_decode($course->schedule))) selected @endif >Thursday</option>
                                                <option value="Friday" @if (@in_array('Friday', json_decode($course->schedule))) selected @endif >Friday</option>
                                                
                                                
                                        </optgroup>
                                    </select>
                                    @error('schedule')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                                <div class="form-group mb-1">
                                    <label for="class_start_time">Class Time</label>

                                        <div class="input-group input-daterange">
                                            <input type="time" name="class_start_time" class="form-control @error('class_start_time') is-invalid @enderror" value="{{ $course->class_start_time }}">
                                        <div class="input-group-append"><div class="input-group-text">to</div></div>
                                            <input type="time" name="class_end_time" class="form-control @error('class_end_time') is-invalid @enderror" value="{{ $course->class_end_time }}">
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
                                        class="form-control @error('venue') is-invalid @enderror" value="{{ $course->venue }}">
                                    @error('venue')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <label class="form-label">Boarding</label>
                                    <select name="boarding"
                                        class="form-control @error('boarding') is-invalid @enderror">
                                        <option value="{{ $course->boarding }}" selected hidden>{{ $course->boarding }}</option>
                                        <option value="Virtual Class Room">Virtual Class Room </option>
                                        <option value="Physical Class Room">Physical Class Room</option>
                                        <option value="Distance  Learning">Distance  Learning</option>
                                        <option value="Remote Learning">Remote Learning</option>
                                    </select>
                                    @error('boarding')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-1">
                                    <label for="total_hours">Total Hours</label>
                                    <div class="d-flex">
                                        <input type="number" step="0.01" name="total_hours" placeholder="Enter total hours"
                                        class="form-control @error('total_hours') is-invalid @enderror" value="{{ $course->total_hours }}" min="0.00">
                                        <div class="input-group-append">
                                            <select name="hour_minute" class="form-control @error('hour_minute') is-invalid @enderror">
                                                <option value="1"
                                                    @if ($course->hour_minute == 1) selected @endif>Hours</option>
                                                <option value="2"
                                                    @if ($course->hour_minute == 2) selected @endif>Minutes</option>
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
                                        class="form-control @error('class_start_date') is-invalid @enderror" value="{{ $course->class_start_date }}">
                                    @error('class_start_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <label class="form-label" for="">Class End Date</label>
                                    <input type="date" name="class_end_date"
                                        class="form-control @error('class_end_date') is-invalid @enderror" value="{{ $course->class_end_date }}">
                                    @error('class_end_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <label class="form-label" for="">Last Registration Date</label>
                                    <input type="date" name="last_reg_date"
                                        class="form-control @error('last_reg_date') is-invalid @enderror" value="{{ $course->last_reg_date }}">
                                    @error('last_reg_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <label class="form-label" for="">Course Fee</label>
                                    <input type="number" step="any" name="fee"
                                        class="form-control @error('fee') is-invalid @enderror" value="{{ $course->fee }}" placeholder="Enter course fee">
                                    @error('fee')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <label class="form-label" for="">Meeting Link</label>
                                    <input type="text" name="meeting_link"
                                        class="form-control @error('meeting_link') is-invalid @enderror" value="{{ $course->meeting_link }}" placeholder="Enter meeting link">
                                    @error('meeting_link')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <label class="form-label" for="">Short Description</label>
                                    <textarea name="short_description" rows="2" class="summernote @error('short_description') is-invalid @enderror" >{{ $course->short_description }}</textarea>
                                    @error('short_description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <label class="form-label" for="">Key Takeways</label>
                                    <textarea name="key_takeaways" rows="2" class="summernote @error('key_takeaways') is-invalid @enderror"
                                        >{{ $course->key_takeaways }}</textarea>
                                    @error('key_takeaways')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <label class="form-label" for="">Curriculum</label>
                                    <textarea name="curriculum" rows="2" class="summernote @error('curriculum') is-invalid @enderror"
                                    >{{ $course->curriculum }}</textarea>
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
                                    <img src="@if ($course->image) {{ asset($course->image) }} @else {{ asset('defaults/noimage/no_img.jpg') }} @endif" id="upImg1"
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
                                                        <input class="form-check-input" type="checkbox" name="suitable_course[]" value="{{$row->name}}" id="suitable_course{{$key}}" @if (@in_array($row->name, json_decode($course->suitable_course))) checked @else  @endif >
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
                                    <input class="form-check-input" name="provide_certificate" type="checkbox" value="{{ $course->provide_certificate }}" @if($course->provide_certificate == 1) checked @endif id="provide_certificate">
                                    <label class="form-check-label" for="provide_certificate">
                                        Provide Certificate
                                    </label>
                                </div>
                                <div class="form-check mb-1">
                                    <input class="form-check-input" name="comming_soon" type="checkbox" value="{{ $course->comming_soon }}" @if($course->comming_soon == 1) checked @endif id="comming_soon">
                                    <label class="form-check-label" for="comming_soon">
                                        Comming Soon
                                    </label>
                                </div>
                                <div class="form-check mb-1">
                                    <input class="form-check-input" name="home_slider" type="checkbox" value="{{ $course->home_slider }}" @if($course->home_slider == 1) checked @endif id="home_slider">
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
                                    <button type="submit" class="btn btn-info sub-btn"><i class="fa fa-save"></i> Update</button>
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
                } else {
                    $.ajax({
                        type: "Get",
                        url: "{{ url('/get/category/service') }}/" + id,
                        dataType: "json",
                        success: function(data) {
                            var html = '<option value="" selected disabled>Select Service</option>';
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
        // Generate course id onClick
        function generateId() {
            var uniqueId = Date.now().toString(36) + Math.random().toString(36).substr(2);
            document.getElementById("course_id").value = uniqueId;
        }
    </script>

@endsection
@endsection

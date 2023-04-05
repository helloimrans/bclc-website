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
                            <form action="{{ route('courses.update',$course->id) }}" method="POST" enctype="multipart/form-data">
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
                                <div class="mb-1">
                                    <label class="form-label" for="">Meeting Link</label>
                                    <input type="text" name="meeting_link"
                                        class="form-control @error('meeting_link') is-invalid @enderror" value="{{ $course->meeting_link }}" placeholder="Enter meeting link">
                                    @error('meeting_link')
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
                                    <input type="number" step="any" name="fee" id="fee"
                                        class="form-control @error('fee') is-invalid @enderror" value="{{ $course->fee }}" placeholder="Enter course fee">
                                    @error('fee')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <div class="form-group">
                                        <label for="">Discount Type</label>
                                        <select name="discount_type" id="discount_type" onchange="offer()"
                                            class="form-control @error('discount_type') is-invalid @enderror">
                                            <option value="1" @if($course->discount_type == 1) selected @endif>Tk</option>
                                            <option value="2" @if($course->discount_type == 2) selected @endif>Percentage (%)</option>
                                        </select>
                                    @error('discount_type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    </div>
                                </div>
                                <div class="mb-1">
                                    <div class="form-group">
                                        <label for="">Discount</label>
                                        <input type="number" name="discount" id="discount" value="{{ $course->discount }}"
                                            min="0" class="form-control @error('discount') is-invalid @enderror" placeholder="Enter Discount">
                                        @error('discount')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                </div>
                                <div class="mb-1">
                                    <div class="form-group">
                                        <label for="">Discount Price</label>
                                        <input type="number" name="discount_fee" value="{{ $course->discount_fee }}"
                                            id="discount_fee" class="form-control @error('discount_fee') is-invalid @enderror" placeholder="Discount Price"
                                            readonly>
                                        @error('discount_fee')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-1">
                                    <div class="form-group">
                                        <label for="">Active Price</label>
                                        <select name="active_fee" id="" class="form-control @error('active_fee') is-invalid @enderror">
                                            <option value="1" @if($course->active_fee == 1) selected @endif>Main Fee</option>
                                            <option value="2" @if($course->active_fee == 2) selected @endif > Discount Fee</option>
                                        </select>
                                        @error('active_fee')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
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
                                    <label class="form-label" for="">Training Offering</label>
                                    <textarea name="training_offering" rows="2" class="summernote @error('training_offering') is-invalid @enderror"
                                        placeholder="Enter training offering">{{ $course->training_offering}}</textarea>
                                    @error('training_offering')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <label class="form-label" for="">Consulting Offering</label>
                                    <textarea name="consulting_offering" rows="2" class="summernote @error('consulting_offering') is-invalid @enderror"
                                        placeholder="Enter training offering">{{ $course->consulting_offering }}</textarea>
                                    @error('consulting_offering')
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




                                <div class="mb-1">
                                    <label class="form-label">Certificate Image</label>
                                    <input type="file" id="upImgInput1" name="certificate_image"
                                        class="form-control @error('certificate_image') is-invalid @enderror">
                                    @error('certificate_image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <img src="@if ($course->certificate_image) {{ asset($course->certificate_image) }} @else {{ asset('defaults/noimage/no_img.jpg') }} @endif" id="upImg1"
                                        class="upImg1 rounded me-50 border" alt="certificate image" height="100">
                                </div>
                                <div class="mb-1">
                                    <button type="button" id="upImgReset1"
                                        class="btn btn-sm btn-outline-secondary mb-75 waves-effect">Reset</button>
                                </div>
                                <div class="mb-1">
                                    <label class="form-label" for="">Contact Mobile</label>
                                    <input type="number" name="contact_mobile"
                                        class="form-control @error('contact_mobile') is-invalid @enderror" value="{{ $course->contact_mobile }}" placeholder="Enter mobile number">
                                    @error('contact_mobile')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <label class="form-label" for="">Contact Whatsapp</label>
                                    <input type="text" name="contact_whatsapp"
                                        class="form-control @error('contact_whatsapp') is-invalid @enderror" value="{{ $course->contact_whatsapp }}" placeholder="Enter whatsapp number">
                                    @error('contact_whatsapp')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <label class="form-label" for="">Contact Email</label>
                                    <input type="email" name="contact_email"
                                        class="form-control @error('contact_email') is-invalid @enderror" value="{{ $course->contact_email }}" placeholder="Enter whatsapp number">
                                    @error('contact_email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
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
                            <!--Start FAQ -->
                            <div class="tab-content mt-4" id="pills-tabContent">
                                {{-- start  act tab content --}}
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                    aria-labelledby="pills-home-tab">
                                    <div class="card-body rounded" style="background: #f5f5f5; border:1px dotted #7367f0">
                                        <h4 class="text-center">{{ $course->title }}</h4>

                                        {{-- start add faqs for course --}}
                                        <div class="card-header px-0">
                                            <div class="head-label">
                                                <h5 class="mb-0 text-success"><strong>Course FAQS</strong></h5>
                                            </div>
                                            <div class="dt-action-buttons text-end">
                                                <div class="dt-buttons d-inline-flex"><a href="#!"
                                                        class="btn btn-success btn-sm AddBtn" bla="1"
                                                        blr="" data-bs-toggle="modal"
                                                        data-bs-target="#AddModal"><i data-feather='plus-square'></i> Add
                                                        FAQ</a></div>
                                            </div>
                                        </div>
                                        <div class="card rounded">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-borderless example" id="loadPart">
                                                        <thead>
                                                            <tr>
                                                                <th>SL</th>
                                                                <th>Title</th>
                                                                <th>Description</th>
                                                                <th>Status</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($faqs as $faq)
                                                                <tr>
                                                                    <td>{{ $loop->iteration }}</td>
                                                                    <td>{{ \Str::limit($faq->title,30) }}</td>
                                                                    <td>{!!  substr(strip_tags($faq->description), 0, 40) !!}...</td>
                                                                    <td>
                                                                        @if ($faq->status == 1)
                                                                            <span class="badge badge-light-success">Active</span>
                                                                        @else
                                                                            <span class="badge badge-light-warning">Deactive</span>
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        <a class="me-1 editFaq" href="#!" data-id='{{ $faq->id }}' data-bs-toggle="tooltip"
                                                                            data-bs-original-title="Edit">
                                                                            <i class="far fa-edit text-dark"></i>
                                                                        </a>
                                                                        <a class="me-1 deleteFaq"
                                                                            data-id="{{ $faq->id }}"
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
                                        {{-- end add faqs for course --}}
                                    </div>
                                </div>
                                {{-- end  act tab content --}}
                            </div>
                            <!--End FAQ-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Start Add Chapter Modal -->
    <div class="modal fade" id="AddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Chapter</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="AddForm">
                    @csrf
                    <input type="hidden" name="course_id" value="{{ $course->id }}">

                    <div class="modal-body">
                        <div class="alert alert-danger" id="validation-errors"></div>
                        <div class="alert alert-success" id="validation-success"></div>

                        <div class="mb-1">
                            <label class="form-label" for="">Title</label>
                            <input type="text" name="title" placeholder="Enter faq title" class="form-control">
                        </div>
                        <div class="mb-1">
                            <label class="form-label" for="">Description</label>
                            <input type="text" name="description" placeholder="Enter faq description"
                                class="form-control">
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
    <!--End Add Chapter Modal -->

    <!--Start Edit Chapter Modal -->
        <div class="modal fade" id="EditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Chapter</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="EditForm">
                        @csrf
                        <div class="modal-body">
                            <div class="alert alert-danger" id="edit-errors"></div>
                            <div class="alert alert-success" id="edit-success"></div>

                            <div class="mb-1">
                                <label class="form-label" for="">Title</label>
                                <input type="text" name="title" placeholder="Enter faq title" id="faq_title"
                                    class="form-control">
                            </div>
                            <div class="mb-1">
                                <label class="form-label" for="">Description</label>
                                <input type="text" name="description" placeholder="Enter faq description"
                                    id="faq_description" class="form-control">
                            </div>
                            <div class="mb-1">
                                <label class="form-label">Status</label>
                                <select name="status" id="faq_status" class="form-control">

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
    <!--Start Edit Chapter Modal -->
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

    {{-- Start Course FAQ ajax --}}
    <script>
        //FAQ Add button
        $('.AddBtn').on('click', function() {
            $('#validation-errors').html('');
            $('#validation-success').html('');
        });
        //FAQ ADD DATA
        $("#AddForm").on("submit", function(e) {
            e.preventDefault();
            $.ajax({
                url: "{{ route('course.faq.store') }}",
                data: new FormData(this),
                type: "POST",
                contentType: false,
                cache: false,
                processData: false,
                dataType: "JSON",
                success: function(data) {
                    $('#AddModal').modal('hide');
                    $('#validation-errors').html('');
                    $('#validation-errors').hide();
                    $('#AddForm')[0].reset();
                    $('#validation-success').append('<ul><li>Success</li></ul>');
                    toastr.success('Successfully data inserted !', 'Success', {
                        timeOut: 3000
                    });
                    location.reload();
                    // $('#loadChapter').load(location.href + " #loadChapter");
                    // $('#loadSection').load(location.href + " #loadSection");
                },
                error: function(xhr) {
                    $('#validation-errors').html('');
                    $('#validation-errors').fadeOut(100);
                    $('#validation-errors').fadeIn(100);
                    toastr.error('Something went wrong. Please try again later.', 'Opps!', {
                        timeOut: 3000
                    });
                    $.each(xhr.responseJSON.errors, function(key, value) {
                        $('#validation-errors').append('<ul><li>' + value[0] + '</li></ul>');
                    });
                },
            });
        });
        //Chapter EDIT DATA
        $(document).on('click', '.editFaq', function(e) {
            e.preventDefault();
            $('#EditModal').modal('show');
            $('#edit-errors').html('');
            $('#faq_status').html('');
            $('#edit-errors').fadeOut(100);
            $('#EditForm')[0].reset();
            var id = $(this).data('id');
            var url = "{{ route('course.faq.edit', ':id') }}";
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                method: "GET",
                dataType: "JSON",
                success: function(data) {
                    if (data != "") {
                        $('#faq_title').val(data.title);
                        $('#faq_description').val(data.description);
                        $('#faq_status').append(`
                            <option value="1" ${data.status == 1 ? 'selected' : ''}> Active</option>
                            <option value="0" ${data.status == 0 ? 'selected' : ''}> Deactive </option>
                        `);

                        $('#EditModal').attr('data_id', data.id);

                    }
                },
            });
        });
        //Chapter UPDATE DATA
        $("#EditForm").on("submit", function(e) {
            e.preventDefault();
            var id = $('#EditModal').attr('data_id');
            var url = "{{ route('course.faq.update', ':id') }}";
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
                    $('#EditModal').modal('hide');
                    $('#edit-errors').html('');
                    $('#edit-errors').hide();
                    $('#edit-success').append('<ul><li>Success</li></ul>');
                    toastr.success('Successfully data updated !', 'Success', {
                        timeOut: 3000
                    });
                    location.reload();
                    // $('#loadChapter').load(location.href + " #loadChapter");
                    // $('#loadSection').load(location.href + " #loadSection");
                },
                error: function(xhr) {
                    $('#edit-errors').html('');
                    $('#edit-errors').fadeOut(100);
                    $('#edit-errors').fadeIn(100);
                    toastr.error('Something went wrong. Please try again later.', 'Opps!', {
                        timeOut: 3000
                    });
                    $.each(xhr.responseJSON.errors, function(key, value) {
                        $('#edit-errors').append('<ul><li>' + value[0] + '</li></ul>');
                    });
                },
            });
        });

        //Chapter DELETE DATA
        $(document).on('click', '.deleteFaq', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var url = "{{ route('course.faq.destroy', ':id') }}";
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
    {{-- End Course FAQ ajax --}}

@endsection
@endsection

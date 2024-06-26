@extends('frontend.layouts.master')
@section('title', 'Course Details | ' . @$service->title . '')
@section('content')
    <!-- start page header -->
    <section class="page-header-section wow fadeInDown" data-wow-duration="1s">
        <div class="page-header-box">
            <div class="page-header-img">
                <img src="{{ asset('frontend') }}/images/training-details.png" alt="image" class="img-fluid">
            </div>
            <div class="page-header-txt">
                <h4 class="mb-0">Course Details</h4>
            </div>
        </div>
    </section>
    <!-- end page header -->

    <!-- start training details section -->
    <section class="course-details-section py-5 wow fadeInDown" data-wow-duration="1s">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="td-image">
                        <img src="{{ Storage::url($course->image) }}" class="img-fluid" alt="">
                        <div class="td-img-txt">
                            <h4>{{ $course->title }}</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="td-text">
                        <div class="row">
                            <div class="col-lg-6">
                                <h5 class="mt-4 mt-md-0">Program Overview</h5>
                            </div>
                            <div class="col-lg-6">
                                @include('frontend.share.share')
                            </div>
                        </div>
                        <p>
                            {!! $course->short_description !!}
                        </p>
                        @if ($course->show_key_takeaways)
                            <h5>Key Takeaways</h5>
                            <ul>
                                {!! $course->key_takeaways !!}
                            </ul>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-lg-5">
                    <div class="course-features wow fadeInDown" data-wow-duration="1s">
                        <h5>Courses Features</h5>
                        <div class="media">
                            <p><i class="fa fa-calendar-o"></i></p>
                            <div class="media-body">
                                <p> Date :
                                    {{ date('jS, F, Y', strtotime($course->class_start_date)) }}
                                    to
                                    {{ date('jS, F, Y', strtotime($course->class_end_date)) }}
                                </p>
                            </div>
                        </div>
                        <div class="media">
                            <p><i class="fa fa-calendar-o"></i></p>
                            <div class="media-body">
                                <p>Class Schedule :
                                    @forelse (json_decode($course->schedule) as $schedule)
                                        <span class="badge badge-secondary">{{ $schedule }}</span>
                                    @empty
                                    @endforelse
                                </p>
                            </div>
                        </div>
                        <div class="media">
                            <p><i class="fa fa-clock-o"></i> </p>
                            <div class="media-body">
                                <p>Class Time :
                                    {{ \Carbon\Carbon::createFromFormat('H:i:s', $course->class_start_time)->format('h:i A') }}
                                    to
                                    {{ \Carbon\Carbon::createFromFormat('H:i:s', $course->class_end_time)->format('h:i A') }}
                                </p>
                            </div>
                        </div>
                        <div class="media">
                            <p><i class="fa fa-clock-o"></i></p>
                            <div class="media-body">
                                <p> Total Hours :
                                    {{ $course->duration }}
                                    Hour
                                </p>
                            </div>
                        </div>
                        <div class="media">
                            <p><i class="fa fa-map-marker"></i></p>
                            <div class="media-body">
                                <p> Venue : {{ $course->venue }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="section-title mt-4 pt-3 mb-3 wow fadeInDown" data-wow-duration="1s">
                        <h2><span>Curriculum</span></h2>
                    </div>
                    <div class="td-curriculum wow fadeInDown" data-wow-duration="1s">
                        @php
                            $curriculum = strip_tags($course->curriculum);
                            $isLongContent = strlen($curriculum) > 500;
                            $truncated = $isLongContent ? substr($curriculum, 0, 500) . '...' : $curriculum;
                        @endphp

                        <div class="tdr-height">
                            {!! $truncated !!}
                        </div>

                        @if ($isLongContent)
                            <div class="tdr-full-content" style="display:none;">
                                {!! $curriculum !!}
                            </div>
                        @endif

                        @if ($isLongContent)
                        <a href="javascript:;" class="mt-2 tdr-show">Show More</a>
                        @endif
                    </div>

                    <div class="td-accordions wow fadeInDown" data-wow-duration="1s">
                        <div id="accordion" class="service-accordion">
                            @if ($course->show_training_offering)
                                <div class="card">
                                    <div class="card-header" id="heading-1">
                                        <h5 class="mb-0">
                                            <a role="button" data-toggle="collapse" href="#collapse-1"
                                                aria-expanded="false" aria-controls="collapse-1" class="collapsed">
                                                Our Training offering
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapse-1" class="collapse" data-parent="#accordion"
                                        aria-labelledby="heading-1" style="">
                                        <div class="card-body">
                                            {!! $course->training_offering !!}
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if ($course->show_consulting_offering)
                                <div class="card">
                                    <div class="card-header" id="heading-2">
                                        <h5 class="mb-0">
                                            <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-2"
                                                aria-expanded="false" aria-controls="collapse-2">
                                                Our Consulting Offering
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapse-2" class="collapse" data-parent="#accordion"
                                        aria-labelledby="heading-2">
                                        <div class="card-body">
                                            {!! $course->consulting_offering !!}
                                        </div>
                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>

                    <div class="section-title mt-4 pt-3 mb-3 wow fadeInDown" data-wow-duration="1s">
                        <h2><span>Certificate Image</span></h2>
                    </div>
                    <div class="certificate_image my-4">
                        <img src="{{ Storage::url($course->certificate_image) }}" class="img-fluid rounded"
                            alt="Certificate">
                    </div>

                    <!--Start Course FAQs-->
                    <div class="section-title mb-3">
                        <h2><span>Course FAQs</span></h2>
                    </div>
                    <div class="td-accordions wow fadeInDown" data-wow-duration="1s">
                        <div id="accordion2" class="service-accordion">
                            @forelse ($course_faqs as $key=> $cf)
                                <div class="card">
                                    <div class="card-header" id="heading3-{{ $key }}">
                                        <h5 class="mb-0">
                                            <a role="button" data-toggle="collapse"
                                                href="#collapse3-{{ $key }}" aria-expanded="false"
                                                aria-controls="collapse3-{{ $key }}" class="collapsed w-100">
                                                {{ $cf->title }}
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapse3-{{ $key }}" class="collapse" data-parent="#accordion2"
                                        aria-labelledby="heading3-{{ $key }}" style="">
                                        <div class="card-body">
                                            {{ $cf->description }}
                                        </div>
                                    </div>
                                </div>
                            @empty
                            @endforelse
                        </div>
                    </div>
                    <!--End Course FAQs-->
                </div>

                <div class="col-lg-7">
                    <div class="row mt-4 mt-md-0 wow fadeInDown" data-wow-duration="1s">
                        <div class="col-lg-6">
                            <div class="td-course-id">
                                <span>Course ID: {{ $course->course_id }}</span>
                                <span>Course Fee:
                                    @if ($course->active_fee == 1)
                                        {{ $course->fee }}Tk
                                    @else
                                        <span class="d-inline">
                                            {{ $course->discount_fee }}Tk
                                            <sup><del>
                                                    {{ $course->fee }}Tk
                                                </del></sup>
                                        </span>
                                    @endif


                                </span>
                                @if ($course->comming_soon)
                                    <a href="javascript:;" class="btn btn-success w-100"
                                        style="padding: 14px 5px; border-radius: 10px">
                                        <strong>Comming Soon</strong>
                                    </a>
                                @else
                                    <a href="{{ route('course.checkout', $course->slug) }}" class="btn btn-success w-100"
                                        style="padding: 14px 5px; border-radius: 10px">
                                        <strong>Enroll Now</strong>
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="td-contact">
                                <div class="card">
                                    <div class="card-header">
                                        <h6>Contact For Training</h6>
                                    </div>
                                    <div class="card-body">
                                        <span>
                                            <b>Cell:</b> {{ $course->contact_mobile }}
                                        </span>
                                        <span>
                                            <b>WhatsApp:</b> {{ $course->contact_whatsapp }}
                                        </span>
                                        <span>
                                            <b>Email:</b> {{ $course->contact_email }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="section-title mt-4 mb-4 wow fadeInDown" data-wow-duration="1s">
                        <h2 style="margin-right:240px;"><span>Resource Person</span></h2>
                    </div>

                    <div class="td-resource wow fadeInDown" data-wow-duration="1s">
                        <div class="tdr-person">
                            <div class="media">
                                <div class="mda-img">
                                    <img src="{{ $course->expert->photo ? Storage::url($course->expert->photo) : asset('defaults/noimage/no_img.jpg') }}"
                                        alt="image">
                                </div>
                                <div class="media-body">
                                    <h6 class="mt-3" style="font-size: 20px">{{ $course->expert->name }}</h6>
                                    <span>{{ $course->expert->designation }}</span>
                                    <span style="font-size: 14px; color:#666">{{ $course->expert->workplace_name }}</span>
                                </div>
                            </div>
                            <div class="tdr-desc mt-4">
                                {!! @$course->expert->about !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- start related course section -->
    <section class="training-section py-5">
        <div class="container">
            <div class="row wow fadeInDown" data-wow-duration="1s">
                <div class="col">
                    <div class="section-title">
                        <h2><span>Related Courses</span></h2>
                    </div>
                </div>
            </div>
            <div class="row wow fadeInDown" data-wow-duration="1s">

                <div class="col">
                    <div class="slider-box">

                        <i class="fa fa-angle-left trn-prv prv ps-control"></i>
                        <i class="fa fa-angle-right trn-nxt nxt ps-control"></i>

                        <div class="my-slider-width">
                            <div class="training-slider my-slider">

                                <!-- slider item -->
                                @foreach ($related_courses as $related_course)
                                    @if ($related_course->id == $course->id)
                                        @continue;
                                    @else
                                        <div class="slider-item">
                                            <!-- training box -->
                                            <div class="course-box">
                                                <div class="course-img">
                                                    <img class="img-fluid"
                                                        src="{{ Storage::url($related_course->image) }}" alt="image">
                                                </div>
                                                <div class="course-desc">
                                                    <div class="course-author">
                                                        <div class="ta-img">
                                                            <div class="ta-img-main">
                                                                <img src="{{ $related_course->expert->photo ? Storage::url($related_course->expert->photo) : asset('defaults/noimage/no_img.jpg') }}"
                                                                    alt="image">
                                                            </div>
                                                            <a href="#">{{ $related_course->expert->name }}</a>
                                                        </div>
                                                    </div>
                                                    <h5><a
                                                            href="{{ route('course.details', $related_course->slug) }}">{{ $related_course->title }}</a>
                                                    </h5>
                                                    <span>{{ @$related_course->serviceCategory->name }}</span>
                                                    <p><i class="fa fa-calendar"></i>
                                                        {{ date('jS, F, Y', strtotime($related_course->class_start_date)) }}
                                                    </p>
                                                    <p><i class="fa fa-clock-o"></i>
                                                        {{ $related_course->duration }}:
                                                        {{ $related_course->total_hours }}
                                                        Hours</p>
                                                    <p><img src="{{ asset('frontend') }}/images/trached.png"
                                                            alt="image"> {{ $related_course->boarding }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach


                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- end related course section -->

    <!-- end training details section -->
    <!-- end service section -->
    {{-- @section('scripts')
  <script>
  </script>
@endsection --}}

@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $(".tdr-show").click(function() {
                var fullContent = $(this).siblings(".tdr-full-content");
                var truncatedContent = $(this).siblings(".tdr-height");
                var btn = $(this);

                if (fullContent.is(":visible")) {
                    fullContent.hide();
                    truncatedContent.show();
                    btn.text("Show More");
                } else {
                    fullContent.show();
                    truncatedContent.hide();
                    btn.text("Show Less");
                }
            });
        });
    </script>
@endsection

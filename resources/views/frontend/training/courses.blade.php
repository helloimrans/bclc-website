@extends('frontend.layouts.master')
@section('title', 'Courses | ' . @$service->title . '')
@section('content')
    <!-- start page header -->
    <section class="page-header-section wow fadeInDown" data-wow-duration="1s">
        <div class="page-header-box">
            <div class="page-header-img">
                <img src="{{ asset('frontend') }}/images/article-section.png" alt="image" class="img-fluid">
            </div>
            <div class="page-header-txt">
                <h4 class="mb-0">Training Courses</h4>
            </div>
        </div>
    </section>
    <!-- end page header -->

    <!-- start service section -->
    <section class="course-page-section py-5 my-5 wow fadeInDown" data-wow-duration="1s">
        <div class="container">
            <div class="row">
                @foreach ($courses as $course)
                    <div class="col-lg-4 col-md-6">
                        <div class="course-box mt-3">
                            <div class="course-img">
                                <img class="img-fluid" src="{{ Storage::url($course->image) }}" alt="image">
                            </div>
                            <div class="course-desc">
                                <div class="course-author">
                                    <div class="ta-img">
                                        <div class="ta-img-main">
                                            <img src="{{ $course->expert->photo ? Storage::url($course->expert->photo) : asset('defaults/noimage/no_img.jpg') }}"
                                                alt="image">
                                        </div>
                                        <a href="#">{{ $course->expert->name }}</a>
                                    </div>
                                </div>
                                <h5><a href="{{ route('course.details', $course->slug) }}">{{ $course->title }}</a>
                                </h5>
                                <span>{{ $course->serviceCategory->name }}</span>
                                <p><i class="fa fa-calendar"></i>
                                    {{ date('jS, F, Y', strtotime($course->class_start_date)) }}</p>
                                    <p><i class="fa fa-clock-o"></i>
                                        {{ $course->duration }}: {{ $course->total_hours }}
                                        Hours</p>
                                <p><img src="{{ asset('frontend') }}/images/trached.png"
                                        alt="image"> {{ $course->boarding }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>
    <!-- end service section -->
    {{-- @section('scripts')
  <script>
  </script>
@endsection --}}

@endsection

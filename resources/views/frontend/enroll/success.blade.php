@extends('frontend.layouts.master')
@section('title', 'Course Payment Success')
@section('content')
    <!-- start page header -->
    <section class="page-header-section wow fadeInDown" data-wow-duration="1s">
        <div class="page-header-box">
            <div class="page-header-img">
                <img src="{{ asset('frontend') }}/images/page-header.jpg" alt="image" class="img-fluid">
            </div>
            <div class="page-header-txt">
                <h4 class="mb-0">Course Payment Success</h4>
            </div>
        </div>
    </section>
    <!-- end page header -->

    <!--start contact section-->
    <section class="enroll-success py-5 my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-5 mx-auto">
                    <div class="payment-success text-center">
                        <i class="fa fa-check"></i>
                        <h5>Course payment has been successful.</h5>
                        <p><a href="{{route('user.course.index')}}">Click here</a> to view your courses</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--end contact section-->
@endsection

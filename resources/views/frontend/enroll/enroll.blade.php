@extends('frontend.layouts.master')
@section('title', 'Course Enroll Now')
@section('content')

    <!-- start page header -->
    <section class="page-header-section wow fadeInDown" data-wow-duration="1s">
        <div class="page-header-box">
            <div class="page-header-img">
                <img src="{{ asset('frontend') }}/images/page-header.jpg" alt="image" class="img-fluid">
            </div>
            <div class="page-header-txt">
                <h4 class="mb-0">Course Enroll Now</h4>
            </div>
        </div>
    </section>
    <!-- end page header -->

    <!--start contact section-->
    <section class="contact-us py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="article-details bg-white">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex justify-content-between align-items-center w-100">
                                    <h5 class="m-0 font-weight-bold">YOUR SELECTED COURSES</h5>
                                    <a class="btn btn-sm btn-info text-white" href="{{ route('training.course.details',$course->slug) }}"><i class="fa fa-angle-left mr-1"></i>Continue Buying</a>
                                </div>
                                <hr>
                            </div>
                            <div class="col-md-4">
                                <img style="height:10em" class="w-100" src="{{asset($course->image)}}" alt="img">
                            </div>
                            <div class="col-md-6">
                                <p style="font-size: 18px;" class="m-0"><strong>{{ $course->title }}</strong></p>
                                <span class="d-block" style="margin-bottom:-.4em; "><small>{{ $course->expert->name }}</small></span>
                                <span class="d-block"><small>{{ $course->expert->designation }}</small></span>
                                <ul style="list-style: none" class="p-0 mt-2">
                                    <li style="font-size: 14px;" class="text-muted">
                                        <i class="fa fa-clock-o mr-1"></i>
                                        {{ $course->duration }}
                                    </li>
                                    <li style="font-size: 14px;" class="text-muted"> 
                                        <i class="fa fa-podcast mr-1"></i>
                                        {{ $course->boarding }}
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-2">
                                <div class="price font-weight-bold" style="color:#ce5a2c">
                                    {{ $course->fee }}Tk
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="article-details bg-white">
                        <div class="row">
                            <h5 class="m-0 font-weight-bold">PROCEED</h5>
                            <hr class="w-100">
                            <div class="table-responsive">
                                <table class="table table-borderless">
                                    <tr>
                                        <td>Price</td>
                                        <td>:</td>
                                        <td>
                                            {{ $course->fee }}Tk
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Discount</td>
                                        <td>:</td>
                                        <td>
                                            @if($course->active_fee == 1)
                                                0
                                            @else
                                                {{ $course->discount }}{{ $course->discount_type == 1 ? 'Tk' : '%'}}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr style="border-bottom: 1px solid rgba(0,0,0,.1)">
                                        <td>Platform Charge (0%)</td>
                                        <td>:</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td>Total Price</td>
                                        <td>:</td>
                                        <td>
                                            {{ $course->discount_type == 1 ? $course->fee : $course->discount_fee }}Tk
                                        </td>
                                    </tr>
                                </table>
                                <form action="" method="post">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">
                                            <small class="text-muted">
                                                By clicking Pay Now,
                                                <span>I agree to the</span>
                                                <a href="{{ route('terms.condition') }}" target="_blank" style="color:#ce5a2c">Terms of Use</a> and <a href="{{ route('privacy.policy') }}" target="_blank" style="color:#ce5a2c">Privacy Policy</a>.
                                            </small>
                                        </label>
                                      </div>
                                </form>
                                <a href="#" class="btn btn-md btn-outline-info w-100 mt-3"> Pay Now</a>
                                <a href="{{ route('training.course.details',$course->slug) }}" class="btn btn-md btn-outline-danger w-100 mt-3"> Cancle</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--end contact section-->

@endsection

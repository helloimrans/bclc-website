@extends('frontend.layouts.master')
@section('title', "Terms & Conditions")
@section('content')

    <!-- start page header -->
    <section class="page-header-section wow fadeInDown" data-wow-duration="1s">
        <div class="page-header-box">
            <div class="page-header-img">
                <img src="{{ asset('frontend') }}/images/page-header.jpg" alt="image" class="img-fluid">
            </div>
            <div class="page-header-txt">
                <h4 class="mb-0">Terms & Conditions</h4>
            </div>
        </div>
    </section>
    <!-- end page header -->

    <!-- start learner registraiton section -->
    <section class="my-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="article-details bg-white">
                        {!! @$termsCondition->description!!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end learner registraiton section  -->

@endsection

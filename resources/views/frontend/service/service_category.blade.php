@extends('frontend.layouts.master')
@section('title', 'Service Categories')
@section('content')
    <!-- start page header -->
    <section class="page-header-section wow fadeInDown" data-wow-duration="1s">
        <div class="page-header-box">
            <div class="page-header-img">
                <img src="{{ asset('frontend') }}/images/page-header.jpg" alt="image" class="img-fluid">
            </div>
            <div class="page-header-txt">
                <h4 class="mb-0">Service Categories</h4>
            </div>
        </div>
    </section>
    <!-- end page header -->

    <!-- start service section -->
    <section class="service-categories py-5 wow fadeInDown" data-wow-duration="1s">
        <div class="container">
            <div class="row">
                @foreach ($service_category as $category)
                <div class="col-md-3">
                    <div class="service-cat-box mb-3">
                        <a href="{{ route('category.service.details',$category->slug) }}">
                            <div class="sc-txt">
                               {{ $category->name }}
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- end service section -->

@endsection

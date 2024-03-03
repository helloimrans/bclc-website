@extends('frontend.layouts.master')
@section('title', 'Legal Write Up')
@section('content')
    <!-- start page header -->
    <section class="page-header-section wow fadeInDown" data-wow-duration="1s">
        <div class="page-header-box">
            <div class="page-header-img">
                <img src="{{ asset('frontend') }}/images/page-header.jpg" alt="image" class="img-fluid">
            </div>
            <div class="page-header-txt">
                <h4 class="mb-0">Legal Write Up</h4>
            </div>
        </div>
    </section>
    <!-- end page header -->

    <!-- start article section -->
    <section class="writeup-section writeup-section-page py-5">
        <div class="container">
            <div class="row wow fadeInDown" data-wow-duration="1s">
                @if ($writeups->count() == 0)
                    <div class="col">
                        <div class="card">
                            <div class="card-body text-center">
                                <span>Sorry! Legal Write Up Not Available.</span>
                            </div>
                        </div>
                    </div>
                @endif

                @foreach ($writeups as $writeup)

                 <div class="col-lg-3 col-md-4 col-sm-6">
                    <!-- write up bolx -->
                 <div class="sh-box">
                    <div class="sh-img">
                      <a href="{{ route('writeup.details',$writeup->slug) }}">
                        <div class="sh-img-main">
                            <img src="@if ($writeup->thumbnail_image) {{ Storage::url($writeup->thumbnail_image) }}
                            @else {{ asset('defaults/noimage/no_img.jpg') }} @endif" class="img-fluid" alt="image">
                        </div>
                        <h4 class="text-custom"> {{ \Str::limit($writeup->title, 40) }}</h4>
                      </a>
                    </div>

                    <div class="sh-txt">
                      <p style="font-size: 14px; margin-bottom: 5px;">{!!  substr(strip_tags($writeup->description), 0, 45) !!}...</p>
                      <a class="text-custom" href="{{ route('writeup.details',$writeup->slug) }}">Learn More →</a>
                    </div>
                  </div>
                 </div>

                @endforeach
            </div>
            <div class="custom-paginate">
                <div class="row">
                    <div class="col-md-6 align-self-center">
                        <div class="pgnt-count">
                            <span>Showing {{ $writeups->firstItem() }} to {{ $writeups->lastItem() }}
                                of total {{$writeups->total()}} items</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="main-pgnt">
                            {!! $writeups->links() !!}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- end article section -->

@endsection

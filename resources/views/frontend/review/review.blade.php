@extends('frontend.layouts.master')
@section('title', 'Legal Review')
@section('content')
    <!-- start page header -->
    <section class="page-header-section wow fadeInDown" data-wow-duration="1s">
        <div class="page-header-box">
            <div class="page-header-img">
                <img src="{{ asset('frontend') }}/images/page-header.jpg" alt="image" class="img-fluid">
            </div>
            <div class="page-header-txt">
                <h4 class="mb-0">Legal Review</h4>
            </div>
        </div>
    </section>
    <!-- end page header -->

    <!-- start article section -->
    <section class="article-section article-section-page py-5">
        <div class="container">
            <div class="row wow fadeInDown" data-wow-duration="1s">
                @if ($reviews->count() == 0)
                    <div class="col">
                        <div class="card">
                            <div class="card-body text-center">
                                <span>Sorry! Review Not Available.</span>
                            </div>
                        </div>
                    </div>
                @endif

                @foreach ($reviews as $review)
                    <div class="col-lg-6">
                        <!--news events box-->
                        <div class="news-events-box">
                            <div class="events-img">
                                <img src="@if ($review->thumbnail_image) {{ Storage::url($review->thumbnail_image) }}
                                @else {{ asset('defaults/noimage/no_img.jpg') }} @endif" class="img-fluid" alt="{{ $review->title }}">
                            </div>
                            <div class="events-txt">
                                <h6><a href="{{ route('review.details',$review->slug) }}">{{ \Str::limit($review->title, 40) }}</a></h6>
                                <p class="ne-date">{{ $review->created_at->format('d M Y') }}</p>
                                <p class="ne-desc">{!! substr(strip_tags($review->description), 0, 45) !!}...</p>
                                <a class="ne-readmore" href="{{ route('review.details',$review->slug) }}">Read More</a>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
            <div class="custom-paginate">
                <div class="row">
                    <div class="col-md-6 align-self-center">
                        <div class="pgnt-count">
                            <span>Showing {{ $reviews->firstItem() }} to {{ $reviews->lastItem() }}
                                of total {{ $reviews->total() }} items</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="main-pgnt">
                            {!! $reviews->links() !!}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- end article section -->

@endsection

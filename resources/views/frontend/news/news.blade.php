@extends('frontend.layouts.master')
@section('title', 'Legal News')
@section('content')
    <!-- start page header -->
    <section class="page-header-section wow fadeInDown" data-wow-duration="1s">
        <div class="page-header-box">
            <div class="page-header-img">
                <img src="{{ asset('frontend') }}/images/page-header.jpg" alt="image" class="img-fluid">
            </div>
            <div class="page-header-txt">
                <h4 class="mb-0">Legal News</h4>
            </div>
        </div>
    </section>
    <!-- end page header -->

    <!-- start article section -->
    <section class="article-section article-section-page py-5">
        <div class="container">
            <div class="row wow fadeInDown" data-wow-duration="1s">
                @if ($newses->count() == 0)
                    <div class="col">
                        <div class="card">
                            <div class="card-body text-center">
                                <span>Sorry! News Not Available.</span>
                            </div>
                        </div>
                    </div>
                @endif

                @foreach ($newses as $news)
                    <div class="col-lg-6">
                        <!--news events box-->
                        <div class="news-events-box">
                            <div class="events-img">
                                <img src="@if ($news->thumbnail_image) {{ asset($news->thumbnail_image) }}
                                @else {{ asset('defaults/noimage/no_img.jpg') }} @endif" class="img-fluid" alt="{{ $news->title }}">
                            </div>
                            <div class="events-txt">
                                <h6><a href="{{ route('news.details',$news->slug) }}">{{ \Str::limit($news->title, 40) }}</a></h6>
                                <p class="ne-date">{{ $news->created_at->format('d M Y') }}</p>
                                <p class="ne-desc">{!! substr(strip_tags($news->description), 0, 45) !!}...</p>
                                <a class="ne-readmore" href="{{ route('news.details',$news->slug) }}">Read More</a>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
            <div class="custom-paginate">
                <div class="row">
                    <div class="col-md-6 align-self-center">
                        <div class="pgnt-count">
                            <span>Showing {{ $newses->firstItem() }} to {{ $newses->lastItem() }}
                                of total {{ $newses->total() }} items</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="main-pgnt">
                            {!! $newses->links() !!}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- end article section -->

@endsection

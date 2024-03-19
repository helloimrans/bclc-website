@extends('frontend.layouts.master')
@section('title', 'Review | ' . $review->title . '')
@section('content')

@section('styles')
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-62fb71971c7d4b9c"></script>
@endsection

<!-- start page header -->
<section class="page-header-section wow fadeInDown" data-wow-duration="1s">
    <div class="page-header-box">
        <div class="page-header-img">
            <img src="{{ asset('frontend') }}/images/page-header.jpg" alt="image" class="img-fluid">
        </div>
        <div class="page-header-txt">
            <h4 class="mb-0">Review Details</h4>
        </div>
    </div>
</section>
<!-- end page header -->

<!-- start service section -->
<section class="article-page-section py-5 wow fadeInDown" data-wow-duration="1s">
    <div class="container">
        <div class="row">

            <div class="col-lg-8 col-md-9">
                <div class="article-details">
                    <div class="row">
                        <div class="col-md-8">
                            <h5 class="ad-titles mb-3">{{ $review->title }}</h5>
                        </div>
                        <div class="col-md-4">
                            <div class="td-share">

                                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                                <div class="addthis_inline_share_toolbox"></div>

                            </div>
                        </div>
                    </div>
                    <div class="ad-author mb-4">
                        <span><i class="fa fa-user-o"></i>
                            {{$review->createdBy->name}}
                        </span>
                        <span><i class="fa fa-calendar"></i> {{ $review->created_at->format('d M Y') }}</span>
                    </div>
                    <div class="ad-images mb-3">
                        <img class="img-fluid rounded" src="@if ($review->thumbnail_image) {{ Storage::url($review->thumbnail_image) }}
                        @else {{ asset('defaults/noimage/no_img.jpg') }} @endif" alt="image">
                    </div>
                    <div class="ad-descs">
                        {!! $review->description !!}
                    </div>
                    <div class="course-comment">
                        <h5 class="my-5 mb-3 text-primary"
                            style="border-top:1px solid #ddd; border-bottom:1px solid #ddd;padding:10px 0;">Comments:
                        </h5>
                        <div class="fb-comments" data-href="{{ Request::url() }}" data-width="" data-numposts="5">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="news-tabs mb-3">
                    <ul class="nav nav-tabs nav-justified">

                        <li class="nav-item"><a style="border-radius: 13px 0 0 0 " class="nav-link active show"
                                data-toggle="tab" href="#!">Related Reviews</a></li>

                    </ul>

                    <div class="tab-content tab-content-bgc clearfix">
                        <div class="tab-pane active show" id="imran">
                            <ul class="tab-data">
                                @foreach ($relatedReviews as $relatedReview)
                                <li>
                                    <a
                                        href="{{ route('blog.details',$relatedReview->slug) }}">
                                        <span>
                                            <img src="@if ($relatedReview->thumbnail_image) {{ Storage::url($relatedReview->thumbnail_image) }}
                                            @else {{ asset('defaults/noimage/no_img.jpg') }} @endif"
                                                alt="image">
                                        </span>
                                        {{ \Str::limit($relatedReview->title,60) }}
                                    </a>
                                </li>
                                @endforeach

                            </ul>
                        </div>

                    </div>
                </div>

                <div class="news-tabs">
                    <ul class="nav nav-tabs nav-justified">

                        <li class="nav-item"><a style="border-radius: 13px 0 0 0 " class="nav-link active show"
                                data-toggle="tab" href="#!">Latest Reviews</a></li>

                    </ul>

                    <div class="tab-content tab-content-bgc clearfix">
                        <div class="tab-pane active show" id="imran">
                            <ul class="tab-data">
                                @foreach ($latestReviews as $latestReview)
                                <li>
                                    <a
                                        href="{{ route('blog.details',$latestReview->slug) }}">
                                        <span>
                                            <img src="@if ($latestReview->thumbnail_image) {{ Storage::url($latestReview->thumbnail_image) }}
                                            @else {{ asset('defaults/noimage/no_img.jpg') }} @endif"
                                                alt="image">
                                        </span>
                                        {{ \Str::limit($latestReview->title,60) }}
                                    </a>
                                </li>

                                @endforeach
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end service section -->


@section('scripts')
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v10.0"
        nonce="U78trAkS"></script>
@endsection
@endsection

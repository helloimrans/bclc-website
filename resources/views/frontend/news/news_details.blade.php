@extends('frontend.layouts.master')
@section('title', 'News | ' . $news->title . '')
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
            <h4 class="mb-0">News Details</h4>
        </div>
    </div>
</section>
<!-- end page header -->

<!-- start service section -->
<section class="article-page-section py-5 wow fadeInDown" data-wow-duration="1s">
    <div class="container">
        <div class="row flex-column-reverse flex-md-row">
            <div class="col-lg-4 col-md-6">
                <div class="news-tabs mb-3">
                    <ul class="nav nav-tabs nav-justified">

                        <li class="nav-item"><a style="border-radius: 13px 0 0 0 " class="nav-link active show"
                                data-toggle="tab" href="#!">Related News</a></li>

                    </ul>

                    <div class="tab-content tab-content-bgc clearfix">
                        <div class="tab-pane active show" id="imran">
                            <ul class="tab-data">
                                @foreach ($relatedNewses as $relatedNews)
                                <li>
                                    <a
                                        href="{{ route('news.details',$relatedNews->slug) }}">
                                        <span>
                                            <img src="@if ($relatedNews->thumbnail_image) {{ Storage::url($relatedNews->thumbnail_image) }}
                                            @else {{ asset('defaults/noimage/no_img.jpg') }} @endif"
                                                alt="image">
                                        </span>
                                        {{ \Str::limit($relatedNews->title, 60) }}
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
                                data-toggle="tab" href="#!">Latest News</a></li>

                    </ul>

                    <div class="tab-content tab-content-bgc clearfix">
                        <div class="tab-pane active show" id="imran">
                            <ul class="tab-data">
                                @foreach ($latestNewses as $latestNews)
                                <li>
                                    <a
                                        href="{{ route('news.details',$latestNews->slug) }}">
                                        <span>
                                            <img src="@if ($latestNews->thumbnail_image) {{ Storage::url($latestNews->thumbnail_image) }}
                                            @else {{ asset('defaults/noimage/no_img.jpg') }} @endif"
                                                alt="image">
                                        </span>
                                        {{ \Str::limit($latestNews->title, 60) }}
                                    </a>
                                </li>

                                @endforeach
                            </ul>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-8 col-md-9">
                <div class="article-details">
                    <div class="row">
                        <div class="col-md-8">
                            <h5 class="ad-titles mb-3">{{ $news->title }}</h5>
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
                            {{$news->createdBy->name}}
                        </span>
                        <span><i class="fa fa-calendar"></i> {{ $news->created_at->format('d M Y') }}</span>
                    </div>
                    <div class="ad-images mb-3">
                        <img class="img-fluid rounded" src="@if ($news->thumbnail_image) {{ Storage::url($news->thumbnail_image) }}
                        @else {{ asset('defaults/noimage/no_img.jpg') }} @endif" alt="image">
                    </div>
                    <div class="ad-descs">
                        {!! $news->description !!}
                    </div>
                    <div class="course-comment">
                        <h5 class="my-5 mb-3 text-primary"
                            style="border-top:1px solid #ddd; border-bottom:1px solid #ddd;padding:10px 0;">Comments:
                        </h5>
                        <div class="fb-comments" data-href="{{ Request::url() }}" data-width="" data-numposts="5">
                        </div>
                    </div>
                    @include('frontend.share.share')
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

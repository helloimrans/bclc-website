@extends('frontend.layouts.master')
@section('title', 'Article | ' . $article->title . '')
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
            <h4 class="mb-0">Article Details</h4>
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
                            <h5 class="ad-titles mb-3">{{ $article->title }}</h5>
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
                            {{$article->wroteBy->name}}
                        </span>
                        <span><i class="fa fa-calendar"></i> {{ $article->created_at->format('d M Y') }}</span>
                    </div>
                    <div class="ad-images mb-3">
                        <img class="img-fluid rounded" src="@if ($article->thumbnail_image) {{ Storage::url($article->thumbnail_image) }}
<<<<<<< HEAD
=======
                        @elseif ($article->category->image) {{ Storage::url($article->category->image) }}
>>>>>>> c47df4c5ffd0d6d1e659b7d22a0b43d236745d0c
                        @else {{ asset('defaults/noimage/no_img.jpg') }} @endif" alt="image">
                    </div>
                    <div class="ad-descs">
                        {!! $article->description !!}
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
            <div class="col-lg-4 col-md-6">

                <div class="section-title mb-3">
                    <h2><span>Related Article</span></h2>
                </div>
                @foreach ($relatedArticles as $relatedArticle)
                    <!-- related article item -->
                    <div class="ad-related">
                        <a href="{{ route('article.details', $relatedArticle->slug) }}">
                            <div class="media">
                                <div class="adrm-img">
                                    <img src="@if ($relatedArticle->thumbnail_image) {{ Storage::url($relatedArticle->thumbnail_image) }}
                                    @elseif ($relatedArticle->category->image) {{ Storage::url($relatedArticle->category->image) }}
                                @else {{ asset('defaults/noimage/no_img.jpg') }} @endif"
                                        alt="{{ $relatedArticle->title }}">
                                </div>
                                <div class="media-body">
                                    <div class="adrm-txt">
                                        <p>{{ \Str::limit($relatedArticle->title, 60) }}</p>
                                        <span>{{ $relatedArticle->created_at->format('d M Y') }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach

                <div class="section-title mt-5 mb-3">
                    <h2><span>Latest Article</span></h2>
                </div>
                <div class="article-item">
                    @foreach ($latestArticles as $latestArticle)
                        <!-- article item -->
                        <div class="media">
                            <img src="{{ asset('frontend') }}/images/ac1.png" alt="">
                            <div class="media-body">
                                <a
                                    href="{{ route('article.details', $latestArticle->slug) }}">{{ \Str::limit($latestArticle->title, 60) }}</a>
                            </div>
                        </div>
                    @endforeach
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

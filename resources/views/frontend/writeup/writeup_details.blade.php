@extends('frontend.layouts.master')
@section('title', 'Write Up | ' . $writeup->title . '')
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
            <h4 class="mb-0">Write Up Details</h4>
        </div>
    </div>
</section>
<!-- end page header -->

<!-- start service section -->
<section class="article-page-section py-5 wow fadeInDown" data-wow-duration="1s">
    <div class="container">
        <div class="row flex-column-reverse flex-md-row">
            <div class="col-lg-4 col-md-6">
                <div class="section-title mb-3">
                    <h2><span>Related Write Up</span></h2>
                </div>
                @foreach ($relatedWriteups as $relatedWriteup)
                <!-- related article item -->
                <div class="ad-related">
                    <a href="{{ route('writeup.details',$relatedWriteup->slug) }}">
                        <div class="media">
                            <div class="adrm-img">
                                <img src="@if ($relatedWriteup->thumbnail_image) {{ Storage::url($relatedWriteup->thumbnail_image) }}
                                @else {{ asset('defaults/noimage/no_img.jpg') }} @endif" alt="{{ $relatedWriteup->title }}">
                            </div>
                            <div class="media-body">
                                <div class="adrm-txt">
                                    <p>{{ \Str::limit($relatedWriteup->title, 60) }}</p>
                                    <span>{{ $relatedWriteup->created_at->format('d M Y')}}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
                <div class="section-title mt-5 mb-3">
                    <h2><span>Latest Write Up</span></h2>
                </div>
                <div class="article-item">
                    @foreach ($latestWriteups as $latestWriteup)
                        <!-- article item -->
                        <div class="media">
                            <img src="{{ asset('frontend') }}/images/ac1.png" alt="image">
                            <div class="media-body">
                                <a
                                    href="{{ route('writeup.details', $latestWriteup->slug) }}">{{ \Str::limit($latestWriteup->title, 60) }}</a>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>

            <div class="col-lg-8 col-md-9">
                <div class="article-details">
                    <div class="row">
                        <div class="col-md-8">
                            <h5 class="ad-titles mb-3">{{ $writeup->title }}</h5>
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
                            {{$writeup->createdBy->name}}
                        </span>
                        <span><i class="fa fa-calendar"></i> {{ $writeup->created_at->format('d M Y') }}</span>
                    </div>
                    <div class="ad-images mb-3">
                        <img class="img-fluid rounded" src="@if ($writeup->thumbnail_image) {{ Storage::url($writeup->thumbnail_image) }}
                        @else {{ asset('defaults/noimage/no_img.jpg') }} @endif" alt="image">
                    </div>
                    <div class="ad-descs">
                        {!! $writeup->description !!}
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

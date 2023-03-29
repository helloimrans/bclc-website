@extends('frontend.layouts.master')
@section('title', 'Home')
@section('content')
    <!--start slider area-->
    <section class="slider-section wow fadeInDown" data-wow-duration="1s">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{ asset('frontend') }}/images/slider1.png" alt="First slide" />
                    <div class="carousel-caption">
                        <h2 class="slider-title wow animate__animated animate__backInUp" data-wow-duration=".5s">
                            Welcome to the
                        </h2>

                        <h3 class="slider-subtitle wow animate__animated animate__backInUp" data-wow-duration="1s">
                            BCLC
                        </h3>

                        <div class="cb-p mt-3">
                            <p class="slider-desc wow animate__animated animate__backInUp" data-wow-duration="1.5s">
                                Bangladesh Centre for Legal Compliance (BCLC) is a platform aiming to escalate the standard
                                of legal and
                                compliance services and advancing potential legal and compliance professionals.
                            </p>
                            <p><a href="#!" class="slider-book-btn wow animate__animated animate__backInUp"
                                    data-wow-duration="2s">Book an Appointment</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('frontend') }}/images/service-header.png" alt="First slide" />
                    <div class="carousel-caption">
                        <h2 class="slider-title wow animate__animated animate__backInUp" data-wow-duration=".5s">
                            Welcome to the
                        </h2>

                        <h3 class="slider-subtitle wow animate__animated animate__backInUp" data-wow-duration="1s">
                            BCLC
                        </h3>

                        <div class="cb-p mt-3">
                            <p class="slider-desc wow animate__animated animate__backInUp" data-wow-duration="1.5s">
                                Bangladesh Centre for Legal Compliance (BCLC) is a platform aiming to escalate the standard
                                of legal and
                                compliance services and advancing potential legal and compliance professionals.
                            </p>
                            <p><a href="#!" class="slider-book-btn wow animate__animated animate__backInUp"
                                    data-wow-duration="2s">Book an Appointment</a></p>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </section>
    <!--end slider area-->

    <!-- start article section -->
    <section class="article-section py-5">
        <div class="container">
            <div class="row wow fadeInDown" data-wow-duration="1s">
                <div class="col">
                    <div class="section-title">
                        <h2><span>Article</span></h2>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nemo fuga possimus, amet soluta placeat
                            ducimus
                        </p>
                    </div>
                </div>
            </div>

            <div class="row wow fadeInDown" data-wow-duration="1s">

                <div class="col">
                    <div class="slider-box">

                        <i class="fa fa-angle-left art-prv prv ps-control"></i>
                        <i class="fa fa-angle-right art-nxt nxt ps-control"></i>

                        <div class="my-slider-width">
                            @if ($articles->count() == 0)
                                <div class="card">
                                    <div class="card-body text-center">
                                        <span>Sorry! Article Not Available.</span>
                                    </div>
                                </div>
                            @endif
                            <div class="article-slider my-slider">

                                @foreach ($articles as $article)
                                    <!-- slider item -->
                                    <div class="slider-item">
                                        <!--article box -->
                                        <div class="article-box">
                                            <div class="article-img">
                                                <img src="@if ($article->thumbnail_image) {{ asset($article->thumbnail_image) }}
                      @else {{ asset('defaults/noimage/no_img.jpg') }} @endif"
                                                    alt="{{ $article->title }}">
                                            </div>
                                            <div class="article-txt">
                                                <h5><a
                                                        href="{{ route('article.details', $article->slug) }}">{{ $article->title }}</a>
                                                </h5>
                                                <div class="article-icon">
                                                    <span><i class="fa fa-user-o"></i>
                                                        @if ($article->guard_name == 'admin')
                                                            Admin
                                                        @else
                                                            Not Set
                                                        @endif
                                                    </span>
                                                    <span><i class="fa fa-calendar-o"></i>
                                                        {{ $article->created_at->format('d M Y') }}</span>
                                                </div>
                                                <div class="article-desc">
                                                    <p> {!! substr(strip_tags($article->description), 0, 45) !!}</p>
                                                    <a href="{{ route('article.details', $article->slug) }}">Read More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- end article section -->

    <!-- start write up section -->
    <section class="write-up-section">
        <div class="container">
            <div class="row wow fadeInDown" data-wow-duration="1s">
                <div class="col">
                    <div class="section-title">
                        <h2><span>Write Up</span></h2>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nemo fuga possimus, amet soluta placeat
                            ducimus
                        </p>
                    </div>
                </div>
            </div>

            <div class="row wow fadeInDown" data-wow-duration="1s">

                <div class="col">
                    <div class="slider-box">

                        <i class="fa fa-angle-left wrtp-prv prv ps-control"></i>
                        <i class="fa fa-angle-right wrtp-nxt nxt ps-control"></i>

                        <div class="my-slider-width">
                            @if ($writeups->count() == 0)
                                <div class="card">
                                    <div class="card-body text-center">
                                        <span>Sorry! Write Up Not Available.</span>
                                    </div>
                                </div>
                            @endif
                            <div class="writeup-slider my-slider">
                                @foreach ($writeups as $writeup)
                                    <!-- slider item -->
                                    <div class="slider-item">
                                        <!-- write up bolx -->
                                        <div class="sh-box">
                                            <div class="sh-img">
                                                <a href="{{ route('writeup.details', $writeup->slug) }}">
                                                    <div class="sh-img-main">
                                                        <img src="@if ($writeup->thumbnail_image) {{ asset($writeup->thumbnail_image) }}
                            @else {{ asset('defaults/noimage/no_img.jpg') }} @endif"
                                                            class="img-fluid" alt="image">
                                                    </div>
                                                    <h4 class="text-custom"> {{ \Str::limit($writeup->title, 40) }}</h4>
                                                </a>
                                            </div>

                                            <div class="sh-txt">
                                                <p style="font-size: 14px; margin-bottom: 5px;">{!! substr(strip_tags($writeup->description), 0, 45) !!}...
                                                </p>
                                                <a class="text-custom"
                                                    href="{{ route('writeup.details', $writeup->slug) }}">Learn More →</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- end write up section -->

    <!-- start training section -->
    <section class="training-section py-5">
        <div class="container">
            <div class="row wow fadeInDown" data-wow-duration="1s">
                <div class="col">
                    <div class="section-title">
                        <h2><span>Training</span></h2>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nemo fuga possimus, amet soluta placeat
                            ducimus
                        </p>
                    </div>
                </div>
            </div>

            <div class="row wow fadeInDown" data-wow-duration="1s">

                <div class="col">
                    <div class="slider-box">

                        <i class="fa fa-angle-left trn-prv prv ps-control"></i>
                        <i class="fa fa-angle-right trn-nxt nxt ps-control"></i>

                        <div class="my-slider-width">
                            <div class="training-slider my-slider">

                                <!-- slider item -->
                                <div class="slider-item">
                                    <!-- training box -->
                                    <div class="course-box">
                                        <div class="course-img">
                                            <img class="img-fluid" src="{{ asset('frontend') }}/images/training1.png"
                                                alt="image">
                                        </div>
                                        <div class="course-desc">
                                            <div class="course-author">
                                                <div class="ta-img">
                                                    <div class="ta-img-main">
                                                        <img src="{{ asset('frontend') }}/images/tauthor1.png"
                                                            alt="image">
                                                    </div>
                                                    <a href="#">Md. Niamul Kabir</a>
                                                </div>
                                            </div>
                                            <h5><a href="training-details.html">Fundamentals of Labour Law & Rules</a></h5>
                                            <span>Labour Law & Service Matters</span>
                                            <p><i class="fa fa-calendar"></i> 6 Aug 2022 (5 Day Long)</p>
                                            <p><img src="{{ asset('frontend') }}/images/trached.png" alt="image">
                                                Virtual Platform</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- slider item -->
                                <div class="slider-item">
                                    <!-- training box -->
                                    <div class="course-box">
                                        <div class="course-img">
                                            <img class="img-fluid" src="{{ asset('frontend') }}/images/training2.png"
                                                alt="image">
                                        </div>
                                        <div class="course-desc">
                                            <div class="course-author">
                                                <div class="ta-img">
                                                    <div class="ta-img-main">
                                                        <img src="{{ asset('frontend') }}/images/tauthor2.png"
                                                            alt="image">
                                                    </div>
                                                    <a href="#">Md. Niamul Kabir</a>
                                                </div>
                                            </div>
                                            <h5><a href="training-details.html">Disciplinary Action & Separation of
                                                    Employment</a></h5>
                                            <span>Labour Law & Service Matters</span>
                                            <p><i class="fa fa-calendar"></i> 6 Aug 2022 (5 Day Long)</p>
                                            <p><img src="{{ asset('frontend') }}/images/trached.png" alt="image">
                                                Virtual Platform</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- slider item -->
                                <div class="slider-item">
                                    <!-- training box -->
                                    <div class="course-box">
                                        <div class="course-img">
                                            <img class="img-fluid" src="{{ asset('frontend') }}/images/training3.png"
                                                alt="image">
                                        </div>
                                        <div class="course-desc">
                                            <div class="course-author">
                                                <div class="ta-img">
                                                    <div class="ta-img-main">
                                                        <img src="{{ asset('frontend') }}/images/tauthor1.png"
                                                            alt="image">
                                                    </div>
                                                    <a href="#">Md. Niamul Kabir</a>
                                                </div>
                                            </div>
                                            <h5><a href="training-details.html">Land Registration and Mutation</a></h5>
                                            <span>Labour Law & Service Matters</span>
                                            <p><i class="fa fa-calendar"></i> 6 Aug 2022 (5 Day Long)</p>
                                            <p><img src="{{ asset('frontend') }}/images/trached.png" alt="image">
                                                Virtual Platform</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- slider item -->
                                <div class="slider-item">
                                    <!-- training box -->
                                    <div class="course-box">
                                        <div class="course-img">
                                            <img class="img-fluid" src="{{ asset('frontend') }}/images/training1.png"
                                                alt="image">
                                        </div>
                                        <div class="course-desc">
                                            <div class="course-author">
                                                <div class="ta-img">
                                                    <div class="ta-img-main">
                                                        <img src="{{ asset('frontend') }}/images/tauthor1.png"
                                                            alt="image">
                                                    </div>
                                                    <a href="#">Md. Niamul Kabir</a>
                                                </div>
                                            </div>
                                            <h5><a href="training-details.html">Fundamentals of Labour Law & Rules</a></h5>
                                            <span>Labour Law & Service Matters</span>
                                            <p><i class="fa fa-calendar"></i> 6 Aug 2022 (5 Day Long)</p>
                                            <p><img src="{{ asset('frontend') }}/images/trached.png" alt="image">
                                                Virtual Platform</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- slider item -->
                                <div class="slider-item">
                                    <!-- training box -->
                                    <div class="course-box">
                                        <div class="course-img">
                                            <img class="img-fluid" src="{{ asset('frontend') }}/images/training2.png"
                                                alt="image">
                                        </div>
                                        <div class="course-desc">
                                            <div class="course-author">
                                                <div class="ta-img">
                                                    <div class="ta-img-main">
                                                        <img src="{{ asset('frontend') }}/images/tauthor2.png"
                                                            alt="image">
                                                    </div>
                                                    <a href="#">Md. Niamul Kabir</a>
                                                </div>
                                            </div>
                                            <h5><a href="training-details.html">Disciplinary Action & Separation of
                                                    Employment</a></h5>
                                            <span>Labour Law & Service Matters</span>
                                            <p><i class="fa fa-calendar"></i> 6 Aug 2022 (5 Day Long)</p>
                                            <p><img src="{{ asset('frontend') }}/images/trached.png" alt="image">
                                                Virtual Platform</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- slider item -->
                                <div class="slider-item">
                                    <!-- training box -->
                                    <div class="course-box">
                                        <div class="course-img">
                                            <img class="img-fluid" src="{{ asset('frontend') }}/images/training3.png"
                                                alt="image">
                                        </div>
                                        <div class="course-desc">
                                            <div class="course-author">
                                                <div class="ta-img">
                                                    <div class="ta-img-main">
                                                        <img src="{{ asset('frontend') }}/images/tauthor1.png"
                                                            alt="image">
                                                    </div>
                                                    <a href="#">Md. Niamul Kabir</a>
                                                </div>
                                            </div>
                                            <h5><a href="training-details.html">Land Registration and Mutation</a></h5>
                                            <span>Labour Law & Service Matters</span>
                                            <p><i class="fa fa-calendar"></i> 6 Aug 2022 (5 Day Long)</p>
                                            <p><img src="{{ asset('frontend') }}/images/trached.png" alt="image">
                                                Virtual Platform</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- end training section -->

    <!--start legal insights area-->
    <section class="solution-area clearfix wow fadeInDown" data-wow-duration="1s">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="ml-1 mb-4">
                        <h4 style="color: #555;">LEGAL INSIGHTS
                            <div class="next-prev float-right mr-2">
                                <i class="fa fa-angle-left prv-slsn ps-control slsn-control"></i>
                                <i class="fa fa-angle-right nxt-slsn ps-control slsn-control"></i>
                            </div>
                        </h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="products-box">
                        @if ($insights->count() == 0)
                            <div class="card">
                                <div class="card-body text-center">
                                    <span>Sorry! Insights Not Available.</span>
                                </div>
                            </div>
                        @endif
                        <div class="solution-slider my-slider products-slider-custom">

                            @foreach ($insights as $insight)
                                <!--product-item-->
                                <div class="products-item">
                                    <!--solution item-->
                                    <div class="solution-item">
                                        <div class="media">
                                            <div class="media-body">
                                                <h5 style="color: #505050; font-weight: 600" class="mt-0"><a
                                                        href="{{ route('insights.details', $insight->slug) }}">{{ $insight->title }}</a>
                                                </h5>
                                                <p
                                                    style="color: #787878;font-size: 14px;text-transform: capitalize;margin-bottom: 5px">
                                                    {!! substr(strip_tags($insight->description), 0, 80) !!}...</p>
                                                <a style="color: #d71920;"
                                                    href="{{ route('insights.details', $insight->slug) }}">More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!--end legal area-->

    <!--start news blog area-->
    <section class="news-events clearfix py-4 wow fadeInDown" data-wow-duration="1s">
        <div class="container">
            <div class="row">
                <!--news slider-->
                <div class="col-lg-6 wow fadeInDown" data-wow-duration="1s">
                    <div class="ml-1 mb-2">
                        <h4 class="text-custom ln-title">Legal News
                            <div class="next-prev float-right mr-2">
                                <i class="fa fa-angle-left prv-news ps-control"></i>
                                <i class="fa fa-angle-right nxt-news ps-control"></i>
                            </div>
                        </h4>
                    </div>
                    @if ($newses->count() == 0)
                        <div class="card">
                            <div class="card-body">
                                <span>Sorry! News Not Available.</span>
                            </div>
                        </div>
                    @endif
                    <div class="news-slider my-slider products-slider-custom">
                        @foreach ($newses as $news)
                            <!--products item-->
                            <div class="products-item">
                                <!--news events box-->
                                <div class="news-events-box">
                                    <div class="events-img">
                                        <img src="@if ($news->thumbnail_image) {{ asset($news->thumbnail_image) }}
                  @else {{ asset('defaults/noimage/no_img.jpg') }} @endif"
                                            class="img-fluid" alt="{{ $news->title }}">
                                    </div>
                                    <div class="events-txt">
                                        <h6><a
                                                href="{{ route('news.details', $news->slug) }}">{{ \Str::limit($news->title, 40) }}</a>
                                        </h6>
                                        <p class="ne-date">{{ $news->created_at->format('d M Y') }}</p>
                                        <p class="ne-desc">{!! substr(strip_tags($news->description), 0, 45) !!}...</p>
                                        <a class="ne-readmore" href="{{ route('news.details', $news->slug) }}">Read
                                            More</a>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!--events slider-->
                <div class="col-lg-6 wow fadeInDown" data-wow-duration="1s">
                    <div class="ml-1 mb-2">
                        <h4 class="text-custom ln-title">Legal Blog
                            <div class="next-prev float-right mr-2">
                                <i class="fa fa-angle-left prv-events ps-control"></i>
                                <i class="fa fa-angle-right nxt-events ps-control"></i>
                            </div>
                        </h4>
                    </div>
                    @if ($blogs->count() == 0)
                        <div class="card">
                            <div class="card-body">
                                <span>Sorry! Blog Not Available.</span>
                            </div>
                        </div>
                    @endif
                    <div class="events-slider my-slider products-slider-custom">
                        @foreach ($blogs as $blog)
                            <!--products item-->
                            <div class="products-item">
                                <!--news events box-->
                                <div class="news-events-box">
                                    <div class="events-img">
                                        <img src="@if ($blog->thumbnail_image) {{ asset($blog->thumbnail_image) }}
                  @else {{ asset('defaults/noimage/no_img.jpg') }} @endif"
                                            class="img-fluid" alt="{{ $blog->title }}">
                                    </div>
                                    <div class="events-txt">
                                        <h6><a
                                                href="{{ route('blog.details', $blog->slug) }}">{{ \Str::limit($blog->title, 40) }}</a>
                                        </h6>
                                        <p class="ne-date">{{ $blog->created_at->format('d M Y') }}</p>
                                        <p class="ne-desc">{!! substr(strip_tags($blog->description), 0, 45) !!}...</p>
                                        <a class="ne-readmore" href="{{ route('blog.details', $blog->slug) }}">Read
                                            More</a>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--end news blog area-->

@endsection

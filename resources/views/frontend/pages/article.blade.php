@extends('frontend.layouts.master')
@section('title', 'Articles')
@section('content')
    <!-- start page header -->
    <section class="page-header-section wow fadeInDown" data-wow-duration="1s">
        <div class="page-header-box">
            <div class="page-header-img">
                <img src="{{ asset('frontend') }}/images/page-header.jpg" alt="image" class="img-fluid">
            </div>
            <div class="page-header-txt">
                <h4 class="mb-0">Articles</h4>
            </div>
        </div>
    </section>
    <!-- end page header -->

    <!-- start article section -->
    <section class="article-section article-section-page py-5">
        <div class="container">
            <div class="row wow fadeInDown" data-wow-duration="1s">
                @if ($articles->count() == 0)
                    <div class="col">
                        <div class="card">
                            <div class="card-body text-center">
                                <span>Sorry! Article Not Available.</span>
                            </div>
                        </div>
                    </div>
                @endif

                @foreach ($articles as $article)
                   <div class="col-lg-3 col-md-4 col-sm-6">
                     <!--article box -->
                     <div class="article-box">
                        <div class="article-img">
                            <img src="@if ($article->thumbnail_image) {{ asset($article->thumbnail_image) }}
                            @else {{ asset('defaults/noimage/no_img.jpg') }} @endif">
                        </div>
                        <div class="article-txt">
                            <h5><a href="{{ route('article.details',$article->slug) }}">{{ $article->title }}</a></h5>
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
                                <a href="{{ route('article.details',$article->slug) }}">Read More</a>
                            </div>
                        </div>
                    </div>
                   </div>
                @endforeach
            </div>
            <div class="custom-paginate">
                <div class="row">
                    <div class="col-md-6 align-self-center">
                        <div class="pgnt-count">
                            <span>Showing {{ $articles->firstItem() }} to {{ $articles->lastItem() }}
                                of total {{$articles->total()}} items</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="main-pgnt">
                            {!! $articles->links() !!}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- end article section -->

@endsection

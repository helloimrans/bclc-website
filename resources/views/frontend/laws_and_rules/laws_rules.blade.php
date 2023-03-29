@extends('frontend.layouts.master')
@section('title', 'Laws & Rules')
@section('content')
    <style>
        .article-item .fa {
            margin-top: 5px;
            color: var(--td);
        }
        .article-item a{
            font-size: 15px;
        }

        .laws-box {
            padding: 20px;
            border: var(--border);
            box-shadow: var(--shadow);
            border-radius: 10px;
        }

        .laws-back a {
            background: var(--bd);
            color: #fff;
            text-decoration: none;
            display: inline-block;
            padding: 2px 10px;
            border-radius: 5px;
        }

        .laws-chapter-box {
            border: var(--border);
            box-shadow: var(--shadow);
            padding: 14px;
            border-radius: 5px;
            border-bottom: 2px solid var(--td);
        }

        .chapter-no h6 {
            font-weight: bold;
        }

        .chapter-title p {
            margin-bottom: 5px;
            font-size: 15px;
        }

        .chapter-title a {
            color: var(--td);
            font-size: 15px;
        }

        .service-nsbtn {

            padding-top: 3px;
            padding-bottom: 3px;
        }
    </style>
    <!-- start page header -->
    <section class="page-header-section wow fadeInDown" data-wow-duration="1s">
        <div class="page-header-box">
            <div class="page-header-img">
                <img src="{{ asset('frontend') }}/images/page-header.jpg" alt="image" class="img-fluid">
            </div>
            <div class="page-header-txt">
                <h4 class="mb-0">Laws & Rules</h4>
            </div>
        </div>
    </section>
    <!-- end page header -->

    <!-- start laws section -->
    <section class="article-page-section py-5 wow fadeInDown" data-wow-duration="1s">
        <div class="container">
            <div class="row">

                <div class="col-lg-9">
                    <div class="laws-box">
                        @foreach ($categories as $category)
                            <div class="article-item">
                                <h5 style="font-size: 18px; font-weight:600" class="mb-3" id="category_{{ $category->id }}"><i class="fa fa-angle-double-right"></i> {{ $category->name }}
                                </h5>
                                @if ($category->laws->count() == 0)
                                    <span class="text-danger text-14"><i class="fa fa-ban text-danger"></i> Not found laws!</span>
                                @endif
                                @foreach ($category->laws as $law)
                                <!-- article item -->
                                <div class="media">
                                    <i class="fa fa fa-legal"></i>
                                    <div class="media-body">
                                        <a href="{{ route('laws.rules.view',$law->slug) }}">{{ $law->title }}</a>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                            <hr class="mb-4">
                        @endforeach
                    </div>

                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="section-title mb-3">
                        <h2><span>Categories</span></h2>
                    </div>
                    <div class="article-item">
                        @foreach ($categories as $category)
                        <!-- article item -->
                        <div class="media">
                            <i class="fa fa-angle-double-right"></i>
                            <div class="media-body">
                                <a href="#category_{{ $category->id }}">{{ $category->name }}</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end laws section -->

@endsection

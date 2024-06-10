@extends('frontend.layouts.master')
@section('title', 'Legal Insights')
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

    <!-- start insights section -->
    <section class="insights-section insights-section-page solution-area py-5">
        <div class="container">
            <div class="row wow fadeInDown" data-wow-duration="1s">
                @if ($insights->count() == 0)
                    <div class="col">
                        <div class="card">
                            <div class="card-body text-center">
                                <span>Sorry! Legal Insights Not Available.</span>
                            </div>
                        </div>
                    </div>
                @endif

                @foreach ($insights as $insight)
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <!--insights item-->
                        <div class="solution-item">
                            <div class="media">
                                <div class="media-body">
                                    <h5 style="color: #505050; font-weight: 600" class="mt-0"><a
                                            href="{{ route('insights.details',$insight->slug) }}">{{ $insight->title }}</a></h5>
                                    <p style="color: #787878;font-size: 14px;text-transform: capitalize;margin-bottom: 5px">
                                        {!! substr(strip_tags($insight->description), 0, 80) !!}...</p>
                                    <a style="color: #d71920;" href="{{ route('insights.details',$insight->slug) }}">More</a>
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
                            <span>Showing {{ $insights->firstItem() }} to {{ $insights->lastItem() }}
                                of total {{ $insights->total() }} items</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="main-pgnt">
                            {!! $insights->links() !!}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- end insights section -->

@endsection

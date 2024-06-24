@extends('frontend.layouts.master')
@section('title', 'Laws & Rules')
@section('content')
    <style>
        .article-item .fa {
            margin-top: 5px;
            color: var(--td);
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
            text-transform: lowercase;
        }

        .chapter-no h6::first-line {
            text-transform: capitalize;
        }

        .chapter-title p {
            margin-bottom: 5px;
            font-size: 15px;
            text-transform: lowercase;
        }

        .chapter-title p::first-line {
            text-transform: capitalize;
        }

        .chapter-title a {
            color: var(--td);
            font-size: 15px;
        }

        .service-nsbtn {

            padding-top: 3px;
            padding-bottom: 3px;
        }

        .article-item a {
            font-size: 15px;
        }

        .section-search {
            position: relative;
        }

        .section-ajax {
            position: absolute;
            top: 40%;
            left: 0;
            border: 1px solid #ebebeb;
            padding: 5px;
            box-shadow: var(--shadow);
            border-radius: 5px;
            margin-top: 5px;
            background: #fff;
            width: 100%;
            z-index: 1;
        }

        .section-ajax a {
            display: block;
            padding: 5px 10px;
            border-bottom: 1px solid #ebebeb;
            font-size: 15px;
            color: #000;
            text-decoration: none;
        }

        .nav-pills.nav-justified .nav-link {
            display: block;
            border: 1px solid #ddd;
            margin: 0 5px;
        }

        .nav-pills.nav-justified .nav-link {
            display: block;
            border: 1px solid var(--td);
            color: var(--td);
            padding: 5px;
        }

        .nav-pills .nav-link.active,
        .nav-pills .show>.nav-link {
            background-color: var(--bd);
            color: #fff !important;
            font-weight: 600;
        }

        .laws-chapters-one h5 {
            text-transform: lowercase;
            font-size: 17px;
            background: #ededed;
            text-align: center;
            padding: 10px;
            margin-bottom: 30px;
            border-radius: 3px;
            margin-top: 20px;
        }

        .laws-chapters-one h5::first-line {
            text-transform: capitalize
        }

        .laws-chapters-section h5 {
            font-size: 16px;
            font-weight: 700;
        }

        .laws-chapters-section p {
            font-size: 14px;
            margin-bottom: 12px;
            margin-left: 10px;
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
                <input type="hidden" value="{{ $law->id }}" id="law_id">
                <div class="col-lg-12">

                    {{-- include law header --}}
                     @include('frontend.laws_and_rules.law_header', ['law' => $law])
                    <div class="laws-box">

                        <ul class="nav nav-pills nav-justified" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                    aria-controls="home" aria-selected="true">{{ $law->title }}</a>
                            </li>
                            @if ($law->is_rules == 1)
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                        aria-controls="profile" aria-selected="false">{{ $law->rules_title }}</a>
                                </li>
                            @endif
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            {{-- include main law --}}
                            @include('frontend.laws_and_rules.view.main_law.main_law', ['law' => $law])
                            @if ($law->is_rules == 1)
                               {{-- include rules --}}
                                @include('frontend.laws_and_rules.view.rules.law_rules', ['law' => $law])
                            @endif
                        </div>

                    </div>

                </div>

                {{-- <div class="col-lg-3 col-md-5">
                    <div class="section-title mb-3">
                        <h2><span>Categories</span></h2>
                    </div>
                    <div class="article-item">
                        @foreach ($categories as $category)
                            <!-- article item -->
                            <div class="media">
                                <i class="fa fa-angle-double-right"></i>
                                <div class="media-body">
                                    <a
                                        href="{{ route('laws.rules') }}#category_{{ $category->id }}">{{ $category->name }}</a>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!--Law Faqs-->
                    <div class="section-title mb-3">
                        <h2><span>Law FAQs</span></h2>
                    </div>
                    <div class="td-accordions wow fadeInDown" data-wow-duration="1s">
                        <div id="accordion" class="service-accordion">
                            @forelse ($law_faqs as $key=>$lf)
                                <div class="card">
                                    <div class="card-header" id="heading-{{ $key }}">
                                        <h5 class="mb-0">
                                            <a role="button" data-toggle="collapse"
                                                href="#collapse-{{ $key }}" aria-expanded="false"
                                                aria-controls="collapse-{{ $key }}" class="collapsed w-100">
                                                {{ $lf->title }}
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapse-{{ $key }}" class="collapse" data-parent="#accordion"
                                        aria-labelledby="heading-{{ $key }}" style="">
                                        <div class="card-body">
                                            {{ $lf->description }}
                                        </div>
                                    </div>
                                </div>
                            @empty
                            @endforelse
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
    <!-- end laws section -->

    @section('scripts')
    <script>
        $(document).ready(function() {
            $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
                var activeTab = $(e.target).attr('href');
                localStorage.setItem('activeTab', activeTab);
            });

            var activeTab = localStorage.getItem('activeTab');
            if (activeTab) {
                $('#myTab a[href="' + activeTab + '"]').tab('show');
            } else {
                $('#myTab a:first').tab('show');
            }
        });
    </script>
        <script>
            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                function autoCom() {
                    alert(10);
                }

                $('#search').keyup(function() {
                    var search = $('#search').val();
                    var law_id = $('#law_id').val();
                    if (search == "") {
                        $("#memList").html("");
                        $('#result').hide();
                    } else {
                        $.get("{{ URL::to('section/search') }}", {
                            search: search,
                            law_id: law_id
                        }, function(data) {
                            if (data == "") {
                                $("#memList").html("");
                                $('#result').hide();
                            } else {
                                $('#memList').empty().html(data);
                                $('#result').show();
                            }

                        })
                    }
                });
            });
        </script>
    @endsection
@endsection

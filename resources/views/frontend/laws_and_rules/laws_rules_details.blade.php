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
            top: 100%;
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
                <div class="col-lg-10 mx-auto">
                    <div class="laws-box">
                        <div class="laws-header-one text-center mb-4 pb-2">
                            <h5>{{ $law->title }}</h5>
                            <p>( You are now reading in-depth details )</p>
                        </div>
                        <div class="laws-header-two">
                            <div class="row">
                                <div class="col-md-4 align-self-center">
                                    <div class="laws-back">
                                        <a href="{{ route('laws.rules') }}"><i class="fa fa-angle-left"></i> Back</a>
                                        <a href="javascript:;"><i class="fa fa-eye"></i> {{ $law->total_views }}</a>
                                        @if ($law->link)
                                            <a href="{{ $law->link }}" target="_blank"><i class="fa fa-link"></i> Ref.
                                                Link</a>
                                        @endif
                                    </div>

                                </div>
                                <div class="col-md-5">
                                    <div class="service-search section-search">
                                        <form action="{{ route('section.form.search') }}" method="GET">
                                            <input type="hidden" name="law_id" value="{{ $law->id }}">
                                            <div class="input-group">
                                                <input class="form-control form-control-sm" type="text" id="search"
                                                    name="search" placeholder="Search..." autocomplete="off" required>
                                                <div class="input-group-prepend">
                                                    <button type="submit" class="btn service-nsbtn"><i
                                                            class="fa fa-search"></i></button>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="section-ajax" id="result" style="display:none">
                                            <div id="memList">

                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-3 align-self-center">
                                    <div class="laws-date text-right">
                                        <span>[ {{ \Carbon\Carbon::parse($law->created_at)->format(' d M, Y') }} ]</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-4">
                        <ul class="nav nav-pills nav-justified" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
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
                            <div class="tab-pane fade show active" id="home" role="tabpanel"
                                aria-labelledby="home-tab">
                                <div class="laws-chapters mt-4">
                                    <div class="row">
                                        @if ($law->actChapter->where('status', 1)->count() == 0)
                                            <p class="text-danger text-14 text-center">Not found chapter!</p>
                                        @endif
                                        @foreach ($law->actChapter->where('status', 1) as $chapter)
                                            <div class="col-md-4">
                                                <div class="laws-chapter-box mb-2">
                                                    <div class="chapter-no">
                                                        <h6>{{ $chapter->chapter_no }}</h6>
                                                    </div>
                                                    <div class="chapter-title">
                                                        <p>{{ \Str::limit($chapter->title, 25, '...') }}</p>
                                                        <a href="{{ route('laws.rules.chapter', $chapter->slug) }}">Details
                                                            →</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @if ($law->is_rules == 1)
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="laws-chapters mt-4">
                                        <div class="row">
                                            @if ($law->rulesChapter->where('status', 1)->count() == 0)
                                                <p class="text-danger text-14 text-center">Not found chapter!</p>
                                            @endif
                                            @foreach ($law->rulesChapter->where('status', 1) as $chapter)
                                                <div class="col-md-4">
                                                    <div class="laws-chapter-box mb-2">
                                                        <div class="chapter-no">
                                                            <h6>{{ $chapter->chapter_no }}</h6>
                                                        </div>
                                                        <div class="chapter-title">
                                                            <p>{{ \Str::limit($chapter->title, 25, '...') }}</p>
                                                            <a href="{{ route('laws.rules.chapter', $chapter->slug) }}">Details
                                                                →</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- end laws section -->

@section('scripts')
    <script>
        $(document).ready(function() {
            $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
                localStorage.setItem('activeTab', $(e.target).attr('href'));
            });
            var activeTab = localStorage.getItem('activeTab');
            if (activeTab) {
                $('#myTab a[href="' + activeTab + '"]').tab('show');
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
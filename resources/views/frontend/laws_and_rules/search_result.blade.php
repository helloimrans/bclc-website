@extends('frontend.layouts.master')
@section('title', 'Laws & Rules')
@section('content')
    <style>
        .article-item .fa {
            margin-top: 5px;
            color: var(--td);
        }

        .laws-box {
            padding: 30px;
            border: var(--border);
            box-shadow: var(--shadow);
            border-radius: 10px;
        }

        .article-item a {
            font-size: 15px;
        }

        .laws-back a {
            background: var(--bd);
            color: #fff;
            text-decoration: none;
            display: inline-block;
            padding: 2px 10px;
            border-radius: 5px;
        }

        .service-nsbtn {

            padding-top: 3px;
            padding-bottom: 3px;
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
            font-weight: 700
        }

        .laws-chapters-section p {
            font-size: 14px;
            margin-bottom: 12px;
            margin-left: 10px
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
        }

        .section-ajax a:last-child {
            border-bottom: 0;
        }
    </style>
    <!-- start page header -->
    <section class="page-header-section wow fadeInDown" data-wow-duration="1s">
        <div class="page-header-box">
            <div class="page-header-img">
                <img src="{{ asset('frontend') }}/images/page-header.jpg" alt="image" class="img-fluid">
            </div>
            <div class="page-header-txt">
                <h4 class="mb-0">Search Result</h4>
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
                    @includeIf('frontend.laws_and_rules.law_header', ['law' => $law])

                    <div class="laws-chapters-one">

                        <h5>{{ $resultCount }} results found.</h5>
                    </div>
                    @foreach ($sections as $section)
                        <div class="laws-chapters-section laws-box">
                            <a href="{{ route('search.result.one', $section->slug) }}">
                                <div class="row mb-2">
                                    <div class="col-8">
                                        <h5 class="mb-2 text-18">
                                            {{ session()->get('lawLocale') == 'bn' ? $section->title_bn : $section->title }}
                                        </h5>
                                        <h5 class="mb-3 text-15">
                                            {{ session()->get('lawLocale') == 'bn' ? $section->chapter->chapter_no_bn : $section->chapter->chapter_no }}
                                            :
                                            {{ session()->get('lawLocale') == 'bn' ? $section->chapter->title_bn : $section->chapter->title }}
                                        </h5>
                                    </div>
                                    <div class="col-4 align-self-center text-right">
                                        <p class="mb-0 font-weight-bold text-17 td">

                                            @if ($section->is_act == 1)
                                                {{ $law->short_form }}
                                            @endif

                                            @if ($section->is_rules == 1)
                                                {{ $law->rules_short_form }}
                                            @endif

                                        </p>
                                    </div>
                                </div>
                                <p class="mb-0">
                                    {!! session()->get('lawLocale') == 'bn' ? substr(strip_tags($section->description_bn), 0, 200) : substr(strip_tags($section->description), 0, 200) !!}...
                                </p>
                            </a>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
    <!-- end laws section -->

@section('scripts')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#search_data').on('click', function() {
                var search_data = $(this).text();
                alert(search);
            });

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

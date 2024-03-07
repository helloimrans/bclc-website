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
            font-weight: 700;
            margin-top: 40px
        }

        .laws-chapters-section p {
            font-size: 14px;
            margin-bottom: 12px;
            margin-left: 10px;
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
                <h4 class="mb-0">Laws & Rules</h4>
            </div>
        </div>
    </section>
    <!-- end page header -->

    <!-- start laws section -->
    <section class="article-page-section py-5 wow fadeInDown" data-wow-duration="1s">
        <div class="container">
            <div class="row">
                <input type="hidden" value="{{ @$chapter->law->id }}" id="law_id">
                <div class="col-lg-12">

                    {{-- include law header --}}
                    @includeIf('frontend.laws_and_rules.law_header', ['law' => @$chapter->law])
                    <div class="laws-box">

                        <div class="laws-chapters-one">
                            <h5>{{ $chapter->chapter_no }} : {{ $chapter->title }} <span class="text-uppercase">(

                                    @if ($chapter->is_act == 1)
                                        {{ $chapter->law->short_form }}
                                    @endif

                                    @if ($chapter->is_rules == 1)
                                        {{ $chapter->law->rules_short_form }}
                                    @endif

                                    )
                                </span></h5>
                        </div>
                        <div class="laws-chapters mt-4">
                            @if ($chapter->section->where('status', 1)->where('parent_id', 0)->count() == 0)
                                <p class="text-danger text-14 text-center">Not found section!</p>
                            @endif
                        </div>
                        @foreach ($chapter->section->where('status', 1)->where('parent_id', 0) as $section)
                            <div class="laws-chapters-section">
                                <h5>{{ $section->title }}</h5>
                                <p>{!! $section->description !!}</p>
                            </div>
                            @if (count($section->childs->where('status', 1)))
                                @include('frontend.laws_and_rules.child_section', [
                                    'childs' => $section->childs,
                                ])
                            @endif
                        @endforeach
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

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
                            {{-- include main law --}}
                            @include('frontend.laws_and_rules.details.main_law.main_law', ['law' => $law])
                            @if ($law->is_rules == 1)
                            {{-- include rules --}}
                            @include('frontend.laws_and_rules.details.rules.law_rules', ['law' => $law])
                            @endif
                        </div>

                    </div>

                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="law_schedules">
                                <a href="#!" class="pr-1" data-toggle="modal" data-target="#LawScheduleModal"><span
                                        class="schedule-btn btn w-100 btn-md btn-info">Law Schedules</span></a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="law_forms">
                                <a href="#!" class="pr-1" data-toggle="modal" data-target="#LawFormModal"><span
                                        class="form-btn btn btn-md w-100 btn-info">Low Forms</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end laws section -->

    <!--Law Schedules Modal-->
    <div class="service-cunsult-modal">
        <div class="modal fade" id="LawScheduleModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body pt-0">
                        <div class="sm-body">
                            <h5>Law Schedules</h5>
                            <div class="law-schedule-options text-center">
                                @forelse ($law_schedules as $ls)
                                    <a href="#!" class="btn btn-md btn-info w-100 mb-2">{{ $ls->title }}</a>
                                @empty
                                    <h5 class="text-danger">Empty</h5>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Law Forms Modal-->
    <div class="service-cunsult-modal">
        <div class="modal fade" id="LawFormModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body pt-0">
                        <div class="sm-body">
                            <h5>Law Forms</h5>
                            <div class="law-schedule-options text-center">
                                @forelse ($law_forms as $lf)
                                    <a href="#!" class="btn btn-md btn-info w-100 mb-2">{{ $lf->title }}</a>
                                @empty
                                    <h5 class="text-danger">Empty</h5>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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

                $('a[data-toggle="tab"]').on('click', function(e) {
                    location.reload();
                });
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

@extends('admin.layouts.master')
@section('title', 'Show Laws & Rules')
@section('content')

    <style>
        .laws-back a {
            margin: 0 5px;
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

        .laws-chapters-one h5 {
            text-transform: lowercase;
            font-size: 17px;
            background: #ededed;
            text-align: center;
            padding: 5px;
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

        .nav-pills.nav-justified .nav-link {
            display: block;
            border: 1px solid #ddd;
            margin: 0 5px;
        }

        .nav-pills.nav-justified .nav-link {
            display: block;
        }

        .nav-pills .nav-link.active,
        .nav-pills .show>.nav-link {
            font-weight: 600;
        }
    </style>

    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Show Laws & Rules</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Show Laws & Rules
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <div class="row" id="basic-table">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="laws-box">
                                <div class="laws-header-one text-center">
                                    <h5>{{ $law->title }}</h5>
                                </div>
                                <div class="laws-header-two">
                                    <div class="row">
                                        <div class="col-md-6 align-self-center">
                                            <div class="laws-back">
                                                <a class="btn btn-secondary btn-sm" href="{{ route('law.index') }}"><i
                                                        class="fa fa-angle-left"></i> Back</a>
                                                <a class="btn btn-info btn-sm" href="{{ route('law.edit', $law->id) }}"><i
                                                        class="fa fa-edit"></i> Edit</a>
                                            </div>

                                        </div>
                                        <div class="col-md-6 align-self-center">
                                            <div class="laws-date text-end laws-back">
                                                <span style="margin-right: 15px;">[
                                                    {{ \Carbon\Carbon::parse($law->created_at)->format(' d M, Y') }}
                                                    ]</span>
                                                @if ($law->status == 1)
                                                    <a class="btn btn-success btn-sm" href="javascript:;"><i
                                                            class="fa fa-check"></i> Active</a>
                                                @else
                                                    <a class="btn btn-danger btn-sm" href="javascript:;"><i
                                                            class="fa fa-ban"></i> Inactive</a>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="mb-4">

                                <ul class="nav nav-pills mb-3 nav-justified" id="pills-tab" role="tablist">

                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-home" type="button" role="tab"
                                            aria-controls="pills-home" aria-selected="true">{{ $law->title }}</button>
                                    </li>
                                    @if ($law->is_rules == 1)
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-profile" type="button" role="tab"
                                            aria-controls="pills-profile" aria-selected="false">{{ $law->rules_title }}</button>
                                    </li>
                                    @endif
                                </ul>

                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                        aria-labelledby="pills-home-tab">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-sm">
                                                <tr>
                                                    <th class="bg-light">Act No</th>
                                                    <td>{{ $law->act_no }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="bg-light">Act Year</th>
                                                    <td>{{ $law->act_year }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="bg-light">Act Date</th>
                                                    <td>{{ \Carbon\Carbon::parse($law->act_date)->format(' d M, Y') }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                        @foreach ($law->actChapter->where('status', 1) as $chapter)
                                            <div class="laws-chapters-one mt-4">
                                                <h5>{{ $chapter->chapter_no }} : {{ $chapter->title }}</h5>
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
                                                @if (count($section->childs))
                                                    @include('admin.law.child_section_show', [
                                                        'childs' => $section->childs,
                                                    ])
                                                @endif
                                            @endforeach
                                        @endforeach
                                        <div class="laws-chapters mt-4">
                                            @if ($law->actChapter->where('status', 1)->count() == 0)
                                                <p class="text-danger text-14 text-center">Not found chapter!</p>
                                            @endif
                                        </div>
                                    </div>
                                    @if ($law->is_rules == 1)
                                    <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                        aria-labelledby="pills-profile-tab">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-sm">
                                                <tr>
                                                    <th class="bg-light">Rules Year</th>
                                                    <td>{{ $law->rules_year }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="bg-light">Rules Date</th>
                                                    <td>{{ \Carbon\Carbon::parse($law->rules_date)->format(' d M, Y') }}
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>

                                        @foreach ($law->rulesChapter->where('status', 1) as $chapter)
                                            <div class="laws-chapters-one mt-4">
                                                <h5>{{ $chapter->chapter_no }} : {{ $chapter->title }}</h5>
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
                                                @if (count($section->childs))
                                                    @include('frontend.pages.child_section', [
                                                        'childs' => $section->childs,
                                                    ])
                                                @endif
                                            @endforeach
                                        @endforeach
                                        <div class="laws-chapters mt-4">
                                            @if ($law->rulesChapter->where('status', 1)->count() == 0)
                                                <p class="text-danger text-14 text-center">Not found chapter!</p>
                                            @endif
                                        </div>
                                    </div>
                                    @endif
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@section('scripts')
    <script>
        const pillsTab = document.querySelector('#pills-tab');
        const pills = pillsTab.querySelectorAll('button[data-bs-toggle="pill"]');

        pills.forEach(pill => {
            pill.addEventListener('shown.bs.tab', (event) => {
                const {
                    target
                } = event;
                const {
                    id: targetId
                } = target;

                savePillId(targetId);
            });
        });

        const savePillId = (selector) => {
            localStorage.setItem('activePillId', selector);
        };

        const getPillId = () => {
            const activePillId = localStorage.getItem('activePillId');

            // if local storage item is null, show default tab
            if (!activePillId) return;

            // call 'show' function
            const someTabTriggerEl = document.querySelector(`#${activePillId}`)
            const tab = new bootstrap.Tab(someTabTriggerEl);

            tab.show();
        };

        // get pill id on load
        getPillId();
    </script>
@endsection
@endsection

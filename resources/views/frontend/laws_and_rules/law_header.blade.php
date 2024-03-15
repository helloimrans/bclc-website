@php
    $route = Route::currentRouteName();
@endphp

<style>
    .lang-refresh {
        background: #ededed !important;
        height: 30px;
        width: 30px;
        line-height: 32px;
        text-align: center;
        color: #000 !important;
        padding: 0 !important;
    }
</style>

<div class="laws-header-one text-center mb-4 pb-2">
    <h5>{{ $law->title }}</h5>
    {{-- <p>( ACT NO. {{ $law->act_no }} OF {{ $law->act_year }} )</p> --}}
    <a href="{{ route('laws.rules.details', $law->slug) }}">Click here for In-depth-details</a>
</div>
<div class="laws-header-two">
    <div class="row">
        <div class="col-md-4 align-self-center">
            <div class="laws-back">
                <a href="{{ url()->previous() }}"><i class="fa fa-angle-left"></i> Back</a>
                <a href="javascript:;"><i class="fa fa-eye"></i> {{ $law->total_views }}</a>
            </div>

        </div>
        <div class="col-md-5">
            <div class="service-search section-search">
                <form action="{{ route('section.form.search') }}" method="GET">
                    <input type="hidden" name="law_id" value="{{ $law->id }}" required>
                    <div class="input-group">
                        <input class="form-control form-control-sm" type="text" id="search" name="search"
                            placeholder="Search..." autocomplete="off" value="{{ @$search }}" required>
                        <div class="input-group-prepend">
                            <button type="submit" class="btn service-nsbtn"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
                @if ($law->lang == 'both')
                    <p class="text-13 text-center m-0 px-2 pt-1"><span style="font-weight: 500">Notes:</span> Search is
                        available for {{ session()->get('lawLocale') == 'bn' ? 'Bengali' : 'English' }}, select
                        {{ session()->get('lawLocale') == 'bn' ? 'English' : 'Bengali' }} language for
                        {{ session()->get('lawLocale') == 'bn' ? 'English' : 'Bengali' }} search</p>
                @endif
                <div class="section-ajax" id="result"
                    style="display:none; {{ $law->lang != 'both' ? 'top:100%' : 'top:40%' }}">
                    <div id="memList">

                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-3 align-self-center">
            <div class="laws-date text-right laws-back">
                <a href="{{route('refresh.law.locale', $law->id)}}" class="mr-1 lang-refresh" title="Reset & Refresh Language"><i class="fa fa-refresh"></i></a>
                <div class="ht-social">
                    @if ($law->lang == 'both')
                        <select id="lawLanguage" class="px-3" style="cursor: pointer">
                            <option value="" disabled>Select Language</option>
                            <option value="bn"
                                @if (session()->get('lawLocale') == 'bn') @selected(true) @endif>
                                Bengali</option>
                            <option value="en"
                                @if (session()->get('lawLocale') == 'en') @selected(true) @endif>
                                English</option>
                            @if ($route == 'laws.rules.chapter' || $route == 'search.result.one')
                                <option value="both"
                                    @if (session()->get('lawChapterLocale') == 'both') @selected(true) @endif>
                                    Bengali & English</option>
                            @endif
                        </select>
                    @else
                        <select disabled>
                            <option value="" disabled>Select Language</option>
                            <option @if ($law->lang == 'bn') @selected(true) @endif>
                                Bengali</option>
                            <option @if ($law->lang == 'en') @selected(true) @endif>
                                English</option>
                        </select>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<hr class="my-4">
<input type="hidden" id="LocaleLawId" value="{{ $law->id }}">

{{-- <div class="laws-box text-center mb-4">
    <p class="text-danger font-weight-bold">Refresh required. Click the button below to refresh</p>
    <div class="lang-refresh">
        <a href="" class="mr-1" title="Refresh Language"><i class="fa fa-refresh mr-1"></i>Refresh</a>
    </div>
</div>

<style>
    .lang-refresh a {
        background: #ededed !important;
        text-align: center;
        color: #000 !important;
        display: inline-block;
        border-radius: 5px;
        padding: 5px 25px;
        font-weight: 600;
        text-decoration: none
    }
</style> --}}



<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('lawLanguage').addEventListener('change', function() {
            var locale = this.value;
            var lawId = document.getElementById("LocaleLawId").value;
            var xhr = new XMLHttpRequest();
            xhr.open('POST', "{{ route('change.law.locale') }}");
            xhr.setRequestHeader('Content-Type', 'application/json');
            xhr.setRequestHeader('X-CSRF-TOKEN', "{{ csrf_token() }}");
            xhr.onload = function() {
                if (xhr.status === 200) {
                    location.reload();
                } else {
                    console.error(xhr.responseText);
                }
            };
            xhr.onerror = function() {
                console.error(xhr.responseText);
            };
            xhr.send(JSON.stringify({
                locale: locale,
                lawId: lawId
            }));
        });
    });
</script>

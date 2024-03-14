@php
    $route = Route::currentRouteName();
@endphp

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
                <div class="section-ajax" id="result" style="display:none">
                    <div id="memList">

                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-3 align-self-center">
            <div class="laws-date text-right laws-back">
                <div class="ht-social">
                    @if ($law->lang == 'both')
                    <select id="lawLanguage" class="px-3" style="cursor: pointer">
                        <option value="">Select Language</option>
                        <option value="bn" @if (session()->get('lawLocale') == 'bn') @selected(true) @endif>
                            Bangla</option>
                        <option value="en" @if (session()->get('lawLocale') == 'en') @selected(true) @endif>
                            English</option>
                            @if ($route == 'laws.rules.chapter')
                            <option value="both" @if (session()->get('lawChapterLocale') == 'both') @selected(true) @endif>
                                Bangla & English</option>
                            @endif
                    </select>
                    @else
                    <select disabled>
                        <option value="">Select Language</option>
                        <option @if ($law->lang == 'bn') @selected(true) @endif>
                            Bangla</option>
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
<input type="hidden" id="LocaleLawId" value="{{$law->id}}">
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
            xhr.send(JSON.stringify({ locale: locale, lawId: lawId }));
        });
    });
</script>

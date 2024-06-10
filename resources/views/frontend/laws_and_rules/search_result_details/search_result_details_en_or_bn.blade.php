<div class="laws-chapters-section laws-box">
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
        {!! session()->get('lawLocale') == 'bn' ? $section->description_bn : $section->description !!}
    </p>
</div>

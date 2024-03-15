<div class="laws-box">
    <ul class="law-chapter-summery pt-3">
        <h5 class="mb-3">Sections</h5>
        @foreach ($part->section->where('status', 1)->where('parent_id', 0) as $section)
            <li>
                <a href="#goSection_{{ $section->slug }}">
                    {{ session()->get('lawLocale') == 'bn' ? $section->title_bn : $section->title }}
                </a>
            </li>
            @if (count($section->childs->where('status', 1)))
                @include('frontend.laws_and_rules.child_section_intro', [
                    'childs' => $section->childs,
                ])
            @endif
        @endforeach
    </ul>

    <div class="laws-chapters-one">
        <h5>
            {{ session()->get('lawLocale') == 'bn' ? $part->part_no_bn : $part->part_no }}
            :
            {{ session()->get('lawLocale') == 'bn' ? $part->title_bn : $part->title }}

            <span class="text-uppercase">(

                @if ($part->is_act == 1)
                    {{ $part->law->short_form }}
                @endif

                @if ($part->is_rules == 1)
                    {{ $part->law->rules_short_form }}
                @endif

                )
            </span>
        </h5>
    </div>
    <div class="laws-chapters mt-4">
        @if ($part->section->where('status', 1)->where('parent_id', 0)->count() == 0)
            <p class="text-danger text-14 text-center">Not found section!</p>
        @endif
    </div>
    @foreach ($part->section->where('status', 1)->where('parent_id', 0) as $section)
        <div class="laws-chapters-section" id="goSection_{{ $section->slug }}">
            <h5>{{ session()->get('lawLocale') == 'bn' ? $section->title_bn : $section->title }}</h5>
            <p>{!! session()->get('lawLocale') == 'bn' ? $section->description_bn : $section->description !!}</p>
        </div>
        @if (count($section->childs->where('status', 1)))
            @include('frontend.laws_and_rules.child_section', [
                'childs' => $section->childs,
            ])
        @endif
    @endforeach
</div>

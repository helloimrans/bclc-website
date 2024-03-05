@foreach ($law->rulesPart as $part)
    <div class="laws-chapters-one mt-4 mb-3">
        <h5>
            {{ app()->getLocale() == 'bn' ? $part->part_no_bn : $part->part_no }}
            :
            {{ app()->getLocale() == 'bn' ? $part->title_bn : $part->title }}
        </h5>
    </div>
    @foreach ($part->chapter->where('status', 1) as $chapter)
        <div class="laws-chapters-one text-center mt-4">
            <h5 class="d-inline">
                {{ app()->getLocale() == 'bn' ? $chapter->chapter_no_bn : $chapter->chapter_no }}
                :
                {{ app()->getLocale() == 'bn' ? $chapter->title_bn : $chapter->title }}
            </h5>
        </div>
        <div class="laws-chapters mt-4">
            @if ($chapter->section->where('status', 1)->where('parent_id', 0)->count() == 0)
                <p class="text-danger text-14 text-center">Not found section!</p>
            @endif
        </div>
        @foreach ($chapter->section->where('status', 1)->where('parent_id', 0) as $section)
            <div class="laws-chapters-section">
                <h5>
                    {{ app()->getLocale() == 'bn' ? $section->title_bn : $section->title }}
                </h5>
                <p>
                    {!! app()->getLocale() == 'bn' ? $section->description_bn : $section->description !!}
                </p>
            </div>
            @if (count($section->childs))
                @include('frontend.laws_and_rules.child_section', [
                    'childs' => $section->childs,
                    'law' => $law,
                ])
            @endif
        @endforeach
    @endforeach
    <div class="laws-chapters mt-4">
        @if ($law->rulesPart->where('status', 1)->count() == 0)
            <p class="text-danger text-14 text-center">Not found part!</p>
        @endif
    </div>
@endforeach

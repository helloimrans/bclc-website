@foreach ($law->rulesChapter as $chapter)
    <div class="laws-chapters-one mt-4">
        <h5>
            {{ session()->get('lawLocale') == 'bn' ? $chapter->chapter_no_bn : $chapter->chapter_no }}
            :
            {{ session()->get('lawLocale') == 'bn' ? $chapter->title_bn : $chapter->title }}
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
                {{ session()->get('lawLocale') == 'bn' ? $section->title_bn : $section->title }}
            </h5>
            <p>
                {!! session()->get('lawLocale') == 'bn' ? $section->description_bn : $section->description !!}
            </p>
        </div>
        @if (count($section->childs))
            @include('frontend.laws_and_rules.child_section', [
                'childs' => $section->childs,
                'law' => $law,
            ])
        @endif
    @endforeach
    <div class="laws-chapters mt-4">
        @if ($law->rulesChapter->where('status', 1)->count() == 0)
            <p class="text-danger text-14 text-center">Not found chapter!</p>
        @endif
    </div>
@endforeach

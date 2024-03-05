<div id="accordion" class="service-accordion">
    @foreach ($law->actChapter as $chapter)
        <div class="card">
            <div class="card-header" id="heading-1_{{ $chapter->id }}">
                <h5 class="mb-0">
                    <a role="button" data-toggle="collapse" href="#collapse-1_{{ $chapter->id }}"
                        aria-controls="collapse-1_{{ $chapter->id }}">
                        {{ app()->getLocale() == 'bn' ? $chapter->chapter_no_bn : $chapter->chapter_no }}
                        :
                        {{ app()->getLocale() == 'bn' ? $chapter->title_bn : $chapter->title }}
                    </a>
                </h5>
            </div>
            <div id="collapse-1_{{ $chapter->id }}" class="collapse" data-parent="#accordion"
                aria-labelledby="heading-1_{{ $chapter->id }}">
                <div class="card-body">
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
                </div>
            </div>
        </div>
    @endforeach
</div>

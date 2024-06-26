<div id="accordion" class="service-accordion">
    @foreach ($law->rulesPart as $part)
        <div class="card">
            <div class="card-header" id="heading-1_{{ $part->id }}">
                <h5 class="mb-0">
                    <a role="button" data-toggle="collapse" href="#collapse-1_{{ $part->id }}"
                        aria-controls="collapse-1_{{ $part->id }}">
                        {{ session()->get('lawLocale') == 'bn' ? $part->part_no_bn : $part->part_no }}
                        :
                        {{ session()->get('lawLocale') == 'bn' ? $part->title_bn : $part->title }}
                    </a>
                </h5>
            </div>
            <div id="collapse-1_{{ $part->id }}" class="collapse" data-parent="#accordion"
                aria-labelledby="heading-1_{{ $part->id }}">
                <div class="card-body">
                    <!-- Nested accordion -->
                    <div id="accordion-{{ $part->id }}" class="service-accordion">
                        @foreach ($part->chapter->where('status', 1) as $chapter)
                            <div class="card">
                                <div class="card-header" id="heading-{{ $chapter->id }}">
                                    <h5 class="mb-0">
                                        <a role="button" data-toggle="collapse" href="#collapse-{{ $chapter->id }}"
                                            aria-controls="collapse-{{ $chapter->id }}">
                                            {{ session()->get('lawLocale') == 'bn' ? $chapter->chapter_no_bn : $chapter->chapter_no }}
                                            :
                                            {{ session()->get('lawLocale') == 'bn' ? $chapter->title_bn : $chapter->title }}
                                        </a>
                                    </h5>
                                </div>
                                <div id="collapse-{{ $chapter->id }}" class="collapse"
                                    data-parent="#accordion-{{ $part->id }}"
                                    aria-labelledby="heading-{{ $chapter->id }}">
                                    <div class="card-body">
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
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

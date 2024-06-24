<div class="row">
    <div class="col-md-6 left-sections">
        <div class="laws-box">
            <ul class="law-chapter-summery pt-3">
                <h5 class="mb-3">Sections (Bangla)</h5>
                @foreach ($chapter->section->where('status', 1)->where('parent_id', 0) as $section)
                    <li>
                        <a href="#goSection_bn_{{ $section->slug }}">
                            {{ $section->title_bn ?? '--' }}
                        </a>
                    </li>
                    @if (count($section->childs->where('status', 1)))
                        @include('frontend.laws_and_rules.child_section_intro_en', [
                            'childs' => $section->childs,
                        ])
                    @endif
                @endforeach
            </ul>

            <div class="laws-chapters-one">
                <h5>
                    {{ $chapter->chapter_no_bn ?? '--' }} :
                    {{ $chapter->title_bn ?? '--' }}
                    <span class="text-uppercase">
                        @if ($chapter->is_act == 1)
                            {{ $chapter->law->short_form }}
                        @endif
                        @if ($chapter->is_rules == 1)
                            {{ $chapter->law->rules_short_form }}
                        @endif
                    </span>
                </h5>
            </div>
            <div class="laws-chapters mt-4">
                @if ($chapter->section->where('status', 1)->where('parent_id', 0)->count() == 0)
                    <p class="text-danger text-14 text-center">Not found section!</p>
                @endif
            </div>

            <div class="laws-chapters-container">
                @foreach ($chapter->section->where('status', 1)->where('parent_id', 0) as $section)
                    <div class="laws-chapters-section" id="goSection_bn_{{ $section->slug }}">
                        <h5>{{ $section->title_bn ?? '--' }}</h5>
                        <p>{!! $section->description_bn ?? '--' !!}</p>
                    </div>
                    @if (count($section->childs->where('status', 1)))
                        @include('frontend.laws_and_rules.child_section_bn', [
                            'childs' => $section->childs,
                        ])
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    <div class="col-md-6 right-sections">
        <div class="laws-box">
            <ul class="law-chapter-summery pt-3">
                <h5 class="mb-3">Sections (English)</h5>
                @foreach ($chapter->section->where('status', 1)->where('parent_id', 0) as $section)
                    <li>
                        <a href="#goSection_en_{{ $section->slug }}">
                            {{ $section->title }}
                        </a>
                    </li>
                    @if (count($section->childs->where('status', 1)))
                        @include('frontend.laws_and_rules.child_section_intro_bn', [
                            'childs' => $section->childs,
                        ])
                    @endif
                @endforeach
            </ul>

            <div class="laws-chapters-one">
                <h5>
                    {{ $chapter->chapter_no }} :
                    {{ $chapter->title }}
                    <span class="text-uppercase">
                        @if ($chapter->is_act == 1)
                            {{ $chapter->law->short_form }}
                        @endif
                        @if ($chapter->is_rules == 1)
                            {{ $chapter->law->rules_short_form }}
                        @endif
                    </span>
                </h5>
            </div>
            <div class="laws-chapters mt-4">
                @if ($chapter->section->where('status', 1)->where('parent_id', 0)->count() == 0)
                    <p class="text-danger text-14 text-center">Not found section!</p>
                @endif
            </div>

            <div class="laws-chapters-container">
                @foreach ($chapter->section->where('status', 1)->where('parent_id', 0) as $section)
                    <div class="laws-chapters-section" id="goSection_en_{{ $section->slug }}">
                        <h5>{{ $section->title }}</h5>
                        <p>{!! $section->description !!}</p>
                    </div>
                    @if (count($section->childs->where('status', 1)))
                        @include('frontend.laws_and_rules.child_section_en', [
                            'childs' => $section->childs,
                        ])
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>


<style>
    .laws-chapters-container {
        display: flex;
        flex-direction: column;
    }

    .laws-chapters-section {
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        margin-bottom: 20px;
    }

    .laws-box {
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .laws-chapters-one,
    .laws-chapters {
        flex: 0 0 auto;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const leftSections = document.querySelectorAll('.left-sections .laws-chapters-section');
        const rightSections = document.querySelectorAll('.right-sections .laws-chapters-section');
        if (leftSections.length === rightSections.length) {
            leftSections.forEach((leftSection, index) => {
                const rightSection = rightSections[index];
                const leftHeight = leftSection.offsetHeight;
                const rightHeight = rightSection.offsetHeight;
                const maxHeight = Math.max(leftHeight, rightHeight);

                leftSection.style.height = `${maxHeight}px`;
                rightSection.style.height = `${maxHeight}px`;
            });
        }
    });
</script>

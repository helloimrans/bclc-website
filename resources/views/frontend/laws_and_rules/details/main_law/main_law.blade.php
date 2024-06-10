@if ($law->format == 'part_chapter_section')
    @include('frontend.laws_and_rules.details.main_law.part_chapter_section', ['law' => $law])
@elseif ($law->format == 'part_section')
    @include('frontend.laws_and_rules.details.main_law.part_section', ['law' => $law])
@elseif ($law->format == 'chapter_section')
    @include('frontend.laws_and_rules.details.main_law.chapter_section', ['law' => $law])
@endif

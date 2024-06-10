@if ($law->format == 'part_chapter_section')
    @include('frontend.laws_and_rules.details.rules.part_chapter_section', ['law' => $law])
@elseif ($law->format == 'part_section')
    @include('frontend.laws_and_rules.details.rules.part_section', ['law' => $law])
@elseif ($law->format == 'chapter_section')
    @include('frontend.laws_and_rules.details.rules.chapter_section', ['law' => $law])
@endif

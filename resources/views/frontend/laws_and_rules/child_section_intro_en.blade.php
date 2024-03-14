@foreach ($childs as $child)
    <li>
        <a href="#goSection_en_{{ $section->slug }}">
            {{ $section->title }}
        </a>
    </li>

    @if (count($child->childs->where('status', 1)))
        @include('frontend.laws_and_rules.child_section_intro_en', [
            'childs' => $child->childs,
            'law' => $law,
        ])
    @endif
@endforeach

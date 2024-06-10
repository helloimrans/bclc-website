@foreach ($childs as $child)
    <li>
        <a href="#goSection_bn_{{ $section->slug }}">
            {{ $section->title_bn }}
        </a>
    </li>

    @if (count($child->childs->where('status', 1)))
        @include('frontend.laws_and_rules.child_section_intro_bn', [
            'childs' => $child->childs,
            'law' => $law,
        ])
    @endif
@endforeach

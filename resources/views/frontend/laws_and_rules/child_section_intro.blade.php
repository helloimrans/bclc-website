@foreach ($childs as $child)
    <li>
        <a href="#goSection_{{ $section->slug }}">
            {{ session()->get('lawLocale') == 'bn' ? $section->title_bn : $section->title }}
        </a>
    </li>

    @if (count($child->childs->where('status', 1)))
        @include('frontend.laws_and_rules.child_section_intro', [
            'childs' => $child->childs,
            'law' => $law,
        ])
    @endif
@endforeach

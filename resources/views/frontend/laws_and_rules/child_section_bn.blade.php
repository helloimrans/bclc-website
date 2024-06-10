@foreach ($childs as $child)
    <div class="laws-chapters-section"  id="goSection_bn_{{ $section->slug }}">
        <h5>
            {{ $child->title_bn}}
        </h5>
        <p>
            {!! $child->description_bn !!}
        </p>
    </div>

    @if (count($child->childs->where('status',1)))
        @include('frontend.laws_and_rules.child_section_bn', [
            'childs' => $child->childs,
            'law' => $law,
        ])
    @endif
@endforeach

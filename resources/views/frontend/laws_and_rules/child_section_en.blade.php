@foreach ($childs as $child)
    <div class="laws-chapters-section"  id="goSection_en_{{ $section->slug }}">
        <h5>
            {{ $child->title}}
        </h5>
        <p>
            {!! $child->description !!}
        </p>
    </div>

    @if (count($child->childs->where('status',1)))
        @include('frontend.laws_and_rules.child_section_en', [
            'childs' => $child->childs,
            'law' => $law,
        ])
    @endif
@endforeach

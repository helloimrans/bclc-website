@foreach ($childs as $child)
    <div class="laws-chapters-section">
        <h5>{{ $child->title }}</h5>
        <p>{!! $section->description !!}</p>
    </div>

    @if (count($child->childs->where('status',1)))
        @include('frontend.laws_and_rules.child_section', [
            'childs' => $child->childs,
        ])
    @endif
@endforeach

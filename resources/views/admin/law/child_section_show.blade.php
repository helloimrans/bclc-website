@foreach ($childs as $child)
    <div class="laws-chapters-section">
        <h5>{{ $child->title }}</h5>
        <p>{{ $child->description }}</p>
    </div>

    @if (count($child->childs->where('status',1)))
        @include('admin.law.child_section_show', [
            'childs' => $child->childs,
        ])
    @endif
@endforeach

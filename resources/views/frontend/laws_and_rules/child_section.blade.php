@foreach ($childs as $child)
    <div class="laws-chapters-section">
        <h5>
            {{session()->get('lawLocale') == 'bn' ? $child->title_bn : $child->title}}
        </h5>
        <p>
            {!! session()->get('lawLocale') == 'bn' ? $child->description_bn : $child->description !!}
        </p>
    </div>

    @if (count($child->childs->where('status',1)))
        @include('frontend.laws_and_rules.child_section', [
            'childs' => $child->childs,
            'law' => $law,
        ])
    @endif
@endforeach

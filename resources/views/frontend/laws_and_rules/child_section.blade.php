@foreach ($childs as $child)
    <div class="laws-chapters-section">
        <h5>
            @if ($law->lang == 'en')
            {{ $child->title }}
            @elseif ($law->lang == 'bn')
            {{ $child->title_bn }}
            @elseif ($law->lang == 'both')
                @if ($law->default_lang == 'en')
                    {{ $child->title }}
                    @elseif ($law->default_lang == 'bn')
                    {{ $child->title_bn }}
                @endif
            @endif
        </h5>
        <p>
            @if ($law->lang == 'en')
            {!! $child->description !!}
            @elseif ($law->lang == 'bn')
            {!! $child->description_bn !!}
            @elseif ($law->lang == 'both')
                @if ($law->default_lang == 'en')
                {!! $child->description !!}
                    @elseif ($law->default_lang == 'bn')
                    {!! $child->description_bn !!}
                @endif
            @endif
        </p>
    </div>

    @if (count($child->childs->where('status',1)))
        @include('frontend.laws_and_rules.child_section', [
            'childs' => $child->childs,
            'law' => $law,
        ])
    @endif
@endforeach

<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    <div class="laws-chapters mt-4">
        <div class="row">
            @if ($law->actPart->count() == 0)
                <p class="text-danger text-14 text-center">Not found part!</p>
            @endif
            @foreach ($law->actPart as $part)
                <div class="col-md-4">
                    <div class="laws-chapter-box mb-2">
                        <div class="chapter-no">
                            <h6>
                                {{ session()->get('lawLocale') == 'bn' ? $part->part_no_bn : $part->part_no }}
                            </h6>
                        </div>
                        <div class="chapter-title">
                            <p>
                                {{ session()->get('lawLocale') == 'bn' ? \Str::limit($part->title_bn, 25, '...') : \Str::limit($part->title, 25, '...') }}
                            </p>
                            <a href="{{ route('laws.rules.chapter', $part->slug) }}">Details
                                →</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

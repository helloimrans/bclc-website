<div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <div class="laws-chapters mt-4">
        <div class="row">
            @if ($law->rulesChapter->where('status', 1)->count() == 0)
                <p class="text-danger text-14 text-center">Not found chapter!</p>
            @endif
            @foreach ($law->rulesChapter->where('status', 1) as $chapter)
                <div class="col-md-4">
                    <div class="laws-chapter-box mb-2">
                        <div class="chapter-no">
                            <h6>
                                {{ session()->get('lawLocale') == 'bn' ? $chapter->chapter_no_bn : $chapter->chapter_no }}
                            </h6>
                        </div>
                        <div class="chapter-title">
                            <p>
                                {{ session()->get('lawLocale') == 'bn' ? \Str::limit($chapter->title_bn, 25, '...') : \Str::limit($chapter->title, 25, '...') }}
                            </p>
                            <a href="{{ route('laws.rules.chapter', $chapter->slug) }}">Details
                                →</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>


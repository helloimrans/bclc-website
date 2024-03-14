<div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <div class="laws-chapters mt-4">
        @foreach ($law->rulesPart as $part)
            <div class="row">
                <div class="col">
                    <div class="laws-chapters-one">
                        <h5>
                            {{ session()->get('lawLocale') == 'bn' ? $part->part_no_bn : $part->part_no }}
                            :
                            {{ session()->get('lawLocale') == 'bn' ? $part->title_bn : $part->title }}
                        </h5>
                    </div>
                </div>
            </div>
            <div class="row">
                @if ($part->chapter->where('status', 1)->count() == 0)
                    <div class="col">
                        <p class="text-danger text-14 text-center">Not found chapter!</p>
                    </div>
                @endif
                @foreach ($part->chapter->where('status', 1) as $chapter)
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
        @endforeach
    </div>
</div>

<style>
    .laws-chapters-one h5 {
        text-transform: lowercase;
        font-size: 17px;
        background: #ededed;
        text-align: center;
        padding: 10px;
        margin-bottom: 30px;
        border-radius: 3px;
        margin-top: 20px;
    }
</style>


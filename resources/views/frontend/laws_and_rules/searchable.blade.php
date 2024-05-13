<div class="article-item">
    @foreach ($laws as $law)
        <!-- article item -->
        <div class="media">
            <i class="fa fa fa-legal"></i>
            <div class="media-body">
                <a href="{{ route('laws.rules.view', $law->slug) }}">{{ $law->title }}</a>
            </div>
        </div>
    @endforeach

</div>
<hr class="mb-4">
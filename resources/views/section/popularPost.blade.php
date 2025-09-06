<div class="popular-news">
    <div class="popular-news-wrapper">
        <h4 class="popular-news__title">Cамые популярные новости</h4>
        <ul class="popular-news__list">
            @foreach($popularPosts as $post)
                <li class="popular-news__item">
                    <a href="{{ route('postDetail',$post->slug) }}">
                        <p class="popular-news__description">{{ $post['title_'.\Illuminate\Support\Facades\App::getLocale()] }}</p>
                        <span class="popular-news__date">{{ $post->created_at->format('H:i') }} / {{ $post->created_at->format('d.m.Y') }}</span>
                    </a>
                </li>
            @endforeach


        </ul>
    </div>
    <div class="ads-placeholder">
        <h4>ADS PLACEHOLDER</h4>
    </div>
</div>

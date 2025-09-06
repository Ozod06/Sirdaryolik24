<section class="news">
    <div class="container">
        <div class="news__wrapper basic-flex">
            <div class="column-news">
                <h2 class="news__title">Последние новости</h2>
                <ul class="news__list basic-flex">
                    @foreach($lastPosts as $post)
                        <li class="news__item">
                            <a href="{{ route('postDetail',$post->slug) }}" class="basic-flex news__link">
                                <div class="news-image-wrapper"><img src="/admin/images/{{ $post->image }}"
                                                                     alt="Bottom Img"></div>
                                <div class="news-box basic-flex">
                                    <h4 class="news__title">{{ $post['title_'.\Illuminate\Support\Facades\App::getLocale()] }}</h4>
                                    <p class="news__description">
                                        {{ Str::limit($post['body_'.\Illuminate\Support\Facades\App::getLocale()],100)  }}
                                    </p>
                                    <span class="news__date basic-flex">{{ $post->created_at->format('H:i') }} / {{ $post->created_at->format('d.m.Y') }}</span>
                                </div>
                            </a>
                        </li>
                    @endforeach


                </ul>
                <button type="button" class="btn load-more-btn">Больше новостей</button>
            </div>
            @include('section.popularPost')
        </div>
    </div>
</section>

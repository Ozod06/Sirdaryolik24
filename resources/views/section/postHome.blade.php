
<section class="posts">
    <div class="container">
        <ul class="posts__list basic-flex">
            @foreach($specialPosts as $post)
                <li class="posts__item">
                    <a href="{{ route('postDetail',$post->slug) }}">
                        <img src="/admin/images/{{ $post->image }}" alt="Image" class="posts__img">
                        <h2 class="posts__title">{{ $post['title_'.\Illuminate\Support\Facades\App::getLocale()] }}</h2>
                        <span class="posts__date">{{ $post->created_at->format('H:i') }} / {{ $post->created_at->format('d.m.Y') }}</span>
                    </a>
                </li>
            @endforeach

        </ul>
    </div>
</section>

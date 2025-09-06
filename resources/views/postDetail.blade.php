@extends('layouts.site')

@section('title')
    Batafsil yangiliklar
@endsection

@section('content')
    <section class="article">
        <div class="container">
            <div class="news__wrapper basic-flex">
                <div class="article__wrapper">
                    <h2 class="article__title">{{ $post['title_'.\Illuminate\Support\Facades\App::getLocale()] }}</h2>
                    <span class="article__date basic-flex">{{ $post->created_at->format('H:i') }} / {{ $post->created_at->format('d.m.Y') }}</span>
                    <img src="/admin/images/{{ $post->image }}" alt="Шавкат Мирзиёев строго предупредил хокимов всех уровней
            ">

                    <p>
                        {!! $post['body_'.\Illuminate\Support\Facades\App::getLocale()] !!}
                    </p>

                    <div class="hashtags basic-flex">
                        @foreach($post->tags as $tag)
                            <a href="#">#{{ $tag['name_'.\Illuminate\Support\Facades\App::getLocale()] }}</a>
                        @endforeach
                    </div>
                </div>
                @include('section.popularPost')
                <div class="related-news">
                    <h3 class="related-news__title">Новости по теме
                    </h3>
                    <div class="related-posts basic-flex">
                        <div class="posts__item">
                            <a href="#">
                                <img src="img/top1.png" alt="Image" class="posts__img">
                                <h2 class="posts__title">Мирзиёев рассказал, зачем было построено
                                    Сардобинское водохранилище</h2>
                                <span class="posts__date">05:28 / 16.05.2020</span>
                            </a>
                        </div>
                        <div class="posts__item">
                            <a href="#">
                                <img src="img/top2.png" alt="Image" class="posts__img">
                                <h2 class="posts__title">Карантин в Узбекистане продлен до 1 июня</h2>
                                <span class="posts__date">05:28 / 16.05.2020</span>
                            </a>
                        </div>
                        <div class="posts__item">
                            <a href="#">
                                <img src="img/top3.png" alt="Image" class="posts__img">
                                <h2 class="posts__title">Обмелевшая Сардоба: стихия или
                                    человеческий фактор?</h2>
                                <span class="posts__date">05:28 / 16.05.2020</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

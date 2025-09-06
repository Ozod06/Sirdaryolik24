@extends('layouts.site')

@section('title')
    Qidiruv natijasi
@endsection

@section('content')
    <section class="news">
        <div class="container">
            <div class="news__wrapper basic-flex">
                <div class="column-news">
                    <h2 class="news__title">
                        @if(count($posts) > 0)
                            {{ $key }} so'z bo'yicha qidiruv natijasi : {{ count($posts) }}
                        @else
                            {{ $key }} kalit so'zi bo'yicha natija topilmadi
                                <img src="https://img.freepik.com/free-vector/oops-404-error-with-broken-robot-concept-illustration_114360-5529.jpg?semt=ais_hybrid&w=740" style="width: 600px " alt="">
                        @endif

                    </h2>
                    <ul class="news__list basic-flex">
                        @foreach($posts as $post )
                            <li class="news__item">
                                <a href="#" class="basic-flex news__link">
                                    <div class="news-image-wrapper"><img src="/admin/images/{{ $post->image }}" alt="Bottom Img"></div>
                                    <div class="news-box basic-flex">
                                        <h4 class="news__title">{{ $post['title_'.\Illuminate\Support\Facades\App::getLocale()] }}</h4>
                                        <p class="news__description">
                                            {!! Str::limit($post['body_'.\Illuminate\Support\Facades\App::getLocale()]) !!}
                                        </p>
                                        <span class="news__date basic-flex">{{ $post->created_at->format('H:i') }} / {{ $post->created_at->format('d.m.Y') }}</span>
                                    </div>
                                </a>
                            </li>
                        @endforeach


                    </ul>


                    {{--                    <button type="button" class="btn load-more-btn">Больше новостей</button>--}}
                </div>
                @include('section.popularPost')
            </div>
        </div>
    </section>
@endsection

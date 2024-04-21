@extends('layouts.main')

@section('content')
    <section class="animals">
        <button class="swiper-button-prev"></button>
        <div class="swiper">
            <div class="animal swiper-wrapper">
                @foreach($animals as $animal)
                    <div class="animal swiper-slide">
                        <h2>{{$animal->name}}</h2>
                        <p><b>Вид: </b>{{$animal->view}}</p>
                        <p><b>Возраст: </b>{{$animal->age}}</p>
                        <p>{{$animal->description}}</p>
                        <a href="{{route('show', ['id' => $animal->id])}}" class="button">Посмотреть</a>
                    </div>
                @endforeach
            </div>
        </div>
        <button class="swiper-button-next"></button>
    </section>
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />

    @vite(['resources/css/swiper.css'])

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper('.swiper', {
            // Optional parameters
            direction: 'horizontal',
            loop: true,
            speed: 500,
            spaceBetween: 100,
            slidesPerView: 1,

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>
@endsection

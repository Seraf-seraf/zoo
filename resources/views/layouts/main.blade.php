<!doctype html>
<html class="page" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/css/app.css')
    <title>@yield('title', 'Зоопарк')</title>
</head>
<body class="page-body">
<header class="page-header">
    <x-navigation.navigation/>
</header>

<main class="page-main">
    @if(!(Route::current()->getName() === 'home'))
        @yield('content')
    @else
        <section class="about">
            <p>
                Добро пожаловать в наш зоопарк! :) <br>
                Переходи на страничку "Наши звери" в меню сверху
            </p>
        </section>
    @endif
</main>
<footer class="page-footer">
    <p>
        powered by <a class="tg" href="https://t.me/all_damage_carry">@all_damage_carry</a>
    </p>
</footer>
</body>
</html>

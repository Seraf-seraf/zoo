@extends('layouts.main')
@section('title', 'Секретная админка')
@section('content')
    <section class="login">
        <h1>Авторизация</h1>
        <form action="{{route('auth')}}" method="POST">
            @csrf
            <button type="submit" class="button">Войти</button>
        </form>
    </section>
@endsection

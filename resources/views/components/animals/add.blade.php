@extends('layouts.main')
@section('title', 'Добавить')
@section('content')
    <section class="add-animal">
        <h2>Кто это?</h2>
        <form class="form" action="{{route('add')}}" method="post">
            @csrf
            @method('post')
            <p class="form-field">
                <label for="name">
                    <input id="name" type="text" placeholder="Название животного" min="2" max="64" required name="name"
                           value="{{old('name')}}">
                </label>
                @error('name')
                {{$message}}
                @enderror
            </p>
            <p class="form-field">
                <label for="view">
                    <input id="view" type="text" placeholder="Вид" min="2" max="128" required name="view"
                           value="{{old('view')}}">
                </label>
                @error('view')
                {{$message}}
                @enderror
            </p>
            <p class="form-field">
                <label for="age">
                    <input id="age" type="number" placeholder="Возраст" min="0" max="128" required name="age"
                           value="{{old('age')}}">

                </label>
                @error('age')
                {{$message}}
                @enderror
            </p>
            <p class="form-field">
                <label for="description">
                    <textarea id="description" placeholder="Описание" name="description"></textarea>
                </label>
                @error('description')
                {{$message}}
                @enderror
            </p>
            <button class="button" type="submit">Добавить в коллекцию</button>
        </form>
    </section>
@endsection

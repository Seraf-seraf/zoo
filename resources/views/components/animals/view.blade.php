@extends('layouts.main')
@section('title', $animal['name'])
@section('content')
    <section class="view-animal">
        <div class="animal">
            <h2>{{$animal->name}}</h2>
            <p><b>Вид:</b> {{$animal->view}}</p>
            <p><b>Возраст:</b> {{$animal->age}}</p>
            <p>{{$animal->description}}</p>
            @php
                $user = \App\Models\User::where(['ip_address' => request()->getClientIp()])->first();
            @endphp
            @if($user)
                <a href="{{route('destroy', ['id' => $animal->id])}}" class="button">Удалить</a>
            @endif
        </div>
    </section>
@endsection

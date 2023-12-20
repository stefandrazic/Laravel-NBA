@extends('layout.default')

@section('title')
    {{ $team->name }}
@endsection

@section('content')
    <h1>{{ $team->name }} </h1>
    <h5>Email: {{ $team->email }}</h5>
    <p>Adress: {{ $team->adress }}</p>
    <p>City: {{ $team->city }}</p>
    <h3>Players:</h3>
    <ol>
        @foreach ($team->players as $player)
            <li>
                <a href="/players/{{ $player->id }}">{{ $player->first_name }} {{ $player->last_name }}</a>
            </li>
        @endforeach
    </ol>
@endsection

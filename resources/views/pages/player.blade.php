@extends('layout.default')

@section('title')
    {{ $player->first_name }} {{ $player->last_name }}
@endsection

@section('content')
    <h1>{{ $player->first_name }} {{ $player->last_name }}</h1>
    <h5>Email: {{ $player->email }}</h5>
    <p>{{ $player->team->name }}</p>
@endsection

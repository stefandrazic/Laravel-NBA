@extends('layout.default')

@section('title')
    {{ $article->title }}
@endsection

@section('content')
    <ul>
        Teams included:
        @foreach ($article->teams as $team)
            <a href="/news/teams/{{ $team->name }}">{{ $team->name }}</a>
        @endforeach
    </ul>

    <h1>{{ $article->title }}</h1>
    <h2>{{ $article->user->name }}</h2>
    <p>{{ $article->content }}</p>
@endsection

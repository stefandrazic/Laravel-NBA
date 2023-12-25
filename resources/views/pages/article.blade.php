@extends('layout.default')

@section('title')
    {{ $article->title }}
@endsection

@section('content')
    <h1>{{ $article->title }}</h1>
    <h2>{{ $article->user->name }}</h2>
    <p>{{ $article->content }}</p>
@endsection

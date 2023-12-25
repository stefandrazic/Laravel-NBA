@extends('layout.default')
@section('title')
    News
@endsection
@section('content')
    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        @foreach ($news as $article)
            @include('components.article-card')
        @endforeach
    </div>
@endsection

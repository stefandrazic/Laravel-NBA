@extends('layout.default')
@section('title')
    Players
@endsection
@section('content')
    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        @foreach ($players as $player)
            @include('components.player-card')
        @endforeach
    </div>
@endsection

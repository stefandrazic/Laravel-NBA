@extends('layout.default')


@section('title')
    Search
@endsection


@section('content')
    <form action="{{ url('search') }}" method="POST">
        @csrf
        <h1>Search</h1>
        <div class="mb-3">
            <label class="form-label">Search</label>
            <input class="form-control" type="text" name="search" placeholder="Enter word/s" required />
        </div>
        <button type="submit" class="btn btn-primary">Search</button>
    </form>
@endsection

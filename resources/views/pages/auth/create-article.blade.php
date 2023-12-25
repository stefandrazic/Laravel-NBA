@extends('layout.default')

@section('title')
    Create article
@endsection

@section('content')
    <form method="POST" action="{{ url('news') }}">
        @csrf

        <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <input type="text" class="form-control" placeholder="Enter title" name="title">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Content</label>
            <input type="text" class="form-control" placeholder="Enter content" name="content">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Teams</label>
            @foreach ($teams as $team)
                <label><input type="checkbox" value="{{ $team->id }}" name="teams[]">{{ $team->name }}</label>
            @endforeach
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

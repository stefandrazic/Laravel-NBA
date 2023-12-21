<form action="{{ url('comments') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label class="form-label">Comment</label>
        <textarea class="form-control" type="text" name="content" placeholder="Enter your comment" required></textarea>
        <input type="hidden" name="team_id" value="{{ $team->id }}">
    </div>
    <button type="submit" class="btn btn-primary">Leave comment</button>
</form>

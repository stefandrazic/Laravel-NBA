<div class="alert alert-info">
    <p><span style="font-size: 1.5rem">{{ $comment->user->name }}: </span>{{ $comment->content }}</p>
    <small>{{ $comment->created_at->diffForHumans() }}</small>
</div>

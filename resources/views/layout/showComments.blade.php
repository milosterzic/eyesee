@foreach($commentable->comments as $comment)
    <div class="comment-wrapper">
        <p>
            {{ $comment->text }}
        </p>
        <p><i>{{ $comment->user->name . ', ' . $comment->created_at->format('d.M.Y. H:i:s') }}</i></p>

        @if ($comment->hasComments())
            @include('layout.showComments', ['commentable' => $comment])
        @endif

        @include('layout.comment', ['commentableId' => $comment->id, 'commentableType' => 'comment'])
    </div>

@endforeach


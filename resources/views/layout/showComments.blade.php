@foreach($commentable->comments as $comment)
    @if($comment->isApproved() || optional(Auth::user())->isOwner($rootThreadId))
        <div class="comment-wrapper">
            <p>
                {{ $comment->text }}
            </p>
            <p>
                <i>{{ $comment->user->name . ', ' . $comment->created_at->format('d.M.Y. H:i:s') }}</i>

                @if (! $comment->isApproved())
                    <form method="post" action="{{ route('comments.update', ['comment' => $comment->id]) }}" class="form btn-link-0">
                        @method('PUT')
                        @csrf

                        <input type="hidden" name="root_thread_id" value="{{ $rootThreadId }}">
                        <button type="submit" class="btn btn-link btn-link-0">(Approve)</button>
                    </form>
                @endif
            </p>

            @if ($comment->hasApprovedComments() || optional(Auth::user())->isOwner($rootThreadId))
                @include('layout.showComments', ['commentable' => $comment, 'rootThreadId' => $rootThreadId])
            @endif

            @if($comment->isApproved())
                @include('layout.comment', ['commentableId' => $comment->id, 'commentableType' => 'comment'])
            @endif
        </div>
    @endif
@endforeach

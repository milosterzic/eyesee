@auth
    <hr>

    <form action="{{ route('comments.store') }}" method="post">
        @csrf

        <input type="hidden" name="commentable_id" value="{{ $commentableId }}">
        <input type="hidden" name="commentable_type" value="{{ $commentableType }}">

        <textarea name="comment" class="@error('comment') is-invalid @enderror form-control" required></textarea>


        @error('comment')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <button type="submit" class="btn btn-success margin-top float-right">COMMENT</button>
    </form>
@endauth

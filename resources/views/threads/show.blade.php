<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layout.header')

    <body>
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="flex-center position-ref">

            @include('layout.navigation')

            <div class="content show">
                <div class="title m-b-md">
                    EyeSee
                </div>

                <div class="links margin-bottom">
                    <a href="{{ route('welcome') }}">All threads</a>
                </div>

                <div class="thread-wrapper show">
                    <h2>{{ $thread->title }} <span>{{ '(' . $thread->user->name . ')' }}</span></h2>
                    <p>
                        {{ $thread->text }}
                    </p>

                    @if ($thread->hasApprovedComments() || optional(Auth::user())->isOwner($thread->id))
                        @include('layout.showComments', ['commentable' => $thread, 'rootThreadId' => $thread->id])
                    @endif

                    @include('layout.comment', ['commentableId' => $thread->id, 'commentableType' => 'thread'])
                </div>
            </div>
        </div>
    </body>
</html>

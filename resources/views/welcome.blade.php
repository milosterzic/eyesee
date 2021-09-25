<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('layout.header')

    <body>
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="flex-center position-ref full-height">
            @include('layout.navigation')

            <div class="content">
                <div class="title m-b-md">
                    EyeSee
                </div>

                <div class="links margin-bottom">
                    @auth()
                        <a href="{{ route('threads.create') }}">Create thread</a>
                    @endauth
                </div>

                <div>
                    @foreach($threads as $thread)
                        <div class="thread-wrapper">
                            <a href="{{ route('threads.show', [$thread->id]) }}"><h2>{{ $thread->title }} <span>{{ '(' . $thread->user->name . ')' }}</span></h2></a>
                            <p>
                                @auth
                                    @if(Auth::user()->isOwner($thread->id))
                                        @if(Auth::user()->canEdit($thread->id))
                                            <a href="{{ route('threads.edit', [$thread->id]) }}">EDIT</a>
                                        @endif

                                        <a href="{{ route('threads.destroy', [$thread->id]) }}">DELETE</a>
                                    @endif
                                @endauth

                                <hr>
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </body>
</html>

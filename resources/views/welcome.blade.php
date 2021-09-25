<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ route('logout') }}">Logout, {{ Auth::user()->name }}</a>
                    @else
                        <a href="{{ route('login') }}">Login with Reddit</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    EyeSee
                </div>

                <div class="links">
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

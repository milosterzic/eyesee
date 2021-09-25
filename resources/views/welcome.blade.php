<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ route('logout') }}">Logout, {{ \Illuminate\Support\Facades\Auth::user()->name }}</a>
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
                        <a href="#">Create thread</a>
                    @endauth
                </div>

                <div>
                    @foreach($threads as $thread)
                        <div class="thread-wrapper" style="text-align: left">
                            <a href="{{ route('threads.show', [$thread->id]) }}"><h2>{{ $thread->title }}</h2></a>
                            <p>
                                @auth
                                    @if(Auth::user()->isOwner($thread->id))
                                        @if(Auth::user()->canEdit($thread->id))
                                            <a href="{{ route('threads.edit', [$thread->id]) }}">EDIT</a>
                                        @endif

                                        <a href="{{ route('threads.destroy', [$thread->id]) }}">DELETE</a>
                                    @endif
                                @endauth
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </body>
</html>

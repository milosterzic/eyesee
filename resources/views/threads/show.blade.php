<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
            <a href="{{ route('welcome') }}">All threads</a>
        </div>

        <div class="thread-wrapper show">
            <h2>{{ $thread->title }} <span>{{ '(' . $thread->user->name . ')' }}</span></h2>
            <p>
                {{ $thread->text }}
            </p>
        </div>
    </div>
</div>
</body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Miloš Terzić</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="flex-center position-ref full-height">
    @include('layout.navigation')

    <div class="content">
        <div class="title m-b-md">
            EyeSee
        </div>

        <div class="links">
            @auth()
                <a href="{{ route('welcome') }}">All threads</a>
            @endauth
        </div>

        <div>
            <form method="post" action="{{ route('threads.store') }}" class="form">
                @csrf

                <label for="title">Thread Title <span class="asterix">*</span></label>

                <input id="title" name="title" type="text" class="@error('title') is-invalid @enderror form-control" required>

                @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <label for="text">Text <span class="asterix">*</span></label>

                <textarea id="text" name="text" class="@error('text') is-invalid @enderror form-control" required></textarea>

                @error('text')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <button type="submit" class="btn btn-primary mt-5">Submit</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>

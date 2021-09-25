<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layout.header')

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
            <form method="post" action="{{ route('threads.update', ['thread' => $thread->id]) }}" class="form">
                @method('PUT')
                @csrf

                <label for="title">Thread Title <span class="asterix">*</span></label>

                <input id="title" name="title" type="text" value="{{ $thread->title }}" class="@error('title') is-invalid @enderror form-control" required>

                @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <label for="text">Text <span class="asterix">*</span></label>

                <textarea id="text" name="text" class="@error('text') is-invalid @enderror form-control" required>{{ $thread->text }}</textarea>

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

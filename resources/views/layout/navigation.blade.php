@if (Route::has('login'))
    <div class="top-right links">
        @auth
            <a href="{{ route('logout') }}">Logout, {{ Auth::user()->name }}</a>
        @else
            <a href="{{ route('login') }}">Login with Reddit</a>
        @endauth
    </div>
@endif

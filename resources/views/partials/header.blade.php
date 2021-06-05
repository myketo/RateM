<header class="mb-auto text-white">
    <h3 class="float-md-start mb-0 app-name"><a href='/'>{{ config('app.name') }}</a></h3>
    <nav class="nav nav-masthead justify-content-center float-md-end">
        <a class="nav-link @if(request()->is('/')) active @endif" aria-current="page" href="/">Home</a>
        @guest
            <a class="nav-link @if(request()->is('login')) active @endif" href="/login">Login</a>
            <a class="nav-link @if(request()->is('register')) active @endif" href="/register">Register</a>
        @endguest

        @auth
            <a class="nav-link @if(request()->is('user/' . auth()->user()->name)) active @endif" href="/user/{{ strtolower(auth()->user()->name) }}">Profile</a>
            <a class="nav-link" href="/logout">Logout</a>
        @endauth
    </nav>
</header>
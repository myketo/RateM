<header class="mb-auto text-white">
    <h3 class="float-md-start mb-0 app-name"><a href='/'>{{ config('app.name') }}</a></h3>
    <nav class="nav nav-masthead justify-content-center float-md-end">
        <a class="nav-link @if(request()->route()->uri == '/') active @endif" aria-current="page" href="/">Home</a>
        @guest
            <a class="nav-link @if(request()->route()->uri == 'login') active @endif" href="/login">Login</a>
            <a class="nav-link @if(request()->route()->uri == 'register') active @endif" href="/register">Register</a>
        @endguest

        @auth
            <a class="nav-link" href="/profile">Profile</a>
            <a class="nav-link" href="/logout">Logout</a>
        @endauth
    </nav>
</header>
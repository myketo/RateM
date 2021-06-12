<header class="mb-auto text-white">
    <h3 class="float-md-start mb-0 app-name"><a href='/'>{{ config('app.name') }}</a></h3>
    <nav class="nav nav-masthead justify-content-center float-md-end">
        <a class="nav-link @if(request()->is('/')) active @endif" aria-current="page" href="/">Home</a>
        @guest
            <a class="nav-link @if(request()->is('login')) active @endif" href="/login">Login</a>
            <a class="nav-link @if(request()->is('register')) active @endif" href="/register">Register</a>
        @endguest

        @auth
        <a class="nav-link @if(request()->is('user/' . auth()->user()->name . '/lists')) active @endif" href="/user/{{ auth()->user()->name }}/lists">Lists</a>
        {{-- HOW TO DO A DROPDOWN IN NAV
            <div class="dropdown nav-item mx-3">
            <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
              Lists
            </a>
          
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <li><a class="dropdown-item" href="#">New list</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </div> --}}
            <a class="nav-link @if(request()->is('user/' . auth()->user()->name)) active @endif" href="/user/{{ strtolower(auth()->user()->name) }}">Profile</a>
            <a class="nav-link" href="/logout">Logout</a>
        @endauth
    </nav>
</header>
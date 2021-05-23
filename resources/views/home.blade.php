@extends('layouts.app')

@section('content')
    @auth
        <p>Logged in: <b>{{ auth()->user()->name }}</b></p>
        <a href='/logout'>Logout</a>
    @endauth

    @guest
        <a href='/register'>Register</a>
        <a href='/login'>Login</a>   
    @endguest
@endsection
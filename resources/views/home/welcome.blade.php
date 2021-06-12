@extends('layouts.app')

@push('styles')
    <link rel='stylesheet' href='{{ asset('css/home.css') }}'>
@endpush

@section('content')
    <main class="px-3 text-white">
        @guest
            <h1>Cover your page.</h1>
            <p class="lead">Cover is a one-page template for building simple and beautiful home pages. Download, edit the text, and add your own fullscreen background photo to make it your own.</p>
            <p class="lead">
                <a href="#" class="btn btn-lg btn-secondary fw-bold border-white bg-white">Learn more</a>
            </p>
        @endguest
    
        @auth
            <h1>Welcome, {{ auth()->user()->name }}!</h1>
            <p class="lead">Here are a few actions that you may like to take: </p>
            <p class="lead">
                <a href="/user/{{ auth()->user()->name }}/lists" class="btn btn-lg btn-secondary fw-bold border-white bg-white my-1">Browse your lists</a>
                <a href="/user/{{ auth()->user()->name }}/list/create" class="btn btn-lg btn-secondary fw-bold border-white bg-white my-1">Create a new list</a>
            </p>
        @endauth
    </main>
@endsection
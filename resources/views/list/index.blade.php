@extends('layouts.app')

@section('content')
    <main>
        @if (session('message')) <p class='alert alert-success' role='alert'>{{ session('message') }}</p> @endif

        <a href="/user/{{ auth()->user()->name }}/list/create" class="btn btn-lg btn-secondary fw-bold border-white bg-white text-dark">Create a new list</a>

        <h5>{{ $user->name }}'s Lists: </h5>

        @foreach ($user->lists as $list)
            <a href='/user/{{ strtolower($user->name) }}/list/{{ strtolower($list->name) }}'>{{ $list->name }}</a>
        @endforeach
    </main>
@endsection
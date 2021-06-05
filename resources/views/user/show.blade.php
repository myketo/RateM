@extends('layouts.app')

@section('content')
    <main>
        @if(auth()->user()->name == $user->name)
            <p>This is your profile.</p>
        @endif
        
        <h4>Your data: </h4>
        <p>Name: {{ $user->name }}</p>
        <p>Email: {{ $user->email }}</p>
        <br>
        <h4>Your lists: </h4>
        @foreach ($user->lists as $list)
            <a href='/user/{{ strtolower($user->name) }}/list/{{ strtolower($list->name) }}'>{{ $list->name }}</a>
        @endforeach
    </main>
@endsection
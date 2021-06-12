@extends('layouts.app')

@section('content')
    <main>
        <img src='{{ $list->image }}'>
        <h3>"{{ $list->name }}" by {{ $list->user->name }}</h3>
        <p>{{ $list->description }}</p>
        <p>Created at: {{ $list->created_at->format('d-m-Y') }}</p>

        <div class='d-inline-flex'>
            <form method='POST'>
                @method('DELETE')
                @csrf
                <button class="btn btn-sm btn-primary m-2" type="submit">DELETE</button>
            </form>
    
            <a href='{{ route('user.list.edit', [auth()->user(), $list]) }}' class="btn btn-sm btn-primary m-2" type="submit">EDIT</a>
        </div>
    </main>
@endsection
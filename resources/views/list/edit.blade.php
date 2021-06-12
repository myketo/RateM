@extends('layouts.app')

@push('styles')
    <link rel='stylesheet' href='{{ asset('css/forms.css') }}'>
@endpush

@section('content')
    <main>
        @if (session('message')) <p class='alert alert-success' role='alert'>{{ session('message') }}</p> @endif
        <form method='POST' action='{{ route('user.list.update', ['user' => auth()->user(), 'list' => $list]) }}' enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <h1 class="h1 mb-3 fw-normal text-light">Edit your list</h1>
        
            <div class="form-floating mb-1">
                <input type="text" class="form-control" id="floatingInput" placeholder="Name" name="name" value='{{ $list->name }}'>
                <label for="floatingInput">Name</label>
            </div>

            <div class="form-floating mb-1">
                <textarea type="text" class="form-control" id="floatingInput" placeholder="Description" name="description" style='height: 100px;'>{{ $list->description }}</textarea>
                <label for="floatingInput">Description</label>
            </div>

            <div class="form-floating mb-1">
                <select class="form-select" id="floatingSelect" name='type'>
                    <option>Select the type of contents</option>
                    <option value="songs" @if($list->type == 'songs') selected @endif>Songs</option>
                    <option value="albums" @if($list->type == 'albums') selected @endif>Albums</option>
                    <option value="artists" @if($list->type == 'artists') selected @endif>Artists</option>
                </select>
                <label for='floatingSelect'>Type</label>
            </div>

            <div class="form-floating mb-1">
                <input type="file" class="form-control" id="floatingInput" name='cover' accept='image/*' style='padding-top: 2.25rem; height: 110%;'>
                <label for="floatingInput">Image</label>
            </div>

            <button class="w-100 btn btn-lg btn-primary mt-2" type="submit">Edit list</button>

            @include('partials.errors')
        </form>
    </main>
@endsection
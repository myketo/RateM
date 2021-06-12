@extends('layouts.app')

@push('styles')
    <link rel='stylesheet' href='{{ asset('css/forms.css') }}'>
@endpush

@section('content')
    <main>
        <form method='POST' action='{{ route('user.list.store', auth()->user()->name) }}' enctype="multipart/form-data">
            @csrf

            <h1 class="h1 mb-3 fw-normal text-light">Create a new list</h1>
        
            <div class="form-floating mb-1">
                <input type="text" class="form-control" id="floatingInput" placeholder="Name" name="name" value='{{ old('name') }}' autofocus>
                <label for="floatingInput">Name</label>
            </div>

            <div class="form-floating mb-1">
                <textarea type="text" class="form-control" id="floatingInput" placeholder="Description" name="description" style='height: 100px;'>{{ old('description') }}</textarea>
                <label for="floatingInput">Description</label>
            </div>

            <div class="form-floating mb-1">
                <select class="form-select" id="floatingSelect" name='type'>
                    <option>Select the type of contents</option>
                    <option value="songs" @if(old('type') == 'songs') selected @endif>Songs</option>
                    <option value="albums" @if(old('type') == 'albums') selected @endif>Albums</option>
                    <option value="artists" @if(old('type') == 'artists') selected @endif>Artists</option>
                </select>
                <label for='floatingSelect'>Type</label>
            </div>

            <div class="form-floating mb-1">
                <input type="file" class="form-control" id="floatingInput" name='cover' accept='image/*' value='{{ old('image') }}' style='padding-top: 2.25rem; height: 110%;'>
                <label for="floatingInput">Image</label>
            </div>

            <button class="w-100 btn btn-lg btn-primary mt-2" type="submit">Create list</button>

            @include('partials.errors')
        </form>
    </main>
@endsection
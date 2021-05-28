@extends('layouts.app')

@push('styles')
    <link rel='stylesheet' href='{{ asset('css/auth.css') }}'>
@endpush

@section('content')
    <main class="form-signin">
        <form method='POST' action='/login'>
            @csrf

            <h1 class="h1 mb-4 fw-normal">Login</h1>
        
            <div class="form-floating mb-1">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name='email' autofocus>
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating mb-1">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name='password'>
                <label for="floatingPassword">Password</label>
            </div>

            <button class="w-100 btn btn-lg btn-primary mt-2" type="submit">Login</button>

            @include('partials.errors')
        </form>
    </main>            
@endsection
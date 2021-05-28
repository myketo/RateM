@extends('layouts.app')

@push('styles')
    <link rel='stylesheet' href='{{ asset('css/auth.css') }}'>
@endpush

@section('content')
    <main class="form-signin">
        <form method='POST' action='/register'>
            @csrf

            <h1 class="h1 mb-3 fw-normal text-light">Register</h1>
        
            <div class="form-floating mb-1">
                <input type="text" class="form-control" id="floatingInput" placeholder="Name" name='name' autofocus>
                <label for="floatingInput">Name</label>
            </div>
            <div class="form-floating mb-1">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name='email'>
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating mb-1">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name='password'>
                <label for="floatingPassword">Password</label>
            </div>
            <div class="form-floating mb-1">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Confirm Password" name="password_confirmation">
                <label for="floatingPassword">Password Confirm</label>
            </div>

            <button class="w-100 btn btn-lg btn-primary mt-2" type="submit">Register</button>

            @include('partials.errors')
        </form>
    </main>
@endsection
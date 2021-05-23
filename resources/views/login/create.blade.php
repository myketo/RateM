@extends('layouts.app')

@push('styles')
    <link rel='stylesheet' href='{{ asset('css/register.css') }}'>
@endpush

@section('content')
    <main class="form-signin">
        <form method='POST' action='/login'>
            @csrf

            <h1 class="h3 mb-3 fw-normal">Login</h1>
        
            <div class="form-floating">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name='email'>
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name='password'>
                <label for="floatingPassword">Password</label>
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>

            @if ($errors->any())
                <div class='alert alert-danger'>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>
        <p class="mt-5 mb-3 text-muted">© Mikołaj Pięcek</p>
    </main>
@endsection
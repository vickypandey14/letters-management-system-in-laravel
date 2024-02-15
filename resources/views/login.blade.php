@extends('layouts.template')
@section('title', 'Login')

@section('content')



<form method="POST" class="shadow col-6 mx-auto mt-5 border rounded p-4" action="{{ route('login.post') }}">
    @csrf

    <div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>

    <div>
        @if ($errors->any())
            <div>                
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            </div>
        @endif
    </div>

    <div class="mb-3">
        <label class="form-label" for="email">Email:</label>
        <input class="form-control" type="email" name="email" id="email" required>
    </div>

    <div class="mb-3">
        <label class="form-label" for="password">Password:</label>
        <input class="form-control" type="password" name="password" id="password" required>
    </div>

    <div class="mb-3">
        <input class="form-label" type="checkbox" name="remember" id="remember">
        <label for="remember">Remember me</label>
    </div>

    <div class="mb-3">
        <button class="btn btn-success" type="submit">Log in</button>
    </div>
    <p>Don't have an account? <a href="{{ route('register') }}">Register now</a>.</p>
</form>
    
@endsection
@extends('layouts.template')
@section('title', 'Register')

@section('content')

<form method="POST" class="shadow col-6 mx-auto mt-5 border rounded p-4" action="{{ route('register.submit') }}">
    @csrf
    <div class="mb-3">
        <label class="form-label" for="name">Name</label>
        <input value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" type="text" name="name" required>
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label" for="email">Email</label>
        <input value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" type="email" name="email" required>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label" for="password">Password</label>
        <input value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror" type="password" name="password" required>
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label" for="password_confirmation">Confirm Password</label>
        <input value="{{ old('password_confirmation') }}" class="form-control @error('password_confirmation') is-invalid @enderror" type="password" name="password_confirmation" required>
        @error('password_confirmation')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Register</button>
    </div>
    <p>Already have an account? <a href="{{ route('login') }}">Login now</a>.</p>
</form>

    
@endsection
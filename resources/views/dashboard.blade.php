@extends('layouts.template')
@section('title', 'Dashboard')

@section('content')

<p class="fs-4 text-info mt-3">Welcome To Dashboard, {{ Auth::user()?->name }}</p>
<p class="fs-6">Email: {{ Auth::user()?->email }}</p>
@if (Auth::user()?->access_level == 0)
    <p class="fs-6">User Profile</p>
@else
    <p class="fs-6">Admin Profile</p>
@endif
<div class="col-sm-6">
    <hr>
    @if (Auth::user()?->access_level == 1)
        <a href="{{ route('letters.index') }}" class="btn btn-success">View All Letters</a>
    @endif
    &nbsp;
    <a href="{{ route('letters.create') }}" class="btn btn-primary">Create Letter</a>
    <hr>
</div>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<div class="container mt-4">
    <h3><i class="bi bi-card-text"></i> My Letters</h3>

    <div class="row mt-4">
        @foreach($letters as $letter)
            <div class="col-md-6">
                <div class="card mb-4 shadow">
                    <div class="card-body">
                        <h5 class="card-title"><b>Subject:</b> {{ $letter->subject }}</h5>
                        <hr>
                        <p class="card-text"><b>Content:</b> {{ $letter->content }}</p>
                        <hr>
                        <p class="card-text">Created by {{ $letter->author->name }} on {{ \Carbon\Carbon::parse($letter->creation_date)->format('Y-m-d H:i:s') }}</p>
                        <a href="{{ route('letters.edit', ['letter' => $letter->id]) }}" class="btn btn-primary">Edit</a>
                        
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
    
@endsection
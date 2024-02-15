@extends('layouts.template')
@section('title', 'All Letters')

@section('content')

<div class="mt-4">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
</div>

<h4>All Letters</h4>
<hr>
@foreach ($letters as $letter)
<div class="col-sm-4 mt-4">
    <div class="card mb-3">
        <div class="card-header bg-dark text-light">{{ $letter->subject }}</div>
        <div class="card-body">
            <p class="card-text">{{ $letter->content }}</p>
        </div>
        <div class="card-footer bg-dark text-light">
            <p class="card-text">Created by {{ $letter->author->name }} on {{ $letter->creation_date }}</p>
            <p class="card-text">Email: {{ $letter->author->email }}</p>
            <p class="card-text">Access level: {{ $letter->access_level }}</p>
            <a href="{{ route('letters.show', $letter->id) }}" class="btn btn-primary">View letter</a>
            <a href="{{ route('letters.admin-edit', $letter->id) }}" class="btn btn-primary">Edit letter</a>
        </div>
    </div>
</div>
@endforeach

@endsection
@extends('layouts.template')
@section('title', 'Create Letter')

@section('content')

    <form method="POST" class="shadow col-6 mx-auto mt-5 border rounded p-4" action="{{ route('letters.store') }}">
        @csrf
        <div class="mb-3">
            <h4 class="text-success">Create Letter</h4>
            <hr>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>

        <div class="mb-3">
            <label class="form-label" for="subject">Subject:</label>
            <input class="form-control" type="text" name="subject" id="subject" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="content">Content:</label>
            <textarea class="form-control" rows="5" name="content" id="content" required></textarea>
        </div>
        <div class="mb-3">
            <button class="btn btn-primary" type="submit">Create Letter</button>
        </div>
    </form>

@endsection
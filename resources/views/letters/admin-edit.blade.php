@extends('layouts.template')
@section('title', 'Edit This Letters')

@section('content')

<form method="POST" class="shadow col-6 mx-auto mt-5 border rounded p-4" action="{{ route('letters.adminUpdate', $letter->id) }}">
    <div class="mb-3 h4 text-success">
        Edit This Letter
    </div>
    <p class="text-success">Author E-mail: {{ $letter->author->email }}</p>
    <hr>
    @csrf
    @method('PUT')
    <div class="form-group mb-3">
        <label class="form-label" for="subject">Subject</label>
        <input type="text" name="subject" id="subject" class="form-control" value="{{ $letter->subject }}">
    </div>
    <div class="form-group mb-3">
        <label class="form-label" for="content">Content</label>
        <textarea name="content" rows="7" id="content" class="form-control">{{ $letter->content }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Update Letter</button>
</form>


@endsection
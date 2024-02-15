@extends('layouts.template')
@section('title', 'Edit Your Letter')

@section('content')

<form class="shadow col-6 mx-auto mt-5 border rounded p-4" action="{{ route('letters.update', $letter->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group mb-3">
        <label class="form-label" for="subject">Subject:</label>
        <input type="text" name="subject" id="subject" class="form-control" value="{{ $letter->subject }}">
    </div>

    <div class="form-group mb-3">
        <label class="form-label" for="content">Content:</label>
        <textarea name="content" rows="5" id="content" class="form-control">{{ $letter->content }}</textarea>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>
    
@endsection
@extends('layouts.template')
@section('title', 'All Letters')

@section('content')

<div class="container">
    <div class="row">
      <div class="col-md-12 border mt-5 rounded shadow-lg">
            <h1 class="mt-3">{{ $letter->subject }}</h1>
            <p>Created by {{ $letter->author->name }} on {{ date_format(date_create_from_format('Y-m-d H:i:s', $letter->creation_date), 'd/m/Y h:i A') }}</p>
            <hr>
            <h2>Latest Version</h2>
            <p>{{ $latest_version->content }}</p>
            <hr>
            <h2><i class="bi bi-clock-history"></i> Version History</h2>
            <ul>
            @foreach($versions as $version)
            <li>
                Version {{ $version->version }}:
                {{ $version->created_at->format('d/m/Y H:i:s') }}
            </li>
            @endforeach
            </ul>
      </div>
    </div>
  </div>
  


@endsection
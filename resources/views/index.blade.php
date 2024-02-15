@extends('layouts.template')
@section('title', 'Letters')

@section('content')

<div class="px-4 py-5 my-5 text-center">
    <img class="d-block mx-auto mb-4" src="https://bytewebster.com/img/logo.png" alt="" width="72" height="">
    <h1 class="display-5 fw-bold text-body-emphasis">Letter Management System</h1>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4">
        © 2023 Vivek Pandey. All rights reserved. This Letter Management System and its contents are the intellectual property of Vivek Pandey and may not be reproduced or used without permission.
      </p>
      @if ( strlen(Auth::user()?->name)>0)
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <a href="{{ route('dashboard') }}" class="btn btn-primary btn-lg px-4 gap-3"><i class="bi bi-speedometer2"></i> Dashboard</a>
            <form action="{{ route('logout') }}" method="POST">
              @csrf
              <button class="btn btn-danger btn-lg px-4 gap-3" onclick="return confirm('Are You Sure you want to logout?')" type="submit"><i class="bi bi-box-arrow-right"></i> Logout</button>
            </form>
        </div>
      @else
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <a class="btn btn-primary btn-lg px-4 gap-3" href="{{ route('register') }}">Register</a>&nbsp;
            <a class="btn btn-outline-secondary btn-lg px-4" href="{{ route('login') }}">Login</a>
        </div>
      @endif
    </div>
  </div>
    
@endsection
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Letter;

class DashboardController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();
        $letters = Letter::where('author_id', $user_id)->get();
        return view('dashboard', compact('letters'));
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Letter;
use App\Models\LetterVersion;

class LetterListController extends Controller
{
    public function index()
    {
        $letters = \App\Models\Letter::orderBy('creation_date')->get();
        return view('letters.index')->with('letters', $letters);
    }

    public function show($id)
    {
        $letter = \App\Models\Letter::findOrFail($id);

        // Join the letters and letter_versions tables to get the appropriate version of the content for the current user.
        $latest_version = \App\Models\LetterVersion::leftJoin('letters', 'letters.id', '=', 'letter_versions.letter_id')
                            ->where('letters.id', '=', $id)
                            ->orderBy('version', 'DESC')
                            ->first();

        // Query the letter_versions table of the database to get the version history.
        $versions = \App\Models\LetterVersion::where('letter_id', '=', $id)
                            ->orderBy('version', 'DESC')
                            ->get();

        return view('letters.show', compact('letter', 'latest_version', 'versions'));
    }

}
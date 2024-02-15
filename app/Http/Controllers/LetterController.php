<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Letter;
use App\Models\LetterVersion;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class LetterController extends Controller
{
    public function create()
    {
        return view('letters.create');
    }

    public function store(Request $request)
    {
        $letter = new Letter;
        $letter->subject = $request->input('subject');
        $letter->content = $request->input('content');
        $letter->author_id = auth()->id();
        $letter->creation_date = now();
        $letter->text_color = 'red';
        $letter->save();

        $version = new LetterVersion;
        $version->letter_id = $letter->id;
        $version->editor_id = auth()->id();
        $version->edited_date = now();
        $version->version_number = 1;
        $version->content = $letter->content;
        $version->save();

        return redirect('/letters/create')->with('success', 'Letter created successfully.');
    }

    public function edit($id)
    {
        try {
            $letter = Letter::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect('/dashboard')->with('error', 'Letter not found.');
        }

        return view('letters.edit', compact('letter'));
    }

    public function update(Request $request, $id)
    {
        $letter = Letter::findOrFail($id);

        // Check if logged-in user is the author of the letter
        if ($letter->author_id != Auth::id()) {
            return redirect('/dashboard')->with('error', 'You are not authorized to edit this letter.');
        }

        $version = new LetterVersion();
        $version->letter_id = $letter->id;
        $version->content = $letter->content;
        $version->editor_id = Auth::id(); 
        $version->edited_date = Carbon::now();
        $version->version = $letter->versions->max('version') + 1;
        $version->save();

        $letter->subject = $request->input('subject');
        $letter->content = $request->input('content');
        $letter->highlight_color = 'red';
        $letter->current_version = $version->version;
        $letter->save();

        return redirect('/dashboard')->with('success', 'Letter Updated successfully.');
    }

    public function adminedit($id)
    {
        $letter = Letter::find($id);
        return view('letters.admin-edit', ['letter' => $letter]);
    }

    public function adminUpdate(Request $request, $id)
    {
        $letter = Letter::findOrFail($id);

        // Create new version
        $version = new LetterVersion();
        $version->letter_id = $letter->id;
        $version->content = $request->input('content');
        $version->editor_id = Auth::id();
        $version->edited_date = Carbon::now();
        $version->version = $letter->versions->max('version') + 1;
        $version->save();

        // Update letter
        $letter->subject = $request->input('subject');
        $letter->content = $request->input('content');
        $letter->highlight_color = 'green';
        $letter->current_version = $version->version;
        $letter->save();

        return redirect('letters')->with('success', 'User Letter Updated successfully.');
    }


}

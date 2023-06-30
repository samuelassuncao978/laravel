<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

// Models
use App\Models\Note;

class NotesController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "note" => "nullable",
        ]);

        $note = (new Note())->create($validated);
        $note->users()->sync($request->user ?? auth()->user()->id);
        $note->clients()->sync($request->client ?? null);

        session()->flash("message", "Successfully created note!");

        return true;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $note = Note::findOrFail($request->note);
        $validated = $request->validate([
            "protection" => "nullable",
        ]);
        $note->update($validated);
        return true;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Note $note)
    {
        $note->delete();
        return redirect("notes")->with("message", "Successfully deleted note!");
    }
}

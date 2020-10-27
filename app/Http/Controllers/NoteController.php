<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Note;
class NoteController extends Controller
{
    public function create()
    {
       return view('notes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            
            'content' =>'required',            
            
        ]);
        auth()->user()->notes()->create([             
            'content' =>$request['content'],
            'user_id'=>auth()->user()->id,         
          ]);
          return redirect()->back()->with('success', 'Note Added succesfully');
    }

    public function show(Note $note)
    {
        //$savings = Saving::where('user_id', Auth::id())->orderBy('created_at', 'DESC')->get();
        return view('notes.details', compact('note'));
    }
    public function note_details(Note $note)
    {
        //$savings = Saving::where('user_id', Auth::id())->orderBy('created_at', 'DESC')->get();
        return view('notes.note_details', compact('note'));
    }

    public function edit(Note $note)
    {
        //$savings = Saving::where('user_id', Auth::id())->orderBy('created_at', 'DESC')->get();
        return view('notes.edit', compact('note'));
    }

    public function update(Request $request, Note $note)
    {

        $this->validate($request, [
            'content' => '',
        ]);
        $data = $request->all();         
        $note->update($data);
        return redirect()->back()->with('success', 'Note updated succesfully');
    }

}

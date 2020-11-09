<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\SchoolNote;
class CommentController extends Controller
{
    public function Create(SchoolNote $schoolnote){

        return view('comments.school_comment',compact('schoolnote'));
    }
    
    public function Store(SchoolNote $schoolnote, Request $request){
          $request->validate([
              'subject' => '',
          ]);
          auth()->user()->comments()->create([
              'user_id' => auth()->user()->id,
              'subject' => $request['subject'],
              'school_id' => $schoolnote->school_id,
          ]);
          return redirect('school/view/note/'.$schoolnote->school_id)->with('success', 'Comment Submitted succesfully');

     }

   
}

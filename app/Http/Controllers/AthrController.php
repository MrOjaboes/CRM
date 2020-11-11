<?php

namespace App\Http\Controllers;
use \App\Athr;
use Illuminate\Http\Request;

class AthrController extends Controller
{
    public function Index()
    {
        $athrs = Athr::orderBy('created_at','DESC')->get();
       return view('Athr.index',compact('athrs'));
    }
    public function Create()
     {
         
        return view('Athr.create');
     }

     public function store(Request $request)
     {
         $request->validate([
             '' => '',
         ]);
       return redirect()->back->with();
     }

      public function show(Athr $athr)
     {
         
        return view('Athr.details',compact('athr'));
     }
      public function edit($athr)
     {
        
        return view('Athr.edit',compact('athr'));
     }

     public function update(Athr $athr, Request $request)
     {
         $request->validate([
             '' => '',
         ]);
       return redirect()->back->with();
     }

     public function delete(Athr $athr)
     {
        $athr->delete();
        return redirect()->back->with();
     }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\AthrPackage;
class AthrPackageController extends Controller
{
     public function Index()
     {
        $packages = AthrPackage::all();
        return view('Athr.index');
     }

      public function Create()
     {
         
        return view('Athr.create');
     }

     public function store(AthrPackage $athr, Request $request)
     {
         $request->validate([
             '' => '',
         ]);
       return redirect()->back->with();
     }

      public function show()
     {
        $packages = AthrPackage::all();
        return view('Athr.details');
     }
      public function edit($athr)
     {
        $package = AthrPackage::find($athr);
        return view('Athr.edit');
     }

     public function update(AthrPackage $athr, Request $request)
     {
         $request->validate([
             '' => '',
         ]);
       return redirect()->back->with();
     }

     public function delete(AthrPackage $athr)
     {
        $athr->delete();
        return redirect()->back->with();
     }
}

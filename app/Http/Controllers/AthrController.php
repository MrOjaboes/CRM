<?php

namespace App\Http\Controllers;
use \App\Athr;
use Illuminate\Http\Request;

class AthrController extends Controller
{
    public function Index()
    {
        $athrs = Athr::orderBy('created_at','DESC')->get();
       return view('athr.index',compact('athrs'));
    }
}

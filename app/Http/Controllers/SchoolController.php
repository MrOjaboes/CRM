<?php

namespace App\Http\Controllers;
use \App\School;
use \App\Deals;
use \App\Package;
use Config;
use \App\SchoolNote;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
   public function Index()
   {
    $deals = Deals::where('user_id',auth()->user()->id)->sum('balance');
    $payments = Deals::where('user_id',auth()->user()->id)->get();
     $schools = School::orderBy('created_at','desc')->get();
     return view('schools.schools',compact('schools','deals','payments'));
   }

    public function Create()
    {
      return view('schools.create');
    }

    public function Store(Request $request)
    {
      $request->validate([
            
        'name' =>'required',
        'email' =>'required|email',   
        'phone' =>'required',
        'address' =>'required',  
        'contact_person' =>'required',             
        
    ]);
    auth()->user()->schools()->create([             
        'name' =>$request['name'],
        'email' =>$request['email'],
        'phone' =>$request['phone'],
        'address' =>$request['address'],
        'contact_person' =>$request['contact_person'],
        'user_id'=>auth()->user()->id, 
        'added_by'=>auth()->user()->username,         
      ]);
      return redirect('school/index')->with('success', 'School Added succesfully');

    }
  
    public function Show(School $school)
    {
      $deals = Deals::where('school_id',$school->id)->get();
      return view('schools.details',compact('school','deals'));
    }

    public function view_note(SchoolNote $school_notes,School $school)
    {
      $school_notes = SchoolNote::where('school_id',$school->id)->orderBy('created_at','DESC')->get();
      return view('schools.view_note',compact('school','school_notes'));
    }
   public function close_deal(School $school)
   {
     $packages = Package::all();
    return view('deals.create',compact('school','packages'));
   }

    public function Edit(School $school)
    {
      return view('schools.edit',compact('school'));
    }

    public function school_note(\App\School $school){
      // $activities = Activity_log::where('project_id',$project)->get();
      
       return view('schools.note',compact('school'));
   }
   public function store_note(\App\School $school, Request $request){
    $request->validate([
        
        'subject' =>'required',            
        
    ]);
    auth()->user()->school_notes()->create([
        'school_id' => $school->id,
        'subject' =>'['.auth()->user()->username.']'.$request['subject'].' '.'Added By'.' '.'<b>'.auth()->user()->username.'</b>',
        'user_id'=>auth()->user()->id,         
      ]);
      return redirect("school/index");
      // return redirect("/admin/project/".$project->id);
 }

 public function store_close_deal(\App\School $school, Request $request){
  $request->validate([
      
      'users' =>'required',
      'package' =>'required',            
      
  ]);
  //dd(Config::get('package.packages.p1') * $request['users'] );
  if($request['package'] == Config::get('package.packages.P1')){
    $amount = $request['users'] * 1000;
    $ten_percent = (10/100) * $amount;
    $reminant = $amount - $ten_percent;
    $final_amount = (15/100) * $reminant;
    //dd($final_amount);
  }elseif($request['package'] == Config::get('package.packages.P2')){
    $amount = $request['users'] * 1500;
    $ten_percent = (10/100) * $amount;
    $reminant = $amount - $ten_percent;
    $final_amount = (15/100) * $reminant;
    dd($final_amount);
  }elseif($request['package'] == Config::get('package.packages.P3')){
    $amount = $request['users'] * 2500;
    $ten_percent = (10/100) * $amount;
    $reminant = $amount - $ten_percent;
    $final_amount = (15/100) * $reminant;
   // dd($final_amount);
  }elseif($request['package'] == Config::get('package.packages.P4')){
    $amount = $request['users'] * 3000;
    $ten_percent = (10/100) * $amount;
    $reminant = $amount - $ten_percent;
    $final_amount = (15/100) * $reminant;
    //dd($final_amount);
  }elseif($request['package'] == Config::get('package.packages.P5')){
    $amount = $request['users'] * 5000;
    $ten_percent = (10/100) * $amount;
    $reminant = $amount - $ten_percent;
    $final_amount = (15/100) * $reminant;
   // dd($final_amount);
  }
      $deals = auth()->user()->deals()->create([
      'school_id' => $school->id,
      'users' =>$request['users'],
      'package_amount' =>$final_amount,
      'package' =>$request['package'],
      'user_id'=>auth()->user()->id,         
    ]);  
    if($deals){
      auth()->user()->wallet()->create([        
        'balance' =>$final_amount,         
        'user_id'=>auth()->user()->id,         
      ]);  
      $school->update([
            'completed' => true
        ]);
    }  
    return redirect('school/index')->with('success', 'School Deal Closed succesfully');
}
    // public function complete_deal(School $school)
    // {
    //   $school->update([
    //     'completed' => true
    // ]);
    // return redirect()->back()->with('message','Deal Closed Successfully!');
    // }

    
    // public function open_deal(School $school)
    // {
    //   $school->update([
    //     'completed' => false
    // ]);
    // return redirect()->back()->with('message','Deal Re-Open Successfully!');
    // }
            
    public function Update(Request $request, School $school) 
     {
      $this->validate($request, [
        'name' => '',
        'email' => '',
        'contact_person' => '',
        'phone' => '',
        'address' => '',
    ]);
    $data = $request->all();         
    $school->update($data);
    return redirect()->back()->with('success', 'School updated succesfully');
      
    }
    public function Delete(Request $request, School $school)
    {
        $school->delete();

        return redirect()->back()->with('success', 'School Deleted succesfully');
    }
}

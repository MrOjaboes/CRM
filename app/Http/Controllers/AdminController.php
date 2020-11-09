<?php

namespace App\Http\Controllers;

use App\Admin;
use App\CancelMembership;
use App\Loan;
use App\Deals;
use App\School;
use App\Product;
use App\AllNote;
use App\Mail\AcceptLoan;
use App\Mail\OfflineUser;
use App\Mail\PayLoan;
use App\Mail\RejectLoan;
use App\OfflineFund;
use App\Saving;
use App\Transaction;
use App\User;
use App\Wallet;
use App\Note;
use App\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $transaction = Transaction::all()->count();
        // $saving = Wallet::all()->sum('balance');
        $schoolrevos = School::all();
        $affiliates = User::all()->count();
        $products = Product::all()->count();
        $notes = AllNote::all();
        return view('admin.index', compact('notes','products','affiliates','schoolrevos'));
    }
  
    public function schools()
    {
      $schools = School::orderBy('created_at', 'DESC')->get();
      return view('admin.schools', compact('schools'));
    }

    public function Show(School $school)
    {
      //$deals = Deals::where('school_id',$school->id)->orderBy('created_at')->value('package_amount');
      $deals = Deals::where('school_id',$school->id)->orderBy('created_at')->get();
      return view('admin.school_details',compact('school','deals'));
    }

    public function payment(School $school)
    {
       
   $initial_balance = Deals::all()->sum('package_amount');
    $amount = Deals::where('school_id',$school->id)->orderBy('created_at')->value('package_amount');
    $package_amount = $initial_balance - $amount;
    if($package_amount){
      $school->deals()->update([
        'balance' => $package_amount,
        'paid' => true
    ]);
     
    }     
    return redirect()->back()->with('message','Payment Made Successfully!');
    }

    public function affiliate_notes()
    {
     $notes = AllNote::all();
     return view('admin.affiliate_notes',compact('notes'));
    }

     

    public function show_allnote($id)
    {
       // dd($school->id);
      $allnotes = AllNote::where('id',$id)->orderBy('created_at','DESC')->get();
      return view('AllNotes.details',compact('allnotes'));
    }

    public function mark_note(AllNote $note)
    {
      $note->update([
        'status' => true
    ]);
    return redirect()->back()->with('message','Note Marked As Read Successfully!');
    }

     
}

<?php

namespace App\Http\Controllers;

use App\Saving;
use App\School;
use App\Note;
use App\Product;
use App\Deals;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $deals = Deals::where('user_id',auth()->user()->id)->sum('balance');
        $schools = School::where('user_id',auth()->user()->id)->orderBy('created_at','DESC')->get();
        $products = Product::where('user_id',auth()->user()->id)->orderBy('created_at','DESC')->get();
        return view('home', compact('schools','deals','products'));
    }

    public function chart()
    {


        $savings = Saving::where('user_id', Auth::id());

        $users = Saving::select(DB::raw("SUM(amount) as amount"))
            ->where('user_id', Auth::id())

            ->orderBy("created_at")

            ->groupBy(DB::raw("month(created_at)"))

            ->get()->toArray();

        $data = array_column($users, 'amount');

        return response()->json(compact('data'));
    }

    public function downloadPDF($id)
    {
        $transaction = Transaction::find($id);
        $pdf = PDF::loadView('emails.adminsingle', compact('transaction'));

        return $pdf->download('transaction.pdf');
    }

    public function downloadallPDF()
    {
        $transactions = Transaction::all();
        $pdf = PDF::loadView('emails.adminall', compact('transactions'));

        return $pdf->download('transactions.pdf');
    }

    public function sendtransaction(Request $request)
    {
        $data = $request->all();
        $id = $data['id'];
        $transaction = Transaction::find($id);

        $pdf = PDF::loadView('emails.usersingle', compact('transaction'));

        try {

            // Mail::to($data['email'])->send(new MailTransaction($transaction, $pdf));

            Mail::send('emails.usersingle', $data, function ($message) use ($data, $pdf) {
                $message->from('info@vcass.org', 'VCASS');

                $message->to($data['email'], $data['username'])->subject('Transaction Details');
                $message->attachData($pdf->output(), "transaction.pdf");
            });
        } catch (\Exception $e) {

            return redirect()->back()->with('warning', 'Sorry an error occured');
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Loan;
use App\Mail\RequestLoan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loans = Loan::where('user_id', Auth::id())->orderBy('created_at', 'DESC')->get();
        return view('loan.index', compact('loans'));
    }

    public function requestloan(Request $request)
    {
        $data = $request->all();
        $data['due_date'] = Carbon::parse($data['due_date']);

        $loan = Loan::where('status', 'approved')
            ->where('status', 'pending')
            ->where('user_id', Auth::id())
            ->get();
        // if ($loan != null) {
        //     return redirect()->back()->with('warning', 'Sorry you have an active loan or pending loan, wait for it to be approved or pay up!');
        // }
        try {
            DB::beginTransaction();
            $loan = Loan::create($data);
            DB::commit();
            Mail::to('admin@vcass.org')->send(new RequestLoan($loan));
            return redirect()->back()->with('success', 'Your Loan Request has been recieved and will be reviewd');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back()->with('warning', 'Sorry an error occured!');
        }
    }
    public function destroy(Loan $loan)
    {
        //
    }
}

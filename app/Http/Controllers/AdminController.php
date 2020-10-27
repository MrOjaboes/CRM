<?php

namespace App\Http\Controllers;

use App\Admin;
use App\CancelMembership;
use App\Loan;
use App\Deals;
use App\School;
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
        // $transactions = Transaction::paginate(10);
        // $loan = Loan::where('status', 'approved')->count();
        $notes = Note::orderBy('created_at', 'DESC')->get();
        return view('admin.index', compact('notes'));
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
      // $school = School::find($school);        
      //   $projects = DB::table("users")
      //   ->join('deals', 'users.id', '=', 'deals.user_id')
      //   ->where('deals.school_id', $school->id)
      //   ->get();

   $initial_balance = Deals::all()->sum('package_amount');
    $amount = Deals::where('school_id',$school->id)->orderBy('created_at')->value('package_amount');
    $package_amount = $initial_balance - $amount;
    if($package_amount){
      $school->deals()->update([
        'balance' => $package_amount,
        'paid' => true
    ]);
    //   $deal->update([
    //     'paid' => true
    // ]);
    }     
    return redirect()->back()->with('message','Payment Made Successfully!');
    }
    // public function userchart()
    // {
    //     $allusers = User::all();

    //     $users = User::select(DB::raw("COUNT(id) as amount"))


    //         ->orderBy("created_at")

    //         ->groupBy(DB::raw("month(created_at)"))

    //         ->get()->toArray();

    //     $data = array_column($users, 'amount');

    //     return response()->json(compact('data'));
    // }

    // public function loanindex()
    // {
    //     $loans = Loan::orderBy('created_at', 'DESC')->get();
    //     return view('admin.loan.index', compact('loans'));
    // }

    // public function withdrawalindex()
    // {
    //     $withdrawals = Withdrawal::orderBy('created_at', 'DESC')->get();
    //     return view('admin.withdrawal.index', compact('withdrawals'));
    // }

    // public function savings()
    // {
    //     $savings = Saving::orderBy('created_at', 'DESC')->get();
    //     return view('admin.savings.index', compact('savings'));
    // }

    // public function transaction()
    // {
    //     $transactions = Transaction::orderBy('created_at', 'DESC')->get();
    //     return view('admin.transaction.index', compact('transactions'));
    // }

    // public function acceptloan(Request $request, $id)
    // {
    //     $loan = Loan::findOrFail($id);
    //     $user = $loan->user;
    //     try {
    //         DB::beginTransaction();
    //         $loan->update([
    //             'status' => 'approved'
    //         ]);
    //         Mail::to($user)->send(new AcceptLoan($user, $loan));
    //         DB::commit();
    //         return redirect()->back()->with('success', 'Loan Request Accepted!');
    //     } catch (\Swift_TransportException $e) {
    //         DB::commit();
    //         return redirect()->back()->with('success', 'Loan Request Accepted!');
    //     } catch (\Throwable $th) {
    //         DB::rollback();
    //         return redirect()->back()->with('warning', 'Sprry an error occured!');
    //     }
    // }

    // public function rejectloan(Request $request, $id)
    // {
    //     $loan = Loan::findOrFail($id);
    //     $user = $loan->user;
    //     try {
    //         DB::beginTransaction();
    //         $loan->update([
    //             'status' => 'rejected'
    //         ]);
    //         Mail::to($user)->send(new RejectLoan($user, $loan));
    //         DB::commit();
    //         return redirect()->back()->with('success', 'Loan Request Rejecetd!');
    //     } catch (\Throwable $th) {
    //         DB::commit();
    //         return redirect()->back()->with('success', 'Loan Request Rejecetd!');
    //     } catch (\Throwable $th) {
    //         DB::rollback();
    //         return redirect()->back()->with('warning', 'Sorry an error occured!');
    //     }
    // }

    // public function payloan(Request $request, $id)
    // {
    //     $loan = Loan::findOrFail($id);
    //     $user = $loan->user;
    //     try {
    //         DB::beginTransaction();
    //         $loan->update([
    //             'status' => 'paid'
    //         ]);
    //         Mail::to($user)->send(new PayLoan($user, $loan));
    //         DB::commit();
    //         return redirect()->back()->with('success', 'Loan Fully Paid!');
    //     } catch (\Throwable $th) {
    //         DB::commit();
    //         return redirect()->back()->with('success', 'Loan Fully Paid!');
    //     } catch (\Throwable $th) {
    //         DB::rollback();
    //         return redirect()->back()->with('success', 'Loan Fully Paid!');
    //     }
    // }


    // public function rejectwithdrawal(Request $request, $id)
    // {
    //     $withdrawal = Withdrawal::findOrFail($id);
    //     $withdrawal->update([
    //         'status' => 'rejected'
    //     ]);

    //     return redirect()->back()->with('success', 'Withdrawal Request Rejecetd!');
    // }

    // public function acceptwithdrawal(Request $request, $id)
    // {
    //     $withdrawal = Withdrawal::findOrFail($id);

    //     $user = $withdrawal->user_id;

    //     $deductwallet =  Wallet::where('user_id', $user);
    //     $ref = Str::random(10);

    //     $amount =  $withdrawal->amount;
    //     $initial_amount = $withdrawal->user->wallet->balance;
    //     if ($initial_amount < $amount) {
    //         return redirect()->back()->with('warning', 'The user does not have upto this amount in there wallet');
    //     }
    //     try {
    //         DB::beginTransaction();
    //         $final_balance = $initial_amount - $amount;

    //         $withdrawal->update([
    //             'status' => 'approved'
    //         ]);

    //         $deductwallet->update([
    //             'balance' => $final_balance
    //         ]);

    //         $transaction = Transaction::create([
    //             "reference" => $ref,
    //             "payment_type" => 'withdrawal',
    //             "amount" => $amount,
    //             'description' => '' . $withdrawal->user->username . ' withdrawed ' . $amount . ' from his/her wallet',
    //             'user_id' => $user,
    //             'status' =>  'completed'
    //             // 'final_balance' => $walletbalance
    //         ]);

    //         DB::commit();
    //         //add mail
    //         return redirect()->back()->with('success', 'Withdrawal Request was Approved!');
    //     } catch (\Exception $e) {
    //         //throw $e;
    //         DB::rollback();
    //         return redirect()->back()->with('warning', 'sorry an error occured!');
    //     }
    // }

    // public function offlinesaving()
    // {
    //     $offlinesavings = OfflineFund::orderBy('created_at', 'DESC')->get();
    //     return view('admin.offline-saving.index', compact('offlinesavings'));
    // }

    // public function acceptofflinesaving(Request $request, $id)
    // {
    //     $offlinesaving = OfflineFund::findOrFail($id);

    //     $user = $offlinesaving->user_id;

    //     $ref = Str::random(10);
    //     $users = $offlinesaving->user;
    //     $amount =  $offlinesaving->amount;
    //     $initial_amount = $offlinesaving->user->wallet->balance;
    //     $wallet = $offlinesaving->user->wallet;

    //     try {
    //         DB::beginTransaction();
    //         $final_balance = $initial_amount + $amount;

    //         $offlinesaving->update([
    //             'status' => 'approved'
    //         ]);

    //         $wallet->update([
    //             'balance' => $final_balance
    //         ]);

    //         $saving = Saving::create([
    //             'amount' => $amount,
    //             'final_amount' => $final_balance,
    //             'initial_amount' => $initial_amount,
    //             'user_id' => Auth::id()
    //         ]);

    //         $transaction = Transaction::create([
    //             "reference" => $ref,
    //             "payment_type" => 'offlinesaving',
    //             "amount" => $amount,
    //             'description' => '' . $offlinesaving->user->username . ' saved ' . $amount . ' via offline saving',
    //             'user_id' => $user,
    //             'status' =>  'completed'
    //             // 'final_balance' => $walletbalance
    //         ]);

    //         Mail::to($users)->send(new OfflineUser($users, $transaction));
    //         DB::commit();

    //         return redirect()->back()->with('success', 'offlinesaving Request was Approved!');
    //     } catch (\Swift_TransportException $e) {
    //         DB::commit();
    //         return redirect()->back()->with('success', 'offlinesaving Request was Approved!');
    //     } catch (\Exception $e) {
    //         //throw $e;
    //         DB::rollback();
    //         return redirect()->back()->with('warning', 'sorry an error occured!');
    //     }
    // }

    // public function rejectofflinesaving(Request $request, $id)
    // {
    //     $offlinesaving = OfflineFund::findOrFail($id);
    //     $offlinesaving->update([
    //         'status' => 'rejected'
    //     ]);

    //     return redirect()->back()->with('success', 'offlinesaving Request was Rejecetd!');
    // }


    // public function downloadPDF($id)
    // {
    //     $transaction = Transaction::find($id);
    //     $pdf = PDF::loadView('emails.adminsingle', compact('transaction'));

    //     return $pdf->download('transaction.pdf');
    // }

    // public function downloadallPDF()
    // {
    //     $transactions = Transaction::all();
    //     $pdf = PDF::loadView('emails.adminall', compact('transactions'));

    //     return $pdf->download('transactions.pdf');
    // }

    // public function sendtransaction(Request $request)
    // {
    //     $data = $request->all();
    //     $id = $data['id'];
    //     $transaction = Transaction::find($id);

    //     $pdf = PDF::loadView('emails.adminmail', compact('transaction'));

    //     try {

    //         Mail::send('emails.adminmail', $data, function ($message) use ($data, $pdf) {
    //             $message->from('info@vcass.org', 'VCASS');

    //             $message->to($data['email'], $data['username'])->subject('Transaction Details');
    //             $message->attachData($pdf->output(), "transaction.pdf");
    //         });
    //     } catch (\Exception $e) {

    //         return redirect()->back()->with('warning', 'Sorry an error occured');
    //     }
    // }

    // public function cancelmembership()
    // {
    //     $cancels = CancelMembership::all();
    //     return view('admin.cancel.index', compact('cancels'));
    // }

    // public function approvecancel(Request $request, CancelMembership $cancel)
    // {
    //     $id =  $cancel->user_id;

    //     $user = User::findOrFail($id);

    //     $user->delete();

    //     $cancel->delete();

    //     return redirect()->back()->with('success', 'User Membership request was successfull, User can no longer have access to his/her account');
    // }
}

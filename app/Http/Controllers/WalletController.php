<?php

namespace App\Http\Controllers;

use App\Mail\OfflineAdmin;
use App\OfflineFund;
use App\Transaction;
use App\User;
use App\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class WalletController extends Controller
{
    public function fundoffline(Request $request)
    {
        $request->validate([            
            'amount' =>'',
            'user_id' =>'',             
        ]);
        //$data = $request->all();
        try {
            DB::beginTransaction();
            $offlinefund = OfflineFund::create(
                ['amount' => $request['amount'],
                'user_id' => Auth::user()->id,]);
                if($offlinefund){
                    $ref = Str::random(10);
                    $amount = $request['amount'];
                    $transaction = Transaction::create([
                        "reference" => $ref,
                        "payment_type" => 'offline saving',
                        "amount" =>$amount,
                        'description' => Auth::user()->username.' saved ' . $amount . 'via offline saving',
                        'user_id' =>Auth::user()->id,
                        'status' =>  'completed'
                        // 'final_balance' => $walletbalance
                    ]);
                }
            Mail::to('admin@vcass.org')->send(new OfflineAdmin($offlinefund));
            DB::commit();
            return redirect()->back()->with('success', 'Request Recieved!, proceed to our office with cash and your savings will be approved');
        } catch (\Swift_TransportException $e) {
            DB::commit();
            return redirect()->back()->with('success', 'Request Recieved!, proceed to our office with cash and your savings will be approved');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back()->with('warning', 'Sorry an error occured!');
        }
    }
}

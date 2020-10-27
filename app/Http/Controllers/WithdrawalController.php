<?php

namespace App\Http\Controllers;

use App\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class WithdrawalController extends Controller
{
    public function store(Request $request)
    {
        if (Auth::user()->profile->account_number == null || Auth::user()->profile->bank_name == null) {
            return redirect()->back()->with('warning', 'You have not provided your account number and name in your profile, please do so first!');
        }
        $this->validate($request, [
            'amount' => 'required',
            'account_number' => 'required',
            'bank_name' => 'required',
            'user_id' => 'required',
            'reference' => '',
            'status' => '',
        ]);

        $data = $request->all();

        $data['reference'] =  Str::random(10);

        $wallet_balance = Auth::user()->wallet->balance;
        $amount = $data['amount'];

        if ($amount > $wallet_balance || $wallet_balance == 0) {
            return redirect()->back()->with('warning', 'you do not have upto that amount in your savings');
        }

        Withdrawal::create($data);

        return redirect()->back()->with('success', 'Your Withdrawal request has been recieve you will be notified shortly when it is completed');
    }
}

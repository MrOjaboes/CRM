<?php

namespace App\Http\Controllers;

use App\Mail\StripePayment;
use App\Saving;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Stripe\Charge;
use Stripe\Customer;
use Stripe\Stripe;

class PaymentController extends Controller
{


    public function charge(Request $request)
    {
        $data = $request->all();
        $amount = $data['amount'];
        $final_amount = $amount;
        $charge = ($final_amount / 100) * 2.9;
        $final_charge = $final_amount + $charge + 0.30;
        $final_charge = round($final_charge * 100);
        //    dd($final_charge); 
        $wallet_balance = Auth::user()->wallet->balance;
        $user = Auth::user()->wallet;

        $users = Auth::user();

        $new_balance =  $final_amount +  $wallet_balance;

        try {
            DB::beginTransaction();
            Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

            $customer = Customer::create(array(
                'email' => $request->stripeEmail,
                'source' => $request->stripeToken
            ));

            $charge = Charge::create(array(
                'customer' => $customer->id,
                'amount' => $final_charge,
                'currency' => 'usd'
            ));

            $saving = Saving::create([
                'amount' => $final_amount,
                'final_amount' => $new_balance,
                'initial_amount' => $wallet_balance,
                'user_id' => Auth::id()
            ]);

            $transaction = Transaction::create([
                'user_id' => Auth::id(),
                'description' => '' . Auth::user()->username . ' saved ' . $final_amount . ' via Stripe',
                'amount' => $final_amount,
                'payment_type' => 'savings',
                'reference' => Str::random(10),
                'status' => 'completed'
            ]);

            $user->update([
                'balance' => $new_balance
            ]);

            Mail::to($users)->send(new StripePayment($users, $transaction));
            DB::commit();
            return redirect()->back()->with('success', 'Savings Recieved!');
        } catch (\Swift_TransportException $e) {
            DB::commit();
            return redirect()->back()->with('success', 'Savings Recieved!');
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->back()->with('warning', '' . $ex->getMessage() . '');
        }
    }
}

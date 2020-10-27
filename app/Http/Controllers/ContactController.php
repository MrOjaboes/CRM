<?php

namespace App\Http\Controllers;

use App\CancelMembership;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function sendmail(Request $request)

    {


        try {
            Mail::send(new ContactMail($request));
            return response()->json(['success' => 'Success'], 201);
        } catch (\Swift_TransportException $e) {
            return response()->json(['error' => 'Sorry your mail could not be sent because an error occured please try again!']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Sorry your mail could not be sent because an error occured please try again!']);
        }
    }

    public function cancel(Request $request)
    {
        $data = $request->all();

        $cancel = CancelMembership::create($data);

        return redirect()->back()->with('warning', 'You Request to cancel your membership has been recieved');
    }
}

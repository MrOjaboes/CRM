<?php

namespace App\Http\Controllers;

use App\Profile;
use App\Rules\MatchOldPassword;
use App\Saving;
use App\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserMail;
use App\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function show(Profile $profile)
    {
        $savings = Saving::where('user_id', Auth::id())->orderBy('created_at', 'DESC')->get();
        return view('profile.index', compact('profile', 'savings'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        
        return view('profile.edit', compact('profile'));
    }

    public function sendMail(Profile $profile)
    {
        
        return view('admin.users.mail', compact('profile'));
    }
    public function send_user_email(Request $request, Profile $profile)
    {
        $request->validate([            
            'content' =>'required',
                         
        ]);
        $new_mail = auth()->user()->mails()->create([
         'user_email' => $profile->email,
         'content' =>$request['content'],        
         'send_by'=>auth()->user()->username,
       ]);
       if( $new_mail){
        //add project_parties

      $to_email = $new_mail['user_email'];        
     $data = array('name'=> $profile->full_name,
      'content' => $new_mail->content,
     );
     Mail::to($to_email)->send(new UserMail($data)); 
     return redirect()->back()->with('success', 'Mail Sent succesfully');
    }
    }

    public function update_info(Request $request, User $user)
    {
        $request->validate([
            'username' => '',
            'email' => '',
             
        ]);
        User::find(auth()->user()->id)->update([
            'username' => $request->username,
            'email' => $request->email]);
         
        return redirect()->back()->with('success', 'User updated succesfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {

        $this->validate($request, [
            'avatar' => 'sometimes|image|mimes:jpg,jpeg,png,gif,svg|max:2048'
        ]);
        $data = $request->all();

        if ($request->hasFile('avatar')) {
            $imageName = $request->avatar->getClientOriginalName();

            $request->avatar->storeAs('profile', $imageName,'public');

            $data['avatar'] = $imageName;
        }

        $profile->update($data);

        return redirect()->back()->with('success', 'Profile updated succesfully');
    }



    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);

        return redirect()->back()->with('success', 'Password Changed Successfully!');
    }
}

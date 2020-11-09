<?php

namespace App\Http\Controllers;

use App\Mail\NewUserMail;
use App\Profile;
use App\Rules\MatchOldPassword; 
use App\User;
use App\Note;
use App\AllNote;
use App\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $users = User::where('user_type',0)->orderBy('created_at', 'DESC')->get();
        return view('admin.users', compact('users'));
    }

    public function user_products($user)
    {
        $user = User::findOrFail($user);
        $schools = School::where('user_id',$user->id)->get();
        return view('admin.users.products', compact('schools'));
    }

    public function viewNote($id)
    {
        $user = User::findOrFail($id);
        $profile = Profile::where('user_id',$id)->get();  
        $notes = Note::where('user_id',$user->id)->get();        
        return view('admin.users.note', compact('user','profile','notes'));
    }

   

    public function edit(Profile $profile)
    {
        //$user = User::findOrFail($id);
        return view('admin.users.edit', compact('profile'));
    }

    public function update(Request $request, $id)
    {
        $profile = Profile::findOrFail($id);
        $this->validate($request, [
            'avatar' => 'sometimes|image|mimes:jpg,jpeg,png,gif,svg|max:2048'
        ]);
        $data = $request->all();

        if ($request->hasFile('avatar')) {
            $imageName = time() . '.' . $request->avatar->getClientOriginalName();

            $request->avatar->storeAs('profile', $imageName,'public');

            $data['avatar'] = $imageName;
        }

        if ($data['user_type'] != null) {
            $profile->user()->update([
                'user_type' => $data['user_type']
            ]);
        }

        $profile->update($data);

        return redirect()->route('users')->with('success', 'User Updated Successfully!');
    }

    public function adduser()
    {
        return view('admin.users.create');
    }

    public function createuser(Request $request)
    {
        $this->validate($request, [
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $data = $request->all();
        try {

            DB::beginTransaction();
            $data['password'] = Hash::make($data['password']);
            $user = User::create($data);

            Wallet::create([
                'user_id' => $user->id,
            ]);

            Profile::create([
                'user_id' => $user->id
            ]);
            Mail::to($user)->send(new NewUserMail($user));
            DB::commit();
            return redirect()->route('users')->with('success', 'User Created Successfully!');
        } catch (\Swift_TransportException $e) {
            DB::commit();
            return redirect()->route('users')->with('success', 'User Created Successfully!');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('users')->with('warning', 'Sorry an error occured!');
        }
    }

    public function updatePassword(Request $request, $id)
    {
        $user = User::find($id);

        $user->password = Hash::make($request->input('new_password'));

        $user->save();

        return redirect()->route('users')->with('success', 'Password Changed Successfully!');
    }

    public function destroy(Request $request, User $user)
    {
        $user->delete();

        return redirect()->back()->with('warning', 'User Deleted!');
    }

    public static function GetUserById($user_id){
        //$user = User::first('id', $user_id);
      $user = DB::table('users')->where('id', $user_id)->first();
      //dd($user);
      return $user->username;
  }
}

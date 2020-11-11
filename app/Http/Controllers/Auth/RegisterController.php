<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\NewUserMail;
use App\Providers\RouteServiceProvider;
use App\User; 
use App\Profile;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // $url = 'https://www.google.com/recaptcha/api/siteverify';
        // $remoteip = $_SERVER['REMOTE_ADDR'];
        // $datas = [
        //     'secret' => config('services.recaptcha.secret'),
        //     'response' => $data['recaptcha'],
        //     'remoteip' => $remoteip
        // ];
        // $options = [
        //     'http' => [
        //         'header' => "Content-type: application/x-www-form-urlencoded\r\n",
        //         'method' => 'POST',
        //         'content' => http_build_query($datas)
        //     ]
        // ];
        // $context = stream_context_create($options);
        // $result = file_get_contents($url, false, $context);
        // $resultJson = json_decode($result);
        // if ($resultJson->success != true) {
        //     return back()->withErrors(['captcha' => 'ReCaptcha Error']);
        // }
        //if ($resultJson->score >= 0.3) {
            
            $user = User::create([
                'username' => $data['username'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);
                

                // $data['password'] = Hash::make($data['password']);
                // $user = User::create($data);

                 

                Profile::create([
                    'user_id' => $user->id,
                ]);

                // Mail::to($user)->send(new NewUserMail($user));
                // DB::commit();

                return $user;
           
            
        // } else {
        //     return back()->withErrors(['captcha' => 'ReCaptcha Error']);
        // }
    }
}

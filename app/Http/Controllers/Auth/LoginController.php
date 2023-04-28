<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
   protected function authenticated($request,$user)
   {
       if($user->role === 'fishermen'){
           Auth::login($user);
            return redirect()->intended('/fishermen');
       }
       elseif ($user->role === 'director'){
          Auth::login($user);
            return redirect()->intended('/director');
       }
       elseif ($user->role === 'asdi'){
        Auth::login($user);
            return redirect()->intended('/asdi');
       }
       elseif ($user->role === 'dofficer'){
        Auth::login($user);
            return redirect()->intended('/dofficer');
       }
       else
       return redirect()->indended('/login');

   }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Asdi;
use App\Director;
use App\Dofficer;
use App\Fishermen;
use illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
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
    protected $redirectTo = '/home';

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
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:', 'confirmed'],
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
        if ($data['role'] == 'fishermen')
        {
            $user = User::create([
                'first_name' => $data['firstname'],
                'last_name' => $data['lastname'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'role' => 'fishermen'
            ]);


            $fishermen = new Fishermen();
            $fishermen->user_id = $user->id;
            $fishermen->save();
            $this->redirectTo ='/fishermen';
            return $user;
        }



        elseif ($data['role'] == 'director')
        {

            $user = User::create([
                'first_name' => $data['firstname'],
                'last_name' => $data['lastname'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'role' => 'director'
            ]);


            $director = new Director();
            $director->user_id = $user->id;
            $director->save();
            $this->redirectTo ='/director';
            return $user;

        }
        elseif ($data['role'] == 'asdi')
        {

            $user = User::create([
                'first_name' => $data['firstname'],
                'last_name' => $data['lastname'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'role' => 'asdi'
            ]);


            $asdi = new Asdi();
            $asdi->user_id = $user->id;
            $asdi->save();
            $this->redirectTo ='/asdi';
            return $user;

        }
        elseif ($data['role'] == 'dofficer')
        {

            $user = User::create([
                'first_name' => $data['firstname'],
                'last_name' => $data['lastname'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'role' => 'dofficer'
            ]);


            $dofficer = new Dofficer();
            $dofficer->user_id = $user->id;
            $dofficer->save();
            $this->redirectTo ='/dofficer';
            return $user;

        }

    }
}

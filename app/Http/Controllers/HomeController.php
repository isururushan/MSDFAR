<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->role == 'fishermen')
        {
            return redirect('fishermen');
        }
        elseif (Auth::user()->role == 'director')
        {
            return redirect('director');
        }
        elseif (Auth::user()->role == 'asdi')
        {
            return redirect('asdi');
        }
        elseif (Auth::user()->role == 'dofficer')
        {
            return redirect('dofficer');
        }
        return view('login');
    }
}

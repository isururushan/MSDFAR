<?php

namespace App\Http\Controllers;
use App\User;
use App\Fishermen;
use App\Boat;
use App\National_license;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FishermenController extends Controller
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
     * index view of the student page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */


public function index()
{
    $fishermen         = Fishermen::where('user_id','=',Auth::user()->id)->first();
    $boats             = Boat::all();
    $national_licenses = National_license::all();



    return view('fishermen.dashboard',['boats'=>$boats,'national_licenses'=>$national_licenses]);
}

//--------------------all view boat list-------------------------------------------------------------

public function allBoat()
        {
            $boat =Boat::with('boat')->get();
            return view('fishermen.allBoatView',['boats'=>$boat]);
        }


//--------------------all view national license list-------------------------------------------------------------

public function allNational_license()
        {
            $national_license =National_license::with('national_license')->get();
            return view('fishermen.allNational_licenseView',['national_licenses'=>$national_license]);
        }


}

<?php

namespace App\Http\Controllers;
use App\User;
use App\Director;
use App\Asdi;
use App\Dofficer;
use App\Fishermen;
use App\Boat;
use App\National_license;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DirectorController extends Controller
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
    $director = Director::where('user_id','=',Auth::user()->id)->first();
    $fishermens         = Fishermen::with('user')->get();
    $asdis              = Asdi::with('user')->get();
    $dofficers          = Dofficer::with('user')->get();
    $boats              = Boat::all();
    $national_licenses  = National_license::all();




    return view('director.dashboard',['fishermens'=>$fishermens ,'asdis'=>$asdis,'dofficers'=>$dofficers,'boats'=>$boats,'national_licenses'=>$national_licenses]);
}



//-------------------all fishermen view-------------------------------

public function allFishermen()
{
    $fishermen = Fishermen::with('user')->get();
    return view('director.allFishermenView',['fishermens'=>$fishermen]);
}

//-----------------dofficer profile----------------------------------------------------------------//

public function allDofficer()
            {
                $dofficer = Dofficer::where('user_id','=',Auth::user()->id)->first();
                return view('director.allDofficerView',['dofficer'=>$dofficer]);
            }

//-----------------Asdi profile----------------------------------------------------------------//

public function allAsdi()
            {
                $asdi = Asdi::where('user_id','=',Auth::user()->id)->first();
                return view('director.allAsdiView',['asdi'=>$asdi]);
            }
//--------------------all view boat list-------------------------------------------------------------

public function allBoat()
        {
            $boat =Boat::with('boat')->get();
            return view('director.allBoatView',['boats'=>$boat]);
        }


//--------------------all view national license list-------------------------------------------------------------

public function allNational_license()
        {
            $national_license =National_license::with('national_license')->get();
            return view('dofficer.allNational_licenseView',['national_licenses'=>$national_license]);
        }








}

<?php

namespace App\Http\Controllers;
use App\User;
use App\Dofficer;
use App\Fishermen;
use App\Boat;
use App\National_license;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;

class DofficerController extends Controller
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
    $dofficer          = Dofficer::where('user_id','=',Auth::user()->id)->first();
    $fishermens        = Fishermen::with('user')->get();
    $boats             = Boat::all();
    $national_licenses = National_license::all();

    return view('dofficer.dashboard',['fishermens'=>$fishermens ,'boats'=>$boats,'national_licenses'=>$national_licenses]);
}
//-----------------dofficer profile----------------------------------------------------------------//

public function profile()
            {
                $dofficer = Dofficer::where('user_id','=',Auth::user()->id)->first();
                return view('dofficer.profile',['dofficer'=>$dofficer]);
            }
//---------------DOFFICER profile & password change query----------------------------

public function updatePassword(Request $request)
        {
            $old_pw = $request->input('old_pw');
            $new_pw = $request->input('new_pw');
            $user = User::find(Auth::user()->id);

            if ( !Hash::check($old_pw, $user->password)) {
                return redirect()->back()->with('error','Password did not match');
            }
            else{
                $user->password = Hash::make($new_pw);
                $user->save();
                return redirect()->back()->with('success','Password updated');
            }
        }

public function updateProfile(Request $request)
    {
            $fname = $request->input('firstname');
            $lname = $request->input('lastname');
            $email = $request->input('email');

            $getDofficer = Dofficer::where('user_id','=',Auth::user()->id)->first();

            $dofficer= Dofficer::find($getDofficer->id);
            $user = User::find(Auth::user()->id);

            $user->first_name = $fname;
            $user->last_name = $lname;
            $user->email = $email;

            if ($user->save() && $dofficer->save())
            {
                return redirect()->back()->with('success','Your Details updated');
            }
            else{
                return redirect()->back()->with('error','Something went wrong.try again later!');
            }
        }

//---------------------add  fishermen pannel-------------------------------
public function showAddNewFishermenPanel()
            {
                return view('dofficer.addNewFishermen');
            }

//-----------------------add fishermen query------------------------------------
public function addNewFishermen(Request $request)
{
                $fname =$request->input('firstname');
                $lname= $request->input('lastname');
                $password= $request->input('password');
                $conpw = $request->input('password_confirmation');
                $email= $request->input('email');
                $email_exists = User::where('email','=',$email)->first();

            if ($email_exists)
                {
                    return redirect()->back()->with('error','Email already exists.Try different email')->withInput(Input::all());
                }
                if ($password !== $conpw)
                {
                    return redirect()->back()->with('error','Password does not match.')->withInput(Input::all());
                }

                $user =new User();
                $user->first_name =$fname;
                $user->last_name =$lname;
                $user->email =$email;
                $user->role ='fishermen';
                $user->password =Hash::make($password);

            if($user->save())
            {
                $fishermen = new Fishermen();
                $fishermen->user_id =$user->id;

                if($fishermen->save())
                {
                    return redirect('dofficer/fishermen/addNew')->with('success','fishermen Successfully added.Add another one');
                }
                else
                {
                    return redirect()->back()->with('error','Something went wrong.Try again')->withInput(Input::all());
                }
            }
            return redirect()->back()->with('error','Something went wrong.Try again')->withInput(Input::all());
        }
//-------------------all fishermen view-------------------------------

public function fishermenProfiles()
{
    $fishermen = Fishermen::with('user')->get();
    return view('dofficer.allFishermenProfiles',['fishermens'=>$fishermen]);
}

//---------------------------show add new boat list----------------------------------

public function showAddNewBoatPanel()
        {
            return view('dofficer.addNewBoat');
        }
// ---------------------add new boat list into db-----------------------------------

public function addNewBoat(Request $request)
        {
            $boat_name      = $request->input('boat_name');
            $boat_no        = $request->input('boat_no');
            $distric        = $request->input('distric');
            $fishermen_id   = $request->input('fishermen_id');
            $landing_side   = $request->input('landing_side');

            $boat               =new Boat();
            $boat->boat_name    = $boat_name;
            $boat->boat_no      = $boat_no;
            $boat->distric      = $distric;
            $boat->fishermen_id = $fishermen_id;
            $boat->landing_side = $landing_side;

            if($boat->save())
            {
                return redirect('dofficer/boat/addNew')->with('success','Boat register successfully Add');
            }
                return redirect()->back()->with('error','Somthing went wrong.try again')->withInput(Input::all());

        }
//--------------------all view boat list-------------------------------------------------------------

public function allBoat()
        {
            $boat =Boat::with('boat')->get();
            return view('dofficer.allBoatView',['boats'=>$boat]);
        }

//-------------------view boat update panel----------------------------------
public function viewUpdateBoat($id)
        {
            $boat= Boat::find($id);
            return view('dofficer.updateBoat',['boat'=>$boat]);
        }

//-------------------update into boat------------------------------------
public function updateBoat(Request $request)
        {
            $id             = $request->input('id');
            $boat_name      = $request->input('boat_name');
            $boat_no        = $request->input('boat_no');
            $distric        = $request->input('distric');
            $fishermen_id   = $request->input('fishermen_id');
            $landing_side   = $request->input('landing_side');

            $boat               = Boat::find($id);
            $boat->boat_name    = $boat_name;
            $boat->boat_no      = $boat_no;
            $boat->distric      = $distric;
            $boat->fishermen_id = $fishermen_id;
            $boat->landing_side = $landing_side;

            if($boat->save())
            {
                return redirect('dofficer/boat/allView')->with('success','Boat Successfully Updated.');
            }
            else
            {
                return redirect()->back()->with('error','Somthing wrong.Try again....')->withInput(Input::all());
            }
        }
//----------------------delete boat--------------------------------
public function deleteBoat($id)
        {
            $boat = Boat::finde($id);

            if(!$boat)
            {
                return redirect()->back()->with('error','Boat not found..');
            }

            $boat->delete();

            return redirect('dofficer/boat/addNew')->with('success','success for Boat delete...');
        }

// ------------------show add new national lition list---------------------------------

public function showAddNewNational_licensePanel()
        {
            return view('dofficer.addNewNational_license');
        }

// ---------------------add new national license list into db-----------------------------------

public function addNewNational_license(Request $request)
        {
            $eez_license_number = $request->input('eez_license_number');
            $fishermen_id       = $request->input('fishermen_id');
            $boat_no            = $request->input('boat_no');
            $distric            = $request->input('distric');
            $landing_side       = $request->input('landing_side');
            $costal_area        = $request->input('costal_area');
            $fish_type          = $request->input('fish_type');
            $nets_type          = $request->input('nets_type');

            $national_license                    = new National_license();
            $national_license->eez_license_number= $eez_license_number;
            $national_license->boat_no           = $boat_no;
            $national_license->fishermen_id      = $fishermen_id;
            $national_license->distric           = $distric;
            $national_license->landing_side      = $landing_side;
            $national_license->costal_area       = $costal_area;
            $national_license->fish_type         = $fish_type;
            $national_license->nets_type         = $nets_type;

            if($national_license->save())
            {
                return redirect('dofficer/national_license/addNew')->with('success','National license register successfully Add');

            }
            return redirect()->back()->with('error','Somthing went wrong.try again')->withInput(Input::all());

        }
//--------------------all view national license list-------------------------------------------------------------

public function allNational_license()
        {
            $national_license =National_license::with('national_license')->get();
            return view('dofficer.allNational_licenseView',['national_licenses'=>$national_license]);
        }

//-------------------view National license update panel-------------------
public function viewUpdateNational_license($id)
        {
            $national_license = National_license::find($id);
            return view('dofficer.updateNational_license',['national_license'=>$national_license]);
        }

//------------------ Update into National license ----------------------
public function updateNational_license(Request $request)
        {
            $id                 = $request->input('id');
            $eez_license_number = $request->input('eez_license_number');
            $fishermen_id       = $request->input('fishermen_id');
            $boat_no            = $request->input('boat_no');
            $distric            = $request->input('distric');
            $landing_side       = $request->input('landing_side');
            $costal_area        = $request->input('costal_area');
            $fish_type          = $request->input('fish_type');
            $nets_type          = $request->input('nets_type');

            $national_license                    = National_license::find($id);
            $national_license->eez_license_number= $eez_license_number;
            $national_license->boat_no           = $boat_no;
            $national_license->fishermen_id      = $fishermen_id;
            $national_license->distric           = $distric;
            $national_license->landing_side      = $landing_side;
            $national_license->costal_area       = $costal_area;
            $national_license->fish_type         = $fish_type;
            $national_license->nets_type         = $nets_type;

            if($national_license->save())
            {
                return redirect('dofficer/national_license/allView')->with('success','National license update successfully...');

            }
            return redirect()->back()->with('error','Somthing went wrong.try again')->withInput(Input::all());

        }
//----------------------delete national license--------------------------------
public function deleteNational_license($id)
        {
            $national_license = National_license::finde($id);

            if(!$national_license)
            {
                return redirect()->back()->with('error','National licence not found..');
            }

            $national_license->delete();

            return redirect('dofficer/national_license/addNew')->with('success','National license delete...');
        }

}

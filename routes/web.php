<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('/');

Auth::routes();

//==========================register as director==================
Route::get('/register/director', function () {
    return view('auth.directorRegister');
})->name('register/director');

//==========================register as dofficer==================
Route::get('/register/dofficer', function () {
    return view('auth.dofficerRegister');
})->name('register/dofficer');
//==========================register as asdi==================
Route::get('/register/asdi', function () {
    return view('auth.asdiRegister');
})->name('register/asdi');

Route::get('/home', 'HomeController@index')->name('home');

//----------------------------------------------------ASDI ALL ROUTE-----------------------------------------------------------------------------------------------
// get asdi
Route::get('/asdi', 'AsdiController@index')->middleware('asdi')->name('asdi');
// asdi profile
Route::get('/asdi/profile', 'AsdiController@profile')->middleware('asdi')->name('asdi/profile');
//asdi update password
Route::post('/asdi/profile/updatePassword', 'AsdiController@updatePassword')->middleware('asdi')->name('asdi/profile/updatePassword');
//asdi update profile
Route::post('/asdi/profile/updateProfile', 'AsdiController@updateProfile')->middleware('asdi')->name('asdi/profile/updateProfile');
//-----------------------------------------------------------------------------------------------------------------------------------------
//add fishermen
Route::get('/asdi/fishermen/addNew', 'AsdiController@showAddNewFishermenPanel')->middleware('asdi')->name('asdi/fishermen/addNew');
//add fishermen in DB
Route::post('/asdi/fishermen/addNew/add', 'AsdiController@addNewFishermen')->middleware('asdi')->name('asdi/fishermen/addNew/add');
//view all fishermen table
Route::get('/asdi/fishermen/allProfiles', 'AsdiController@fishermenProfiles')->middleware('asdi')->name('asdi/fishermen/allProfiles');
//--------------------------------------------------------------------------------------------------------------------------------------------
//view add new boat panel
Route::get('/asdi/boat/addNew', 'AsdiController@showAddNewBoatPanel')->middleware('asdi')->name('asdi/boat/addNew');
// add new boat to database
Route::post('/asdi/boat/addNew/add','AsdiController@addNewBoat')->middleware('asdi')->name('asdi/boat/addNew/add');
//view available boat list
Route::get('/asdi/boat/allView', 'AsdiController@allBoat')->middleware('asdi')->name('asdi/boat/allView');
// delete boat
Route::get('/asdi/boat/delete/{id}','AsdiController@deleteBoat')->middleware('asdi')->name('asdi/boat/delete/');
//update boat
Route::get('/asdi/boat/update/{id}', 'AsdiController@ViewUpdateBoat')->middleware('asdi')->name('asdi/boat/update/');
//update boat to database
Route::post('/asdi/boat/update/update', 'AsdiController@updateBoat')->middleware('asdi')->name('asdi/boat/update/update');

//---------------------------------------------------------------------------------------------------------------------------------------------
//view add new national license panel
Route::get('/asdi/national_license/addNew', 'AsdiController@showAddNewNational_licensePanel')->middleware('asdi')->name('asdi/national_license/addNew');
// add new national license to database
Route::post('/asdi/national_license/addNew/add','AsdiController@addNewNational_license')->middleware('asdi')->name('asdi/national_license/addNew/add');
//view available national license list
Route::get('/asdi/national_license/allView', 'AsdiController@allNational_license')->middleware('asdi')->name('asdi/national_license/allView');
// delete national license
Route::get('/asdi/national_license/delete/{id}','AsdiController@deleteNational_license')->middleware('asdi')->name('asdi/national_license/delete/');
//update national license
Route::get('/asdi/national_license/update/{id}', 'AsdiController@ViewUpdateNational_license')->middleware('asdi')->name('asdi/national_license/update/');
//update national license to database
Route::post('/asdi/national_license/update/update', 'AsdiController@updateNational_license')->middleware('asdi')->name('asdi/national_license/update/update');

//===============================================================================================================================================================

//----------------------------------------------------DIRECTOR ALL ROUTE----------------------------------------------------------------------------------
// get director
Route::get('/director', 'DirectorController@index')->middleware('director')->name('director');
//view available Fishermen list
Route::get('/director/fishermen/allView', 'DirectorControlle@allFishermen')->middleware('director')->name('director/fishermen/allView');

//view available Assistant director list
Route::get('/director/asdi/allView', 'DirectorControlle@allAsdi')->middleware('director')->name('director/asdi/allView');

//view available Do officers list
Route::get('/director/dofficer/allView', 'DirectorControlle@allDofficer')->middleware('director')->name('director/dofficer/allView');

//view available boat list
Route::get('/director/boat/allView', 'DirectorControlle@allBoat')->middleware('director')->name('director/boat/allView');
//view available national license list
Route::get('/director/national_license/allView', 'DirectorControlle@allNational_license')->middleware('director')->name('director/national_license/allView');

//========================================================================================================================================================================





//----------------------------------------------------DOFFICER ALL ROUTE-----------------------------------------------------------------------------------------------------
// get dofficer
Route::get('/dofficer', 'DofficerController@index')->middleware('dofficer')->name('dofficer');
// dofficer profile
Route::get('/dofficer/profile', 'DofficerController@profile')->middleware('dofficer')->name('dofficer/profile');
//dofficer update password
Route::post('/dofficer/profile/updatePassword', 'DofficerController@updatePassword')->middleware('dofficer')->name('dofficer/profile/updatePassword');
//dofficer update profile
Route::post('/dofficer/profile/updateProfile', 'DofficerController@updateProfile')->middleware('dofficer')->name('dofficer/profile/updateProfile');
//========================================== GET ALL FISHERMEN ====================================
//add fishermen
Route::get('/dofficer/fishermen/addNew', 'DofficerController@showAddNewFishermenPanel')->middleware('dofficer')->name('dofficer/fishermen/addNew');
//add fishermen in DB
Route::post('/dofficer/fishermen/addNew/add', 'DofficerController@addNewFishermen')->middleware('dofficer')->name('dofficer/fishermen/addNew/add');
//view all fishermen table
Route::get('/dofficer/fishermen/allProfiles', 'DofficerController@fishermenProfiles')->middleware('dofficer')->name('dofficer/fishermen/allProfiles');
//===========================================GET ALL BOAT ==============================================
//view add new boat panel
Route::get('/dofficer/boat/addNew', 'DofficerController@showAddNewBoatPanel')->middleware('dofficer')->name('dofficer/boat/addNew');
// add new boat to database
Route::post('/dofficer/boat/addNew/add','DofficerController@addNewBoat')->middleware('dofficer')->name('dofficer/boat/addNew/add');
//view available boat list
Route::get('/dofficer/boat/allView', 'DofficerController@allBoat')->middleware('dofficer')->name('dofficer/boat/allView');
// delete boat
Route::get('/dofficer/boat/delete/{id}','DofficerController@deleteBoat')->middleware('dofficer')->name('dofficer/boat/delete/');
//update boat
Route::get('/dofficer/boat/update/{id}', 'DofficerController@ViewUpdateBoat')->middleware('dofficer')->name('dofficer/boat/update/');
//update boat to database
Route::post('/dofficer/boat/update/update', 'DofficerController@updateBoat')->middleware('dofficer')->name('dofficer/boat/update/update');

//=======================================GET ALL NATIONAL LICENSE =======================================
//view add new national license panel
Route::get('/dofficer/national_license/addNew', 'DofficerController@showAddNewNational_licensePanel')->middleware('dofficer')->name('dofficer/national_license/addNew');
// add new national license to database
Route::post('/dofficer/national_license/addNew/add','DofficerController@addNewNational_license')->middleware('dofficer')->name('dofficer/national_license/addNew/add');
//view available national license list
Route::get('/dofficer/national_license/allView', 'DofficerController@allNational_license')->middleware('dofficer')->name('dofficer/national_license/allView');
// delete national license
Route::get('/dofficer/national_license/delete/{id}','DofficerController@deleteNational_license')->middleware('dofficer')->name('dofficer/national_license/delete/');
//update national license
Route::get('/dofficer/national_license/update/{id}', 'DofficerController@ViewUpdateNational_license')->middleware('dofficer')->name('dofficer/national_license/update/');
//update national license to database
Route::post('/dofficer/national_license/update/update', 'DofficerController@updateNational_license')->middleware('dofficer')->name('dofficer/national_license/update/update');


//============================================================================================================================================================================

//-------------------------------------------------FISHERMEN ALL ROUTE------------------------------------------------------------------------------------------------

// get fishermen
Route::get('/fishermen', 'FishermenController@index')->middleware('fishermen')->name('fishermen');
//view available boat list
Route::get('/fishermen/boat/allView', 'FishermenController@allBoat')->middleware('fishermen')->name('fishermen/boat/allView');
//view available national license list
Route::get('/fishermen/national_license/allView', 'FishermenController@allNational_license')->middleware('fishermen')->name('fishermen/national_license/allView');

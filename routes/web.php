<?php

use Illuminate\Http\Request; //use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();  //only register no email verification
Auth::routes(['verify' => true]);

Route::get('profile',function(){
    return 'This is profile';
})->middleware('verified');


  
// Route::get('/home', 'HomeController@index')->name('home'); //original
Route::get('/home', 'MerchantController@index')->name('merchant.index');

//////////////////////////////////
////////// jm routes////////////////
//////////////////////////////////

////////user//////////
Route::get('/user', 'UserController@index')->name('user.index');
Route::post('/upload','UserController@uploadAvatar');

Route::group(['middleware' => 'App\Http\Middleware\MerchantMiddleware'], function()
{
////////merchant//////////
Route::get('/merchant', 'MerchantController@index')->name('merchant.index');
Route::post('/mupload','MerchantController@uploadMAvatar');
Route::get('/mprofile', 'MerchantController@profile')->name('merchant.profile');
Route::get('/merchant_parcels', 'MerchantController@parcels')->name('merchant.parcels');
Route::get('/merchant/create', 'MerchantController@create');
Route::post('/merchant/create', 'MerchantController@store');
Route::get('/merchantparcel/{parcel}/details', 'MerchantController@details');
});
////////rider//////////
Route::group(['middleware' => 'App\Http\Middleware\RiderMiddleware'], function()
{
Route::get('/rider', 'RiderController@index')->name('rider.index');
Route::post('/rupload','RiderController@uploadMAvatar');
Route::get('/rprofile', 'RiderController@profile')->name('rider.profile');
Route::get('/rider_parcels', 'RiderController@parcels')->name('rider.parcels');
Route::get('/rider/{parcel}/details', 'RiderController@details');
});
////////admin//////////
Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function()
{
Route::get('/admin', 'AdminController@index')->name('admin.index');
Route::post('/aupload','AdminController@uploadMAvatar');
Route::post('/auploadicon','AdminController@uploadMesIcon');
Route::get('/aprofile', 'AdminController@profile')->name('admin.profile');
Route::get('/userlists', 'AdminController@users')->name('admin.users');
Route::post('/updateUserType', 'AdminController@updateUserType');
Route::get('/asrider', 'AdminController@assignRider')->name('admin.assignRider');

Route::post('/UpdateRider', 'AdminController@UpdateRider');
Route::post('/RemoveRider', 'AdminController@RemoveRider');

Route::post('/admin/listboxRidersParcels', 'AdminController@listboxRidersParcels')->name('getRidersParcels');

////////parcel tracker/////////
Route::get('/parceltracker', 'ParcelTrackerController@index')->name('parceltracker.index');
Route::get('/parceltracker/create', 'ParcelTrackerController@create');
Route::post('/parceltracker/create', 'ParcelTrackerController@store');
Route::get('/parceltracker/{parcel}/edit', 'ParcelTrackerController@edit');
Route::patch('/parceltracker/{parcel}/update', 'ParcelTrackerController@update')->name('parceltracker.update');
Route::put('/parceltracker/{parcel}/ycancelled', 'ParcelTrackerController@ycancelled')->name('parceltracker.ycancelled');
Route::put('/parceltracker/{parcel}/ncancelled', 'ParcelTrackerController@ncancelled')->name('parceltracker.ncancelled');
Route::put('/parceltracker/{parcel}/ycompleted', 'ParcelTrackerController@ycompleted')->name('parceltracker.ycompleted');
Route::put('/parceltracker/{parcel}/ncompleted', 'ParcelTrackerController@ncompleted')->name('parceltracker.ncompleted');

Route::post('/updateItemRider', 'ParcelTrackerController@updateItemRider');

////////parcel status list/////////
Route::get('/parcelstatuslist', 'ParcelStatusListController@index')->name('parcelstatuslist.index');
Route::get('/parcelstatuslist/create', 'ParcelStatusListController@create');
Route::post('/parcelstatuslist/create', 'ParcelStatusListController@store');
Route::get('/parcelstatuslist/{pstatus}/edit', 'ParcelStatusListController@edit');
Route::patch('/parcelstatuslist/{pstatus}/update', 'ParcelStatusListController@update')->name('parcelstatuslist.update');
});
////////parcel history/////////
Route::resource('/ParcelHistory', 'ParcelHistoryController');
Route::get('/parceltracker/showHist/{id}','ParcelTrackerController@showHist');

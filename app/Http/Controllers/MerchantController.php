<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ParcelTrackerCreateRequest;
use App\ParcelTracker;
use App\ParcelStatusList;
use App\ParcelHistory;
use App\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class MerchantController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth' => 'verified']);
        
        // $this->ensureOwnsPage();
    }
    // public function ensureOwnsPage() {
    //     if (Auth::check()) {
    //         if(Auth::user()->user_level < 6)
    //         {
    //             Auth::logout();
    //         }
    //     }
    // }
    //
    
    public function index(){
        $user = User::where('id',Auth::id())->get();

        return view('merchant.index', compact('user'));        
    }
    public function profile(){
        $user = User::where('id',Auth::id())->get();

        return view('merchant.profile', compact('user'));
    }
    function uploadMAvatar(Request $request){
        if($request->hasFile('image')){
            
            //go to User.php and run the function
            User::uploadAvatar($request->image);
            
            $request->session()->flash('success','Image uploaded!');
            return redirect()->back();
        }
        return redirect()->back()->with('error','Upload failed!'); //use with to pass message instead of flash session
    }
    public function parcels(){
        //with sorting
        
        // $parcels = ParcelTracker::where('item_merchant_id',Auth::id())->orderBy('cancelled','desc')->get();
        $parcels = ParcelTracker::select('parcel_trackers.*','parcel_status_lists.item_status')
        ->where('item_merchant_id',Auth::id())
        ->leftJoin('parcel_status_lists', 'parcel_trackers.item_status_id', '=', 'parcel_status_lists.id')
        ->get();
        
        $ddpstatus = ParcelStatusList::orderBy('id')->get();

        return view('merchant.parcels', compact('parcels','ddpstatus'));
    }
    public function create(){
        $rand = $this->generateBarcodeNumber();
        
        return view('merchant.create', compact('rand'));
    }
    public function store(ParcelTrackerCreateRequest $request){
        ParcelTracker::create($request->all());
        return redirect()->back()->with('success','Created Successfully!');
    }
    public function details(ParcelTracker $parcel){
        
        return view('merchant.details',compact('parcel'));
    }
    
    //unique random number for parcel ref no
    public function generateBarcodeNumber() {
        $number = mt_rand(1000000000, 9999999999); // better than rand()
        $cnum = $this->barcodeNumberExists($number);
        // call the same function if the barcode exists already
        if ($cnum) {
            return generateBarcodeNumber();
        }
        // otherwise, it's valid and can be used
        return $number;
    }
    
    public function barcodeNumberExists($number) {
        // query the database and return a boolean
        // for instance, it might look like this in Laravel
        return ParcelTracker::where('item_reference_number',$number)->exists();
    }
    //
}

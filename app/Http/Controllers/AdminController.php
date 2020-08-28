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

class AdminController extends Controller
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

        return view('admin.index', compact('user'));
    }
    public function profile(){
        $user = User::where('id',Auth::id())->get();

        return view('admin.profile', compact('user'));
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
    function uploadMesIcon(Request $request){
        if($request->hasFile('image')){
            
            //go to User.php and run the function
            User::uploadMIcon($request->image);
            
            $request->session()->flash('success','Image uploaded!');
            return redirect()->back();
        }
        return redirect()->back()->with('error','Upload failed!'); //use with to pass message instead of flash session
    }
    
    public function users(){
        $users = User::where('id', '!=' ,Auth::id())
        ->orderBy('id')->get();

        return view('admin.users', compact('users'));
    }
    public function updateUserType(Request $request){
        $uID = $request->input('user_id');
        $uType = $request->input('type_id');

        User::where('id', $uID)->update(['user_type' => $uType]);

        return redirect()->back()->with('success','Created Successfully!');
    }
    public function assignRider(){
        ParcelTracker::where('item_rider_id', NULL)->update(['item_rider_id' => 0]);

        $ddpriders = User::where('user_type','=','rider')->orderBy('name')->get();
        $ddparcels = ParcelTracker::where('item_rider_id','=','0')->orderBy('item_name')->get();

        return view('admin.assignRider', compact('ddpriders','ddparcels'));
    }
    public function UpdateRider(Request $request){
        $pID = $request->input('parcel_id');
        $rID = $request->input('rider_id');

        ParcelTracker::whereIn('id', $request->input('parcel_id'))->update(['item_rider_id' => $rID]);

        return redirect()->back()->with('success','Created Successfully!');
    }
    public function RemoveRider(Request $request){
        $pID = $request->input('parcel_id');
        $rID = $request->input('rider_id');

        ParcelTracker::whereIn('id', $request->input('parcel_id'))->update(['item_rider_id' => $rID]);

        return redirect()->back()->with('success','Created Successfully!');
    }
    function listboxRidersParcels( Request $request )
    {
        //   $this->validate( $request, [ 'id' => 'required|exists:countries,id' ] );
        // $states = State::where('country_id', $request->get('id') )->get();
        $lpsrider = ParcelTracker::where('item_rider_id', $request->get('id') )->orderBy('item_name')->get();
        //you can handle output in different ways, I just use a custom filled array. you may pluck data and directly output your data.
        $output = [];
        foreach( $lpsrider as $lprider )
        {
            $output[$lprider->id] = $lprider->item_name;
        }
        return $output;
    }

}

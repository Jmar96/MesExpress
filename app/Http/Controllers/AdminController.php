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
    
    public function users(){
        $users = User::orderBy('id')->get();

        return view('admin.users', compact('users'));
    }
    public function updateUserType(Request $request){
        $uID = $request->input('user_id');
        $uType = $request->input('type_id');

        User::where('id', $uID)->update(['user_type' => $uType]);

        return redirect()->back()->with('success','Created Successfully!');
    }


}

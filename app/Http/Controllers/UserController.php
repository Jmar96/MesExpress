<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    
    function uploadAvatar(Request $request){
        if($request->hasFile('image')){
            
            //go to User.php and run the function
            User::uploadAvatar($request->image);
            
            $request->session()->flash('success','Image uploaded!');
            return redirect()->back();
        }
        return redirect()->back()->with('error','Upload failed!'); //use with to pass message instead of flash session
    }
    /*
    protected function deleteOldImage(){
        if(auth()->user()->avatar){
            // dd('/public/images/'.auth()->user()->avatar);
            Storage::delete('/public/images/'.auth()->user()->avatar);
        }
    } */
    public function index(){
        // $user = User::all();
        // return $user;
        $user = User::where('id',Auth::id())->get();

        return view('user.index', compact('user'));
    }
}

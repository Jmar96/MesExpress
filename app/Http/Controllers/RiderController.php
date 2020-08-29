<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ParcelTrackerCreateRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\ParcelTracker;
use App\ParcelStatusList;
use App\ParcelHistory;
use App\User;

class RiderController extends Controller
{
    //Rider
    public function __construct()
    {
        $this->middleware(['auth' => 'verified']);
        
        // $this->ensureOwnsPage();
    }

    //
    public function index(){
        $user = User::where('id',Auth::id())->get();

        return view('rider.index', compact('user'));
    }
    public function profile(){
        $user = User::where('id',Auth::id())->get();

        return view('rider.profile', compact('user'));
    }


    public function parcels(){
        //update parcel status
        ParcelTracker::where('item_status_id', NULL)->update(['item_status_id' => 1]);
        
        $parcels = ParcelTracker::select('parcel_trackers.*','parcel_status_lists.item_status')
        ->where('item_rider_id',Auth::id())
        ->leftJoin('parcel_status_lists', 'parcel_trackers.item_status_id', '=', 'parcel_status_lists.id')
        ->get();
        
        $ddpstatus = ParcelStatusList::orderBy('id')->get();

        return view('rider.parcels', compact('parcels','ddpstatus'));
    }

    
    public function edit(ParcelTracker $parcel){

        $ddpstatus = ParcelStatusList::where('id', '>=', $parcel->item_status_id)->orderBy('id')->get();

        return view('rider.edit',compact('parcel','ddpstatus'));
    }
    public function update(ParcelTrackerCreateRequest $request,ParcelTracker $parcel){
        // dd($request->all()); //alert like
        // $parcel->update(['item_name' => $request->item_name]); //one update only
        $parcel->update($request->all());
        ParcelHistory::create($request->all());

        return redirect(route('rider.parcels'))->with('success','Updated Successfully!');
    }

}

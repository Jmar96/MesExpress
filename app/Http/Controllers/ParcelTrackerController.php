<?php

namespace App\Http\Controllers;

use App\Http\Requests\ParcelTrackerCreateRequest;
use App\ParcelTracker;
use App\ParcelStatusList;
use App\ParcelHistory;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ParcelTrackerController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth' => 'verified']);
    }

    public function index(){
        //with sorting
        
        // $parcels = ParcelTracker::where('item_merchant_id',Auth::id())->orderBy('cancelled','desc')->get();
        $parcels = ParcelTracker::select('parcel_trackers.*','parcel_status_lists.item_status','merchant.name as merchantname','rider.name as ridername')
        // ->where('item_merchant_id',Auth::id())
        ->leftJoin('parcel_status_lists', 'parcel_trackers.item_status_id', '=', 'parcel_status_lists.id')
        ->leftJoin('users as merchant', 'parcel_trackers.item_merchant_id', '=', 'merchant.id')
        ->leftJoin('users as rider', 'parcel_trackers.item_rider_id', '=', 'rider.id')
        ->get();
        
        $ddpstatus = ParcelStatusList::orderBy('id')->get();
        $ddpriders = User::where('user_type','=','rider')->orderBy('name')->get();

        return view('parceltracker.index', compact('parcels','ddpstatus','ddpriders'));
    }
    public function create(){
        return view('parceltracker.create');
    }
    public function store(ParcelTrackerCreateRequest $request){
        ParcelTracker::create($request->all());
        return redirect()->back()->with('success','Created Successfully!');
    }
    public function edit(ParcelTracker $parcel){
        
        return view('parceltracker.edit',compact('parcel'));
    }
    public function update(ParcelTrackerCreateRequest $request,ParcelTracker $parcel){
        // dd($request->all()); //alert like
        // $parcel->update(['item_name' => $request->item_name]); //one update only
        $parcel->update($request->all());

        return redirect(route('parceltracker.index'))->with('success','Updated Successfully!');
    }
    
    public function ycancelled(ParcelTracker $parcel){
        // dd($parcel->all()); //alert like
        $parcel->update(['cancelled'=>true]);
        return redirect()->back()->with('success','Tasked mark as cancelled!');
    }
    public function ncancelled(ParcelTracker $parcel){
        // dd($parcel->all()); //alert like
        $parcel->update(['cancelled'=>false]);
        return redirect()->back()->with('success','Tasked removed mark cancelled!');
    }
    public function ycompleted(ParcelTracker $parcel){
        // dd($parcel->all()); //alert like
        $parcel->update(['completed'=>true]);
        return redirect()->back()->with('success','Tasked mark as completed!');
    }
    public function ncompleted(ParcelTracker $parcel){
        // dd($parcel->all()); //alert like
        $parcel->update(['completed'=>false]);
        return redirect()->back()->with('success','Tasked mark as incompleted!');
    }
    public function showHist($id){
        // dd($id);
        $phistories = ParcelHistory::select('parcel_histories.*','parcel_trackers.item_name','parcel_status_lists.item_status','parcel_status_lists.item_status_description')
        ->leftJoin('parcel_trackers','parcel_histories.parcel_id','=','parcel_trackers.id')
        ->leftJoin('parcel_status_lists','parcel_histories.status_id','=','parcel_status_lists.id')
        //->where([['parcel_histories.merchant_id', Auth::id()],['parcel_histories.parcel_id', '=', $id]])
        ->where('parcel_histories.parcel_id', '=', $id)
        ->orderBy('id','desc')->get();

        return view('parceltracker.showHist', compact('phistories'));
        
    }
    
    public function updateItemRider(Request $request){
        $pID = $request->input('parcel_id');
        $rName = $request->input('rider_name');
        $rID = $request->input('rider_id');

        ParcelTracker::where('id', $pID)->update(['item_rider_id' => $rID]);

        return redirect()->back()->with('success','Created Successfully!');
    }

    public function print01(ParcelTracker $parcel){
        
        return view('parceltracker.print01',compact('parcel'));
    }
}

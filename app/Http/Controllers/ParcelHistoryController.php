<?php

namespace App\Http\Controllers;

use App\ParcelTracker;
use App\ParcelHistory;
use Illuminate\Http\Request;

class ParcelHistoryController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth' => 'verified']);
    }

    public function index(Request $request){
        //with sorting
        
        $pID = $request->input('id');
        $phistories = ParcelHistory::where([['merchant_id', Auth::id()],['parcel_id', '=',$id]])
        ->orderBy('id','desc')->get();

        return view('parcelhistories.index', compact('phistories'));
    }
    public function showHist($id){
        //with sorting
        $phistories = ParcelHistory::where([['merchant_id', Auth::id()],['parcel_id', '=',$id]])
        ->orderBy('id','desc')->get();

        return view('parcelhistories.showHist', compact('phistories'));
        
    }
    public function store(Request $request){
        $pID = $request->input('parcel_id');
        $pStatus = $request->input('status_id');

        ParcelTracker::where('id', $pID)->update(['item_status_id' => $pStatus]);
        ParcelHistory::create($request->all());

        return redirect()->back()->with('success','Created Successfully!');
        // return response()->json(
        //     [
        //         'success' => true,
        //         'message' => 'Data inserted successfully'
        //     ]
        // );
    }
    public function edit(ParcelHistory $phistory){
        
        return view('parcelhistories.edit',compact('phistory'));
    }
}

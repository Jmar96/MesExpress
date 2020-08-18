<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ParcelStatusListCreateRequest;
use App\ParcelStatusList;

class ParcelStatusListController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth' => 'verified']);
    }

    public function index(){
        $pstatus = ParcelStatusList::orderBy('id','asc')->get();
        
        return view('parcelstatuslist.index', compact('pstatus'));
    }
    public function create(){
        return view('parcelstatuslist.create');
    }
    public function store(ParcelStatusListCreateRequest $request){
        ParcelStatusList::create($request->all());
        return redirect()->back()->with('success','Created Successfully!');
    }
    public function edit(ParcelStatusList $pstatus){
        return view('parcelstatuslist.edit',compact('pstatus'));
    }
    public function update(ParcelStatusListCreateRequest $request,ParcelStatusList $pstatus){
        $pstatus->update($request->all());

        return redirect(route('parcelstatuslist.index'))->with('success','Updated Successfully!');
    }
}

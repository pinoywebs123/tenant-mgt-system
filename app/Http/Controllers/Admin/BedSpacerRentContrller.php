<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Bedspacer;
use App\Tenant;
use App\BedspacerTenant;

class BedSpacerRentContrller extends Controller
{
    public function bedspacer_rent($id){
    	$find = Bedspacer::findOrFail($id);
    	return view('admin.bedspacer.rent',compact('find'));
    }

    public function bedspacer_rent_check(Request $request,$id){
    	$find = Bedspacer::findOrFail($id);
    	$tenant = $request->except('payment');
    	$save = Tenant::create($tenant);

    	$room_bedspace = new BedspacerTenant;
    	$room_bedspace->room_id = $id;
    	$room_bedspace->tenant_id = $save->id;
    	$room_bedspace->payment = $request->payment;
    	$room_bedspace->status_id = 0;
    	$room_bedspace->save();
    	
    	return redirecT()->back()->with('suc','Tenant has rent a bedspace successfully.!');
    }

    public function bedspacer_view($id){
    	$find = Bedspacer::findOrFail($id);
    	$bedspacers = BedspacerTenant::where('room_id',$id)->where('status_id',0)->get();
    	return view('admin.bedspacer.view',compact('find','bedspacers'));
    }

    public function bedspacer_finished($id){
    	//return $id;
    	$find = BedspacerTenant::findOrFail($id);
    	$find->update(['status_id'=> 1]);
    	return redirect()->back()->with('suc','Bedspace has finished renting successfully.');
    }
}

<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Room;
use App\Tenant;
use App\RoomTenant;

class RoomRentController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }

    public function room_rent($id){
    	$find = Room::findOrFail($id);
    	return view('admin.room.rent',compact('find'));
    }

    public function room_rent_check(Request $request,$id){
    	$find = Room::findOrFail($id);
    	$tenant = $request->except('payment');
    	$save = Tenant::create($tenant);

    	$room_tenant = new RoomTenant;
    	$room_tenant->room_id = $id;
    	$room_tenant->tenant_id = $save->id;
    	$room_tenant->payment = $request->payment;
    	$room_tenant->status_id = 0;
    	$room_tenant->save();
    	$find->update(['status_id'=> 0]);
    	return redirecT()->back()->with('suc','Tenant has rent a room successfully.!');


    }

    public function room_view($id){
    	$find = RoomTenant::where('room_id',$id)->first();
    	return view('admin.room.view',compact('find'));
    }

    public function room_finished($id){
       // return $id;
        $find = RoomTenant::findOrFail($id);
        $find->room->update(['status_id'=> 1]);
        return redirecT()->back()->with('suc','Tenant had finished rent a room successfully.!');
    }
}

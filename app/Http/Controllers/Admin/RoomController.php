<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Room;

class RoomController extends Controller
{

    public function admin_rooms(){
    	$rooms = Room::all();
    	return view('admin.rooms',compact('rooms'));
    }

    public function admin_rooms_check(Request $request){
    	$request->merge(['status_id'=> 1]);
    	Room::create($request->all());
    	return redirect()->back()->with('suc','Room created successfully.');
    }

    public function admin_get_room(Request $request){
    	return Room::findOrFail($request->room_id);
    }

    public function admin_room_update(Request $request){
    	//return $request->all();
    	$find = Room::findOrFail($request->room_id);
    	$data = $request->except('room_id','token');
    	$find->update($data);
    	
    	 return redirect()->back()->with('suc','Room updated successfully.');
    }
}

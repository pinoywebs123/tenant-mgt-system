<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Bedspacer;

class BedspacerController extends Controller
{
	public function admin_rooms_bedspacer(){
		$beds = Bedspacer::all();
		return view('admin.rooms_bedspacer',compact('beds'));
	}

	public function admin_rooms_bedspacer_check(Request $request){
		$request->merge(['status_id'=> 1]);
    	Bedspacer::create($request->all());
    	return redirect()->back()->with('suc','Room created successfully.');
	}

	public function admin_get_bedspace(Request $request){
		return Bedspacer::findOrFail($request->room_id);
	}

	public function admin_bedspace_update(Request $request){

		$find = Bedspacer::findOrFail($request->room_id);
    	$data = $request->except('room_id','token');
    	$find->update($data);
    	
    	 return redirect()->back()->with('suc','Room updated successfully.');
	}
    
    
}

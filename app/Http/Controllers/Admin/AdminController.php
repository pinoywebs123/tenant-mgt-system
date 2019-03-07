<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Room;
use App\Bedspacer;
class AdminController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}
    
    public function home(){
        $rooms = Room::all();
    	return view('admin.home',compact('rooms'));
    }

    public function admin_home_bedspacer(){
        $beds = Bedspacer::all();
    	return view('admin.home_bedspacer',compact('beds'));
    }

    public function admin_logout(){
    	Auth::logout();
    	return redirect('/');
    }

 
}

<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\RoomTenant;
use App\BedspacerTenant;

class Reportcontroller extends Controller
{
    public function admin_reports(){
    	if(empty($_GET['start']) && empty($_GET['end'])){
    		$room_tenants = RoomTenant::orderBy('created_at','desc')->get();
    	return view('admin.report.reports',compact('room_tenants'));
    	
    	}else{
    		
    		return $this->getRoomStartEndDate($_GET['start'],$_GET['end']);
    		
    	}
    	
    }

    public function getRoomStartEndDate($start,$end){
    	$room_tenants = RoomTenant::whereBetween('created_at',array($start,$end))->get();
    	return view('admin.report.reports',compact('room_tenants'));
    }
    

    public function admin_reports_bedspace(){
        if(empty($_GET['start']) && empty($_GET['end'])){
            $bedspacers = BedspacerTenant::orderBy('created_at','desc')->get();
        return view('admin.report.report_bedspace',compact('bedspacers'));
        
        }else{
            
            return $this->getBedspaceStartEndDate($_GET['start'],$_GET['end']);
            
        }

    	
    }

    public function getBedspaceStartEndDate($start,$end){
        $bedspacers = BedspacerTenant::whereBetween('created_at',array($start,$end))->get();
        return view('admin.report.report_bedspace',compact('bedspacers'));
    }	
}

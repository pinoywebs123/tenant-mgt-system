<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\BedspacerTenant;

class Bedspacer extends Model
{
    protected $guarded = [];

    public function bedspace_occupied($id){
    	return BedspacerTenant::where('room_id',$id)->where('status_id',0)->count();
    }
}

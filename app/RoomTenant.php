<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomTenant extends Model
{
    protected $guarded = [];

    public function room(){
    	return $this->belongsTo(Room::class);
    }

    public function tenant(){
    	return $this->belongsTo('App\Tenant','tenant_id','id');
    }
}

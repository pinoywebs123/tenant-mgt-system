<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BedspacerTenant extends Model
{
    protected $guarded = [];

    public function tenant(){
    	return $this->belongsTo(Tenant::class);
    }

    public function bedspacer(){
    	return $this->belongsTo('App\Bedspacer','room_id','id');
    }
}

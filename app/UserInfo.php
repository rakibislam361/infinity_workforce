<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    public function call_code(){
        return $this->belongsTo('App\Country','calling_code','id');
    }
    public function country(){
        return $this->belongsTo('App\Country','country_id','id');
    }
}

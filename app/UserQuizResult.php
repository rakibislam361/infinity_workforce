<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserQuizResult extends Model
{
    public function category(){
        return $this->belongsTo('App\Category','category_id','id');
    }
    public function user(){
    	return $this->belongsTo('App\User','user_id','id');
    }
    public function user_info(){
    	return $this->hasOne('App\UserInfo','user_id','user_id');
    }
    
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignedCandidate extends Model
{
  public function candidates(){
  	return $this->hasMany('App\User');
  }
  public function user_info(){
  	return $this->belongsTo('App\UserInfo','user_id','user_id');
  }
  public function user_basic_info(){
  	return $this->belongsTo('App\User','user_id','id');
  }
  public function employer_info(){
  	return $this->belongsTo('App\EmployerInfo','employer_id','id');
  }
  

}

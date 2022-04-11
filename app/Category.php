<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   public function questions(){
        return $this->hasMany('App\Question','category_id','id');
    }
    public function topic(){
    	return $this->belongsTo('App\Topic','topic_id','id');
    }
}

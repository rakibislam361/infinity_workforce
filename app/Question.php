<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function category(){
        return $this->belongsTo('App\Category','category_id','id');
    }
    public function topic(){
        return $this->belongsTo('App\Topic','topic_id','id');
    }
}

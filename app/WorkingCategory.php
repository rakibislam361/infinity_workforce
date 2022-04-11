<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkingCategory extends Model
{
    public function works(){
        return $this->hasMany('App\Work','category_id','id');
    }
}

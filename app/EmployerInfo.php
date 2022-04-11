<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class EmployerInfo extends Model
{
    use SoftDeletes;
    public function users(){
        return $this->hasMany('App\User','id','company_id');
    }
}

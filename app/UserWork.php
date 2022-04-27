<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserWork extends Model
{
    protected $table = 'user_work';
    public function user_work()
    {

    	return $this->belongsTo('App\User','user_id','id');
    }

}

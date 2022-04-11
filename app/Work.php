<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Work extends Model
{
    use SoftDeletes;

    public function category()
    {
        return $this->belongsTo('App\WorkingCategory', 'category_id', 'id');
    }

    public function user_work()
    {
        return $this->belongsTo('App\UserWork', 'id', 'work_id');
    }
}

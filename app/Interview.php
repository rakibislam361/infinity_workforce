<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\UserInfo;

class Interview extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function info()
    {
        return $this->belongsTo(UserInfo::class, 'user_id', 'user_id');
    }
}

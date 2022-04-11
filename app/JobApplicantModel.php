<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobApplicantModel extends Model
{
    protected $table = 'jod_applicant';
    protected $guarded = [];

    public function work()
    {
        return $this->hasOne('App\Work', 'id', 'application_for');
    }
}

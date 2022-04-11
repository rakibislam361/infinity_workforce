<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use SoftDeletes;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo('App\Role', 'role_id', 'id');
    }
    public function info()
    {
        return $this->belongsTo('App\UserInfo', 'id', 'user_id');
    }

    public function interview()
    {
        return $this->belongsTo(interview::class, 'id', 'user_id');
    }

    public function work_history()
    {
        return $this->hasMany('App\WorkHistory');
    }

    public function documents()
    {
        return $this->hasMany('App\UserDocument');
    }
    public function work_abilities()
    {
        return $this->belongsTo('App\WorkAbility', 'user_id', 'id');
    }
    public function doc_images()
    {
        return $this->hasMany('App\UserDocument')->where('type', 1);
    }
    public function doc_visas()
    {
        return $this->hasMany('App\UserDocument')->where('type', 2);
    }
    public function doc_resumes()
    {
        return $this->hasMany('App\UserDocument')->where('type', 3);
    }
    public function doc_police_clearance()
    {
        return $this->hasMany('App\UserDocument')->where('type', 4);
    }
    public function doc_medical_certificatee()
    {
        return $this->hasMany('App\UserDocument')->where('type', 5);
    }
    public function doc_d_license()
    {
        return $this->hasMany('App\UserDocument')->where('type', 6);
    }
    public function insurance()
    {
        return $this->hasMany('App\UserDocument')->where('type', 7);
    }
    public function qualifications()
    {
        return $this->hasMany('App\UserDocument')->where('type', 8);
    }
    public function others()
    {
        return $this->hasMany('App\UserDocument')->where('type', 9);
    }
    public function able_to_work()
    {
        return $this->hasOne('App\WorkAbility', 'user_id', 'id');
    }
    public function user_bank_info()
    {
        return $this->hasOne('App\Bank')->where('user_id', Auth::user()->id);
    }
    public function bank_info()
    {
        return $this->hasOne('App\Bank');
    }
    public function employer_info()
    {
        return $this->belongsTo('App\EmployerInfo', 'company_id', 'id');
    }
    public function office()
    {
        return $this->hasOne('App\EmployerInfo', 'id', 'company_id');
    }
    public function docName()
    {
        return $this->belongsTo('App\UserDocument', 'id', 'user_id');
    }

    public function wish_to_works()
    {
        return $this->belongsToMany('App\Work');
    }

    public function user_to_works()
    {
        return $this->hasMany('App\UserWork');
    }
    public function assigned_candidate()
    {
        return $this->belongsTo('App\AssignedCandidate', 'id', 'user_id');
    }
    public function self_fund()
    {
        return $this->belongsTo('App\SelfFund', 'id', 'user_id');
    }
    public function certificates()
    {
        return $this->hasMany('App\UserQuizResult', 'user_id', 'id');
    }

    public function assignedTo()
    {
        return $this->hasMany('App\AssignedCandidate', 'user_id', 'id');
    }
}

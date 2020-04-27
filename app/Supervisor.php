<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\SupervisorResetPasswordNotification;

class Supervisor extends Authenticatable
{
    use Notifiable;

    protected $guard = 'supervisor';

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

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new SupervisorResetPasswordNotification($token));
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function dicsussions(){
        return $this->hasMany('App\Discussion');
    }

    public function sv()
    {
        return $this->hasMany('App\User');
    }
    public function supermatriksv()
    {
        $this->belongsTo('App\Supervisor');
    }
   
}
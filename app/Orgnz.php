<?php

namespace App;

use App\Notifications\OrgnzResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Orgnz extends Authenticatable
{
    use Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','last_name','alias', 'email', 'password','dir','phone', 'desc',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password','remember_token',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new OrgnzResetPassword($token));
    }

    //Relacion uno a muchos de orgnzs-events
    //Un organizador puede tener muchos eventos asociados
    public function events()
    {
        return $this->hasMany('App\Event');
    }
}

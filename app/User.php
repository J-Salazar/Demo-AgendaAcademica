<?php

namespace App;

use App\Notifications\UserResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','last_name','eap','alias',
        'code','phone','my_tag','sys_tag',
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
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new UserResetPassword($token));
    }

    //-------
    //Relacion creada para facilitar las consultas?
    //(Por verificar)
    //-------
    public function orgnzs()
    {
        return $this->belongsToMany(Orgnz::class);
    }

    //Relacion muchos a muchos users-events
    //con tabla pivote o intermedia
    public function events()
    {
        //un usuario puede tener muchos eventos asociados
        return $this -> belongsToMany('App\Event')
                            ->withPivot('interest','attended','payment','certificate_available','certificate_delivered')
                            ->withTimestamps();
    }
}

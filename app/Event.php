<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    protected $fillable = [
        'orgnz_id','title','description','site','tag','init_date','end_date',
        'group','closed','speaker'
    ];

    //Relacion inversa de uno a muchos orgnzs-events
    //Un evento solo puede pertenecer a un organizador
    public function orgnzs()
    {
        return $this -> belongsTo('App\Orgnz', 'orgnz_id');
    }


    //Relacion muchos a muchos de la tabla events con users con tabla pivote(intermedia)
    public function users()
    {
        return $this -> belongsToMany('App\User')/*Relacion uno a muchos events-users*/
                     -> withPivot('interest','attended','payment','certificate_available','certificate_delivered')
                     -> withTimestamps();
    }
}

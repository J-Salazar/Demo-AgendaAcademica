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

    public function orgnzs()
    {
        return $this -> belongsTo('App\Orgnz', 'orgnz_id');
    }

    public function users()
    {
        return $this -> belongsToMany('App\User')
                            -> withPivot('interest','attended','payment','certificate_available','certificate_delivered')
                            ->withTimestamps();
    }
}

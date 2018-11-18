<?php

namespace App\Http\Controllers\OrgnzAuth;

use App\Event;
use App\Orgnz;
use App;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class Chartjs extends Controller
{
    //
    public function home()
    {
        $orgnz_id = Auth::user()->id;
        $orgnz = Orgnz::Find($orgnz_id);
//        App\Orgnz::Find(1)->events->where('end_date','<=',Carbon\Carbon::now())
        $last_week_events = $orgnz->events->where('end_date','>=',Carbon::now());

        if ($last_week_events->first() == null){
            return view( 'orgnz.home')->with('events',NULL);
        }


        return view('orgnz.home')->with('events',$last_week_events);
    }
}

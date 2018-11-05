<?php

namespace App\Http\Controllers\UserAuth;

use App\Event;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ActionController extends Controller
{
    //

    public function __construct()
    {
        $users[] = Auth::user();
        $users[] = Auth::guard()->user();
        $users[] = Auth::guard('user')->user();

    }

    public function attend()
    {
//        Asistire
        $user_id = Auth::user()->id;

        $curr_user = User::Find($user_id);
//
//        $pivot = $curr_user->pivot;
//
//        if(empty($pivot)){
//            return view('user.pages.attend');
//        }
//        $events = $pivot->where('interest','asistire');
        $events = $curr_user->events()->wherePivot('interest','asistire')->get();
        return view('user.pages.attend')->with(['events'=>$events,
                                                    'user_id'=>$user_id]);
    }

    public function interest()
    {
//        Asistire
        $user_id = Auth::user()->id;

        $curr_user = User::Find($user_id);
//
//        $pivot = $curr_user->pivot;
//
//        if(empty($pivot)){
//            return view('user.pages.attend');
//        }
//        $events = $pivot->where('interest','asistire');
        $events = $curr_user->events()->wherePivot('interest','interesa')->get();
        return view('user.pages.interest')->with(['events'=>$events,
            'user_id'=>$user_id]);
    }

    public function move($user_id, $event_id, $interest){
//        Cambiar evento de asistire <--> (me) interesa

        $curr_user_id = Auth::user()->id;


        if ($user_id != $curr_user_id){
            dd('Acceso denegado');
        }

        DB::table('event_user')->where('user_id' ,$user_id)
                                    ->where('event_id', $event_id)
                                    ->update(['interest'=>$interest]);

        $curr_user = User::Find($curr_user_id);

//        $event = $curr_user->events()->where('id',$event_id)->get();
//        $event = $curr_user->events()->where('id',$event_id);
//
//        if (is_null($event))
//        $event->pivot->interest = 'interesa';
//        $event->pivot->save();
        if ($interest == 'interesa'){
            return redirect('/user/attend');
        }
        if ($interest == 'asistire'){
            return redirect('/user/interest');
        }

        
    }

    public function saveas($user_id, $event_id, $interest)
    {
        $curr_user_id = Auth::user()->id;
        if ($curr_user_id != $user_id){
            dd('Acceso denegado');
        }

        $event = Event::Find($event_id);

        $user = User::Find($user_id);

        $user->events()->attach([$event_id=>['interest'=>$interest] ]);


        return redirect('/user/list');
    }

    public function list()
    {
        $events = DB::table('events')->get();
        $user_id = Auth::user()->id;

        return view('user.pages.list')
                        ->with(['events' =>$events,
                                'user_id'=>$user_id
                                ]);
    }
}

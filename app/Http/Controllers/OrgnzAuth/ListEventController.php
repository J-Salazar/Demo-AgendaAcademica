<?php

namespace App\Http\Controllers\OrgnzAuth;

use App\Event;
use App\Orgnz;
use App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ListEventController extends Controller
{

    public function list_event(Request $request){

        $users[] = Auth::user();
        $users[] = Auth::guard()->user();
        $users[] = Auth::guard('orgnz')->user();

        $orgnz_id = Auth::user()->id;
        $orgnz = Orgnz::Find($orgnz_id);

        $events = $orgnz->events;

        return view('orgnz.pages.events')->with(['events'=>$events,'users'=>$users,'orgnz_id'=>$orgnz_id]);

    }

    public function edit_event(Request $request,$orgnz_id, $event_id){

        $users[] = Auth::user();
        $users[] = Auth::guard()->user();
        $users[] = Auth::guard('orgnz')->user();

        $event = Orgnz::Find($orgnz_id)->events()->find($event_id);

        $curr_orgnz_id = Auth::user()->id;
        if($curr_orgnz_id != $orgnz_id){
            dd('Acceso denegado');
        }

        return view('orgnz.pages.edit')->with('event',$event);

    }

    public function update_event(Request $request, $event_id){

        $users[] = Auth::user();
        $users[] = Auth::guard()->user();
        $users[] = Auth::guard('orgnz')->user();

        $event = Event::Find($event_id);
        $orgnz_id = Auth::user()->id;

        $request->validate([
            'new_event_title' => 'required',
            'new_event_description' => 'required',
            'new_event_site' => 'required',
            'new_event_tag' => 'required',
            'new_event_date' => 'required',
            'new_event_date_end' => 'required',
        ]);

        $event->title      = $request->new_event_title;
        $event->description= $request->new_event_description;
        $event->site       = $request->new_event_site;
        $event->tag        = $request->new_event_tag;
        $event->init_date = $request->new_event_date;
        $event->end_date = $request->new_event_date_end;


        $event -> save();

        $mensaje = 'Evento actualizado';
//        return view('orgnz.pages.edit')->with(['mensaje'=>$mensaje,'event'=>$event]);
        return redirect(url('orgnz/'.$orgnz_id.'/event/'.$event_id))->with(['mensaje'=>$mensaje,'event'=>$event]);
    }
}

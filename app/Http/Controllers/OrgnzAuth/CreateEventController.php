<?php

namespace App\Http\Controllers\OrgnzAuth;

use App\Event;
use App\Orgnz;
use App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CreateEventController extends Controller
{

    public function create_event(Request $request){

        $orgnz_id = Auth::user()->id;
        $orgnz = App\Orgnz::Find($orgnz_id);
        $mensaje_exitoso = "";

        $request->validate([
            'new_event_title' => 'required',
            'new_event_description' => 'required',
            'new_event_site' => 'required',
            'new_event_tag' => 'required',
            'new_event_date' => 'required',
            'new_event_date_end' => 'required',
        ]);


        $request->new_event_date = str_replace('T',' ', $request->new_event_date);
        $request->new_event_date = $request->new_event_date.':00';
//        dd($request->new_event_date);

        $request->new_event_date_end = str_replace('T',' ', $request->new_event_date_end);
        $request->new_event_date_end = $request->new_event_date_end.':00';
//
        $new_event = new Event;

        $new_event -> orgnzs() -> associate($orgnz);
        $new_event->title      = $request->new_event_title;
        $new_event->description= $request->new_event_description;
        $new_event->site       = $request->new_event_site;
        $new_event->tag        = $request->new_event_tag;
        $new_event->init_date = $request->new_event_date;
        $new_event->end_date = $request->new_event_date_end;


        $new_event -> save();
        $mensaje_exitoso = "Evento creado satisfactoriamente";

        return redirect('orgnz/create')->with('mensaje_exitoso',$mensaje_exitoso);


    }
}

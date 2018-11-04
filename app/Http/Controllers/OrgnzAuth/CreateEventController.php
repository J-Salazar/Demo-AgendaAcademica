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
        ]);
//
//        User::where('id',$id)->update([
//                                        'name'      => $request->new_user_name,
//                                        'last_name' => $request->new_user_last_name,
//                                        'alias'     => $request->new_user_alias,
//                                        'email'     => $request->new_user_email
//        ]);

        $new_event = new Event;

        $new_event -> orgnzs() -> associate($orgnz);
        $new_event->title      = $request->new_event_title;
        $new_event->description= $request->new_event_description;
        $new_event->site       = $request->new_event_site;
        $new_event->tag        = $request->new_event_tag;
        $new_event->event_date = $request->new_event_date;


        $new_event -> save();
        $mensaje_exitoso = "Evento creado satisfactoriamente";

        return redirect('orgnz/create')->with('mensaje_exitoso',$mensaje_exitoso);


    }
}

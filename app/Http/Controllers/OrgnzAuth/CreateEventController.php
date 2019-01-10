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
//    Metodo encargado de crear el evento en la BD

    public function create_event(Request $request){

//        Creacion del organizador por el id autenticado
        $orgnz_id = Auth::user()->id;
        $orgnz = App\Orgnz::Find($orgnz_id);
        $mensaje_exitoso = "";

//        Validacion de data ingresada
        $request->validate([
            'new_event_title'       => 'required',
            'new_event_description' => 'required',
            'new_event_site'        => 'required',
            'new_event_group'       => 'required',
            'new_event_tag'         => 'required',
            'new_event_speaker'     => 'required',
            'new_event_date'        => 'required',
            'new_event_date_end'    => 'required',
        ]);

//        Validacion de fechas ingresadas (fecha de fin no puede ser anterior a la fecha de inicio)

        if ($request->new_event_date > $request->new_event_date_end){
            return redirect(url('/orgnz/create'))->with('mensaje',"Error al crear el evento, verifique las fechas ingresadas");
        }

//      Se da nuevo formato a las fechas ingresadas para poder ser interpretadas en las vistas

        $request->new_event_date = str_replace('T',' ', $request->new_event_date);
        $request->new_event_date = $request->new_event_date.':00';

        $request->new_event_date_end = str_replace('T',' ', $request->new_event_date_end);
        $request->new_event_date_end = $request->new_event_date_end.':00';
//
        $new_event = new Event;

        $new_event -> orgnzs() -> associate($orgnz);
        $new_event->title      = $request->new_event_title;
        $new_event->description= $request->new_event_description;
        $new_event->site       = $request->new_event_site;
        $new_event->tag        = $request->new_event_tag;
        $new_event->speaker    = $request->new_event_speaker;
        $new_event->group      = $request->new_event_group;
        $new_event->init_date  = $request->new_event_date;
        $new_event->end_date   = $request->new_event_date_end;


        $new_event -> save();

        $mensaje_exitoso = "Evento creado satisfactoriamente";

//        Se guarda el evento asociado al organizador,
//        ademas se devuelve a la vista con un mensaje de exito

        return redirect('orgnz/create')->with('mensaje_exitoso',$mensaje_exitoso);


    }
}

<?php

namespace App\Http\Controllers\OrgnzAuth;

use App\Event;
use App\User;
use App\Orgnz;
use App;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;


class DataEventController extends Controller
{
    //Metodo que devuelve los usuarios que marcaron como asistire al evento
//    solicitado($event_id)

    public function data($event_id)
    {
        $event = Event::Find($event_id);
        $asistentes = $event->users()->wherePivot('interest', 'asistire');

        if ($asistentes->get() != null){
            $asistentes = $asistentes->get();
        }else{
            $asistentes = null;
        }

        return view('orgnz.pages.event_assist')->with(['users'=>$asistentes,'event'=>$event]);
    }

//    Metodo encargado de actualizar una propiedad de la relacion evento-usuario
//    con el valor value en el campo key
    public function data_update($event_id, $user_id, $key, $value)
    {

        $event = Event::Find($event_id);

        $user = User::Find($user_id);

        if( is_null($user->events->find($event_id)) ) {

            $user->events()->attach([$event_id => [$key => $value]]);

        } else{
            $user->events
                 ->where('id',$event_id)
                 ->first()
                 ->pivot
                 ->update([$key=>$value]); // Se actualiza la clave key con el valor value
        }

        return redirect(url(URL::previous()));
    }

//    Metodo que cierra el evento para que la informacion
//    en la BD no pueda ser modificada pero si leida

    public function close($event_id)
    {
        $event = Event::Find($event_id);

        $event->closed = 1;

        $event->save();

        return redirect(url(URL::previous()));
    }

//    Metodo encargado de generar un reporte pdf al organizador
//    de un evento con los usuarios que han marcado como asistire al evento hasta el momento
    public function pdf($event_id)
    {
        $event = Event::Find($event_id);
        $users = $event->users()->wherePivot('interest', 'asistire');

        if($users->get() != null){
            $users = $users->get();
        }else{
            $users = null;
        }

        $pdf = PDF::loadView('orgnz.pdf.event_pdf',['event'=>$event,'users'=>$users]);

        return $pdf->download('listado.pdf');

    }
}

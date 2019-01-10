<?php

namespace App\Http\Controllers\UserAuth;

use App\Event;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Barryvdh\DomPDF\Facade as PDF;


class ActionController extends Controller
{
    //

    public function __construct()
    {
        $users[] = Auth::user();
        $users[] = Auth::guard()->user();
        $users[] = Auth::guard('user')->user();

    }

    public function home()
    {
        $user_id = Auth::user()->id;
        $user = User::Find($user_id);

        $events = Event::all();

        //Eventos sugeridos al usuario de acuerdo a su tema de preferencia
        //--*Al momento solo acepta 1 tema*--

        if (isset($user->my_tag)) {
            $sug_events = Event::where('tag', 'LIKE', '%'.$user->my_tag.'%')->get();
        }else{
            $sug_events = [];
        }
        //Retorna a la vista home(principal) con los eventos sugeridos
        //Y el usuario
        return view('user.home')
                    ->with(['events'=>$sug_events,
                            'user_id'=>$user_id]);
    }

    //Metodo que devuelve a la vista attend con
    //los eventos marcados como 'asistire' por el usuario
    public function attend()
    {
        $user_id = Auth::user()->id;
        $curr_user = User::Find($user_id);

        $events = $curr_user->events()->wherePivot('interest','asistire')->get();
        return view('user.pages.attend')->with(['events'=>$events,
                                                    'user_id'=>$user_id]);
    }

    //Metodo que devuelve a la vista interest con
    //los eventos marcados como 'me interesa' por el usuario
    public function interest()
    {
        $user_id = Auth::user()->id;

        $curr_user = User::Find($user_id);

        $events = $curr_user->events()->wherePivot('interest','interesa')->get();
        return view('user.pages.interest')->with(['events'=>$events,
            'user_id'=>$user_id]);
    }

//  Cambiar la categoria marcada del evento de asistire <--> me interesa
    public function move($user_id, $event_id, $interest){

        $curr_user_id = Auth::user()->id;

        //Pseudo verificacion del usuario que hace la peticion
        //y el autenticado
        if ($user_id != $curr_user_id){
            dd('Acceso denegado');
        }
        //Actualizacion del campo interest
        //con el valor $interest
        DB::table('event_user')->where('user_id' ,$user_id)
                                    ->where('event_id', $event_id)
                                    ->update(['interest'=>$interest]);

        if ($interest == 'interesa'){
            return redirect('/user/attend');
        }
        elseif ($interest == 'asistire'){
            return redirect('/user/interest');
        }
        else {
            return redirect(url(URL::previous()));
        }
    }


    //Metodo que guarda el evento marcado por el usuario
    //de acuerdo a su interes en él
    //Me interesa, asistire
    public function saveas($user_id, $event_id, $interest)
    {
        $curr_user_id = Auth::user()->id;
        if ($curr_user_id != $user_id){
            dd('Acceso denegado');
        }

        $event = Event::Find($event_id);

        $user = User::Find($user_id);

        //Si el evento no esta asociado al usuario se crea la relacion
        //caso contrario se actualiza
        if( is_null(User::Find($curr_user_id)->events->find($event_id)) ) {

            $user->events()->attach([$event_id => ['interest' => $interest]]);

        } else{
            User::Find($curr_user_id)->events
                                    ->where('id',$event_id)
                                    ->first()
                                    ->pivot
                                    ->update(['interest'=>$interest]);
//            $user->events()->sync([$event_id => ['interest' => $interest]]);
        }

        return redirect(url(URL::previous()));
    }


    //Listado de todos los eventos y el usuario autenticado
    public function list()
    {
        $events = Event::all();
        $user_id = Auth::user()->id;
        return view('user.pages.list')->with(['events' =>$events, 'user_id'=>$user_id]);
    }

    //Metodo que devuelve datos para la vista mi agenda
    public function schedule()
    {
        $curr_user_id = Auth::user()->id;
        $user = User::Find($curr_user_id);
        //consulta para filtrar los eventos marcados por el usuario como asistire o me interesa
        //se omiten los eventos eliminados por el usuario, por eso %a%
//        (Por corregir)
        $events = $user->events()->wherePivot('interest','LIKE','%a%')->get();


        return view('user.pages.schedule')->with('events',$events);

    }

    //Historial de los eventos del usuario
    public function record()
    {
        $user_id = Auth::user()->id;
        $user = User::Find($user_id);
        //Filtro: eventos cuya fecha de finalizacion sea anterior a la fecha actual
        // ademas el evento debe haber estado marcado como asistire por el usuario
        $events = $user->events()->where('end_date','<',Carbon::now())->wherePivot('interest','asistire')->get();
        return view('user.pages.record')->with(['events'=>$events, 'user_id'=>$user_id]);
    }

    //Datos del evento que se pasan a la vista info
    // donde el usuario obtiene mayor informacion del evento y su organizador
    public function eventinfo($event_id)
    {
        $event = Event::Find($event_id);

        return view('user.pages.info')->with('event',$event);
    }

    //Metodo que genera un pdf en base a los eventos con la misma categoria grupo
    //en orden de fecha y hora de inicio
    //(una especie de boletin informativo del o los eventos en un mismo grupo)

    public function eventgroup($event_group)
    {
        $events = DB::table('events')->where('group',$event_group)->orderBy('init_date','asc')->get();

        $pdf = PDF::loadView('user.pdf.event_group',['events'=>$events,'event_group'=>$event_group]);


        return $pdf->download($event_group.'.pdf');
    }
    
    
}

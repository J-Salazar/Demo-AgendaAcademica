<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>{{$event->title}}-pdf</title>

    <style type="text/css">
        @page {
            margin: 0px;
        }
        body {
            margin: 0px;
        }
        * {
            font-family: Verdana, Arial, sans-serif;
        }
        a {
            color: #fff;
            text-decoration: none;
        }
        table {
            font-size: smaller;
            width: 100%;
        }
        tfoot tr td {
            font-weight: bold;
            font-size: small;
        }
        .invoice table {
            margin: 15px;
        }
        .invoice h3 {
            margin-left: 15px;!important;
        }
        .information {
            background-color: #8dc0d7;!important;
            color: #FFF;!important;
        }

        .information table {
            padding: 10px;!important;
        }

    </style>

    <style>
        th {
            padding: 8px;
            text-align: center;
            border-bottom: 1px solid #6c757d;
        }
        td {
            padding: 8px;
            text-align: center;
            border-bottom: 1px solid #6c757d;
        }
    </style>

</head>
<body>

<div class="information">
    <table width="100%" style="background-image: url('{{asset('img/logos/aa.png')}}'); opacity: 0.25; background-repeat: no-repeat; background-position: center">
        <tr>
            <td align="left" >
                <h3>{{$event->title}}</h3>
                <pre>
{{--{{ $event->description }}--}}
Lugar: {{ $event->site }}<br>
Etiquetas: {{ $event->tag }}
<br /><br />
Inicio: {{ $event->init_date }}
Fin: {{ $event->end_date }}
Id: #{{$event->id}}
{{--Status: Paid--}}
</pre>


            </td>
            {{--<td style="position: absolute;margin-left: 50%">--}}
                {{--<img src="{{asset('/img/logos/aa.png')}}" alt="Logo" width="192" class="img-rounded"/>--}}
            {{--</td>--}}
            <td align="right" >

                <h3 style="margin-left: 17% !important;">Organizador</h3>
                <pre>
                    {{$event->orgnzs->last_name}}, {{$event->orgnzs->name}}

                    {{$event->orgnzs->email}}<br>
                    {{$event->orgnzs->dir}}<br>
                    {{$event->orgnzs->phone}}

                </pre>
            </td>
        </tr>

    </table>
</div>


<br/>

<div class="invoice">
    <h3>Lista de Asistentes</h3>
    <div class="table-responsive " id="event-table">
        <table id="example1" class="table table-hover">
            <thead >
            <tr style="text-align: center">
                <th scope="col">id</th>
                <th scope="col">Apellidos</th>
                <th scope="col">Nombres</th>
                <th scope="col" >EAP</th>
                <th scope="col">Asistió</th>
                <th scope="col">Pagó</th>
                <th scope="col">Certificado<br> disponible</th>
                <th scope="col">Certificado<br> entregado</th>
            </tr>
            </thead>
            <tbody>
            @if($users == null)
                <tr >
                    <td class="text-center" colspan="8">
                        No hay usuarios registrados en este evento
                    </td>
                </tr>
            @else
                @for($i = 0; $i < 100; $i++)
                @foreach($users as $user)
                    {{--{{dd($user)}}--}}
                    <tr style="text-align: center;">
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->last_name }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->eap }}</td>
                        @if($user->events()->find($event->id)->pivot->attended)
                            <td><img src="{{asset('open-iconic-master/png/task-2x.png')}}" ></td>
                        @else
                            <td><img src="{{asset('open-iconic-master/png/minus-2x.png')}}"></td>
                        @endif
                        @if($user->events()->find($event->id)->pivot->payment)
                            <td><img src="{{asset('open-iconic-master/png/task-2x.png')}}" ></td>
                        @else
                            <td><img src="{{asset('open-iconic-master/png/minus-2x.png')}}"></td>
                        @endif
                        @if($user->events()->find($event->id)->pivot->certificate_available)
                            <td><img src="{{asset('open-iconic-master/png/task-2x.png')}}" ></td>
                        @else
                            <td><img src="{{asset('open-iconic-master/png/minus-2x.png')}}"></td>
                        @endif
                        @if($user->events()->find($event->id)->pivot->certificate_delivered)
                            <td><img src="{{asset('open-iconic-master/png/task-2x.png')}}" ></td>
                        @else
                            <td><img src="{{asset('open-iconic-master/png/minus-2x.png')}}"></td>
                        @endif

                    </tr>
                @endforeach
                @endfor
            @endif
            </tbody>
        </table>
    </div>
</div>

<div class="information" style="position: absolute; bottom: 0;">
    <table width="100%">
        <tr>
            <td align="center" style="width: 100%;">
                &copy; {{ date('Y') }} Agenda Academica - Todos los derechos reservados.
            </td>

        </tr>

    </table>
</div>
</body>
</html>
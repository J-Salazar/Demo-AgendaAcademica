<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>{{$events->first()->title}}-pdf</title>

    <style type="text/css">
        @page {
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
            /*border-bottom: 1px solid #6c757d;*/
        }
        td {
            padding: 8px;
            text-align: center;
            /*border-bottom: 1px solid #6c757d;*/
        }
    </style>

    <style>
        .page-break {
            page-break-inside: auto;
        }
    </style>

</head>
<body>

<div class="information">
    <table width="100%" style="background-image: url('{{asset('img/logos/aa.png')}}'); opacity: 0.25; background-repeat: no-repeat; background-position: center">
        <tr>
            <td align="left" style="margin-top: 2.5%!important;">
                <h3>{{$event_group}}</h3>
                <pre>
Lugar: {{ $events->first()->site }}<br>
Etiquetas: {{ $events->first()->tag }}
                    <br /><br />
{{--Inicio: {{ $event->init_date }}--}}
{{--                    Fin: {{ $event->end_date }}--}}
{{--                    Id: #{{$event->id}}--}}
                    {{--Status: Paid--}}
</pre>


            </td>
            {{--<td style="position: absolute;margin-left: 50%">--}}
            {{--<img src="{{asset('/img/logos/aa.png')}}" alt="Logo" width="192" class="img-rounded"/>--}}
            {{--</td>--}}
            <td align="right" >

                <h3 style="margin-left: 17% !important;">Organizador</h3>
                <pre>
                    {{App\Orgnz::Find($events->first()->orgnz_id)->last_name}}, {{App\Orgnz::Find($events->first()->orgnz_id)->name}}

                    {{App\Orgnz::Find($events->first()->orgnz_id)->email}}<br>
                    {{App\Orgnz::Find($events->first()->orgnz_id)->dir}}<br>
                    {{App\Orgnz::Find($events->first()->orgnz_id)->phone}}

                </pre>
            </td>
        </tr>

    </table>
</div>


<br/>

<div class="invoice" style="margin-left: 8% !important;">
    <h3>Lista de Eventos en este grupo</h3>
    @foreach($events as $event)
        <div style="margin-left: 5%">
        <h4 style="text-align: left !important;">ID: #{{$event->id}}</h4>
        <h4 style="text-align: left !important;">{{$event->title}}</h4>
        <p style="text-align: left !important;">Descripcion</p>
        <p style="text-align: center !important; font-size: small">{!! $event->description !!}</p>
        <p style="text-align: left !important;">Lugar</p>
        <p style="text-align: center !important; font-size: small">{!! $event->site !!}</p>
        <p style="text-align: left !important;">Fecha y horario:</p>
        <p style="text-align: left !important; font-size: small">{{ $event->init_date }}  {{ $event->end_date }}</p>
        <p style="text-align: left !important;">Temas:</p>
        <p style="text-align: left !important; font-size: small"><ul><li>{!!   str_replace(',','</li><br><li>',$event->tag) !!}</li></ul></p>
        <p style="text-align: left !important; ">Ponentes: </p>
        <p style="text-align: center !important; font-size: small"><ul><li>{!!   str_replace(',','</li><br><li>',$event->speaker) !!}</li></ul></p>
            <div class="page-break"></div>
        </div>
    @endforeach
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
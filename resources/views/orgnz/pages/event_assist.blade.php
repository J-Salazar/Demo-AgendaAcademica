@extends('orgnz.layout.auth')

@section('datatablecss')
    <link rel="stylesheet" href="{{asset('templates/plugins/datatables/dataTables.bootstrap4.css')}}">
@endsection

@section('menu-eventos','menu-open')
@section('link-eventos','active')
@section('link-mis-eventos','active')
@section('mis-eventos-activo','100%')
@section('eventos-activo','100%')

@section('estilo-mis-eventos')
    background-color: black;
    color: white;

@endsection

@section('contenido')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">

                    <div class="col-sm-12">
                        @if($event->closed)
                        <p class="text-center text-info">Evento Cerrado</p>
                        <p class="text-center text-info">Ya no es posible modificar los datos</p>
                        @endif
                    </div>
                    <div class="col-sm-9">
                        <h1 class="text-bold">Título: {{ $event->title }}</h1>
                        <h4 class="text-bold">Evento: {{ $event->group }}</h4>
                    </div>
                    <div class="col-sm-3 text-right">
                        <a class="btn btn-outline-info" href="{{url('/orgnz/event/'.$event->id.'/pdf')}}">Reporte PDF</a>
                    </div>
                    <div class="col-sm-6">
                        <h3>Relación de asistentes</h3>
                    </div>
                    <div class="col-sm-6 text-right">
                        <a href="{{ url('/orgnz/event/'.$event->id.'/closed') }}">Cerrar data</a>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>

        <div class="table-responsive " id="event-table">
            <table id="example1" class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Nombres</th>
                    <th scope="col" >Escuela Academico Profesional</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @if($users == null)
                    <tr>
                        <td class="text-center" colspan="8">
                            No hay usuarios registrados en este evento
                        </td>
                    </tr>
                @else
                @foreach($users as $user)
                    {{--{{dd($user)}}--}}
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->last_name }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->eap }}</td>
                        @if($user->events()->find($event->id)->pivot->attended)
                            <td><a class="btn btn-outline-primary disabled" href="{{url('/orgnz/event/'.$event->id.'/user/'.$user->id.'/data/attended/0')}}">Asistió</a></td>
                        @else
                            <td><a class="btn btn-outline-primary " href="{{url('/orgnz/event/'.$event->id.'/user/'.$user->id.'/data/attended/1')}}">Asistió</a></td>
                        @endif
                        @if($user->events()->find($event->id)->pivot->payment)
                            <td><a class="btn btn-outline-primary disabled" href="{{url('/orgnz/event/'.$event->id.'/user/'.$user->id.'/data/payment/0')}}">Pagó</a></td>
                        @else
                            <td><a class="btn btn-outline-primary " href="{{url('/orgnz/event/'.$event->id.'/user/'.$user->id.'/data/payment/1')}}">Pagó</a></td>
                        @endif
                        @if($user->events()->find($event->id)->pivot->certificate_available)
                            <td><a class="btn btn-outline-primary disabled" href="{{url('/orgnz/event/'.$event->id.'/user/'.$user->id.'/data/certificate_available/0')}}">Certificado disponible</a></td>
                        @else
                            <td><a class="btn btn-outline-primary " href="{{url('/orgnz/event/'.$event->id.'/user/'.$user->id.'/data/certificate_available/1')}}">Certificado disponible</a></td>
                        @endif
                        @if($user->events()->find($event->id)->pivot->certificate_delivered)
                            <td><a class="btn btn-outline-primary disabled" href="{{url('/orgnz/event/'.$event->id.'/user/'.$user->id.'/data/certificate_delivered/0')}}">Certificado entregado</a></td>
                        @else
                            <td><a class="btn btn-outline-primary " href="{{url('/orgnz/event/'.$event->id.'/user/'.$user->id.'/data/certificate_delivered/1')}}">Certificado entregado</a></td>
                        @endif

                    </tr>
                @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.content-wrapper -->
@endsection

@section('datatablejs')
    <script src="{{asset('templates/plugins/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('templates/plugins/datatables/dataTables.bootstrap4.js')}}"></script>
@endsection

@section('calendariojs')

    <script>
        $(function () {
            $("#example1").DataTable({
                "oLanguage": {
                    "sProcessing":     "Procesando...",
                    "sLengthMenu":     "Mostrar _MENU_ registros",
                    "sZeroRecords":    "No se encontraron resultados",
                    "sEmptyTable":     "Ningún dato disponible en esta tabla",
                    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix":    "",
                    "sSearch":         "Buscar:",
                    "sUrl":            "",
                    "sInfoThousands":  ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst":    "Primero",
                        "sLast":     "Último",
                        "sNext":     "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                }

            });
        });
    </script>
    @if($event->closed)
        <script>
            $("#event-table a").click(function(e) {
                e.preventDefault();
            });
        </script>
    @endif
@endsection
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
                    <div class="col-sm-6">
                        <h1>Mis eventos</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <div class="table-responsive ">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Título</th>
                    <th scope="col">Descripción</th>
                    {{--<th scope="col">Grupo</th>--}}
                    <th scope="col">Fecha</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    {{--<th scope="col"></th>--}}
                </tr>
                </thead>
                <tbody>
                    @if($events->first() == null)
                        <tr>
                            <td>
                                No ha registrado ningún evento
                            </td>
                        </tr>
                    @else

                    @foreach($events as $event)
                        <tr>
                            <th scope="row">{{ $event->id }}</th>
                            <td>{{ $event->title }}</td>
                            <td>{{ substr($event->description,0,20) }} ...</td>
                            {{--<td><a href="{{url('/orgnz/group/'.$event->group)}}">{{ $event->group }} </a></td>--}}
                            <td>{{ $event->init_date }}--{{ $event->end_date }}</td>
                            @if(  Carbon\Carbon::now()->addHours(2) >= $event->init_date)
                                <td><a class="btn btn-outline-primary" href="{{url('orgnz/'.$event->id.'/data')}}">Data</a></td>
                            @else
                                <td><a class="btn btn-outline-primary disabled" href="{{url('orgnz/'.$event->id.'/data')}}">Data</a></td>
                            @endif
                            @if($event->init_date < Carbon\Carbon::now())
                                <td><a class="btn btn-outline-primary disabled" href="{{url('orgnz/'.$orgnz_id.'/event/'.$event->id)}}">Editar</a></td>
                                {{--<td><a class="btn btn-outline-danger disabled" href="#">Eliminar</a></td>--}}
                            @else
                                <td><a class="btn btn-outline-primary" href="{{url('orgnz/'.$orgnz_id.'/event/'.$event->id)}}">Editar</a></td>
                                {{--<td><a class="btn btn-outline-danger disabled" href="#">Eliminar</a></td>--}}
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

@endsection
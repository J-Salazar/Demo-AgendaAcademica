@extends('user.layout.auth')

@section('datatablecss')
    <link rel="stylesheet" href="{{asset('templates/plugins/datatables/dataTables.bootstrap4.css')}}">
@endsection

@section('menu-eventos','menu-open')
@section('eventos-activo','100%')
@section('link-eventos','active')
@section('link-historial','active')
@section('historial-activo','100%')


@section('estilo-historial')
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
                        <h1>Historial</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <div class="table-responsive ">
            <table id="example1" class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Título</th>
                    <th scope="col">Descripción</th>
                    <th scope="col" >Duracion</th>

                </tr>
                </thead>
                <tbody>
                @if( $events->first == null )
                    <td colspan="6" class="text-center">No hay eventos</td>
                @else
                @foreach($events as $event)
                    <tr>
                        <th scope="row">{{ $event->id }}</th>
                        <td><a href="{{url('user/'.$event->id.'/info')}}" target="_blank">{{ $event->title }}</a></td>
                        <td>{{ substr(strip_tags( $event->description ),0,40)}}...</td>
                        <td>{{ $event->init_date }} -- {{ $event->end_date }}</td>

                        {{--@if($event->users->where('id',$user_id)->first()->pivot->interest == 'interesa')--}}
                            {{--<td><a class="btn btn-outline-primary disabled text-dark" href="{{url('user/'.$user_id.'/event_save/'.$event->id.'/interesa')}}"--}}
                                {{-->Me interesa</a></td>--}}
                        {{--@else--}}
                            {{--<td><a class="btn btn-outline-primary" href="{{url('user/'.$user_id.'/event_save/'.$event->id.'/interesa')}}"--}}
                                {{-->Me interesa</a></td>--}}
                        {{--@endif--}}

                        {{--@if($event->users->where('id',$user_id)->first()->pivot->interest == 'asistire')--}}
                            {{--<td><a class="btn btn-outline-primary disabled" href="{{url('user/'.$user_id.'/event_save/'.$event->id.'/asistire')}}"--}}
                                {{-->Asistiré</a></td>--}}
                        {{--@else--}}
                            {{--<td><a class="btn btn-outline-primary" href="{{url('user/'.$user_id.'/event_save/'.$event->id.'/asistire')}}"--}}
                                {{-->Asistiré</a></td>--}}
                        {{--@endif--}}

                        {{--@if($event->users->where('id',$user_id)->first()->pivot->interest != 'removido')--}}
                            {{--<td><a class="btn btn-outline-danger" href="{{url('user/'.$user_id.'/event_save/'.$event->id.'/removido')}}"--}}
                                {{-->Eliminar</a></td>--}}
                        {{--@else--}}
                            {{--<td></td>--}}
                        {{--@endif--}}

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
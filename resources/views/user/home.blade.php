@extends('user.layout.auth')

@section('datatablecss')
    <link rel="stylesheet" href="{{asset('templates/plugins/datatables/dataTables.bootstrap4.css')}}">
@endsection


@section('link-inicio','active')
@section('inicio-activo','100%')


@section('contenido')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Eventos Sugeridos</h1>
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
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @if($events == NULL)
                    <tr>
                        <td colspan="7" class="text-center"> No hay eventos sugeridos</td>
                    </tr>
                    <tr>
                        <td colspan="7" class="text-center"> Intente actualizar sus temas de preferencia</td>
                    </tr>
                @else
{{--                    {{dd($events)}}--}}
                @foreach($events as $event)
                    <tr>
                        <th scope="row">{{ $event->id }}</th>
                        <td><a href="{{url('user/'.$event->id.'/info')}}" target="_blank">{{ $event->title }}</a></td>
                        <td>{{ substr(strip_tags($event->description),0,40) }}...</td>
                        <td>{{ $event->init_date }} -- {{ $event->end_date }}</td>
                        @if(is_null($event->users()->wherePivot('interest','=','interesa')->first()))
                            <td><a class="btn btn-outline-info"
                                   href="{{url('user/'.$user_id.'/event_save/'.$event->id.'/interesa')}}"
                                >Me interesa</a></td>
                        @else
                            <td><a class="btn btn-outline-info disabled"
                                   href="{{url('user/'.$user_id.'/event_save/'.$event->id.'/interesa')}}"
                                >Me interesa</a></td>
                        @endif

                        @if(is_null($event->users()->wherePivot('interest','=','asistire')->first()))
                            <td><a class="btn btn-outline-info" href="{{url('user/'.$user_id.'/event_save/'.$event->id.'/asistire')}}"
                                >Asistiré</a></td>
                        @else
                            <td><a class="btn btn-outline-info disabled"
                                   href="{{url('user/'.$user_id.'/event_save/'.$event->id.'/asistire')}}"
                                >Asistiré</a></td>
                        @endif
{{--                {{dd($event->users()->wherePivot('interest','=',['removido',''])->first())}}--}}
                        @if(is_null($event->users()->wherePivot('interest','=',['removido',''])->first()))
                            <td><a class="btn btn-outline-danger"
                                   href="{{url('user/'.$user_id.'/event_move/'.$event->id.'/removido')}}"
                                >Eliminar</a></td>
                        @else
                            <td colspan="1"></td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th >id</th>
                    <th >Título</th>
                    <th >Descripción</th>
                    <th >Duracion</th>
                    <th colspan="3"></th>
                    {{--<th ></th>--}}
                    {{--<th ></th>--}}
                </tr>
                </tfoot>
                @endif
            </table>
            </div>
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
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
                    <th scope="col">Fecha</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
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
                            <td>{{ $event->description }}</td>
                            <td>{{ $event->event_date }}</td>
                            <td><a href="{{url('orgnz/'.$orgnz_id.'/event/'.$event->id)}}">Editar</a></td>
                            <td><a href="#">Eliminar</a></td>
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
            $("#example1").DataTable();
        });
    </script>

@endsection
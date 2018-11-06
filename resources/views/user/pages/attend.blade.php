@extends('user.layout.auth')

@section('menu-eventos','menu-open')
@section('link-eventos','active')
@section('link-asistire','active')
@section('asistire-activo','100%')
@section('eventos-activo','100%')

@section('estilo-asistire')
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
                        <h1>Asistiré</h1>
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
                @if($events->isempty() )
                    <td colspan="6" class="text-center">No se encontró ningún evento</td>
                    @else
                    @foreach($events as $event)
                        <tr>

                            <th scope="row">{{ $event->id }}</th>
                            <td>{{ $event->title }}</td>
                            <td>{{ $event->description }}</td>
                            <td>{{ $event->event_date }}</td>
                            <td><a href="{{url('user/'.$user_id.'/event_move/'.$event->id.'/interesa')}}"
                                >Mover a Me interesa</a>
                            </td>
                            <td><a href="{{url('user/'.$user_id.'/event_move/'.$event->id.'/removido')}}"
                                >Eliminar</a>
                            </td>

                        </tr>
                    @endforeach
                @endif

                </tbody>
            </table>
        </div>
    </div>
    <!-- /.content-wrapper -->
@endsection
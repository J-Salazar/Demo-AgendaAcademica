@extends('user.layout.auth')

@section('menu-eventos','menu-open')
@section('eventos-activo','100%')
@section('link-eventos','active')
@section('link-todos','active')
@section('todos-activo','100%')


@section('estilo-todos')
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
                        <h1>Eventos</h1>
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
                    <th scope="col" >Duracion</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($events as $event)
                    <tr>
                        <th scope="row">{{ $event->id }}</th>
                        <td><a href="{{url('user/'.$event->id.'/info')}}" target="_blank">{{ $event->title }}</a></td>
                        <td>{{ strip_tags($event->description) }}</td>
                        <td>{{ $event->init_date }} -- {{ $event->end_date }}</td>

                        @if($event->users->where('id',$user_id)->first() == null)
                            <td><a class="btn btn-outline-primary" href="{{url('user/'.$user_id.'/event_save/'.$event->id.'/interesa')}}"
                                >Me interesa</a></td>
                            <td><a class="btn btn-outline-primary" href="{{url('user/'.$user_id.'/event_save/'.$event->id.'/asistire')}}"
                                >Asistiré</a></td>
                            <td></td>
                        @else

                        @if($event->users->where('id',$user_id)->first()->pivot->interest == 'interesa')
                        <td><a class="btn btn-outline-primary disabled text-dark" href="{{url('user/'.$user_id.'/event_save/'.$event->id.'/interesa')}}"
                                >Me interesa</a></td>
                            @else
                        <td><a class="btn btn-outline-primary" href="{{url('user/'.$user_id.'/event_save/'.$event->id.'/interesa')}}"
                            >Me interesa</a></td>
                        @endif

                        @if($event->users->where('id',$user_id)->first()->pivot->interest == 'asistire')
                            <td><a class="btn btn-outline-primary disabled" href="{{url('user/'.$user_id.'/event_save/'.$event->id.'/asistire')}}"
                                >Asistiré</a></td>
                        @else
                            <td><a class="btn btn-outline-primary" href="{{url('user/'.$user_id.'/event_save/'.$event->id.'/asistire')}}"
                                >Asistiré</a></td>
                        @endif

                        @if($event->users->where('id',$user_id)->first()->pivot->interest != 'removido')
                            <td><a class="btn btn-outline-danger" href="{{url('user/'.$user_id.'/event_save/'.$event->id.'/removido')}}"
                                >Eliminar</a></td>
                        @else
                            <td></td>
                        @endif
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.content-wrapper -->
@endsection
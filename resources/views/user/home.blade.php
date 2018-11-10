@extends('user.layout.auth')

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

        <div class="table-responsive container-fluid">
            <table id="dtBasicExample table table-hover"
                   class="table table-striped table-bordered table-sm"
                   cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Título</th>
                    <th scope="col">Descripción</th>
                    <th scope="col" >Duracion</th>
                    <th scope="col" colspan="3"></th>
                    {{--<th scope="col"></th>--}}
                    {{--<th scope="col"></th>--}}
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
                        <td>{{ $event->description }}</td>
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

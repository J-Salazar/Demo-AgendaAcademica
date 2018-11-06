@extends('orgnz.layout.auth')

@section('menu-eventos','menu-open')
@section('eventos-activo','100%')
@section('link-eventos','active')
@section('link-crear','active')
@section('crear-activo','100%')


@section('estilo-crear')
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
                        <h1>Crear evento</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">

                        <form method="POST" action="{{url('/orgnz/create_event')}}">
                            {{ csrf_field() }}
                            <p class="card-title">Título</p>
                            <input class="border-light w-100 rounded " name="new_event_title" value="{{ old('new_event_title') }}"><br>

                            @if($errors->has('new_event_title'))
                                <span class="text-danger"><img src="{{ asset('open-iconic-master/png/circle-x-2x.png') }}">Campo requerido</span>
                            @endif

                            <p class="card-title">Descripción</p>
                            <textarea class="border-secondary input-group form-control rounded "
                                      name="new_event_description"
                                      rows="5"
                                      >{{ old('new_event_description') }}</textarea><br>

                            @if($errors->has('new_event_description'))
                                <span class="text-danger"><img src="{{ asset('open-iconic-master/png/circle-x-2x.png') }}">Campo requerido</span>
                            @endif

                            <p class="card-title">Lugar</p>
                            <input class="border-light w-100 rounded " value="{{ old('new_event_site') }}"  name="new_event_site"><br>

                            @if($errors->has('new_event_site'))
                                <span class="text-danger"><img src="{{ asset('open-iconic-master/png/circle-x-2x.png') }}">Campo requerido</span>
                            @endif

                            <p class="card-title">Etiquetas</p>
                            <input class="border-light w-100 rounded " value="{{ old('new_event_tag')  }}" name="new_event_tag"><br>

                            @if($errors->has('new_event_tag'))
                                <span class="text-danger"><img src="{{ asset('open-iconic-master/png/circle-x-2x.png') }}">Campo requerido</span>
                            @endif

                            <p class="card-title">Fecha del evento</p>
                            <input class="border-light w-100 rounded form-control"
                                   {{--value="{{ old('new_event_date') }}" --}}
                                   name="new_event_date"
                                   type="datetime-local"
                                   value="{{Carbon\Carbon::now()->toDateString()}}T{{Carbon\Carbon::now()->format("H")}}:00"
                                   id="example-datetime-local-input"
                            ><br>

                            @if($errors->has('new_event_date'))
                                <span class="text-danger"><img src="{{ asset('open-iconic-master/png/circle-x-2x.png') }}">Campo requerido</span>
                            @endif


                            <div class="modal-footer">
                                <button class="btn-primary" type="submit">Crear Evento</button>
                            </div>
                        </form>

                        <p class="text-success">{{ Session::get('mensaje_exitoso') }}</p>
                        {{ Session::forget('mensaje_exitoso') }}
                    </div>
                    <!-- /.col -->

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
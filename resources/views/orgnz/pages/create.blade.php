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
                            <input class="border-light w-100 rounded bg-gray-light" name="new_event_title"><br>
                            <p class="card-title">Descripción</p>
                            <textarea class="border-light input-group form-control rounded bg-gray-light" name="new_event_description"></textarea><br>
                            <p class="card-title">Lugar</p>
                            <input class="border-light w-100 rounded bg-gray-light" name="new_event_site"><br>
                            <p class="card-title">Etiquetas</p>
                            <input class="border-light w-100 rounded bg-gray-light" name="new_event_tag"><br>
                            <p class="card-title">Día del evento</p>
                            <input class="border-light w-100 rounded bg-gray-light" name="new_event_date"><br>
                            <p class="card-title">Hora del evento</p>
                            <input class="border-light w-100 rounded bg-gray-light" name="new_event_hour"><br>
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
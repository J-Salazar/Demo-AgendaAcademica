@extends('orgnz.layout.auth')



@section('link-perfil','active')
@section('perfil-activo','100%')

@section('contenido')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Perfil</h1>
                    </div>
                    {{--<div class="col-sm-6">--}}
                    {{--<ol class="breadcrumb float-sm-right">--}}
                    {{--<li class="breadcrumb-item"><a href="#">Home</a></li>--}}
                    {{--<li class="breadcrumb-item active">Calendar</li>--}}
                    {{--</ol>--}}
                    {{--</div>--}}
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">

                        <form method="POST" action="{{url('/orgnz/update')}}">
                            {{ csrf_field() }}
                            <p class="card-title">Nombres</p>
                            <input class="border-light w-100 rounded bg-gray-light"
                                   type="text"
                                   pattern="[a-z A-Z]"
                                   title="No se permiten números en este campo."
                                   name="new_orgnz_name"  value="{{ Auth::user()->name }}"><br>
                            <p class="card-title">Apellidos</p>
                            <input class="border-light w-100 rounded bg-gray-light"
                                   type="text"
                                   pattern="[a-z A-Z]"
                                   title="No se permiten números en este campo."
                                   name="new_orgnz_last_name"  value="{{ Auth::user()->last_name }}"><br>
                            <p class="card-title">Correo electrónico</p>
                            <input class="border-light w-100 rounded bg-gray-light" name="new_orgnz_email"  value="{{ Auth::user()->email }}"><br>
                            @if ($errors->has('new_orgnz_email'))
                                <span class="help-block">
                                        <strong>Email no válido</strong>
                                    </span>
                            @endif
                            <p class="card-title">Teléfono</p>
                            <input class="border-light w-100 rounded bg-gray-light"
                                   type="tel"
                                   pattern="[0-9]{9,}"
                                   title="Solo se permiten números en este campo."
                                   name="new_orgnz_phone"  value="{{ Auth::user()->phone }}"><br>
                            <p class="card-title">Dirección</p>
                            <input class="border-light w-100 rounded bg-gray-light"
                                   name="new_orgnz_dir"
                                   value="{{ Auth::user()->dir }}" readonly><br>
                            <p class="card-title">Descripción visible en sus eventos</p>
                            <input class="border-light w-100 rounded bg-gray-light"
                                   name="new_orgnz_desc"
                                   value="{{ Auth::user()->desc }}"><br>
                            <p class="card-title">Nombre de Usuario</p>
                            <input class="border-light w-100 rounded bg-gray-light"
                                   name="new_orgnz_alias"
                                   value="{{ Auth::user()->alias }}"><br>
                            @if ($errors->has('new_orgnz_alias'))
                                <span class="help-block">
                                        <strong>Nombre de usuario no válido</strong>
                                    </span>
                            @endif
                            <div class="modal-footer">
                                <button class="btn-primary" type="submit">Actualizar datos</button>
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
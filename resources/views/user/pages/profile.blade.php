@extends('user.layout.auth')



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

                        <form method="POST" action="{{url('/user/update')}}">
                            {{ csrf_field() }}
                            <p class="card-title">Nombres</p>
                            <input class="border-light w-100 rounded bg-gray-light" name="new_user_name"  value="{{ Auth::user()->name }}"><br>
                            <p class="card-title">Apellidos</p>
                            <input class="border-light w-100 rounded bg-gray-light" name="new_user_last_name"  value="{{ Auth::user()->last_name }}"><br>
                            <p class="card-title">Email</p>
                            <input class="border-light w-100 rounded bg-gray-light" name="new_user_email"  value="{{ Auth::user()->email }}"><br>
                            @if ($errors->has('new_user_email'))
                                <span class="help-block">
                                        <strong>Email no válido</strong>
                                    </span>
                            @endif
                            <p class="card-title">Nombre de Usuario</p>
                            <input class="border-light w-100 rounded bg-gray-light" name="new_user_alias"  value="{{ Auth::user()->alias }}"><br>
                            @if ($errors->has('new_user_alias'))
                                <span class="help-block">
                                        <strong>Nombre de usuario no válido</strong>
                                    </span>
                            @endif
                            <div class="modal-footer">
                            <button class="btn-primary" type="submit">Actualizar</button>
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
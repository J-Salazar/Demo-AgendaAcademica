@extends('user.layout.auth')

@section('espacio',"-20")

@section('contenido')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><p class="text-dark text-lg ">Registro - Usuario</p></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/user/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombres</label>

                            <div class="col-md-6">
                                <input id="name"
                                       type="text"
                                       pattern="[a-z A-Z]{1,}"
                                       title="No se permiten números en este campo."
                                       class="form-control" name="name" value="{{ old('name') }}" autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>
                                            <span class="text-dark"><img src="{{ asset('open-iconic-master/png/circle-x-2x.png') }}">Campo requerido</span>
                                        </strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                            <label for="last_name" class="col-md-4 control-label">Apellidos</label>

                            <div class="col-md-6">
                                <input id="last_name" class="form-control"
                                       pattern="[a-z A-Z]{1,}"
                                       title="No se permiten números en este campo."
                                       name="last_name" value="{{ old('last_name') }}">

                                @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>
                                            <span class="text-dark"><img src="{{ asset('open-iconic-master/png/circle-x-2x.png') }}">Campo requerido</span>
                                        </strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Correo electrónico</label>

                            <div class="col-md-6">
                                <input id="email" type="email"
                                       class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>
                                            <span class="text-dark"><img src="{{ asset('open-iconic-master/png/circle-x-2x.png') }}">Campo requerido</span>
                                        </strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('eap') ? ' has-error' : '' }}">
                            <label for="eap" class="col-md-4 control-label">Escuela Académico Profesional</label>

                            <div class="col-md-6">
                                <input id="eap" type="text"
                                       pattern="[a-z A-Z]"
                                       title="No se permiten números en este campo."
                                       class="form-control" name="eap" value="{{ old('eap') }}">

                                @if ($errors->has('eap'))
                                    <span class="help-block">
                                        <strong>
                                            <span class="text-dark"><img src="{{ asset('open-iconic-master/png/circle-x-2x.png') }}">Campo requerido</span>
                                        </strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('alias') ? ' has-error' : '' }}">
                            <label for="alias" class="col-md-4 control-label">Nombre de usuario</label>

                            <div class="col-md-6">
                                <input id="alias" class="form-control" name="alias" value="{{ old('alias') }}">

                                @if ($errors->has('alias'))
                                    <span class="help-block">
                                        <strong>
                                            <span class="text-dark"><img src="{{ asset('open-iconic-master/png/circle-x-2x.png') }}">Campo requerido</span>
                                        </strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
                            <label for="code" class="col-md-4 control-label">Código de alumno</label>

                            <div class="col-md-6">
                                <input id="code" type="tel"
                                       pattern="[0-9]"
                                       title="Solo se permiten números en este campo."
                                       class="form-control" name="code" value="{{ old('code') }}">

                                @if ($errors->has('code'))
                                    <span class="help-block">
                                        <strong>
                                            <span class="text-dark"><img src="{{ asset('open-iconic-master/png/circle-x-2x.png') }}">Campo requerido</span>
                                        </strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-4 control-label">Teléfono</label>

                            <div class="col-md-6">
                                <input id="phone" type="tel"
                                       pattern="[0-9]{9,}"
                                       title="Solo se permiten números de 9 dígitos en este campo."
                                       maxlength="9" class="form-control" name="phone" value="{{ old('phone') }}">

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>
                                            <span class="text-dark"><img src="{{ asset('open-iconic-master/png/circle-x-2x.png') }}">Campo requerido</span>
                                        </strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>
                                            <span class="text-dark"><img src="{{ asset('open-iconic-master/png/circle-x-2x.png') }}">Campo requerido</span>
                                        </strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmar contraseña</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>
                                            <span class="text-dark"><img src="{{ asset('open-iconic-master/png/circle-x-2x.png') }}">Campo requerido</span>
                                        </strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Registrarse
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

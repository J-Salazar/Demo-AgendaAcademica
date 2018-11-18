@extends('orgnz.layout.auth')

@section('contenido')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><p class="text-dark text-lg ">Registro - Organizador</p></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/orgnz/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombres</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong><span class="text-dark"><img src="{{ asset('open-iconic-master/png/circle-x-2x.png') }}">Campo requerido</span></strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                            <label for="last_name" class="col-md-4 control-label">Apellidos</label>

                            <div class="col-md-6">
                                <input id="last_name"
                                       type="text"
                                       class="form-control"
                                       name="last_name"
                                       value="{{ old('last_name') }}" autofocus>

                                @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong><span class="text-dark"><img src="{{ asset('open-iconic-master/png/circle-x-2x.png') }}">Campo requerido</span></strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Correo electrónico</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('dir') ? ' has-error' : '' }}">
                            <label  class="col-md-4 control-label">Dirección de la institución que representa</label>

                            <div class="col-md-6">
                                <input class="form-control" name="dir" value="{{ old('dir') }}">

                                @if ($errors->has('dir'))
                                    <span class="help-block">
                                        <strong><span class="text-dark"><img src="{{ asset('open-iconic-master/png/circle-x-2x.png') }}">Campo requerido</span></strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Teléfono</label>

                            <div class="col-md-6">
                                <input class="form-control" type="tel" maxlength="9" name="phone" value="{{ old('phone') }}">

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong><span class="text-dark"><img src="{{ asset('open-iconic-master/png/circle-x-2x.png') }}">Campo requerido</span></strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('alias') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre de usuario</label>

                            <div class="col-md-6">
                                <input id="alias" type="text" class="form-control" name="alias" value="{{ old('alias') }}" autofocus>

                                @if ($errors->has('alias'))
                                    <span class="help-block">
                                        <strong><span class="text-dark"><img src="{{ asset('open-iconic-master/png/circle-x-2x.png') }}">Campo requerido</span></strong>
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
                                        <strong><span class="text-dark"><img src="{{ asset('open-iconic-master/png/circle-x-2x.png') }}">Campo requerido</span></strong>
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
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
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

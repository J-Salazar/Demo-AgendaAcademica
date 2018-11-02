@extends('admin.layout.auth')



@section('link-perfil','active')
@section('perfil-activo','100%')


@section('contenido')
    <p>{{ Auth::user() }}</p>
@endsection
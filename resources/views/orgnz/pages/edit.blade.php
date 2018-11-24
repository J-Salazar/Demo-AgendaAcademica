@extends('orgnz.layout.auth')

@section('menu-eventos','menu-open')
@section('link-eventos','active')
@section('eventos-activo','100%')
{{--@section('link-mis-eventos','active')--}}
@section('mis-eventos-activo','100%')
{{--@section('eventos-activo','100%')--}}

@section('estilo-mis-eventos')
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
                        <h1>Evento #{{$event->id}}</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">

                        <form method="POST" action="{{url('orgnz/event/'.$event->id.'/update')}}">
                            {{ csrf_field() }}
                            <p class="card-title">Titulo</p>
                            <input class="border-light w-100 rounded "
                                   name="new_event_title"
                                   value="{{ $event->title       }}"><br>
                            @if($errors->has('new_event_title'))
                                <span class="text-danger"><img src="{{ asset('open-iconic-master/png/circle-x-2x.png') }}">Campo requerido</span>
                            @endif



                            <p class="card-title">Descripcion</p>
                            <textarea class="border-secondary input-group form-control rounded"
                                   name="new_event_description"
                                   rows="5"
                            >{{ $event->description }}</textarea><br>
                            @if($errors->has('new_event_description'))
                                <span class="text-danger"><img src="{{ asset('open-iconic-master/png/circle-x-2x.png') }}">Campo requerido</span>
                            @endif

                            <p class="card-title">Ponente(s)</p>
                            <input class="border-light w-100 rounded " value="{{ $event->speaker  }}" name="new_event_speaker"><br>

                            @if($errors->has('new_event_speaker'))
                                <span class="text-danger"><img src="{{ asset('open-iconic-master/png/circle-x-2x.png') }}">Campo requerido</span>
                            @endif



                            <p class="card-title">Lugar</p>
                            <input class="border-light w-100 rounded "
                                   name="new_event_site"
                                   value="{{ $event->site        }}"><br>
                            @if($errors->has('new_event_site'))
                                <span class="text-danger"><img src="{{ asset('open-iconic-master/png/circle-x-2x.png') }}">Campo requerido</span>
                            @endif



                            <p class="card-title">Etiquetas</p>
                            <input class="border-light w-100 rounded "
                                   name="new_event_tag"
                                   value="{{ $event->tag         }}"><br>
                            @if($errors->has('new_event_tag'))
                                <span class="text-danger"><img src="{{ asset('open-iconic-master/png/circle-x-2x.png') }}">Campo requerido</span>
                            @endif



                            <p class="card-title">Fecha de inicio del evento</p>
                            <input class="border-light w-100 rounded form-control"
                                   {{--value="{{ old('new_event_date') }}" --}}
                                   name="new_event_date"
                                   type="datetime-local"
                                   min="{{Carbon\Carbon::now()->toDateString()}}T{{Carbon\Carbon::now()->format("H")}}:{{Carbon\Carbon::now()->format("i")}}"
                                   value="{{strtok($event->init_date,' ')}}T{{trim(strstr($event->init_date,' '))}}"
                                   id="example-datetime-local-input" required
                            ><br>

                            @if($errors->has('new_event_date'))
                                <span class="text-danger"><img src="{{ asset('open-iconic-master/png/circle-x-2x.png') }}">Campo requerido</span>
                            @endif

                            <p class="card-title">Fecha de fin del evento</p>
                            <input class="border-light w-100 rounded form-control"
                                   {{--value="{{ old('new_event_init_date') }}" --}}
                                   name="new_event_date_end"
                                   type="datetime-local"
                                   min="{{Carbon\Carbon::now()->toDateString()}}T{{Carbon\Carbon::now()->format("H")}}:{{Carbon\Carbon::now()->format("i")}}"
                                   value="{{strtok($event->end_date,' ')}}T{{trim(strstr($event->end_date,' '))}}"
                                   id="example-datetime-local-input" required
                            ><br>

                            @if($errors->has('new_event_date_end'))
                                <span class="text-danger"><img src="{{ asset('open-iconic-master/png/circle-x-2x.png') }}">Campo requerido</span>
                            @endif



                            <div class="modal-footer">
                                <button class="btn-primary" type="submit">Actualizar datos</button>
                            </div>
                        </form>

                        <p class="text-success">{{ Session::get('mensaje') }}</p>
                        {{ Session::forget('mensaje') }}
                        <p class="text-danger">{{ Session::get('mensaje_error') }}</p>
                        {{ Session::forget('mensaje_error') }}
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
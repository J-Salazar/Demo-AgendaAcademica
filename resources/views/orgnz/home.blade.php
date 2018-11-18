@extends('orgnz.layout.auth')

@section('link-inicio','active')
@section('inicio-activo','100%')


@section('contenido')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Inicio</h1>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-body p-0">
                                <!-- THE CALENDAR -->
                                @if($events != NULL)
                                    <div class="info-box">
                                        <canvas id="myChart" width="200" height="100"></canvas>
                                    </div>
                                @else
                                    <h3 class="text-muted text-center ">Usuarios a los que le interesan tus eventos</h3>
                                <p class="text-center">No tiene ningún evento próximo<br>
                                    <a href="{{ url('/orgnz/create') }}">Crear evento</a>
                                </p>
                                @endif
                            </div>
                            </div>
                        <div class="card card-primary">
                            <!-- /.card-body -->
                            <div class="card-body p-0">
                                <!-- THE CALENDAR -->
                                @if($events != NULL)
                                    <div class="info-box">
                                        <canvas id="myChart2" width="200" height="100"></canvas>
                                    </div>
                                @else
                                    <h3 class="text-muted text-center ">Usuarios que asistirán tus eventos</h3>
                                    <p class="text-center">No tiene ningún evento próximo<br>
                                        <a href="{{ url('/orgnz/create') }}">Crear evento</a>
                                    </p>
                                @endif
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /. box -->
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


@section('datatablejs')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>



    @endsection

@section('calendariojs')

    <script>
        var ctx = document.getElementById("myChart2").getContext('2d');
        @if(isset($events))
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["{{Carbon\Carbon::today()->subDays(6)->day}}/{{Carbon\Carbon::today()->subDays(6)->month}}",
                    "{{Carbon\Carbon::today()->subDays(5)->day}}/{{Carbon\Carbon::today()->subDays(5)->month}}",
                    "{{Carbon\Carbon::today()->subDays(4)->day}}/{{Carbon\Carbon::today()->subDays(4)->month}}",
                    "{{Carbon\Carbon::today()->subDays(3)->day}}/{{Carbon\Carbon::today()->subDays(3)->month}}",
                    "{{Carbon\Carbon::today()->subDays(2)->day}}/{{Carbon\Carbon::today()->subDays(2)->month}}",
                    "{{Carbon\Carbon::today()->subDays(1)->day}}/{{Carbon\Carbon::today()->subDays(1)->month}}",
                    "{{Carbon\Carbon::today()->subDays(0)->day}}/{{Carbon\Carbon::today()->subDays(0)->month}}"
                ],
                datasets: [@foreach($events as $event){
                    label: '{{$event->title}}',
                    data: [
                        {{--{{$event->users()->wherePivot('interest','asistire')--}}
                        {{--->wherePivot('created_at',Carbon\Carbon::now()->subDays(6))->count()}},--}}

                        {{$event->users()->wherePivot('interest','interesa')->wherePivot('created_at','>=',Carbon\Carbon::now()->subDays(7))->wherePivot('created_at','<=',Carbon\Carbon::now()->subDays(6))->count()}},
                        {{$event->users()->wherePivot('interest','interesa')->wherePivot('created_at','>=',Carbon\Carbon::now()->subDays(6))->wherePivot('created_at','<=',Carbon\Carbon::now()->subDays(5))->count()}},
                        {{$event->users()->wherePivot('interest','interesa')->wherePivot('created_at','>=',Carbon\Carbon::now()->subDays(5))->wherePivot('created_at','<=',Carbon\Carbon::now()->subDays(4))->count()}},
                        {{$event->users()->wherePivot('interest','interesa')->wherePivot('created_at','>=',Carbon\Carbon::now()->subDays(4))->wherePivot('created_at','<=',Carbon\Carbon::now()->subDays(3))->count()}},
                        {{$event->users()->wherePivot('interest','interesa')->wherePivot('created_at','>=',Carbon\Carbon::now()->subDays(3))->wherePivot('created_at','<=',Carbon\Carbon::now()->subDays(2))->count()}},
                        {{$event->users()->wherePivot('interest','interesa')->wherePivot('created_at','>=',Carbon\Carbon::now()->subDays(2))->wherePivot('created_at','<=',Carbon\Carbon::now()->subDays(1))->count()}},
                        {{$event->users()->wherePivot('interest','interesa')->wherePivot('created_at','>=',Carbon\Carbon::now()->subDays(1))->wherePivot('created_at','<=',Carbon\Carbon::now()->subDays(0))->count()}}
                    ],
                    backgroundColor:[
                        'rgba(255,255,255,0.4)'
                    ],
                    borderColor: [
                        'rgba(120,'+(Math.floor(Math.random() * 200)+100).toString(10)+','+(Math.floor(Math.random() * 200)+100).toString(10)+',1)'
                    ],
                    borderWidth: 1
                },@endforeach]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                },
                title: {
                    display: true,
                    text: 'Usuarios a los que le interesan tus eventos'
                }
            }
        });
        @endif
    </script>

    <script>
        var ctx = document.getElementById("myChart").getContext('2d');
                @if(isset($events))
        var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ["{{Carbon\Carbon::today()->subDays(6)->day}}/{{Carbon\Carbon::today()->subDays(6)->month}}",
                        "{{Carbon\Carbon::today()->subDays(5)->day}}/{{Carbon\Carbon::today()->subDays(5)->month}}",
                        "{{Carbon\Carbon::today()->subDays(4)->day}}/{{Carbon\Carbon::today()->subDays(4)->month}}",
                        "{{Carbon\Carbon::today()->subDays(3)->day}}/{{Carbon\Carbon::today()->subDays(3)->month}}",
                        "{{Carbon\Carbon::today()->subDays(2)->day}}/{{Carbon\Carbon::today()->subDays(2)->month}}",
                        "{{Carbon\Carbon::today()->subDays(1)->day}}/{{Carbon\Carbon::today()->subDays(1)->month}}",
                        "{{Carbon\Carbon::today()->subDays(0)->day}}/{{Carbon\Carbon::today()->subDays(0)->month}}"
                    ],
                    datasets: [@foreach($events as $event){
                        label: '{{$event->title}}',
                        data: [
                            {{--{{$event->users()->wherePivot('interest','asistire')--}}
                            {{--->wherePivot('created_at',Carbon\Carbon::now()->subDays(6))->count()}},--}}

                            {{$event->users()->wherePivot('interest','asistire')->wherePivot('created_at','>=',Carbon\Carbon::now()->subDays(7))->wherePivot('created_at','<=',Carbon\Carbon::now()->subDays(6))->count()}},
                            {{$event->users()->wherePivot('interest','asistire')->wherePivot('created_at','>=',Carbon\Carbon::now()->subDays(6))->wherePivot('created_at','<=',Carbon\Carbon::now()->subDays(5))->count()}},
                            {{$event->users()->wherePivot('interest','asistire')->wherePivot('created_at','>=',Carbon\Carbon::now()->subDays(5))->wherePivot('created_at','<=',Carbon\Carbon::now()->subDays(4))->count()}},
                            {{$event->users()->wherePivot('interest','asistire')->wherePivot('created_at','>=',Carbon\Carbon::now()->subDays(4))->wherePivot('created_at','<=',Carbon\Carbon::now()->subDays(3))->count()}},
                            {{$event->users()->wherePivot('interest','asistire')->wherePivot('created_at','>=',Carbon\Carbon::now()->subDays(3))->wherePivot('created_at','<=',Carbon\Carbon::now()->subDays(2))->count()}},
                            {{$event->users()->wherePivot('interest','asistire')->wherePivot('created_at','>=',Carbon\Carbon::now()->subDays(2))->wherePivot('created_at','<=',Carbon\Carbon::now()->subDays(1))->count()}},
                            {{$event->users()->wherePivot('interest','asistire')->wherePivot('created_at','>=',Carbon\Carbon::now()->subDays(1))->wherePivot('created_at','<=',Carbon\Carbon::now()->subDays(0))->count()}}
                        ],
                        backgroundColor:[
                            'rgba(255,255,255,0.4)'
                        ],
                        borderColor: [
                            'rgba(120,'+(Math.floor(Math.random() * 200)+100).toString(10)+','+(Math.floor(Math.random() * 200)+100).toString(10)+',1)'
                        ],
                        borderWidth: 1
                    },@endforeach]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    },
                    title: {
                        display: true,
                        text: 'Usuarios que asistirán tus eventos'
                    }
                }
            });
        @endif
    </script>

    @endsection
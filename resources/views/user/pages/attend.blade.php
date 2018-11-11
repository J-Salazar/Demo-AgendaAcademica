@extends('user.layout.auth')

@section('datatablecss')
    <link rel="stylesheet" href="{{asset('templates/plugins/datatables/dataTables.bootstrap4.css')}}">
@endsection

@section('menu-eventos','menu-open')
@section('link-eventos','active')
@section('link-asistire','active')
@section('asistire-activo','100%')
@section('eventos-activo','100%')

@section('estilo-asistire')
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
                        <h1>Asistiré</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <div class="table-responsive ">
            <table id="example1" class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Título</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Fecha</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @if($events->isempty() )
                    <td colspan="6" class="text-center">No se encontró ningún evento</td>
                    @else
                    @foreach($events as $event)
                        <tr>

                            <th scope="row">{{ $event->id }}</th>
                            <td><a href="{{url('user/'.$event->id.'/info')}}" target="_blank">{{ $event->title }}</a></td>
                            <td>{{ substr(strip_tags($event->description),0,40) }}...</td>
                            <td>{{ $event->event_date }}</td>
                            <td><a class="btn btn-outline-info"
                                   href="{{url('user/'.$user_id.'/event_move/'.$event->id.'/interesa')}}"
                                >Mover a Me interesa</a>
                            </td>
                            <td><a class="btn btn-outline-danger"
                                   href="{{url('user/'.$user_id.'/event_move/'.$event->id.'/removido')}}"
                                >Eliminar</a>
                            </td>

                        </tr>
                    @endforeach
                @endif

                </tbody>
            </table>
        </div>
        @if( $events->first() != null )
        <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">

                        <!-- /.col -->
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-body p-0">
                                    <!-- THE CALENDAR -->
                                    <div id="calendar"></div>
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
        @endif
    </div>
    <!-- /.content-wrapper -->
@endsection

@section('datatablejs')
    <script src="{{asset('templates/plugins/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('templates/plugins/datatables/dataTables.bootstrap4.js')}}"></script>
@endsection

@section('calendariojs')
    <script>
        $(function () {

            /* initialize the external events
             -----------------------------------------------------------------*/
            function ini_events(ele) {
                ele.each(function () {

                    // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
                    // it doesn't need to have a start or end
                    var eventObject = {
                        title: $.trim($(this).text()) // use the element's text as the event title
                    }

                    // store the Event Object in the DOM element so we can get to it later
                    $(this).data('eventObject', eventObject)

                    // make the event draggable using jQuery UI
                    $(this).draggable({
                        zIndex        : 1070,
                        revert        : true, // will cause the event to go back to its
                        revertDuration: 0  //  original position after the drag
                    })

                })
            }

            ini_events($('#external-events div.external-event'))

            /* initialize the calendar
             -----------------------------------------------------------------*/
            //Date for the calendar events (dummy data)
            var date = new Date()
            var d    = date.getDate(),
                m    = date.getMonth(),
                y    = date.getFullYear()
            $('#calendar').fullCalendar({
                monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
                monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
                dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
                dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sab'],
                header    : {
                    left  : 'prev,next today',
                    center: 'title',
                    right : 'month,agendaWeek,agendaDay'
                },
                buttonText: {
                    today: 'hoy',
                    month: 'mes',
                    week : 'semana',
                    day  : 'día'
                },
                //Random default events
                events    : [@foreach($events as $event)
                {
                    title : '{{ $event->title }}',
                    start : new Date(parseInt('{{date_parse($event->init_date)["year"]}}',10),
                        parseInt('{{date_parse($event->init_date)["month"]}}',10)-1,
                        parseInt('{{date_parse($event->init_date)["day"]}}',10),
                        parseInt('{{date_parse($event->init_date)["hour"]}}',10),
                        parseInt('{{date_parse($event->init_date)["minute"]}}',10)
                    ),
                    end   : new Date(parseInt('{{date_parse($event->end_date)["year"]}}',10),
                        parseInt('{{date_parse($event->end_date)["month"]}}',10)-1,
                        parseInt('{{date_parse($event->end_date)["day"]}}',10),
                        parseInt('{{date_parse($event->end_date)["hour"]}}',10),
                        parseInt('{{date_parse($event->end_date)["minute"]}}',10)
                    ),
                    url : '{{url('user/'.$event->id.'/info')}}',
                    backgroundColor: '#ff'+(Math.floor(Math.random() * 9000)+10).toString(10), //random color
                    borderColor    : '#000000'
                },
                    @endforeach

                ],
                editable  : false,
                droppable : false, // this allows things to be dropped onto the calendar !!!
                eventClick: function(event) {
                    // opens events in a popup window
                    window.open(event.url, 'gcalevent', 'width=700,height=600');
                    return false;
                },
                drop      : function (date, allDay) { // this function is called when something is dropped

                    // retrieve the dropped element's stored Event Object
                    var originalEventObject = $(this).data('eventObject')

                    // we need to copy it, so that multiple events don't have a reference to the same object
                    var copiedEventObject = $.extend({}, originalEventObject)

                    // assign it the date that was reported
                    copiedEventObject.start           = date
                    copiedEventObject.allDay          = allDay
                    copiedEventObject.backgroundColor = $(this).css('background-color')
                    copiedEventObject.borderColor     = $(this).css('border-color')

                    // render the event on the calendar
                    // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
                    $('#calendar').fullCalendar('renderEvent', copiedEventObject, true)

                    // is the "remove after drop" checkbox checked?
                    if ($('#drop-remove').is(':checked')) {
                        // if so, remove the element from the "Draggable Events" list
                        $(this).remove()
                    }

                }
            })

            /* ADDING EVENTS */
            var currColor = '#3c8dbc' //Red by default
            //Color chooser button
            var colorChooser = $('#color-chooser-btn')
            $('#color-chooser > li > a').click(function (e) {
                e.preventDefault()
                //Save color
                currColor = $(this).css('color')
                //Add color effect to button
                $('#add-new-event').css({
                    'background-color': currColor,
                    'border-color'    : currColor
                })
            })
            $('#add-new-event').click(function (e) {
                e.preventDefault()
                //Get value and make sure it is not null
                var val = $('#new-event').val()
                if (val.length == 0) {
                    return
                }

                //Create events
                var event = $('<div />')
                event.css({
                    'background-color': currColor,
                    'border-color'    : currColor,
                    'color'           : '#fff'
                }).addClass('external-event')
                event.html(val)
                $('#external-events').prepend(event)

                //Add draggable funtionality
                ini_events(event)

                //Remove event from text input
                $('#new-event').val('')
            })
        })
    </script>

    <script>
        $(function () {
            $("#example1").DataTable();
        });
    </script>

@endsection
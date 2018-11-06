<!DOCTYPE html>
<html lang="es">
<head>
    <title> @yield('titulo', 'Agenda Académica') </title>
    <meta charset="UTF-8">
    <meta charset="ISO-8859-1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">


    <!--Plantilla AdminLTE-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- fullCalendar 2.2.5-->
    <link rel="stylesheet" href="{{asset('templates/plugins/fullcalendar/fullcalendar.min.css')}}">
    <link rel="stylesheet" href="{{asset('templates/plugins/fullcalendar/fullcalendar.print.css')}}" media="print">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('templates/dist/css/adminlte.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- -->

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body class="hold-transition sidebar-mini">

    <div class="wrapper">
    @if (Auth::guest())


                <nav class="navbar navbar-default navbar-static-top ">

                <ul class="nav-header nav-pills nav-sidebar flex-column"  data-widget="treeview" role="menu" data-accordion="false">
                    <a href="{{url('/')}}">
                    <img src="{{asset('open-iconic-master/png/arrow-circle-left-3x.png')}}">
                    </a>
                    <ul class="nav-item has-treeview" >
                        <a href="#" class="nav-link">
                            <img src="{{asset('open-iconic-master/png/caret-bottom.png')}}">
                            <p>
                                Agenda Académica
                            </p>
                        </a>
                        <ul class="nav nav-treeview ml-3">
                            <li class="nav-item">
                                <a href="{{ url('/user/login') }}" class="nav-link">
                                    <img src="{{asset('open-iconic-master/png/caret-right.png')}}"
                                         style="filter: invert(90%);"
                                    >
                                    <p>Iniciar Sesión como Usuario</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/orgnz/login') }}" class="nav-link">
                                    <img src="{{asset('open-iconic-master/png/caret-right.png')}}"
                                         style="filter: invert(90%);"
                                    >
                                    <p>Iniciar Sesión como Organizador</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/user/register') }}" class="nav-link">
                                    <img src="{{asset('open-iconic-master/png/caret-right.png')}}"
                                         style="filter: invert(90%);"
                                    >
                                    <p>Registrarse como Usuario</p>
                                </a>
                            </li>
                        </ul>
                    </ul>



                </ul>

            </nav>

            @yield('contenido')

    @else
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="{{url('orgnz/home')}}" class="nav-link">Home</a>
                    </li>

                </ul>

                {{--<!-- SEARCH FORM -->--}}
                {{--<form class="form-inline ml-3">--}}
                    {{--<div class="input-group input-group-sm">--}}
                        {{--<input class="form-control form-control-navbar" type="search" placeholder="Buscar" aria-label="Search">--}}
                        {{--<div class="input-group-append">--}}
                            {{--<button class="btn btn-navbar" type="submit">--}}
                                {{--<i class="fa fa-search"></i>--}}
                            {{--</button>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</form>--}}

                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                    <!-- Messages Dropdown Menu -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#" >
                            <img src="{{asset('open-iconic-master/png/bell-2x.png')}}" >
                        </a>

                    </li>
                    <!-- Notifications Dropdown Menu -->

                </ul>
            </nav>
            <!-- /.navbar -->


            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-light-dark elevation-4"
                       style="background-color: #FCFAFA"
                >
                    <!-- Brand Logo -->

                    <!-- Sidebar -->
                    <div class="sidebar">
                        <!-- Sidebar user panel (optional) -->
                        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                            <div class="image">
                                <img src="{{asset('open-iconic-master/png/person-3x.png')}}"
                                     alt="User Image"
                                     style="border-radius: 15px;"
                                >
                            </div>
                            <div class="info">
                                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                            </div>
                        </div>

                        <!-- Sidebar Menu -->
                        <nav class="mt-2">
                            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                                <li class="nav-item">
                                    <a href="{{ url('/orgnz/home') }}" class="nav-link @yield('link-inicio')">

                                        <img src="{{asset('open-iconic-master/png/home-3x.png')}}"
                                             style="filter: invert(@yield('inicio-activo','10%'));"
                                        >
                                        <p>Inicio</p>
                                    </a>
                                </li>
                                <li class="nav-header">Eventos</li>

                                <li class="nav-item has-treeview @yield('menu-eventos')">
                                    <a href="#" class="nav-link @yield('link-eventos')">

                                        <img src="{{asset('open-iconic-master/png/envelope-closed-3x.png')}}"
                                             style="filter: invert(@yield('eventos-activo','10%'));"
                                        >
                                        <p>
                                            Eventos
                                            <i class="fa fa-angle-left right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview ml-3">
                                        <li class="nav-item">
                                            <a href="{{ url('orgnz/create') }}" class="nav-link @yield('link-crear')"
                                               style="@yield('estilo-crear')"
                                            >

                                                <img src="{{asset('open-iconic-master/png/timer-2x.png')}}"
                                                     style="filter: invert(@yield('crear-activo','10%'));
                                                             "
                                                >
                                                <p>Crear evento</p>
                                            </a>
                                        </li>
                                        {{--<li class="nav-item">--}}
                                            {{--<a href="{{ url('orgnz/interest') }}" class="nav-link @yield('link-meinteresa')"--}}
                                               {{--style="@yield('estilo-meinteresa')"--}}
                                            {{-->--}}

                                                {{--<img src="{{asset('open-iconic-master/png/pin-2x.png')}}"--}}
                                                     {{--style="filter: invert(@yield('meinteresa-activo','10%'));--}}
                                                             {{--"--}}
                                                {{-->--}}
                                                {{--<p>Me interesan</p>--}}
                                            {{--</a>--}}
                                        {{--</li>--}}
                                        {{--<li class="nav-item">--}}
                                            {{--<a href="{{ url('orgnz/attend') }}" class="nav-link @yield('link-asistire')"--}}
                                            {{--style="@yield('estilo-asistire')"--}}
                                            {{-->--}}

                                                {{--<img src="{{asset('open-iconic-master/png/pencil-2x.png')}}"--}}
                                                     {{--style="filter: invert(@yield('asistire-activo','10%'));--}}
                                                     {{--"--}}
                                                {{-->--}}
                                                {{--<p>Asistiré</p>--}}
                                            {{--</a>--}}
                                        {{--</li>--}}
                                        {{--<li class="nav-item">--}}
                                            {{--<a href="{{ url('orgnz/record') }}" class="nav-link @yield('link-historial')"--}}
                                               {{--style="@yield('estilo-historial')"--}}
                                            {{-->--}}

                                                {{--<img src="{{asset('open-iconic-master/png/eye-2x.png')}}"--}}
                                                     {{--style="filter: invert(@yield('historial-activo','10%'));"--}}
                                                {{-->--}}
                                                {{--<p>Historial</p>--}}
                                            {{--</a>--}}
                                        {{--</li>--}}
                                        <li class="nav-item">
                                            <a href="{{ url('orgnz/events') }}" class="nav-link @yield('link-mis-eventos')"
                                            style="@yield('estilo-mis-eventos')"
                                            >

                                            <img src="{{asset('open-iconic-master/png/eye-2x.png')}}"
                                            style="filter: invert(@yield('mis-eventos-activo','10%'));"
                                            >
                                            <p>Mis eventos</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('orgnz/schedule') }}" class="nav-link @yield('link-miagenda')">
                                        <img src="{{asset('open-iconic-master/png/book-3x.png')}}"
                                             style="filter: invert(@yield('miagenda-activo','10%'));"
                                        >
                                        <p>
                                            Mi agenda
                                            <span class="badge badge-info right">2</span>
                                        </p>
                                    </a>
                                </li>

                                <li class="nav-header">Configuracion</li>
                                <li class="nav-item">
                                    <a href="{{ url('orgnz/profile') }}" class="nav-link @yield('link-perfil')">
                                        <img src="{{asset('open-iconic-master/png/pencil-3x.png')}}"
                                             style="filter: invert(@yield('perfil-activo','10%'));"
                                        >
                                        <p>Perfil</p>
                                    </a>
                                </li>

                                <li class="nav-item" style="position: fixed; bottom: 0;">
                                    <a href="{{ url('/orgnz/logout') }}" class="nav-link"
                                       onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                        <img src="{{ asset('open-iconic-master/png/account-logout-3x.png') }}">
                                        <p>Cerrar Sesion</p>
                                    </a>

                                    <form id="logout-form" action="{{ url('/orgnz/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>

                            </ul>

                        </nav>

                        <!-- /.sidebar-menu -->

                    </div>
                    <!-- /.sidebar -->

                </aside>

        @yield('contenido')
    @endif


    </div>
    <!-- ./wrapper -->
    @if(Auth::guest())
    <!-- Footer -->
    <footer class="main-footer fixed-bottom ml-0 text-white" style="background-color: #0d47a1!important;position: absolute;bottom: @yield('espacio')%;" >

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2018 Copyright:
            <a href="{{url('/')}}" class="alert-link text-white" style="text-decoration: none!important;">
                <strong>Agenda Académica</strong>
            </a>
        </div>
        <!-- Copyright -->

    </footer>
    <!-- Footer -->
    @endif

    <!-- Scripts -->

    <script src="{{asset('/js/app.js')}}"></script>
    <script src="{{asset('templates/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('templates/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Slimscroll -->
    <script src="{{asset('templates/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('templates/plugins/fastclick/fastclick.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('templates/dist/js/adminlte.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('templates/dist/js/demo.js')}}"></script>
    <!-- fullCalendar 2.2.5 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="{{asset('templates/plugins/fullcalendar/fullcalendar.min.js')}}"></script>
    <!-- Page specific script -->
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
                header    : {
                    left  : 'prev,next today',
                    center: 'title',
                    right : 'month,agendaWeek,agendaDay'
                },
                buttonText: {
                    today: 'today',
                    month: 'month',
                    week : 'week',
                    day  : 'day'
                },
                //Random default events
                events    : [
                    {
                        title          : 'All Day Event',
                        start          : new Date(y, m, 1),
                        backgroundColor: '#f56954', //red
                        borderColor    : '#f56954' //red
                    },
                    {
                        title          : 'Long Event',
                        start          : new Date(y, m, d - 5),
                        end            : new Date(y, m, d - 2),
                        backgroundColor: '#f39c12', //yellow
                        borderColor    : '#f39c12' //yellow
                    },
                    {
                        title          : 'Meeting',
                        start          : new Date(y, m, d, 10, 30),
                        allDay         : false,
                        backgroundColor: '#0073b7', //Blue
                        borderColor    : '#0073b7' //Blue
                    },
                    {
                        title          : 'Lunch',
                        start          : new Date(y, m, d, 12, 0),
                        end            : new Date(y, m, d, 14, 0),
                        allDay         : false,
                        backgroundColor: '#00c0ef', //Info (aqua)
                        borderColor    : '#00c0ef' //Info (aqua)
                    },
                    {
                        title          : 'Birthday Party',
                        start          : new Date(y, m, d + 1, 19, 0),
                        end            : new Date(y, m, d + 1, 22, 30),
                        allDay         : false,
                        backgroundColor: '#00a65a', //Success (green)
                        borderColor    : '#00a65a' //Success (green)
                    },
                    {
                        title          : 'Click for Google',
                        start          : new Date(y, m, 28),
                        end            : new Date(y, m, 29),
                        url            : 'http://google.com/',
                        backgroundColor: '#3c8dbc', //Primary (light-blue)
                        borderColor    : '#3c8dbc' //Primary (light-blue)
                    }
                ],
                editable  : true,
                droppable : true, // this allows things to be dropped onto the calendar !!!
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


</body>
</html>

<!DOCTYPE html>

<html>
<head>
    <title>{{ Auth::user() }}</title>
    <meta charset="UTF-8">
    <meta charset="ISO-8859-1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>


<div class="container">
    <div class="row align-items-center">
        <div class="col-lg-6 ">
            <a href="{{url('/')}}">
            <img src=" {{ asset('img/logos/logo.png') }}"  alt="#" class="col-xl-12 mylogo">
            </a>

        </div>

            <div class="col-lg-3 mt-1">
                <a class="btn btn-primary btn-block mybutton" href="{{ url('/user/login') }}">
                    Iniciar Sesión
                </a>
            </div>
            <div class="col-lg-3 mt-1 ">
                <a class="btn btn-primary btn-block mybutton" href="{{ url('/user/register') }}">
                    Registrarse
                </a>
            </div>

    </div>
</div>
<div class="container-fluid mt-3 px-5" style="padding-left: 5rem !important; padding-right: 5rem !important;">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="{{ asset('img/slider/slider_01.jpg') }}" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('img/slider/slider_02.jpg') }}" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('img/slider/slider_03.jpg') }}" alt="Third slide">
            </div>

            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>

<div class="container-fluid mt-3 px-4">
    <!-- Section: Features v.2 -->
    <section class="my-5">

        <!-- Section heading -->
        <h2 class="h1-responsive font-weight-bold text-center my-5">¿Por qué escoger nuestra plataforma?</h2>
        <!-- Section description -->
        <p class="lead grey-text text-center w-responsive mx-auto mb-5">Contamos con la mejor forma de poder hacer que sus eventos, exposiciones o conferencias lleguen a mas personas interesadas a través de nuestra plataforma debido a la interactividad y a sus características que presenta.</p>

        <!-- Grid row -->
        <div class="row">

            <!-- Grid column -->
            <div class="col-md-4 mb-md-0 mb-5">

                <!-- Grid row -->
                <div class="row">

                    <!-- Grid column -->
                    <div class="col-lg-2 col-md-3 col-2">
                        <i class="fa fa-bullhorn blue-text fa-2x"></i>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-lg-10 col-md-9 col-10">
                        <h4 class="font-weight-bold">Marketing</h4>
                        <p class="grey-text">Las publicaciones van dirigidas por aficiones o gustos, así se filtrará e irá directo a las personas mucho mas interesadas, consiguiendo a más para sus aportes en los que disponga.</p>
                        {{--<a class="btn btn-primary btn-sm">Learn more</a>--}}
                    </div>
                    <!-- Grid column -->

                </div>
                <!-- Grid row -->

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-4 mb-md-0 mb-5">

                <!-- Grid row -->
                <div class="row">

                    <!-- Grid column -->
                    <div class="col-lg-2 col-md-3 col-2">
                        <i class="fa fa-cogs pink-text fa-2x"></i>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-lg-10 col-md-9 col-10">
                        <h4 class="font-weight-bold">Personalizacion</h4>
                        <p class="grey-text">Fácil manipulación, ordenamiento en base a fechas, eventos sugeridos acorde a los gustos, disponibilidad según el organizador, todo a la facilidad para el usuario </p>
                        {{--<a class="btn btn-pink btn-sm">Learn more</a>--}}
                    </div>
                    <!-- Grid column -->

                </div>
                <!-- Grid row -->

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-4">

                <!-- Grid row -->
                <div class="row">

                    <!-- Grid column -->
                    <div class="col-lg-2 col-md-3 col-2">
                        <i class="fa fa-dashboard purple-text fa-2x"></i>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-lg-10 col-md-9 col-10">
                        <h4 class="font-weight-bold">Soporte</h4>
                        <p class="grey-text">Especialistas al cuidado de la página, errores o dudas sobre quienes somos y demás preguntas, todo con transparencia hacia nuestro equipo y respondiendo de forma cordial, segura y a tiempo a través de un correo al servicio al cliente</p>
                        {{--<a class="btn btn-purple btn-sm">Learn more</a>--}}
                    </div>
                    <!-- Grid column -->

                </div>
                <!-- Grid row -->

            </div>
            <!-- Grid column -->

        </div>
        <!-- Grid row -->

    </section>
    <!-- Section: Features v.2 -->


    <!-- Section: Testimonials v.3 -->
    <section class="team-section text-center my-5">

        <!-- Section heading -->
        <h2 class="h1-responsive font-weight-bold my-5">Testimonios </h2>
        <!-- Section description -->
        <p class="dark-grey-text w-responsive mx-auto mb-5">Algunas reseñas de nuestra plataforma hecha en foros, páginas asociada, correos o comentarios en nuestra página web</p>

        <!--Grid row-->
        <div class="row text-center">

            <!--Grid column-->
            <div class="col-md-4 mb-md-0 mb-5">

                <div class="testimonial">
                    <!--Avatar-->
                    <div class="avatar mx-auto">
                        <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(1).jpg" class="rounded-circle z-depth-1 img-fluid">
                    </div>
                    <!--Content-->
                    <h4 class="font-weight-bold dark-grey-text mt-4">Anna Deynah</h4>
                    <h6 class="font-weight-bold blue-text my-3">Diseñadora web</h6>
                    <p class="font-weight-normal dark-grey-text">
                        <i class="fa fa-quote-left pr-2"></i>WOW! Cada vez me impresionas más! Excelente trabajo! Ahora a probarlo</p>
                    <!--Review-->
                    <div class="orange-text">
                        <i class="fa fa-star"> </i>
                        <i class="fa fa-star"> </i>
                        <i class="fa fa-star"> </i>
                        <i class="fa fa-star"> </i>
                        <i class="fa fa-star-half-full"> </i>
                    </div>
                </div>

            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-md-4 mb-md-0 mb-5">

                <div class="testimonial">
                    <!--Avatar-->
                    <div class="avatar mx-auto">
                        <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(8).jpg" class="rounded-circle z-depth-1 img-fluid">
                    </div>
                    <!--Content-->
                    <h4 class="font-weight-bold dark-grey-text mt-4">John Doe</h4>
                    <h6 class="font-weight-bold blue-text my-3">Desarrollador web</h6>
                    <p class="font-weight-normal dark-grey-text">
                        <i class="fa fa-quote-left pr-2"></i>Excelente plataforma ! Mil gracias. Como siempre todo muy bien explicado y de una manera sencilla.</p>
                    <!--Review-->
                    <div class="orange-text">
                        <i class="fa fa-star"> </i>
                        <i class="fa fa-star"> </i>
                        <i class="fa fa-star"> </i>
                        <i class="fa fa-star"> </i>
                        <i class="fa fa-star"> </i>
                    </div>
                </div>

            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-md-4">

                <div class="testimonial">
                    <!--Avatar-->
                    <div class="avatar mx-auto">
                        <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(10).jpg" class="rounded-circle z-depth-1 img-fluid">
                    </div>
                    <!--Content-->
                    <h4 class="font-weight-bold dark-grey-text mt-4">Maria Kate</h4>
                    <h6 class="font-weight-bold blue-text my-3">Fotógrafa</h6>
                    <p class="font-weight-normal dark-grey-text">
                        <i class="fa fa-quote-left pr-2"></i>Son impresionantes, no he visto nada mejor que ello. Un material muy limpio muy claro y profesional.</p>
                    <!--Review-->
                    <div class="orange-text">
                        <i class="fa fa-star"> </i>
                        <i class="fa fa-star"> </i>
                        <i class="fa fa-star"> </i>
                        <i class="fa fa-star"> </i>
                        <i class="fa fa-star-o"> </i>
                    </div>
                </div>

            </div>
            <!--Grid column-->

        </div>
        <!--Grid row-->

    </section>
    <!-- Section: Testimonials v.3 -->




    {{--<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">--}}
        {{--<h1 class="display-4">Pricing</h1>--}}
        {{--<p class="lead">Quickly build an effective pricing table for your potential customers with this Bootstrap example. It's built with default Bootstrap components and utilities with little customization.</p>--}}
    {{--</div>--}}
    {{--<div class="card-deck mb-3 text-center" id="mycards">--}}
        {{--<div class="card mb-4 box-shadow">--}}
            {{--<div class="card-header">--}}
                {{--<h4 class="my-0 font-weight-normal">Free</h4>--}}
            {{--</div>--}}
            {{--<div class="card-body">--}}
                {{--<h1 class="card-title pricing-card-title">$0 <small class="text-muted">/ mo</small></h1>--}}
                {{--<ul class="list-unstyled mt-3 mb-4">--}}
                    {{--<li>10 users included</li>--}}
                    {{--<li>2 GB of storage</li>--}}
                    {{--<li>Email support</li>--}}
                    {{--<li>Help center access</li>--}}
                {{--</ul>--}}
                {{--<button type="button" class="btn btn-lg btn-block btn-outline-primary">Sign up for free</button>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="card mb-4 box-shadow">--}}
            {{--<div class="card-header">--}}
                {{--<h4 class="my-0 font-weight-normal">Pro</h4>--}}
            {{--</div>--}}
            {{--<div class="card-body">--}}
                {{--<h1 class="card-title pricing-card-title">$15 <small class="text-muted">/ mo</small></h1>--}}
                {{--<ul class="list-unstyled mt-3 mb-4">--}}
                    {{--<li>20 users included</li>--}}
                    {{--<li>10 GB of storage</li>--}}
                    {{--<li>Priority email support</li>--}}
                    {{--<li>Help center access</li>--}}
                {{--</ul>--}}
                {{--<button type="button" class="btn btn-lg btn-block btn-primary">Get started</button>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="card mb-4 box-shadow">--}}
            {{--<div class="card-header">--}}
                {{--<h4 class="my-0 font-weight-normal">Enterprise</h4>--}}
            {{--</div>--}}
            {{--<div class="card-body">--}}
                {{--<h1 class="card-title pricing-card-title">$29 <small class="text-muted">/ mo</small></h1>--}}
                {{--<ul class="list-unstyled mt-3 mb-4">--}}
                    {{--<li>30 users included</li>--}}
                    {{--<li>15 GB of storage</li>--}}
                    {{--<li>Phone and email support</li>--}}
                    {{--<li>Help center access</li>--}}
                {{--</ul>--}}
                {{--<button type="button" class="btn btn-lg btn-block btn-primary">Contact us</button>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

    </div>


    <!-- Footer -->
    <footer class="page-footer font-small blue darken-4 pt-4">

        <!-- Footer Links -->
        <div class="container text-center text-md-left">

            <!-- Footer links -->
            <div class="row text-center text-md-left mt-3 pb-3">

                <!-- Grid column -->
                <div class="col-md-8 col-lg-8 col-xl-8 mx-auto mt-3">
                    <h6 class="text-uppercase mb-4 font-weight-bold">SM-dev</h6>
                    <p>Empresa tecnologica de desarrollo web, enfocada en soluciones para el sector educativo publico y privado.</p>
                    <p>Innovación de hoy para el éxito del mañana.</p>
                </div>
                <!-- Grid column -->

                <hr class="w-100 clearfix d-md-none">

                <!-- Grid column -->
                
                <!-- Grid column -->

                <hr class="w-100 clearfix d-md-none">

                <!-- Grid column -->
               

                <!-- Grid column -->
                <hr class="w-100 clearfix d-md-none">

                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h6 class="text-uppercase mb-4 font-weight-bold">Contacto</h6>
                    <p>
                        <i class="fa fa-home mr-3"></i>UNMSM</p>
                    <p>
                        <i class="fa fa-envelope mr-3"></i> jose.salazar1@unmsm.edu.pe</p>
                    <p>
                        <i class="fa fa-phone mr-3"></i> +51 992 159 321</p>
                </div>
                <!-- Grid column -->

            </div>
            <!-- Footer links -->

            <hr>

            <!-- Grid row -->
            <div class="row d-flex align-items-center">

                <!-- Grid column -->
                <div class="col-md-7 col-lg-8">

                    <!--Copyright-->
                    <p class="text-center text-md-left">© 2018 Copyright:
                        <a href="{{url('/')}}">
                            <strong> Agenda Académica</strong>
                        </a>
                    </p>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-5 col-lg-4 ml-lg-0">

                    <!-- Social buttons -->
                    <div class="text-center text-md-right">
                        <ul class="list-unstyled list-inline">
                            <li class="list-inline-item">
                                <a class="btn-floating btn-sm rgba-white-slight mx-1">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="btn-floating btn-sm rgba-white-slight mx-1">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="btn-floating btn-sm rgba-white-slight mx-1">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a class="btn-floating btn-sm rgba-white-slight mx-1">
                                    <i class="fa fa-linkedin"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row -->

        </div>
        <!-- Footer Links -->

    </footer>
    <!-- Footer -->

    <!--Laravel mix JS compiled-->
    <script href="public/js/app.js"></script>



    </body>
</html>

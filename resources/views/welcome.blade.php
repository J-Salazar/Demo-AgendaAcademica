<!DOCTYPE html>

<html>
<head>
    <title>{{ Auth::user() }}</title>
    <meta charset="UTF-8">
    <meta charset="ISO-8859-1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.4/css/mdb.min.css" rel="stylesheet">

    <link href="{{ asset('/css/mycss.css') }}" rel="stylesheet">

    <style>
        .ml-6{
            margin-left:3.5rem!important
        }
        .ml-7{
            margin-left: 4rem!important;
        }
        .ml-8{
            margin-left: 4.5rem!important;
        }
        .ml-9{
            margin-left: 5rem!important;
        }
        .ml-10{
            margin-left: 5.5rem!important;
        }

        @media screen and (max-width: 992px)  {

            img.mylogo {

                display: block !important;
                margin-left: auto !important;
                margin-right: auto !important;
                width: 50% !important;
                height: 50% !important;
            }



        }

        @media screen and (min-width: 993px)  {

            img.mylogo {

                display: block !important;
                margin-left: auto !important;
                margin-right: auto !important;
                width: 75% !important;
                height: 75% !important;
            }


        }


        @media screen and (max-width: 768px)  {



            a.mybutton{
                display: block !important;
                margin-left: auto !important;
                margin-right: auto !important;
                padding: 11px !important;
                font-size: 12px !important;

            }


        }

        @media (max-width: 845px) {
            #mycards {
                -ms-flex-flow: row wrap !important;
                flex-flow: row wrap !important;
                margin-right: -15px !important;
                margin-left: -15px !important;
            }

            #mycards  {
                display: -ms-flexbox !important;
                display: flex !important;
                -ms-flex: 1 0 0% !important;
                flex: 1 0 0% !important;
                -ms-flex-direction: column !important;
                flex-direction: column !important;
                margin-right: 15px !important;
                margin-bottom: 0 !important;
                margin-left: 15px !important;
            }
        }
    </style>

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
        <h2 class="h1-responsive font-weight-bold text-center my-5">Why is it so great?</h2>
        <!-- Section description -->
        <p class="lead grey-text text-center w-responsive mx-auto mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>

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
                        <p class="grey-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                        <a class="btn btn-primary btn-sm">Learn more</a>
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
                        <h4 class="font-weight-bold">Customization</h4>
                        <p class="grey-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                        <a class="btn btn-pink btn-sm">Learn more</a>
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
                        <h4 class="font-weight-bold">Support</h4>
                        <p class="grey-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                        <a class="btn btn-purple btn-sm">Learn more</a>
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

    <!-- Section: Team v.3 -->
    <section class="team-section my-5">

        <!-- Section heading -->
        <h2 class="h1-responsive font-weight-bold text-center my-5">Our amazing team</h2>
        <!-- Section description -->
        <p class="grey-text text-center w-responsive mx-auto mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit, error amet numquam iure provident voluptate esse quasi, veritatis totam voluptas nostrum quisquam eum porro a pariatur veniam.</p>

        <!-- Grid row-->
        <div class="row text-center text-md-left">

            <!-- Grid column -->
            <div class="col-lg-6 col-md-12 mb-5">
                <div class="col-md-4 col-lg-6 float-left">
                    <div class="avatar mx-auto mb-md-0 mb-4">
                        <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(32).jpg" class="rounded z-depth-1" alt="Sample avatar">
                    </div>
                </div>
                <div class="col-md-8 col-lg-6 float-right">
                    <h4 class="font-weight-bold mb-3">John Doe</h4>
                    <h6 class="font-weight-bold grey-text mb-3">Web Designer</h6>
                    <p class="grey-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod eos id officiis hic tenetur.</p>
                    <!-- Facebook-->
                    <a class="p-2 fa-lg fb-ic">
                        <i class="fa fa-facebook"> </i>
                    </a>
                    <!-- Twitter -->
                    <a class="p-2 fa-lg tw-ic">
                        <i class="fa fa-twitter"> </i>
                    </a>

                </div>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-lg-6 col-md-12 mb-5">
                <div class="col-md-4 col-lg-6 float-left">
                    <div class="avatar mx-auto mb-md-0 mb-4">
                        <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(20).jpg" class="rounded z-depth-1" alt="Sample avatar">
                    </div>
                </div>
                <div class="col-md-8 col-lg-6 float-right">
                    <h4 class="font-weight-bold mb-3">Maria Kate</h4>
                    <h6 class="font-weight-bold grey-text mb-3">Photographer</h6>
                    <p class="grey-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod eos id officiis hic tenetur.</p>
                    <!-- Facebook-->
                    <a class="p-2 fa-lg fb-ic">
                        <i class="fa fa-facebook"> </i>
                    </a>
                    <!--YouTube -->
                    <a class="p-2 fa-lg yt-ic">
                        <i class="fa fa-youtube"> </i>
                    </a>
                    <!--Instagram-->
                    <a class="p-2 fa-lg ins-ic">
                        <i class="fa fa-instagram"> </i>
                    </a>
                </div>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-lg-6 col-md-12 mb-5">
                <div class="col-md-4 col-lg-6 float-left">
                    <div class="avatar mx-auto mb-md-0 mb-4">
                        <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(32).jpg" class="rounded z-depth-1" alt="Sample avatar">
                    </div>
                </div>
                <div class="col-md-8 col-lg-6 float-right">
                    <h4 class="font-weight-bold mb-3">John Doe</h4>
                    <h6 class="font-weight-bold grey-text mb-3">Web Designer</h6>
                    <p class="grey-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod eos id officiis hic tenetur.</p>
                    <!-- Facebook-->
                    <a class="p-2 fa-lg fb-ic">
                        <i class="fa fa-facebook"> </i>
                    </a>
                    <!-- Twitter -->
                    <a class="p-2 fa-lg tw-ic">
                        <i class="fa fa-twitter"> </i>
                    </a>

                </div>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-lg-6 col-md-12 mb-5">
                <div class="col-md-4 col-lg-6 float-left">
                    <div class="avatar mx-auto mb-md-0 mb-4">
                        <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(20).jpg" class="rounded z-depth-1" alt="Sample avatar">
                    </div>
                </div>
                <div class="col-md-8 col-lg-6 float-right">
                    <h4 class="font-weight-bold mb-3">Maria Kate</h4>
                    <h6 class="font-weight-bold grey-text mb-3">Photographer</h6>
                    <p class="grey-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod eos id officiis hic tenetur.</p>
                    <!-- Facebook-->
                    <a class="p-2 fa-lg fb-ic">
                        <i class="fa fa-facebook"> </i>
                    </a>
                    <!--YouTube -->
                    <a class="p-2 fa-lg yt-ic">
                        <i class="fa fa-youtube"> </i>
                    </a>
                    <!--Instagram-->
                    <a class="p-2 fa-lg ins-ic">
                        <i class="fa fa-instagram"> </i>
                    </a>
                </div>
            </div>
            <!-- Grid column -->

        </div>
        <!-- Grid row-->

        <!-- Grid row-->
        <div class="row text-center text-md-left">



        </div>
        <!-- Grid row-->

    </section>
    <!-- Section: Team v.3 -->


    <!-- Section: Testimonials v.3 -->
    <section class="team-section text-center my-5">

        <!-- Section heading -->
        <h2 class="h1-responsive font-weight-bold my-5">Testimonials v.3</h2>
        <!-- Section description -->
        <p class="dark-grey-text w-responsive mx-auto mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit, error amet numquam iure provident voluptate esse quasi, veritatis totam voluptas nostrum quisquam eum porro a pariatur veniam.</p>

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
                    <h6 class="font-weight-bold blue-text my-3">Web Designer</h6>
                    <p class="font-weight-normal dark-grey-text">
                        <i class="fa fa-quote-left pr-2"></i>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod eos id officiis hic tenetur quae quaerat ad velit ab hic tenetur.</p>
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
                    <h6 class="font-weight-bold blue-text my-3">Web Developer</h6>
                    <p class="font-weight-normal dark-grey-text">
                        <i class="fa fa-quote-left pr-2"></i>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid commodi.</p>
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
                    <h6 class="font-weight-bold blue-text my-3">Photographer</h6>
                    <p class="font-weight-normal dark-grey-text">
                        <i class="fa fa-quote-left pr-2"></i>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti.</p>
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




    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4">Pricing</h1>
        <p class="lead">Quickly build an effective pricing table for your potential customers with this Bootstrap example. It's built with default Bootstrap components and utilities with little customization.</p>
    </div>
    <div class="card-deck mb-3 text-center" id="mycards">
        <div class="card mb-4 box-shadow">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal">Free</h4>
            </div>
            <div class="card-body">
                <h1 class="card-title pricing-card-title">$0 <small class="text-muted">/ mo</small></h1>
                <ul class="list-unstyled mt-3 mb-4">
                    <li>10 users included</li>
                    <li>2 GB of storage</li>
                    <li>Email support</li>
                    <li>Help center access</li>
                </ul>
                <button type="button" class="btn btn-lg btn-block btn-outline-primary">Sign up for free</button>
            </div>
        </div>
        <div class="card mb-4 box-shadow">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal">Pro</h4>
            </div>
            <div class="card-body">
                <h1 class="card-title pricing-card-title">$15 <small class="text-muted">/ mo</small></h1>
                <ul class="list-unstyled mt-3 mb-4">
                    <li>20 users included</li>
                    <li>10 GB of storage</li>
                    <li>Priority email support</li>
                    <li>Help center access</li>
                </ul>
                <button type="button" class="btn btn-lg btn-block btn-primary">Get started</button>
            </div>
        </div>
        <div class="card mb-4 box-shadow">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal">Enterprise</h4>
            </div>
            <div class="card-body">
                <h1 class="card-title pricing-card-title">$29 <small class="text-muted">/ mo</small></h1>
                <ul class="list-unstyled mt-3 mb-4">
                    <li>30 users included</li>
                    <li>15 GB of storage</li>
                    <li>Phone and email support</li>
                    <li>Help center access</li>
                </ul>
                <button type="button" class="btn btn-lg btn-block btn-primary">Contact us</button>
            </div>
        </div>
    </div>

    </div>


    <!-- Footer -->
    <footer class="page-footer font-small blue darken-4 pt-4">

        <!-- Footer Links -->
        <div class="container text-center text-md-left">

            <!-- Footer links -->
            <div class="row text-center text-md-left mt-3 pb-3">

                <!-- Grid column -->
                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h6 class="text-uppercase mb-4 font-weight-bold">Company name</h6>
                    <p>Here you can use rows and columns here to organize your footer content. Lorem ipsum dolor sit amet, consectetur
                        adipisicing elit.</p>
                </div>
                <!-- Grid column -->

                <hr class="w-100 clearfix d-md-none">

                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                    <h6 class="text-uppercase mb-4 font-weight-bold">Products</h6>
                    <p>
                        <a href="#!">MDBootstrap</a>
                    </p>
                    <p>
                        <a href="#!">MDWordPress</a>
                    </p>
                    <p>
                        <a href="#!">BrandFlow</a>
                    </p>
                    <p>
                        <a href="#!">Bootstrap Angular</a>
                    </p>
                </div>
                <!-- Grid column -->

                <hr class="w-100 clearfix d-md-none">

                <!-- Grid column -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                    <h6 class="text-uppercase mb-4 font-weight-bold">Useful links</h6>
                    <p>
                        <a href="#!">Your Account</a>
                    </p>
                    <p>
                        <a href="#!">Become an Affiliate</a>
                    </p>
                    <p>
                        <a href="#!">Shipping Rates</a>
                    </p>
                    <p>
                        <a href="#!">Help</a>
                    </p>
                </div>

                <!-- Grid column -->
                <hr class="w-100 clearfix d-md-none">

                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
                    <p>
                        <i class="fa fa-home mr-3"></i> New York, NY 10012, US</p>
                    <p>
                        <i class="fa fa-envelope mr-3"></i> info@gmail.com</p>
                    <p>
                        <i class="fa fa-phone mr-3"></i> + 01 234 567 88</p>
                    <p>
                        <i class="fa fa-print mr-3"></i> + 01 234 567 89</p>
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
                        <a href="https://mdbootstrap.com/bootstrap-tutorial/">
                            <strong> MDBootstrap.com</strong>
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>


    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.4/js/mdb.min.js"></script>



    </body>
</html>

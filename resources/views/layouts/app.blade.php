<!doctype html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">



<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">



    <!-- CSRF Token -->

    <meta name="csrf-token" content="{{ csrf_token() }}">



    <title>Admin IDO</title>



    <!-- Scripts -->

    <script src="{{ asset('js/app.js') }}" defer></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>

    <script src="dist/js/adminlte.js"></script>



    <!-- Font Awesome Icons -->

    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}} ">

    <link rel="stylesheet" href="{{asset('assets/js/boostrap-fileinput/css/fileinput.min.css')}} " rel="stylesheet" type="text/css"/>



    <!-- Fonts -->

    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">



    <!-- Styles -->

    <link href="{{ asset('dist/css/adminlte.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>



<body class="hold-transition sidebar-mini layout-fixed">

<div id="app">





        <!-- Navbar -->

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

            <!-- Left navbar links -->

            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="{{'/inicio'}}"><i class="fas fa-bars"></i></a>


                </li>

            </ul>



            <!-- SEARCH FORM -->

            <form class="form-inline ml-3">

                <div class="input-group input-group-sm">

                    <input class="form-control form-control-navbar" name="search" type="search" placeholder="Search"

                           aria-label="Search">

                    <div class="input-group-append">

                        <button class="btn btn-navbar" type="submit">

                            <i class="fas fa-search"></i>

                        </button>

                    </div>

                </div>

            </form>



            <!-- Right navbar links -->

            <ul class="navbar-nav ml-auto">

                <!-- Messages Dropdown Menu -->

                <li class="nav-item dropdown">

                    <a class="nav-link" data-toggle="dropdown" href="#">

                        <i class="fas fa-bell mr-2"></i>

                        <span class="badge badge-danger navbar-badge">3</span>

                    </a>

                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                        <a href="" class="dropdown-item">

                            <!-- Message Start -->

                            <div class="media">

                                <img src="dist/img/user1-128x128.jpg" alt="User Avatar"

                                     class="img-size-50 mr-3 img-circle">

                                <div class="media-body">

                                    <h3 class="dropdown-item-title">

                                        Brad Diesel

                                        <span class="float-right text-sm text-danger"><i

                                                    class="fas fa-star"></i></span>

                                    </h3>

                                    <p class="text-sm">Call me whenever you can...</p>

                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>

                                </div>

                            </div>

                            <!-- Message End -->

                        </a>

                        <div class="dropdown-divider"></div>

                        <a href="" class="dropdown-item">

                            <!-- Message Start -->

                            <div class="media">

                                <img src="dist/img/user8-128x128.jpg" alt="User Avatar"

                                     class="img-size-50 img-circle mr-3">

                                <div class="media-body">

                                    <h3 class="dropdown-item-title">

                                        John Pierce

                                        <span class="float-right text-sm text-muted"><i

                                                    class="fas fa-star"></i></span>

                                    </h3>

                                    <p class="text-sm">I got your message bro</p>

                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>

                                </div>

                            </div>

                            <!-- Message End -->

                        </a>

                        <div class="dropdown-divider"></div>

                        <a href="" class="dropdown-item">

                            <!-- Message Start -->

                            <div class="media">

                                <img src="dist/img/user3-128x128.jpg" alt="User Avatar"

                                     class="img-size-50 img-circle mr-3">

                                <div class="media-body">

                                    <h3 class="dropdown-item-title">

                                        Nora Silvester

                                        <span class="float-right text-sm text-warning"><i

                                                    class="fas fa-star"></i></span>

                                    </h3>

                                    <p class="text-sm">The subject goes here</p>

                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>

                                </div>

                            </div>

                            <!-- Message End -->

                        </a>

                        <div class="dropdown-divider"></div>

                        <a href="" class="dropdown-item dropdown-footer">See All Messages</a>

                    </div>

                </li>

                <!-- Notifications Dropdown Menu -->

                <li class="nav-item dropdown">

                    <a class="nav-link" data-toggle="dropdown" href="#">

                        <i class="fas fa-ellipsis-v mr-2"></i>

                        <span class="badge badge-warning navbar-badge"></span>

                    </a>

                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">


                        <div class="dropdown-divider"></div>

                        <a href="#" class="dropdown-item">

                            <i  class="fas fa-cog mr-2"  href="{{ route('logout') }}" onclick="event.preventDefault();

                                           document.getElementById('logout-form').submit();">

                                Configuraciones

                            </i>


                        </a>

                        <a href="#" class="dropdown-item">

                             <i  class="fas fa-sign-out-alt mr-2"  href="{{ route('logout') }}" onclick="event.preventDefault();

                                           document.getElementById('logout-form').submit();">

                                Cerrar Sesión

                            </i>


                        </a>


                        <div class="dropdown-divider"></div>



                    </div>

                </li>

            </ul>

        </nav>

        <!-- /.navbar -->



        <!-- Main Sidebar Container -->

        <aside class="main-sidebar sidebar-dark-primary elevation-4">

            <!-- Brand Logo -->

            <a href="{{ url('/inicio') }}" class="brand-link">

                <img src="{{ asset('dist/img/idologo.jpg')}} " alt="AdminLTE Logo" class="brand-image img-circle elevation-3"

                     style="opacity: .8">

                <span class="brand-text font-weight-light">Administración</span>

            </a>




            <!-- Sidebar -->

            <div class="sidebar">

                <!-- Sidebar user panel (optional) -->

                <div class="user-panel mt-3 pb-3 mb-3 d-flex">

                    <div class="image">

                        <img src="{{asset('dist/img/avatar.png')}} " class="img-circle elevation-2" alt="User Image">

                    </div>

                    <div class="info">

                        <a href="#" class="d-block">

                            @guest

                                <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>

                            @else

                                {{ Auth::user()->name }}





                                <form id="logout-form" action="{{ route('logout') }}" method="POST"

                                      style="display: none;">

                                    @csrf

                                </form>



                            @endguest

                        </a>

                    </div>

                </div>



                <!-- Sidebar Menu -->

                <nav class="mt-2">

                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"

                        data-accordion="false">



                        <li class="nav-item">

                            <a href="/inicio" class="{{ Request::path() === '/' ? 'nav-link active' : 'nav-link' }}">

                                <i class="nav-icon fas fa-home"></i>

                                <p>Inicio</p>

                            </a>

                        </li>



                        <li class="nav-item">

                            <a href="/usuarios"

                               class="{{ Request::path() === 'usuarios' ? 'nav-link active' : 'nav-link' }}">

                                <i class="nav-icon fas fa-users"></i>

                                <p>

                                    Usuarios

                                    <?php use App\User; $users_count = User::all()->count(); ?>

                                    <span class="right badge badge-danger">{{ $users_count ?? '0' }}</span>

                                </p>

                            </a>

                        </li>

                        <li class="nav-item">

                            <a href="/grupos"

                               class="{{ Request::path() === 'grupos' ? 'nav-link active' : 'nav-link' }}">

                                <i class="nav-icon fas fa-layer-group"></i>

                                <p>

                                    Grupos

                                    <?php use App\Grupo; $users_count = Grupo::where('Jornada','!=', null)->orwhere('Jornada','!=', '')->where('Grupo','!=', null)->orwhere('Grupo','!=', '')->
                                    where('Modulo','!=', null)->orwhere('Modulo','!=', '')->where('Jornada','!=', 'Isemed')->count(); ?>

                                    <span class="right badge badge-danger">{{ $users_count ?? '0' }}</span>

                                </p>

                            </a>

                        </li>



                        <li class="nav-item has-treeview">

                            <a href="#" class="nav-link">

                                <i class="nav-icon far fa-sticky-note"></i>

                                <p>Variables de grupo<i class="fas fa-angle-left right"></i></p>

                            </a>

                            <ul class="nav nav-treeview">

                                <li class="nav-item">

                                    <a href="modalidades"

                                       class="{{ Request::path() === 'modalidades' ? 'nav-link active' : 'nav-link' }}">

                                        <i class="far fa-circle nav-icon"></i>

                                        <p>Modalidades</p>

                                    </a>

                                </li>

                                <li class="nav-item">

                                    <a href="modulos"

                                       class="{{ Request::path() === 'modulos' ? 'nav-link active' : 'nav-link' }}">

                                        <i class="far fa-circle nav-icon"></i>

                                        <p>Modulos</p>

                                    </a>

                                </li>



                            </ul>

                        </li>



                    </ul>

                </nav>

                <!-- /.sidebar-menu -->

            </div>

            <!-- /.sidebar -->

        </aside>



        <!-- Content Wrapper. Contains page content -->

        <div class="content-wrapper">

            <!-- Content Header (Page header) -->

            <div class="content-header">



            </div>

            <!-- /.content-header -->



            <!-- Main content -->

            <section class="content">



                @yield('content')
             </section>

            <!-- /.content -->

        </div>

        <!-- /.content-wrapper -->

        <footer class="main-footer">

            <!-- NO QUITAR -->

            <strong>Derechos Reservados &copy; INFO-TECNOLOGIA IDO {{date("Y")}}

                <div class="float-right d-none d-sm-inline-block">

                    <b>Version</b> 1.0

                </div>
            </strong>
        </footer>




        <!-- Control Sidebar -->

        <aside class="control-sidebar control-sidebar-dark">

            <!-- Control sidebar content goes here -->

        </aside>

        <!-- /.control-sidebar -->

    </div>

<script src="{{asset("js/jquery.min.js")}}"></script>
<script src="{{asset("js/bootstrap.bundle.min.js")}}"></script>


 <script

     src="{{asset('/js/boostrap-fileinput/js/fileinput.min.js')}} " type="text/javascript"

></script>
<script

         src="{{asset('/js/boostrap-fileinput/themes/fas/theme.min.js')}} " type="text/javascript"

></script>


<script

        src="{{asset('assets/js/boostrap-fileinput/js/locales/es.js')}} " type="text/javascript"

></script>





</body>



</html>
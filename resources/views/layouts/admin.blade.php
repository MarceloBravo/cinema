<!DOCTYPE html>
<html class="app-ui">

    <head>
        <!-- Meta -->
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />

        <!-- Document title -->
        <title>Cinema admin</title>

        <meta name="description" content="Cinema - Admin Dashboard Template & UI Framework" />
        <meta name="author" content="rustheme" />
        <meta name="robots" content="noindex, nofollow" />

        <!-- Favicons -->
        <link rel="apple-touch-icon" href="{{asset('appui/img/favicons/apple-touch-icon.png')}}" />
        <link rel="icon" href="{{asset('appui/img/favicons/favicon.ico')}}" />

        <!-- Google fonts -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,900%7CRoboto+Slab:300,400%7CRoboto+Mono:400" />

        <!-- AppUI CSS stylesheets -->        
        <link rel="stylesheet" href="{{asset('appui/css/font-awesome.css')}}" />
        <link rel="stylesheet" href="{{asset('appui/css/ionicons.css')}}" />
        <link rel="stylesheet" href="{{asset('appui/css/bootstrap.css')}}" />
        <link rel="stylesheet" href="{{asset('appui/css/app.css')}}" />
        <link rel="stylesheet" href="{{asset('appui/css/app-custom.css')}}" />
        <link rel="stylesheet" href="{{asset('css/generic.css')}}" /> 
        @yield('style')       
        <!-- End Stylesheets -->
        @yield('jquery')
        
        <script src="{{asset('js/generic.js')}}"></script>
    </head>

    <body class="app-ui layout-has-drawer layout-has-fixed-header">
        <div class="app-layout-canvas">
            <div class="app-layout-container">

                <!-- Drawer -->
                <aside class="app-layout-drawer">

                    <!-- Drawer scroll area -->
                    <div class="app-layout-drawer-scroll">
                        <!-- Drawer logo -->
                        <div id="logo" class="drawer-header">
                            <!-- <a href="index.html"><img class="img-responsive" src="{{asset('appui/img/logo/logo-backend.png')}}" title="AppUI" alt="AppUI" /></a> -->
                        </div>

                        <!-- Drawer navigation -->
                        <nav class="drawer-main">
                            <ul class="nav nav-drawer">

                                <li class="nav-item nav-drawer-header">Cinema</li>

                                <li class="nav-item">
                                    <a href="{{ url('/logout')}}"><i class="ion-ios-speedometer-outline"></i> Página web</a>
                                </li>
                                
                                <li class="nav-item nav-item-has-subnav active open">
                                    <a href="javascript:void(0)"><i class="ion-ios-compose-outline"></i> Mantenedores</a>
                                    <ul class="nav nav-subnav">
                                        <li>
                                            <a href="{{ url('/generos') }}">Generos</a>
                                        </li>

                                        <li>
                                            <a href="{{ url('/movies')}}">Peliculas</a>
                                        </li>

                                        <li class="active">
                                            <a href="{{ url('/repository') }}">Repositorio</a>
                                        </li>
                                        
                                        <li class="active">
                                            <a href="{{ url('/noticias') }}">Noticias</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item nav-item-has-subnav active open">
                                    <a href="javascript:void(0)"><i class="ion-ios-compose-outline"></i> Panel de control</a>
                                    <ul class="nav nav-subnav">

                                        <li>
                                            <a href="{{ url('/roles')}}">Roles</a>
                                        </li>

                                        <li>
                                            <a href="{{ url('/usuarios')}}">Usuarios</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/config')}}">Configuración</a>
                                        </li>

                                        

                                    </ul>
                                </li>

                            </ul>
                        </nav>
                        <!-- End drawer navigation -->
                    </div>
                    <!-- End drawer scroll area -->
                </aside>
                <!-- End drawer -->

                <!-- Header -->
                <header class="app-layout-header">
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            

                            <div class="collapse navbar-collapse" id="header-navbar-collapse">
                                <!-- Header search form -->
                                
                                <ul id="main-menu" class="nav navbar-nav navbar-left">
                                    
                                    <li class="dropdown">
                                        <a href="#" data-toggle="dropdown">Pages <span class="caret"></span></a>

                                        <ul class="dropdown-menu">
                                            <li><a href="javascript:void(0)">Analytics</a></li>
                                            <li><a href="javascript:void(0)">Visits</a></li>
                                            <li><a href="javascript:void(0)">Changelog</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <!-- .navbar-left -->

                                <ul class="nav navbar-nav navbar-right navbar-toolbar hidden-sm hidden-xs">
                                    <li>
                                        <!-- Opens the modal found at the bottom of the page -->
                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#apps-modal"><i class="ion-grid"></i></a>
                                    </li>

                                    <li class="dropdown">
                                        <a href="javascript:void(0)" data-toggle="dropdown"><i class="ion-ios-bell"></i> <span class="badge">3</span></a>
                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li class="dropdown-header">Profile</li>
                                            <li>
                                                <a tabindex="-1" href="javascript:void(0)"><span class="badge pull-right">3</span> News </a>
                                            </li>
                                            <li>
                                                <a tabindex="-1" href="javascript:void(0)"><span class="badge pull-right">1</span> Messages </a>
                                            </li>
                                            <li class="divider"></li>
                                            <li class="dropdown-header">More</li>
                                            <li>
                                                <a tabindex="-1" href="javascript:void(0)">Edit Profile..</a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="dropdown dropdown-profile">
                                        <a href="javascript:void(0)" data-toggle="dropdown">
                                            <span class="m-r-sm">{{ Auth::user()->name }} <span class="caret"></span></span>
                                            <img class="img-avatar img-avatar-48" src="{{asset('appui/img/avatars/avatar3.jpg')}}" alt="User profile pic" />
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li class="dropdown-header">
                                                Pages
                                            </li>
                                            <li>
                                                <a href="base_pages_profile.html">Profile</a>
                                            </li>
                                            <li>
                                                <a href="base_pages_profile.html"><span class="badge badge-success pull-right">3</span> Blog</a>
                                            </li>
                                            <li>
                                                <a href="logout">Salir</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <!-- .navbar-right -->
                            </div>
                        </div>
                        <!-- .container-fluid -->
                    </nav>
                    <!-- .navbar-default -->
                </header>
                <!-- End header -->

                <main class="app-layout-content">


                    @yield('content')

                </main>


            </div>
            <!-- .app-layout-container -->
        </div>
        <!-- .app-layout-canvas -->

        <!-- Apps Modal -->
        <!-- Opens from the button in the header -->
        <div id="apps-modal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-sm modal-dialog modal-dialog-top">
                <div class="modal-content">
                    <!-- Apps card -->
                    <div class="card m-b-0">
                        <div class="card-header bg-app bg-inverse">
                            <h4>Apps</h4>
                            <ul class="card-actions">
                                <li>
                                    <button data-dismiss="modal" type="button"><i class="ion-close"></i></button>
                                </li>
                            </ul>
                        </div>
                        <div class="card-block">
                            <div class="row text-center">
                                <div class="col-xs-6">
                                    <a class="card card-block m-b-0 bg-app-secondary bg-inverse" href="index.html">
                                        <i class="ion-speedometer fa-4x"></i>
                                        <p>Admin</p>
                                    </a>
                                </div>
                                <div class="col-xs-6">
                                    <a class="card card-block m-b-0 bg-app-tertiary bg-inverse" href="frontend_home.html">
                                        <i class="ion-laptop fa-4x"></i>
                                        <p>Frontend</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- .card-block -->
                    </div>
                    <!-- End Apps card -->
                </div>
            </div>
        </div>
        <!-- End Apps Modal -->

        <div class="app-ui-mask-modal"></div>

        <!-- AppUI Core JS: jQuery, Bootstrap, slimScroll, scrollLock and App.js -->
        <script src="{{asset('appui/js/core/jquery.min.js')}}"></script>
        <script src="{{asset('appui/js/core/bootstrap.min.js')}}"></script>
        <script src="{{asset('appui/js/core/jquery.slimscroll.min.js')}}"></script>
        <script src="{{asset('appui/js/core/jquery.scrollLock.min.js')}}"></script>
        <script src="{{asset('appui/js/core/jquery.placeholder.min.js')}}"></script>
        <script src="{{asset('appui/js/app.js')}}"></script>
        <script src="{{asset('appui/js/app-custom.js')}}"></script>        

        @yield('script')

        <!-- Page JS Plugins -->
        <script src="{{asset('appui/js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>

        <!-- Page JS Code -->
        <script src="{{asset('appui/js/pages/base_forms_validation.js')}}"></script>

    </body>

</html>


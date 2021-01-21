<!-- 
Redirect para homepage caso não seja o admin
Autor: Afonso Vitório
-->
@if (session('tipo_conta') != 1)
<script> setTimeout(function(){window.location='/home'}); </script>

@endif


{{-- //Author: Guilherme Jafar--}}
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
    <script src="https://kit.fontawesome.com/644b3bfa86.js" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/ourApp.css') }}" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>

<div id="app">
    <section>
        <nav class="navbar navbar-expand-md navbar-light shadow-sm">


            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <a class="navbar-brand" href="/"><img src="{{ asset('img/logo2.png') }}" class="img-responsive " ></a>
                </ul>

                @if(Request::is('loginWorker'))
                    <div class="collapse navbar-collapse navbar-center">
                        @yield('nav-c')
                    </div>
            @endif

            <!-- Right Side Of Navbar -->
                <div class="collapse navbar-collapse navbar-right" id="myNavbar">
                    <ul class="nav navbar-nav right-nav">

{{--                        @yield('nav')--}}
                        <li class="nav-item avatar dropdown d-flex align-items-center">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-55" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                <img src="{{url('images/') . "/" . session('imagePath')}}" class="rounded-circle z-depth-0"
                                     alt="avatar image">
                                {{ session('nome') }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink-55">
                                <a class="dropdown-item" href="/perfil">
                                    <span>Editar Perfil</span>
                                </a>
                                <a class="dropdown-item" href="/logout">
                                    <span>Log Out</span>
                                </a>

                            </div>

                        </li>

                        <li class="nav-item dropdown notifications-nav pr-md-3 align-items-center mx-auto" style="margin: auto; padding-left: 2rem">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink151" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="true">
                                <span class="badge badge-pill bg-danger">1</span>
                                <span><i class="fas fa-bell"></i></span>
                            </a>

                        {{-- inserir notificações aqui --}}

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink151">
                                <a class="dropdown-item" href="#!">

                                    <span>Nova consulta aceite</span>
                                    <span class="float-right"><i class="far fa-clock" aria-hidden="true"></i> 13 min</span>
                                </a>
                                <a class="dropdown-item" href="#!">

                                    <span>Consulta desmarcada com sucesso</span>
                                    <span class="float-right"><i class="far fa-clock" aria-hidden="true"></i> 33 min</span>
                                </a>
                            </div>
                        </li>


                       <li  ></li>

                    </ul>
                </div>
            </div>

        </nav>
    </section>



    <main class="main" >

        <section>
            <div class="container-fluid" >
                <div class="row" >
                    <div class="col-md-3" style="border-right: 1px solid #F09C86">
                        <div class="menu">
                            <ul>
                                <li><a href="/dashboardutente"  class="@if(strpos(Request::url() , 'dashboardutente')){{ 'active' }}@endif" ><i class="fa fa-home"></i> Dashboard</a></li>
                                <li><a href="/novaconsulta" class="@if (strpos(Request::url() , 'novaconsulta')){{ 'active' }} @endif " ><i class="fa fa-check-square-o"></i> Marcar Consulta</a></li>
                                <li><a href="/historicoconsulta" class="@if (strpos(Request::url() , 'historicoconsulta')){{ 'active' }}@endif " ><i class="fa fa-list"></i> Histórico Consultas</a></li>
                                <li><a href="/desmarcarConsultaUtente" class="@if (strpos(Request::url() , 'desmarcarConsultaUtente')){{ 'active' }}@endif " ><i class="fa fa-minus-circle"></i> Desmarcar Consulta</a></li>
                                <li class="logout text-center">
                                    <a href="/logout">Log Out</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="dashboard">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>





    <footer id="footer">
{{--            <div class="top-footer">--}}
{{--                <div class="container">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-4 col-sm-4 marb20">--}}
{{--                            <div class="ftr-tle">--}}
{{--                                <h4 class="white no-padding">Sobre Nós</h4>--}}
{{--                            </div>--}}
{{--                            <div class="info-sec">--}}
{{--                                <p>Somos uma equipa de estudantes de engenharia informática da ESTGOH 3ºano!</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-4 col-sm-4 marb20">--}}
{{--                            <div class="ftr-tle">--}}
{{--                                <h4 class="white no-padding">Quick Links</h4>--}}
{{--                            </div>--}}
{{--                            <div class="info-sec">--}}
{{--                                <ul class="quick-info">--}}
{{--                                    <li><a href="#banner"><i class="fa fa-circle"></i>Home</a></li>--}}
{{--                                    <li><a href="#service"><i class="fa fa-circle"></i>Service</a></li>--}}
{{--                                    <li><a href="#"><i class="fa fa-circle"></i>Registo</a></li>--}}
{{--                                    <li><a href="#"><i class="fa fa-circle"></i>Login</a></li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-4 col-sm-4 marb20">--}}
{{--                            <div class="ftr-tle">--}}
{{--                                <h4 class="white no-padding">Sigam nos</h4>--}}
{{--                            </div>--}}
{{--                            <div class="info-sec">--}}
{{--                                <ul class="social-icon">--}}
{{--                                    <li class="bglight-blue"><i class="fa fa-facebook"></i></li>--}}
{{--                                    <li class="bgred"><i class="fa fa-google-plus"></i></li>--}}
{{--                                    <li class="bgdark-blue"><i class="fa fa-linkedin"></i></li>--}}
{{--                                    <li class="bglight-blue"><i class="fa fa-twitter"></i></li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        <div class="footer-line">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        © Copyright SCMed. All Rights Reserved
                        <div class="credits">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</div>


<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/jquery.easing.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
</body>
</html>

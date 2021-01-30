<!-- 
    Redirect para conta e verificação do remember me
    Autor: Afonso Vitório
-->
@if (session('tipo_conta') == 1 && Cookie::get('rememberMe') != null)
    <script> setTimeout(function(){window.location='/dashboardutente'}); </script>

@elseif (session('tipo_conta') == 2 && Cookie::get('rememberMe') != null)
    <script> setTimeout(function(){window.location='/inserirfuncionario'}); </script>

@elseif (session('tipo_conta') == 3 && Cookie::get('rememberMe') != null)
    <script> setTimeout(function(){window.location='/consultas'}); </script>

@elseif (session('tipo_conta') == 4 && Cookie::get('rememberMe') != null)
    <script> setTimeout(function(){window.location='/dashboardfuncionario'}); </script>

@elseif(session()->get('tipo_conta') != null)
    <script> setTimeout(function(){window.location='/logout'}); </script>

@endif



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
                            <a class="navbar-brand" href="/"><img src="{{ asset('img/logo2.png') }}" class="img-responsive"></a>
                        </ul>

                        @if(Request::is('loginWorker'))
                            <div class="collapse navbar-collapse navbar-center">
                                @yield('nav-c')
                            </div>
                        @endif

                        <!-- Right Side Of Navbar -->
                        <div class="collapse navbar-collapse navbar-right" id="myNavbar">
                            <ul class="nav navbar-nav">

                                   @yield('nav')
                            </ul>
                        </div>
                    </div>

            </nav>
        </section>

        <section class="content-log">
            <main>
                <div class="bg-log">
                    @yield('content')

                </div>
            </main>

            <footer id="footer">
                <div class="top-footer">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 col-sm-4 marb20">
                                <div class="ftr-tle">
                                    <h4 class="white no-padding">Sobre Nós</h4>
                                </div>
                                <div class="info-sec">
                                    <p>Somos uma equipa de estudantes de engenharia informática da ESTGOH 3ºano!</p>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 marb20">
                                <div class="ftr-tle">
                                    <h4 class="white no-padding">Quick Links</h4>
                                </div>
                                <div class="info-sec">
                                    <ul class="quick-info">
                                        <li><a href="#banner"><i class="fa fa-circle"></i>Home</a></li>
                                        <li><a href="#service"><i class="fa fa-circle"></i>Service</a></li>
                                        <li><a href="#"><i class="fa fa-circle"></i>Registo</a></li>
                                        <li><a href="#"><i class="fa fa-circle"></i>Login</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 marb20">
                                <div class="ftr-tle">
                                    <h4 class="white no-padding">Sigam nos</h4>
                                </div>
                                <div class="info-sec">
                                    <ul class="social-icon">
                                        <li class="bglight-blue"><i class="fa fa-facebook"></i></li>
                                        <li class="bgred"><i class="fa fa-google-plus"></i></li>
                                        <li class="bgdark-blue"><i class="fa fa-linkedin"></i></li>
                                        <li class="bglight-blue"><i class="fa fa-twitter"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
        </section>
    </div>


    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
</body>
</html>

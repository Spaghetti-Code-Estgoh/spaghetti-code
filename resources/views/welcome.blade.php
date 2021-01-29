<!-- 
    Redirect para conta e verificação do remember me
    Autor: Afonso Vitório
-->
@if (session('tipo_conta') == 1 && Cookie::get('rememberMe') != null)
    <script> setTimeout(function(){window.location='/dashboardutente'}); </script>

@elseif (session('tipo_conta') == 2 && Cookie::get('rememberMe') != null)
    <script> setTimeout(function(){window.location='/inserirfuncionario'}); </script>

@elseif (session('tipo_conta') == 3)
    <script> setTimeout(function(){window.location='/consultas'}); </script>

@elseif (session('tipo_conta') == 4 && Cookie::get('rememberMe') != null)
    <script> setTimeout(function(){window.location='/dashboardfuncionario'}); </script>

@elseif(session()->get('tipo_conta') != null)
    <script> setTimeout(function(){window.location='/logout'}); </script>

@endif

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SCMed</title>

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway|Candal">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/ourApp.css">
    <script src="https://kit.fontawesome.com/644b3bfa86.js" crossorigin="anonymous"></script>
</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
<!--banner-->
<section id="banner" class="banner">
    <div class="bg-color">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="col-md-12">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"><img src="img/logo2.png" class="img-responsive"></a>
                    </div>
                    <div class="collapse navbar-collapse navbar-right" id="myNavbar">
                        <ul class="nav navbar-nav">
                            <li class=""><a href="/login">Login</a></li>
                            <li class=""><a href="/register">Registo</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="banner-info">
                    <div class="banner-logo text-center">
                        <img src="img/logo.png" class="img-responsive" height="150" width="150">
                    </div>
                    <div class="banner-text text-center">
                        <h1 class="white">Get Scammed!!</h1>
                        <p>SCMed permite te realziar consultas e exames e gerires as mesmas tudo na mesma plataforma!<br> Acabou-se o ter de marcar pelo telemóvel!</p>
                    </div>
                    <div class="overlay-detail text-center">
                        <a href="#service"><i class="fa fa-angle-down"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ banner-->
<!--service-->
<section id="service" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-4">
                <h2 class="ser-title">Os Nossos Serviços</h2>
                <hr class="botm-line">
                <p>Nós tentámos realizar os serviços essencias para os nossos utentes sentirem como se tivessem a faze-los no hospital.</p>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="service-info">
                    <div class="icon">
                        <i class="fa fa-stethoscope"></i>
                    </div>
                    <div class="icon-info">
                        <h4>Marcação de consultas</h4>
                        <p>Marquem qualquer consulta para o dia e hora mais conveniente a partir de casa.</p>
                    </div>
                </div>
                <div class="service-info">
                    <div class="icon">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <div class="icon-info">
                        <h4>Agenda de Utente</h4>
                        <p>É possível gerir as suas consultas todas num só lugar, conseguindo ver toda informação relacionada
                        com qualquer consulta passada.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="service-info">
                    <div class="icon">
                        <i class="fa fa-user-md"></i>
                    </div>
                    <div class="icon-info">
                        <h4>Escolha o médico</h4>
                        <p>Escolha entre uma vasta equipa de profissionais para realizar a sua consulta!</p>
                    </div>
                </div>
                <div class="service-info">
                    <div class="icon">
                        <i class="fas fa-address-card"></i>
                    </div>
                    <div class="icon-info">
                        <h4>Toda a sua Informação em um lugar!</h4>
                        <p>Consegue ter um perfil completo com todas as suas informações e consultas realziadas.
                        Acabou-se ter de levar muita papelada para as consultas!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!--/ about-->
<!--doctor team-->
<section id="doctor-team" class="section-padding doctor">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="ser-title">Conheça os nosso médicos!</h2>
                <hr class="botm-line">
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6">
                <div class="thumbnail">
                    <img src="img/doctor1.jpg" alt="..." class="team-img">
                    <div class="caption">
                        <h3>Fábio Rodrigues</h3>
                        <p>Doctor</p>
                        <ul class="list-inline">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6">
                <div class="thumbnail">
                    <img src="img/doctor2.jpg" alt="..." class="team-img">
                    <div class="caption">
                        <h3>Alexandre Lopes</h3>
                        <p>Doctor</p>
                        <ul class="list-inline">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6">
                <div class="thumbnail">
                    <img src="img/doctor3.jpg" alt="..." class="team-img">
                    <div class="caption">
                        <h3>Fábio Dias</h3>
                        <p>Doctor</p>
                        <ul class="list-inline">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6">
                <div class="thumbnail">
                    <img src="img/doctor4.jpg" alt="..." class="team-img">
                    <div class="caption">
                        <h3>Fabian Nunes</h3>
                        <p>Doctor</p>
                        <ul class="list-inline">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ doctor team-->

<!--cta 2-->
<section id="cta-2" class="section-padding">
    <div class="container">
        <div class=" row">
            <div class="col-md-2"></div>
            <div class="text-right-md col-md-4 col-sm-4">
                <h2 class="section-title white lg-line">« Umas breves palavras<br> sobre SCMed »</h2>
            </div>
            <div class="col-md-4 col-sm-5">Nós tentamos criar o serviços mais simples e interativo para os nossos utentes conseguirem
                marcar as suas consultas o mais rápido possível!<p class="text-right text-primary"><i>— Spaghetti-Code</i></p>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</section>


<!--footer-->
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
<!--/ footer-->

<script src="js/jquery.min.js"></script>
<script src="js/jquery.easing.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/custom.js"></script>

</body>

</html>

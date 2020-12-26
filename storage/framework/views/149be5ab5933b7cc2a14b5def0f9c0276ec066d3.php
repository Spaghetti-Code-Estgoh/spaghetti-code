<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/644b3bfa86.js" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/main.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/ourApp.css">

</head>
<body>

    <div id="app">
        <section>
            <nav class="navbar navbar-expand-md navbar-light shadow-sm">


                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">
                            <a class="navbar-brand" href="/"><img src="img/logo2.png" class="img-responsive"></a>
                        </ul>

                        <?php if(Request::is('loginWorker')): ?>
                            <div class="collapse navbar-collapse navbar-center">
                                <?php echo $__env->yieldContent('nav-c'); ?>
                            </div>
                        <?php endif; ?>

                        <!-- Right Side Of Navbar -->
                        <div class="collapse navbar-collapse navbar-right" id="myNavbar">
                            <ul class="nav navbar-nav">

                                   <?php echo $__env->yieldContent('nav'); ?>
                            </ul>
                        </div>
                    </div>

            </nav>
        </section>

        <section class="content-log">
            <main>
                <div class="bg-log">
                    <?php echo $__env->yieldContent('content'); ?>

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


    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\spaghetti-code\resources\views/auth/passwords/pass_layout.blade.php ENDPATH**/ ?>
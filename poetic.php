<?php
session_start();
?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Prosa Poetíca</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <!-- Fluent Design Bootstrap -->
    <link rel="stylesheet" href="./css/fluent.css">
    <!-- Micon icons-->
    <link rel="stylesheet" href="./css/micon.min.css">
    <!--Custom style -->
    <style>
        /* Delete it if you don't want to have black/white colors and forced font-weight */

        body {
            background-color: #fff;
            color: #4A5459;
        }

        .font-weight-bold {
            font-weight: 600 !important;
        }

        h5,
        p {
            font-weight: 400;
        }
    </style>
    <link rel="shortcut icon" type="image/png" href="./img/backgrounds/favicon.png" >

</head>

<body>
    <header>
        <!--Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #2D7D9A;">

            <div class=" container">

                <!-- Collapse button -->
                <button class="navbar-toggler float-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Collapsible content -->
                <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">

                    <!-- Links -->
                    <ul class="navbar-nav">
                      
                    <li class="nav-item">
                            <a class="nav-link font-weight-bold" href="home.php">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font-weight-bold" href="maintenance.php">Bitácora</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link font-weight-bold" href="discover.php">Descubre</a>
                        </li>
                
                        <li class="nav-item">
                            <a class="nav-link font-weight-bold" href="logout.php">Salir</a>
                        </li>

                    </ul>
                    <!-- Links -->

                </div>
                <!-- CTA -->

            </div>

        </nav>
        <!--/.Navbar -->
    </header>

    <?php
    if (isset($_SESSION["usuario_valido"])) {
        ?>

        <!-- Begin page content -->
        <main role="main" class="container">
            <div class="container my-5">


                <!--Section: Content-->
                <section class="">

                    <!-- Section heading -->
                    <h3 class="text-center font-weight-bold mb-5">Descubre</h3>

                    <div class="row">

                        <!--Grid column-->
                        <div class="col-lg-3 col-md-6 mb-4 d-flex align-items-stretch">
                            <!--Card-->
                            <div class="card">

                                <!--Card image-->
                                <div class="view overlay">
                                    <img src="./img/backgrounds/prosa_poetica.svg" class="card-img-top" alt="">
                                    <a>
                                        <div class="nav-link"></div>
                                    </a>
                                </div>
                                <!--/.Card image-->

                                <!--Card content-->
                                <div class="card-body">
                                    <!--Title-->
                                    <a href="poetic.php">
                                        <h4 class="card-title" style="text-align:center; color: #2D7D9A !important;">
                                            <strong>Prosa Poetíca</strong></h4>
                                    </a>
                                    <!--Text-->

                                    <p class="text-right mb-0 font-small font-weight-bold"><a><i class="fas fa-angle-right"></i></a></p>
                                </div>
                                <!--/.Card content-->

                            </div>
                            <!--/.Card-->

                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-lg-3 col-md-6 mb-4 d-flex align-items-stretch">
                            <!--Card-->
                            <div class="card">

                                <!--Card image-->
                                <div class="view overlay">
                                    <img src="./img/backgrounds/haiku.svg" class="card-img-top" alt="">
                                    <a>
                                        <div class="nav-link"></div>
                                    </a>
                                </div>
                                <!--/.Card image-->

                                <!--Card content-->
                                <div class="card-body">
                                    <!--Title-->
                                    <a href="haiku.php">
                                        <h4 class="card-title" style="text-align:center; color: #2D7D9A !important;">
                                            <strong>Haiku</strong></h4>
                                    </a>
                                    <!--Text-->

                                    <p class="text-right mb-0 font-small font-weight-bold"><a><i class="fas fa-angle-right"></i></a></p>
                                </div>
                                <!--/.Card content-->

                            </div>
                            <!--/.Card-->

                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-lg-3 col-md-6 mb-4 d-flex align-items-stretch">
                            <!--Card-->
                            <div class="card">

                                <!--Card image-->
                                <div class="view overlay">
                                    <img src="./img/backgrounds/himno.svg" class="card-img-top" alt="">
                                    <a>
                                        <div class="nav-link"></div>
                                    </a>
                                </div>
                                <!--/.Card image-->

                                <!--Card content-->
                                <div class="card-body">
                                    <!--Title-->
                                    <a href="anthem.php">
                                        <h4 class="card-title" style="text-align:center; color: #2D7D9A !important;">
                                            <strong>Himno</strong></h4>
                                    </a>
                                    <!--Text-->

                                    <p class="text-right mb-0 font-small font-weight-bold"><a><i class="fas fa-angle-right"></i></a></p>
                                </div>
                                <!--/.Card content-->

                            </div>
                            <!--/.Card-->

                        </div>
                        <!--Grid column-->

                         <!--Grid column-->
                         <div class="col-lg-3 col-md-6 mb-4 d-flex align-items-stretch">
                            <!--Card-->
                            <div class="card">

                                <!--Card image-->
                                <div class="view overlay">
                                    <img src="./img/backgrounds/epigrama.svg" class="card-img-top" alt="">
                                    <a>
                                        <div class="nav-link"></div>
                                    </a>
                                </div>
                                <!--/.Card image-->

                                <!--Card content-->
                                <div class="card-body">
                                    <!--Title-->
                                    <a href="epigram.php">
                                        <h4 class="card-title" style="text-align:center; color: #2D7D9A !important;">
                                            <strong>Epigrama</strong></h4>
                                    </a>
                                    <!--Text-->

                                    <p class="text-right mb-0 font-small font-weight-bold"><a><i class="fas fa-angle-right"></i></a></p>
                                </div>
                                <!--/.Card content-->

                            </div>
                            <!--/.Card-->

                        </div>
                        <!--Grid column-->
                        
                    </div>


                </section>
                <!--Section: Content-->


            </div>
        </main>

    <?php
    } else {
        ?>
        <section class="dark-grey-text text-center">

            <h3 class="font-weight-bold pt-5 pb-2">¡Oh vaya! Parece que no hay una sesión activa.</h3>

            <div class="row mx-3">
                <div class="col-md-4 px-4 mb-4">
                </div>
                <div class="col-md-4 px-4 mb-4">

                    <div class="view">
                        <img src="./img/backgrounds/confusedbird.png" class="img-fluid" alt="smaple image">
                    </div>
                    <a href="login.php">
                        <button class="btn btn-welcome">Conectar</button>
                    </a>
                </div>
                <div class="col-md-4 px-4 mb-4">
                </div>
            </div>
        </section>
        <!--Section: Content-->
    <?php
    }
    ?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="./js/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="./js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="./js/bootstrap.min.js"></script>

</body>

</html>
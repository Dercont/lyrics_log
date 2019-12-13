<?php
session_start();
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Home</title>
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


</head>

<body>
<header>
        <!--Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #2D7D9A;">

            <div class=" container">

                <!-- Collapse button -->
                <button class="navbar-toggler float-right" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Collapsible content -->
                <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">

                    <!-- Links -->
                    <ul class="navbar-nav">

                        <li class="nav-item">
                            <a class="nav-link font-weight-bold" href="home.php">Home</a>
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
                <h3 class="text-center font-weight-bold mb-5">Menú Principal</h3>

                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-4 mb-4">
                        <!--Card-->
                        <div class="card">

                            <!--Card image-->
                            <div class="view overlay">
                                <img src="./img/backgrounds/crear.png" class="card-img-top" alt="">
                                <a>
                                    <div class="nav-link"></div>
                                </a>
                            </div>
                            <!--/.Card image-->

                            <!--Card content-->
                            <div class="card-body">
                                <!--Title-->
                                <a href="create.php">
                                    <h4 class="card-title" style="text-align:center; color: #2D7D9A !important;">
                                        <strong>Crear</strong></h4>
                                </a>
                                <!--Text-->

                                <p class="text-right mb-0 font-small font-weight-bold"><a><i
                                            class="fas fa-angle-right"></i></a></p>
                            </div>
                            <!--/.Card content-->

                        </div>
                        <!--/.Card-->

                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-4 mb-4">
                        <!--Card-->
                        <div class="card">

                            <!--Card image-->
                            <div class="view overlay">
                                <img src="./img/backgrounds/bitacora.png" class="card-img-top" alt="">
                                <a>
                                    <div class="nav-link"></div>
                                </a>
                            </div>
                            <!--/.Card image-->

                            <!--Card content-->
                            <div class="card-body">
                                <!--Title-->
                                <a href="maintenance.php">
                                    <h4 class="card-title" style="text-align:center; color: #2D7D9A !important;">
                                        <strong>Bitácora</strong></h4>
                                </a>
                                <!--Text-->

                                <p class="text-right mb-0 font-small font-weight-bold"><a><i
                                            class="fas fa-angle-right"></i></a></p>
                            </div>
                            <!--/.Card content-->

                        </div>
                        <!--/.Card-->

                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-4 mb-4">
                        <!--Card-->
                        <div class="card">

                            <!--Card image-->
                            <div class="view overlay">
                                <img src="./img/backgrounds/descubre.png" class="card-img-top" alt="">
                                <a>
                                    <div class="nav-link"></div>
                                </a>
                            </div>
                            <!--/.Card image-->

                            <!--Card content-->
                            <div class="card-body">
                                <!--Title-->
                                <a href="discover.php">
                                    <h4 class="card-title" style="text-align:center; color: #2D7D9A !important;">
                                        <strong>Descubre</strong></h4>
                                </a>
                                <!--Text-->

                                <p class="text-right mb-0 font-small font-weight-bold"><a><i
                                            class="fas fa-angle-right"></i></a></p>
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
    }else {
        print("<BR><BR>\n");
        print("<P Align='center'>Acceso no autorizado</p>\n");
        print("<P Align='center'>[ <a href='login.php'> Conectar </a> ]</p>\n");
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
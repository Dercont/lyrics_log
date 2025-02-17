<?php
session_start();
?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Epigrama</title>
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
    <link rel="shortcut icon" type="image/png" href="./img/backgrounds/favicon.png">

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
            <div class="container my-5 py-1 z-depth-1">


                <!--Section: Content-->
                <section class="px-md-5 mx-md-5 text-center text-lg-left dark-grey-text">

                    <!-- Section heading -->
                    <h3 class="text-center font-weight-bold mb-5">Epigrama</h3>

                    <div class="row">
                        <!--Grid column-->
                        <div class="col-md-6 mb-4 mb-md-0">

                            <h5 class="font-weight-bold">El filtro de erudición y cultura en las trivialidades</h5>

                            <p class="text-break text-justify">El epigrama se creó en la Grecia clásica, era una inscripción que se ponía sobre un objeto, que podía ser un exvoto (ofrenda a los dioses), una estatua o una tumba; los epigramas sobre las tumbas formaron clase aparte y se denominaron epitafios o epicedios. 
                            </p>
                            <p class="text-break text-justify"> En aquella época se utilizaban frecuentemente para testimonios diversos, bellos y muy vívidos de las principales preocupaciones del hombre helenístico.
                            </p>

                            <blockquote class="blockquote" style=" font-size: 1rem;">
                            <p class="sh6 font-italic">Preguntas qué me da mi parcela en una tierra tan distante de Roma.
                                Da una cosecha que no tiene precio:
                                el placer de no verte.
                                </p>
                            <footer class="blockquote-footer text-justify font-weight-bold">La Buena Tierra, <cite title="Source Title">Marco Valerio Marcial (Siglo I)</cite></footer>
                            </blockquote>
                          
                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-md-6 mb-4 mb-md-0">

                            <!--Image-->
                            <div class="view overlay z-depth-1-half">
                                <img src="./img/backgrounds/bg_epigrama.svg" class="img-fluid" alt="">
                                <a href="#">
                                    <div class="mask rgba-white-light"></div>
                                </a>
                                <div class="align-self-center text-center">
                                <a class="btn btn-info btn-default my-4 btn-md ml-0" href="discover.php" role="button">Volver<i class="fa fa-magic ml-2"></i></a>
                                </div>
                            </div>

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
        <!--Section: Content-->
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
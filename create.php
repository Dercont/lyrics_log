<?php
session_start();
?>

<HTML LANG="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Crear</title>
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

<BODY>
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
                            <a class="nav-link font-weight-bold" href="home.php">Home</a>
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
    require_once("class/obras.php");

    //print_r($_SESSION["usuario_id"]);
    //print_r($_POST);

    //llevar a MaintenanceForm
    if (isset($_POST['registrar'])) {
        //print_r($_POST);
        $id = $_SESSION["usuario_id"];
        $titulo = $_POST['titulo'];
        $cuerpo = $_POST['cuerpo'];
        $categoria = $_POST['categoria'];
        $fecha = $_POST['fecha'];

        $obj_obra = new obra();
        $obj_obra->insertar_obras($id, $titulo, $cuerpo, $categoria, $fecha);
        header('Location: maintenance.php');
    } elseif (isset($_SESSION["usuario_valido"])) {
        ?>

        <!-- Begin page content -->
        <main role="main" class="container">
            <div class="container my-5">

                <!--Section: Content-->
                <section class="">

                    <!-- Section heading -->
                    <h3 class="text-center font-weight-bold mb-5">Nueva Obra Literaria</h3>
                    <div class="row">
                        <!--Grid column-->
                        <div class="col align-self-start">
                            <form class="border border-light p-5" name='obra' action='create.php' method='POST'>

                                <p class="h4 mb-4 text-center">Llene los siguientes campos:</p>


                                <input type="text" name='titulo' id="defaultContactFormName" class="form-control mb-4" placeholder="Título">

                                <label for="defaultSelect">Categoría</label>
                                <select name="categoria" id="defaultSelect" class="browser-default custom-select mb-4">
                                    <OPTION value="" selected>
                                    <OPTION value="Prosa Poetica">Prosa Poetíca
                                    <OPTION value="Haiku">Haiku
                                    <OPTION value="Himno">Himno
                                    <OPTION value="Epigrama">Epigrama
                                </select>

                                <input type="date" name="fecha">
                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col align-self-center text-center">
                            <textarea name="cuerpo" class="form-control rounded-0" id="exampleFormControlTextarea2" rows="13" cols="30" placeholder="Cuerpo" style="text-align: center;"></textarea>
                            <button class="btn btn-info btn-default my-4 btn-md ml-0" name='registrar' type="submit">Guardar</button>
                            <!--/.Card-->

                        </div>
                        <!--Grid column-->



                        </form>
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

</BODY>

</HTML>
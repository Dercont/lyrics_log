<?php
session_start();
?>

<HTML LANG="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Actualizar</title>
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

    //Recuperar Datos
    if (isset($_SESSION["usuario_valido"])) {

        require_once("class/obras.php");

        if (isset($_REQUEST['actualizar'])) {
            //print_r($_REQUEST);
            $id = $_SESSION['usuario_id'];
            $id_obra = $_REQUEST['id_obra'];
            $titulo = $_REQUEST['titulo'];
            $cuerpo =  $_REQUEST['cuerpo'];
            $categoria = $_REQUEST['categoria'];
            $fecha = $_REQUEST['fecha'];

            //print($id);
            //print($id_obra);
            $obj_actualizar = new obra();
            $obj_actualizar->actualizar_obras($id_obra, $id, $titulo, $cuerpo, $categoria, $fecha);

            $obj_obra = new obra();
            $obra_seleccionada = $obj_obra->seleccionar_obra($id_obra);
            //print("<br><br>");
            // print_r($obra_seleccionada);
        }

        if (isset($_REQUEST['eliminar'])) {
            print_r($_REQUEST);
            $id_obra = $_REQUEST['id_obra'];
            $obj_eliminar = new obra();
            $obj_eliminar->eliminar_obras($id_obra);
            header('Location: maintenance.php');
        }

        $id_obra = $_REQUEST['id_obra'];
        $null = '&nbsp';
        $prosa = '&nbsp';
        $haiku = '&nbsp';
        $himno = '&nbsp';
        $epigrama = '&nbsp';

        $obj_obra = new obra();
        $obra_seleccionada = $obj_obra->seleccionar_obra($id_obra);
        foreach ($obra_seleccionada as $obra_dato) {
            $titulo = $obra_dato['titulo'];
            $cuerpo =  $obra_dato['cuerpo'];
            $categoria =  $obra_dato['categoria'];
            $fecha =  $obra_dato['fecha'];
        }

        switch ($categoria) {

            case "Prosa Poetica":
                $prosa = 'selected';
                break;
            case "Haiku":
                $haiku = 'selected';
                break;
            case "Himno":
                $himno = 'selected';
                break;
            case "Epigrama":
                $epigrama = 'selected';
                break;
            default:
                $null = 'selected';
        }

        //print_r($obra_seleccionada);
        //print_r($_SESSION["usuario_id"]);
        //print_r($_REQUEST);

        ?>
            <!-- Begin page content -->
            <main role="main" class="container">
                <div class="container my-5">

                    <!--Section: Content-->
                    <section class="">

                        <!-- Section heading -->
                        <h3 class="text-center font-weight-bold mb-5">Actualizar Obra Literaria</h3>
                        <div class="row">
                            <!--Grid column-->
                            <div class="col align-self-start">
                                <form class="border border-light p-5" name='obraForm' action='maintenanceForm.php' method='POST'>

                                    <p class="h4 mb-4 text-center">Llene los siguientes campos:</p>
                                    <?php

                                        print("<input type='hidden' name='id_obra' value='$id_obra'>");

                                        print("<input type='text' name='titulo' id='defaultContactFormName' class='form-control mb-4' value='$titulo'
                                         placeholder='Título'></p>\n");

                                        print("<SELECT name='categoria' id='defaultSelect' class='browser-default custom-select mb-4'>
                                         <OPTION value='' $null>" .
                                            "
                                         <OPTION value='Prosa Poetica' $prosa>Prosa Poetíca
                                         <OPTION value='Haiku' $haiku>Haiku
                                         <OPTION value='Himno' $himno>Himno
                                         <OPTION value='Epigrama' $epigrama>Epigrama
                                     </SELECT>");

                                        print("<input type='date' name='fecha' value='$fecha'>");
                                        ?>
                            </div>
                            <!--Grid column-->

                            <!--Grid column-->
                            <div class="col align-self-center text-center">
                                <?php
                                    print(" <textarea name='cuerpo' class='form-control rounded-0' id='exampleFormControlTextarea2' rows='13' cols='30'
                            placeholder='Cuerpo' style='text-align: center;'>$cuerpo</textarea>");
                                    ?>
                                <button class="btn btn-info btn-default my-4 btn-md ml-0" name='actualizar' type="submit">Actualizar</button>
                                <button class="btn btn-danger btn-default my-4 btn-md ml-0" name='eliminar' type="submit">Eliminar</button>
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
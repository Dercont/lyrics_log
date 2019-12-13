<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>¡Bienvenido!</title>
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
  
    <?php
    //  print_r($_COOKIE["usuario"]);
    if (isset($_SESSION["usuario_valido"])) {
        ?>
        <div class="flex-center welcome">

            <svg class="svg-wrapper" height="300" width="650" xmlns="http://www.w3.org/2000/svg">
                <rect class="shape" height="300" width="650" />
            </svg>

            <div style="height: 100vh">
                <div class="flex-center flex-column ">
                    <h1 class="mb-4 text-right">
                        <h1><span class="text-info font-weight-bold">Lyrics Log</h1>
                        <h5 class="sh3bold">Gestor de Obras Literarias</h5>
                        <br>
                        <p class="sh3bold">¡Bienvenido!</p>
                        
                        <?php
                        if(isset($_COOKIE["usuario"])){
                        print('<p class="p2b">'.$_COOKIE["usuario"].'</p>');
                        }
                        ?>

                        <a href="home.php">
                            <button class="btn btn-welcome">Iniciar</button>
                        </a>
                </div>
            </div>
        </div>
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
    <!-- Scripts -->
    <!-- JQuery -->
    <script type="text/javascript" src="./js/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="./js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="./js/bootstrap.min.js"></script>
</body>

</html>
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

</head>

<body>
    <div class="flex-center welcome">

        <svg class="svg-wrapper" height="300" width="650" xmlns="http://www.w3.org/2000/svg">
            <rect class="shape" height="300" width="650" />
        </svg>

        <div style="height: 100vh">
            <div class="flex-center flex-column ">
                <h1 class="mb-4 text-right">
                    <h1><span class="text-info font-weight-bold">Lyrics Log</h1>
                    <p class="sh3bold">¡Bienvenido!</p>
                    <p class="p2b">$user</p>
                    <h5 class="sh3bold">Gestor de Obras Literarias</h5>

                    <a href="home.php">
                        <button class="btn btn-welcome">Iniciar</button>
                    </a>

            </div>
        </div>

    </div>
    <?php
    /*
    <!-- Scripts -->
    <!-- JQuery -->
    <script type="text/javascript" src="./js/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="./js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="./js/bootstrap.min.js"></script>
*/
    ?>
</body>

</html>
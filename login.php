<?php
session_start();

//Si el campo de entrada usuario y clave tienen un valor entonces 
if (isset($_REQUEST['usuario']) && isset($_REQUEST['clave'])) {

    //Guardar el valor tomado en variables
    $usuario = $_REQUEST['usuario'];
    $clave = $_REQUEST['clave'];


    //Preguntar, probablemente tiene que ver con un proceso de encriptación lo que se 
    //se desea encriptar, desde donde debe inciar y la longitud
    $salt = substr($usuario, 0, 2);
    //Encriptación de la clave
    $clave_crypt = crypt($clave, $salt);

    //Llamado de clase que convoca al procedimiento de la BD
    require_once("class/usuarios.php");
    //Instanciación de un objeto, se hace uso del método  
    //y luego su posterior asignación en una variable de trabajo
    $obj_usuarios = new usuario();
    $usuario_validado = $obj_usuarios->validar_usuario($usuario, $clave_crypt);

    foreach ($usuario_validado as $array_resp) {
        foreach ($array_resp as $value) {
            $nfilas = $value;
        }
    }
    //Se guarda en una variable de sesión los datos del usuario
    if ($nfilas > 0) {
        $obj_usuarios2 = new usuario();
        $info_usuario = $obj_usuarios2->consultar_usuario($usuario);
        echo ("</br>");
        // print_r($info_usuario);

        foreach ($info_usuario as $datos_usuario) {
            $id = $datos_usuario["id"];
        }
        // print_r($id);

        $_SESSION["usuario_id"] = $id;
        // print_r($_SESSION["usuario_id"]);

        $usuario_validado = $usuario;
        $_SESSION["usuario_valido"] = $usuario_validado;
    }
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C/DTD HTML 4.0//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Iniciar Sesión</title>
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

    <body>
        <?php
        // Sesión Iniciada
        if (isset($_SESSION["usuario_valido"])) {
            header('Location: welcome.php');
        }
        // Intento de Entrada Fallido
        else if (isset($usuario)) {
           ?>
            <section class="dark-grey-text text-center">

            <h3 class="font-weight-bold pt-5 pb-2">¡Intenta Nuevamente! </h3>

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
        //Sesión no iniciada
        else {
            ?>
            <!-- Start your project here-->
            <div class="container my-5 py-3">
                <!--Section: Content-->
                <section class="px-md-5 mx-md-5 text-center dark-grey-text">

                    <!--Grid row-->
                    <div class="row">

                        <!--Grid column-->
                        <div class="col-md-6 mb-4 mb-md-0 flex-center login">
                            <h1><span class="text-info font-weight-bold">Lyrics Log</h1>

                            <form class="text-center border border-gray p-5" action="login.php" method='POST'>
                                <p class="sh3">Iniciar sesión</p>
                                <!-- user -->
                                <input type="text" name='usuario' id="defaultLoginFormEmail" class="form-control mb-4" placeholder="usuario">
                                <!-- Password -->
                                <input type="password" name='clave' id="defaultLoginFormPassword" class="form-control mb-4" placeholder="contraseña">
                                <button class="btn btn-info btn-default my-4 btn-md ml-0" type="submit">Entrar</button>

                            </form>
                        </div>
                        <!--Grid column-->
                        <!--Grid column-->
                        <div class="col-md-5 mb-4 mb-md-0">
                            <img src="./img/backgrounds/windfeathers.jpg" class="img-fluid" alt="">
                        </div>
                        <!--Grid column-->
                    </div>
                    <!--Grid row-->
                </section>
                <!--Section: Content-->
            </div>
        <?php
        }
        ?>
    </body>

</html>
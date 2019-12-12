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
            print("<BR><BR>\n");
            print("<P Align='center'>Acceso no autorizado</p>\n");
            print("<P Align='center'>[ <a href='login.php'> Conectar </a> ]</p>\n");
        }
        //Sesión no iniciada
        else {
            ?>
            <style>
                body {
                    background-image: url('./img/backgrounds/login.jpg');
                }
            </style>
            <br>
            <!-- Start your project here-->
            <h1><span class="text-info font-weight-bold flex-center">Lyrics Log</h1>

            <br>
            <div class="flex-center login">
                <form class="text-center border border-gray p-5" action="#!">
                    <p class="sh3bold">Iniciar sesión</p>

                    <!-- user -->
                    <input type="text" name='usuario' id="defaultLoginFormEmail" class="form-control mb-4" placeholder="usuario">

                    <!-- Password -->
                    <input type="password" name='clave' id="defaultLoginFormPassword" class="form-control mb-4" placeholder="contraseña">

                    <div class="d-flex align-items-center">
                        <button class="btn btn-info btn-block my-4" type="submit">Entrar</button>
                    </div>
                    <!-- Sign in button -->
                </form>
            </div>
        <?php
        }
        ?>
    </body>

</html>
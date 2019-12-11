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
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>

<body>

    <body>
        <?php
        // Sesión Iniciada
        if (isset($_SESSION["usuario_valido"])) {
            header('Location: home.php');
        }
        // Intento de Entrada Fallido
        else if (isset($usuario)) {
            print("<BR><BR>\n");
            print("<P Align='center'>Acceso no autorizado</p>\n");
            print("<P Align='center'>[ <a href='login.php'> Conectar </a> ]</p>\n");
        }
        //Sesión no iniciada
        else {
            print("<br><br>\n");
            print("<p>LyricsLog<br>" .
                " Por favor identificarse</p>\n");
            print("<FORM class='entrada' name='login' action='login.php' method='POST'> \n");

            print("<p><label class='etiqueta-entrada'>Usuario:</label>\n");
            print("     <input type='text' name='usuario' size='15'></p>\n");
            print("<p><label class='etiqueta-entrada'>Clave</label>\n");
            print("     <input type='password' name='clave' size='15'></p>\n");
            print("     <input type='submit' value='entrar'></p>\n");
            print("</FORM>\n");

            print("<p>Nota: Si no dispone de indentificación o tiene problemas " .
                "para entrar<br>pongase en contacto con él " . "<a href='mailto: webmaster@localhost'>Administrador</a> del sitio</p>\n");
        }
        ?>
    </body>

</html>
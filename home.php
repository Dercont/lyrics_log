<?php
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C/DTD HTML 4.0//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="es">

<head>
    <title>Menú Principal</title>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>

<body>
    <?php
    if (isset($_SESSION["usuario_valido"])) {
        ?>

        <h1>Menú Principal</h1>
        <hr>
        <ul>
            <li><a href="create.php">Crear Nuevo</a>
            <li><a href="maintenance.php">Bitácora de Obras Literarias</a>
            <li><a href="log.php">Descubre...</a>
        </ul>
        <hr>
        <p>[<a href='logout.php'>Desconectar</a>]</p>
    <?php
    }else {
        print("<BR><BR>\n");
        print("<P Align='center'>Acceso no autorizado</p>\n");
        print("<P Align='center'>[ <a href='login.php'> Conectar </a> ]</p>\n");
    }
    ?>
</body>

</html>
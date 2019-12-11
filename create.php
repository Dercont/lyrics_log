<?php
    session_start ();
?>

<HTML LANG="es">

<HEAD>
    <TITLE>Crear</TITLE>
    <LINK rel="stylesheet" type="text/css" href="css/estilo.css">
</HEAD>

<BODY>
    <H1>Nueva Obra Lírica</H1>
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
        $obj_obra->insertar_obras($id,$titulo,$cuerpo,$categoria,$fecha);
        header('Location: maintenance.php');

     }elseif(isset($_SESSION["usuario_valido"])){
        
        ?>
        <p>[<a href='home.php'>Menú Principal</a>]</p>
        <?php
        print("<br><br>\n");
        print("<p>LyricsLog<br>\n");
        print("<h3>A continuación, llene los siguientes campos:</h3><br>\n");
        print("<FORM class='entrada' name='obra' action='create.php' method='POST'> \n");

        print("<p><label class='etiqueta-entrada'>Título:</label>\n");
        print("     <input type='text' name='titulo' size='15'></p>\n");
        print("<p><label class='etiqueta-entrada'>Cuerpo</label>\n");
        print('     <textarea name="cuerpo" rows="10" cols="30"></textarea>');
        print("<p><label class='etiqueta-entrada'>Categoría</label>\n");
        print('<SELECT name="categoria">
                    <OPTION value="" selected>
                    <OPTION value="Prosa Poetica">Prosa Poetíca
                    <OPTION value="Haiku">Haiku
                    <OPTION value="Himno">Himno
                    <OPTION value="Epigrama">Epigrama
                </SELECT>');
        print("<p><label class='etiqueta-entrada'>Fecha</label>\n");
        print('<input type="date" name="fecha">');        
        print("     <input type='submit' name='registrar' value='Registrar'></p>\n");
        print("</FORM>\n");
        
    } else {
        print("<BR><BR>\n");
        print("<P Align='center'>Acceso no autorizado</p>\n");
        print("<P Align='center'>[ <a href='login.php'> Conectar </a> ]</p>\n");
    }
    
    ?>
</BODY>

</HTML>
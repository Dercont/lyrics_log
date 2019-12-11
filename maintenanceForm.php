<?php
session_start();
?>

<HTML LANG="es">

<HEAD>
    <TITLE>Ver</TITLE>
    <LINK rel="stylesheet" type="text/css" href="css/estilo.css">
</HEAD>

<BODY>
    <H1>Obra Lírica</H1>
    <?php

    //Recuperar Datos
    if (isset($_SESSION["usuario_valido"])) {

        require_once("class/obras.php");

        if(isset($_REQUEST['actualizar'])){
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
            $obj_actualizar->actualizar_obras($id_obra,$id,$titulo,$cuerpo,$categoria,$fecha);

            $obj_obra = new obra();
            $obra_seleccionada = $obj_obra->seleccionar_obra($id_obra);
            //print("<br><br>");
           // print_r($obra_seleccionada);
        }

        if(isset($_REQUEST['eliminar'])){
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
            <p>[<a href='home.php'>Menú Principal</a>]</p>
        <?php
            //echo ($_GET)['id_obra'];
            print("<br><br>\n");
            print("<p>LyricsLog<br>\n");
            print("<h3>A continuación, llene los siguientes campos:</h3><br>\n");
            print("<FORM class='entrada' name='obraForm' action='maintenanceForm.php' method='POST'> \n");

            print("<input type='hidden' name='id_obra' value='$id_obra'>");
            print("<p><label class='etiqueta-entrada'>Título:</label>\n");
            print("     <input type='text' name='titulo' value='$titulo'  size='15'></p>\n");
            print("<p><label class='etiqueta-entrada'>Cuerpo</label>\n");
            print("     <textarea name='cuerpo' rows='10' cols='30'>$cuerpo</textarea>");
            print("<p><label class='etiqueta-entrada'>Categoría</label>\n");
            print("<SELECT name='categoria' >
                    <OPTION value='' $null>" .
                "<OPTION value='Prosa Poetica' $prosa>Prosa Poetíca
                    <OPTION value='Haiku' $haiku>Haiku
                    <OPTION value='Himno' $himno>Himno
                    <OPTION value='Epigrama' $epigrama>Epigrama
                </SELECT>");
            print("<p><label class='etiqueta-entrada'>Fecha</label>\n");
            print("<input type='date' name='fecha' value='$fecha'>");
            print("     <input type='submit' name='actualizar' value='Actualizar'>\n");
            print("     <input type='submit' name='eliminar' value='Eliminar'></p>\n");
            print("</FORM>\n");
        } else {
            print("<BR><BR>\n");
            print("<P Align='center'>Acceso no autorizado</p>\n");
            print("<P Align='center'>[ <a href='login.php'> Conectar </a> ]</p>\n");
        }

        ?>
</BODY>

</HTML>
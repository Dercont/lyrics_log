<?php
session_start();
?>

<HTML LANG="es">

<HEAD>
    <TITLE>Bitácora</TITLE>
    <LINK rel="stylesheet" type="text/css" href="css/estilo.css">
</HEAD>

<BODY>
    <H1>Bitácora de Obras Literarias</H1>

    <?php
    if (isset($_SESSION["usuario_valido"])) {
        ?>
        <FORM name="FormFiltro" method="POST" action="log.php">
            <BR>
            Filtrar por: <SELECT name="campos">
                <OPTION value="" selected>
                <OPTION value="titulo">Título
                <OPTION value="cuerpo">Descripción
                <OPTION value="categoria">Categoría
                <OPTION value="fecha">Fecha

            </SELECT>
            con el valor
            <input type="text" name="valor">
            <input name="ConsultarFiltro" value="Filtrar Datos" type="submit" />
            <input name="ConsultarTodos" value="Ver Todos" type="submit">
        </FORM>
        <?php
            ?>
        <p>[<a href='home.php'>Menú Principal</a>]</p>
    <?php
        require_once("class/obras.php");

        $obj_obra = new obra();
        $obras = $obj_obra->consultar_obras();
        if (array_key_exists('ConsultarTodos', $_POST)) {
            $obj_obra = new obra();
            $obras_new = $obj_obra->consultar_obras();
        }
        if (array_key_exists('ConsultarFiltro', $_POST)) {
            $obj_obra = new obra();
            $obras = $obj_obra->consultar_obras_filtro($_REQUEST['campos'], $_REQUEST['valor']);
        }
        $nfilas = count($obras);

        if ($nfilas > 0) {
            print("<TABLE>\n");
            print("<TR>\n");
            print("<TH>Título</TH>\n");
            print("<TH>Descripción</TH>\n");
            print("<TH>Categoría</TH>\n");
            print("<TH>Fecha</TH>\n");
            // print("<TH>Imagen</TH>\n");
            print("<TR>\n");

            foreach ($obras as $resultado) {
                print("<TR>\n");
                print("<TD>" . $resultado['titulo'] . "</TD>\n");
                print("<TD>" . $resultado['cuerpo'] . "</TD>\n");
                print("<TD>" . $resultado['categoria'] . "</TD>\n");
                print("<TD>" . date("j/n/y", strtotime($resultado['fecha'])) . "</TD>\n");

                /*        if ($resultado['imagen'] != "") {
                       print("<TD><A TARGET='_blank' HREF='img/" . $resultado['imagen'] .
                           "'><IMG BORDER='0' SRC='img/iconotexto.gif'></A></TD>\n");
                   } else {
                       print("<TD>&nbsp;</TD>\n");
                   }*/
                print("</TR>\n");
            }
            print("</TABLE>\n");
        } else {
            print("No hay obras disponibles");
        }
    } else {
        print("<BR><BR>\n");
        print("<P Align='center'>Acceso no autorizado</p>\n");
        print("<P Align='center'>[ <a href='login.php'> Conectar </a> ]</p>\n");
    }

    ?>
</BODY>

</HTML>
<?php
session_start();
?>

<html LANG="es">

<head>
    <title>Log</title>
    <link rel="stylesheet" type="text/css" href="libreria/jquery.dataTables.min.css">
    <Script type="text/javascript" language="javascript" src="libreria/jquery-3.1.1.js"></script>
    <Script type="text/javascript" language="javascript" src="libreria/jquery.dataTables.min.js"></script>
</head>

<body>
    <?php
    //print_r($_SESSION["usuario_id"]);
    echo ("<br>");
    //print_r($_SESSION["usuario_valido"]);
    if (isset($_SESSION["usuario_valido"])) {
        ?>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#grid').DataTable({
                    "lengthMenu:": [5, 10, 20, 50],
                    "order": [
                        [0, "asc"]
                    ],
                    "language": {
                        "lengthMenu": "Mostrar _MENU_ registrados por página",
                        "zeroRecords": "No existen resultados en su búsqueda",
                        "info": "Mostrando página _PAGE_ de _PAGES_",
                        "infoEmpty": "No hay registros disponibles",
                        "infoFiltered": "(Buscado entre _MAX_ registros en total)",
                        "search": "Buscar: ",
                        "paginate": {
                            "first": "Primero",
                            "last": "Último",
                            "next": "Siguiente",
                            "previous": "Anterior"
                        },
                    }
                });

                $("*").css("font-family", "arial").css('font-size', '12px');
            });
        </script>

        <h1>Bitácora de Obras Literarias</h1>
        <p>[<a href='home.php'>Menú Principal</a>]</p>
    <?php
        require_once("class/obras.php");
        //Variables de Trabajo
        $id = $_SESSION["usuario_id"];
        
        //Se instancia un nuevo objeto de la clase noticia
        $obj_obra = new obra();

        //Se llama al método consultar_noticias el cuál retorna los datos de la DB estructurados en una matriz bidimensional asociativa en una variable llamada $noticias
        $obras = $obj_obra->seleccionar_obras($id);
        //print_r($noticias);

        //Cuenta la cantidad de filas
        $nfilas = count($obras);
        //print_r($obras);
        //Si se retornan datos se imprime la tabla
        if ($nfilas > 0) {

            print("<table id='grid' class='display' cellspacing='0'>\n");
            print("<thead>");
            print("<tr>\n");
            print("<th>Título</th>\n");
            print("<th>Cuerpo</th>\n");
            print("<th>Categoría</th>\n");
            print("<th>Fecha</th>\n");
            print("<th>Ver</th>\n");
            print("</tr>\n");
            print("</thead>");
            print("<tbody>");

            foreach ($obras as $resultado) {
                print("<tr>\n");
                print("<td>" . $resultado['titulo'] . "</td>\n");
                print("<td>" . $resultado['cuerpo'] . "</td>\n");
                print("<td>" . $resultado['categoria'] . "</td>\n");
                print("<td>" . date("j/n/y", strtotime($resultado['fecha'])) . "</td>\n");
                print("<TD><A HREF='maintenanceForm.php" . "?id_obra=" . $resultado['id_obra'] . "'>" .
                    "<IMG BORDER='0' SRC='img/iconotexto.gif'></A></TD>\n");
                /*if ($resultado['imagen'] != "") {
                print("<td><a target='_blank' href='img/" . $resultado['imagen'] .
                    "'><img border='0' src='img/iconotexto.gif'></a></td>\n");
            } else {
                print("<td>&nbsp;</td>\n");
            }*/
                print("</tr>\n");
            }

            print("</tbody>");
            print("</table>\n");
        } else {
            print("No hay obras disponibles.");
        }
    }else{
        print("<BR><BR>\n");
        print("<P Align='center'>Acceso no autorizado</p>\n");
        print("<P Align='center'>[ <a href='login.php'> Conectar </a> ]</p>\n");
    }
    ?>
</body>

</html>
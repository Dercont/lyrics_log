<?php
session_start();
?>

<html LANG="es">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Bitácora</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <!-- Fluent Design Bootstrap -->
    <link rel="stylesheet" href="./css/fluent.css">
    <!-- Micon icons-->
    <link rel="stylesheet" href="./css/micon.min.css">
    <!-- FontAwesome icons-->
    <link rel="stylesheet" href="./css/all.min.css">
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
    <link rel="stylesheet" type="text/css" href="libreria/jquery.dataTables.min.css">
    <Script type="text/javascript" language="javascript" src="libreria/jquery-3.1.1.js"></script>
    <Script type="text/javascript" language="javascript" src="libreria/jquery.dataTables.min.js"></script>
</head>

<body>
    <header>
        <!--Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #2D7D9A;">

            <div class=" container">

                <!-- Collapse button -->
                <button class="navbar-toggler float-right" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Collapsible content -->
                <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">

                    <!-- Links -->
                    <ul class="navbar-nav">

                        <li class="nav-item">
                            <a class="nav-link font-weight-bold" href="home.php">Inicio</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link font-weight-bold" href="discover.php">Descubre</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font-weight-bold" href="logout.php">Salir</a>
                        </li>

                    </ul>
                    <!-- Links -->

                </div>
                <!-- CTA -->

            </div>

        </nav>
        <!--/.Navbar -->
    </header>

    <?php
    //print_r($_SESSION["usuario_id"]);
    echo ("<br>");
    //print_r($_SESSION["usuario_valido"]);
    if (isset($_SESSION["usuario_valido"])) {
        ?>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#grid').DataTable({
                    "pageLength":5,
                    "lengthMenu:": [5, 10, 20, 50],
                    "order": [
                        [0, "asc"]
                    ],
                    "language": {
                        "lengthMenu": "Mostrar _MENU_ obras por página.",
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

               // $("*").css("font-family", "arial").css('font-size', '12px');
            });
        </script>

      
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
            print("<div class='container text-center'>");
            print("<div class='col-lg4 col-lg-offset-4'>");
            print("<h2 class='font-weight-bold mb-5'>Bitácora de Obras Literarias</h2>");
            print("<table id='grid' class='table table table-hover table-bordeless' cellspacing='0'>\n");
            print("     <thead style='text-align: center; color: white; background-color: #2D7D9A;>')");
            print("         <tr>\n");
            print("             <th>Título</th>\n");
            print("             <th>Cuerpo</th>\n");
            print("             <th>Categoría</th>\n");
            print("             <th>Fecha</th>\n");
            print("             <th>Editar</th>\n");
            print("         </tr>\n");
            print("     </thead>");
            print("     <tbody>");

            foreach ($obras as $resultado) {
                print("     <tr text-center>\n");
                print("         <td text-center>" . $resultado['titulo'] . "</td>\n");
                print("         <td text-center>" . $resultado['cuerpo'] . "</td>\n");
                print("         <td text-center>" . $resultado['categoria'] . "</td>\n");
                print("         <td text-center>" . date("j/n/y", strtotime($resultado['fecha'])) . "</td>\n");
                print("         <td style='text-align: center;'><A HREF='maintenanceForm.php" . "?id_obra=" . $resultado['id_obra'] . "'>" .
                    "     <i class='fas fa-edit' style='color: #2D7D9A;'></i>          </A></td>\n");
                print("     </tr>\n");
            }
            print("     </tbody>");
            print("</table>\n");
            print("</div>");
        print("</div>");
            
        } else {
            print("No hay obras disponibles.");
        }
    }else{
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
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
<footer>
    <br>
    <br>
</footer>

</html>
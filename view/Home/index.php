<?php

require_once("../../config/conexion.php");
if (isset($_SESSION["Nombre"])) {


?>
    <!DOCTYPE html>
    <html>
    <!--CSS  -->
    <?php require_once("../Template/head.php") ?>
    <title>TuDeveloperWeb</title>
    </head>

    <body class="with-side-menu">

        <!-- Header -->
        <?php require_once("../Template/Partails/header.php") ?>
        <div class="mobile-menu-left-overlay"></div>


        <!-- Sidebar -->
        <?php require_once("../Template/Partails/sidebar.php") ?>


        <!-- Contenido -->
        <div class="page-content">
            <div class="container-fluid">
                Inicio
            </div><!--.container-fluid-->
        </div><!--.page-content-->


        <!-- JS -->
        <?php require_once("../Template/js.php") ?>
        <script src="home.js"></script>

    </body>

    </html>

<?php
} else {
    header("location:" . Conectar::ruta() . "/index.php");
}

?>
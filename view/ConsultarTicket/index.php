<?php

require_once("../../config/conexion.php");
if (isset($_SESSION["Nombre"])) {


?>
    <!DOCTYPE html>
    <html>
    <!--CSS  -->
    <?php require_once("../Template/head.php") ?>
    <title>ConsultarTicket</title>
    <link rel="stylesheet" href="./css/style.css">
    </head>

    <body class="with-side-menu">

        <!-- Header -->
        <?php require_once("../Template/Partails/header.php") ?>
        <div class="mobile-menu-left-overlay"></div>


        <!-- Sidebar -->
        <?php require_once("../Template/Partails/sidebar.php") ?>


        <!-- Contenido -->
        <div class="page-content">
            <div id="content-primary" class="show">
                <?php
                    require_once(__DIR__."/components/TableTicket.php");
                ?>
            </div>
            <div id="content-secondary" class="hide">
                <?php
                    require_once(__DIR__."/components/DetailTicket.php")
                ?>
            </div>
        </div><!--.page-content-->


        <!-- JS -->
        <?php require_once("../Template/js.php") ?>
        <script src="consultarTicket.js"></script>

        <!-- <script>
		$(function() {
			$('#tbl-ticket').DataTable();
		});
	</script> -->

    </body>

    </html>

<?php
} else {
    header("location:" . Conectar::ruta() . "/index.php");
}

?>
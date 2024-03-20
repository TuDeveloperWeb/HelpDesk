<?php

require_once("../../config/conexion.php");
if (isset($_SESSION["Nombre"])) {


?>
    <!DOCTYPE html>
    <html>
    <!--CSS  -->
    <?php require_once("../Template/head.php") ?>
    <title>ConsultarTicket</title>
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
                <header class="section-header">
                    <div class="tbl">
                        <div class="tbl-row">
                            <div class="tbl-cell">
                                <h3>Consultar Ticket</h3>
                                <ol class="breadcrumb breadcrumb-simple">
                                    <li><a href="#">Inicio</a></li>
                                    <li class="active">Consultar Ticket</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </header>

                
                <section class="box-typical box-typical-padding">
                    <div class="table-responsive">
                        <table id="tbl-ticket" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th style="width:10%">Nro Ticket</th>
                                    <th style="width:15%">Categoria</th>
                                    <th class="d-none d-sm-table-cell" style="width:20%">Titulo</th>
                                    <th class="text-center"  style="width:15%"></th>
                                </tr>
                            </thead>
                            <tbody>
                               
                            </tbody>
                        
                        </table>
                    </div>
                </section>


            </div><!--.container-fluid-->
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
<?php

require_once("../../config/conexion.php");
if (isset($_SESSION["Nombre"])) {


?>

    <!DOCTYPE html>
    <html>
    <!--CSS  -->
    <?php require_once("../Template/head.php") ?>
    <title>NuevoTicket</title>
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
                                <h3>Nuevo Ticket</h3>
                                <ol class="breadcrumb breadcrumb-simple">
                                    <li><a href="#">Inicio</a></li>
                                    <li class="active">Nuevo Ticket</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </header>

                <div class="box-typical box-typical-padding">
                    <p>Desde esta ventana podra generar nuevos tickets de HelpDesk</p>

                    <h5 class="m-t-lg with-border">Ingresar Informacion</h5>

                    <div class="row">
                        <form class="form" action="POST" id="ticket-form">
                            <div class="col-lg-6">
                                <fieldset class="form-group">
                                    <label class="form-label semibold" for="exampleInput">Categoria</label>
                                    <input type="hidden" name="idUsuario" id="txtUsuario" value="<?php echo $_SESSION["IdUsuario"] ?>">
                                    <div class="">
                                        <select id="opCategoria" name="idCategoria" class="form-control">

                                        </select>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <fieldset class="form-group">
                                    <label class="form-label semibold" for="txtTitulo">Titulo</label>
                                    <input type="text" class="form-control" id="txtTitulo" name="txtTitulo" placeholder="Ingrese el Titulo">
                                </fieldset>
                            </div>

                            <div class="col-lg-12">
                                <fieldset class="form-group mb-0">
                                    <label class="form-label semibold" for="exampleInput">Descripcion</label>
                                    <div class="summernote-theme-1">
                                        <textarea class="summernote" id="cat-sumernote" name="txtDescripcion"></textarea>
                                    </div>
                                </fieldset>
                            </div>

                            <div class="col-lg-12">
                                <fieldset class="form-group">
                                    <button type="submit" name="btnGuardar" value="add" class="btn btn-rounded btn-inline btn-primary">Enviar</button>
                                </fieldset>
                            </div>
                        </form>
                    </div><!--.row-->
                </div>

            </div><!--.container-fluid-->
        </div><!--.page-content-->


        <!-- JS -->


        <?php require_once("../Template/js.php") ?>
        <script src="nuevoticket.js"></script>

    </body>

    </html>

<?php
} else {
    header("location:" . Conectar::ruta() . "/index.php");
}

?>
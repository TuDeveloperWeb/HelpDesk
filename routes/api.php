<?php
    
    require_once(__DIR__."/../controller/TicketController.php");

    $action = isset($_GET['action']) ? $_GET['action'] : null;

    $ticketContoller = new TicketController();

    switch ($action) {
        case 'store':
            
            $idUsuario = $_POST["idUsuario"];
            $idCategoria = $_POST["idCategoria"];
            $titulo = $_POST["txtTitulo"];
            $descripcion = $_POST["txtDescripcion"];

            $request = [
                'idUsuario' => $idUsuario,
                'idCategoria' => $idCategoria,
                'titulo' => $titulo,
                'descripcion' => $descripcion
            ];
            
         $ticketContoller->store($request);

            break;
        
        default:
             echo "Acción no válida";
            break;
    }



?>
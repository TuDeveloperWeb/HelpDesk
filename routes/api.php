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
        case 'show':
            $user_id = $_POST['user_id'];
            $rol_id = $_POST['rol_id'];
            $ticketContoller->show($user_id, $rol_id);
            break;
        
        default:
             echo "Acción no válida";
            break;
    }



?>
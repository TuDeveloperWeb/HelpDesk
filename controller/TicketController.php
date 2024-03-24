<?php 

    require_once("../config/conexion.php");
    require_once("../model/Ticket.php");

    $objTicket = new Ticket();

    switch ($_GET["action"]) {
        case "store":
            $objTicket->store($_POST["idUsuario"],$_POST["idCategoria"],$_POST["txtTitulo"],$_POST["txtDescripcion"]);
            
            break;
        case "show":
            $datos = $objTicket->show($_POST["idUsuario"]);
            // $datos = $objTicket->show(1);
            // $prueba = json_encode($datos);
            $x = array();

            // $arrData = array();

            foreach ($datos as $data) {
                $arrData = array();
                $arrData[] = $data["IdTicket"];
                $arrData[] = $data["Categoria"];
                $arrData[] = $data["Titulo"];
                $arrData[] = '<button type="button" onClick ="ver('.$data["IdTicket"].')" id="'.$data["IdTicket"].'"class="btn btn-inline btn-sm btn-primary text-center ladda-button mx-3"><i class="fa fa-eye"></i></button>';
                
                $x[] = $arrData;
                
            }

            $result = array(
                "sEcho"=>1,
                "iTotalRecords" => count($x),
                "iTotalDisplayRecords" => count($x),
                "aaData" => $x
            );

            // $result = array(
            //     "data" => $x
            // );
            // echo $data;
            // print_r($result);
            echo json_encode($result);
            break;
    }


?>
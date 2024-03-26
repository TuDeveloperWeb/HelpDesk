<?php 

    class TicketController {
        private $model;

        public function __construct() {
            require_once("../model/Ticket.php");
            $this->model = new Ticket();

        }

        public function store($request){

            try {
                $result = $this->model->store($request["idUsuario"],$request["idCategoria"],$request["titulo"],$request["descripcion"]);
                if ($result==false)  return;
                echo json_encode(["success" => true, "message" => "Operación exitosa"]);
            } catch (PDOException $e) {
                http_response_code(500);
                echo json_encode(["success" => false, "message" => "Error de base de datos: " . $e->getMessage()]);
            } catch (Exception $e) {
                http_response_code(500); 
                // Manejar otras excepciones generales
                echo json_encode(["success" => false, "message" => "Error general: " . $e->getMessage()]);
            }

        }



    }

    // switch ($_GET["action"]) {
    //     case "store":
    //         $model->store($_POST["idUsuario"],$_POST["idCategoria"],$_POST["txtTitulo"],$_POST["txtDescripcion"]);
            
    //         break;
    //     case "show":
    //         $datos = $model->show($_POST["idUsuario"]);
    //         // $datos = $objTicket->show(1);
    //         // $prueba = json_encode($datos);
    //         $x = array();

    //         // $arrData = array();

    //         foreach ($datos as $data) {
    //             $arrData = array();
    //             $arrData[] = $data["IdTicket"];
    //             $arrData[] = $data["Categoria"];
    //             $arrData[] = $data["Titulo"];
    //             $arrData[] = '<button type="button" onClick ="showTicket('.$data["IdTicket"].')" id="'.$data["IdTicket"].'"class="btn btn-inline btn-sm btn-primary text-center ladda-button mx-3"><i class="fa fa-eye"></i></button>';
                
    //             $x[] = $arrData;
                
    //         }

    //         $result = array(
    //             "sEcho"=>1,
    //             "iTotalRecords" => count($x),
    //             "iTotalDisplayRecords" => count($x),
    //             "aaData" => $x
    //         );

    //         // $result = array(
    //         //     "data" => $x
    //         // );
    //         // echo $data;
    //         // print_r($result);
    //         echo json_encode($result);
    //         break;
    // }


?>
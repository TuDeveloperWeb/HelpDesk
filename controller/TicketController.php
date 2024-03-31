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
        public function show(int $user_id, string $rol_id){
            try {
                $datos =  $this->model->show($user_id,$rol_id);
                $x = array();
                foreach ($datos as $data) {
                    $arrData = array();
                    $arrData[] = $data["IdTicket"];
                    $arrData[] = $data["Categoria"];
                    $arrData[] = $data["Titulo"];
                    $arrData[] = $this->getStatus($data['status']);            
                    $arrData[] = date('d/m/Y',strtotime($data["created_at"])).'<br>'.date('H:i:s',strtotime($data["created_at"])) ;
                    $arrData[] = '<button type="button" onClick ="showTicket('.$data["IdTicket"].')" id="'.$data["IdTicket"].'"class="btn btn-inline btn-sm btn-primary text-center ladda-button mx-3"><i class="fa fa-eye"></i></button>';
                    $x[] = $arrData;  
                }
                $result = array(
                    "sEcho"=>1,
                    "iTotalRecords" => count($x),
                    "iTotalDisplayRecords" => count($x),
                    "aaData" => $x
                );
                echo json_encode($result);  
            }  catch (PDOException $e) {
                http_response_code(500);
                echo json_encode(["success" => false, "message" => "Error de base de datos: " . $e->getMessage()]);
            } catch (Exception $e) {
                http_response_code(500); 
                // Manejar otras excepciones generales
                echo json_encode(["success" => false, "message" => "Error general: " . $e->getMessage()]);
            }     
        }


        public function getStatus(string $status){
            
            switch ($status) {
                case 'Pending':
                    return '<span class="label label-warning">'.$status.'</span>';
                case 'Progress':
                    return '<span class="label label-primary">'.$status.'</span>' ;
                case 'Finish':
                    return '<span class="label label-success">'.$status.'</span>' ;
                case 'Cancel':
                    return '<span class="label label-danger">'.$status.'</span>' ;    
                default:
                    return '<span class="label label-warning">undefined </span>' ;
            }


        }

    }

?>
<?php 
    require_once("../model/Categoria.php");

    $objCategoria = new Categoria();

    switch ($_POST["op"]) {
        case "combo":
            $datos = $objCategoria->getCategoria();
            $html = "";
            if (is_array($datos)== true  and count($datos)>0  ) {
                foreach ($datos as $row) {
                    $html.="<option value='".$row['IdCategoria']."'>".$row['Descripcion']."</option>";
                }
                echo $html;
            }

            break;
        default:
            # code...
            break;
    }


?>
<?php 

    class Categoria extends Conectar{

        public function getCategoria()
        {
            $conectar = parent::conexion();
            parent::set_names();
            $stament = $conectar->prepare("Select * From Categoria Where estado=1");
            return ($stament->execute()) ? $stament->fetchAll() : "Error en la consulta"; 
        }



    }


?>
<?php 

    class Ticket extends Conectar{

        public function show($idUsuario)
        {    $conectar = parent::conexion();
            parent::set_names();
            $stament = $conectar->prepare("SELECT tck.IdTicket,tck.IdUsuario,tck.IdCategoria,tck.Titulo,tck.Descripcion,us.Nombre, us.Apellido,RTRIM(cat.Descripcion) as Categoria FROM ticket tck INNER JOIN categoria cat ON tck.IdCategoria = cat.IdCategoria
            INNER JOIN usuario us on tck.IdUsuario = us.IdUsuario
            WHERE tck.Estado = 1 and us.IdUsuario = :idUsuario");
            $stament->bindParam(":idUsuario",$idUsuario);

            return ($stament->execute()) ? $stament->fetchAll() : "Error en la consulta"; 
            
        }


        public function store($idUsuario,$idCategoria,$titulo,$descripcion )
        {
            $conectar = parent::conexion();
            parent::set_names();
            $stament = $conectar->prepare("Insert into Ticket Values (NULL,:idUsuario,:idCategoria,:titulo,:descripcion,1)");
            $stament->bindParam(":idUsuario",$idUsuario);
            $stament->bindParam(":idCategoria",$idCategoria);
            $stament->bindParam(":titulo",$titulo);
            $stament->bindParam(":descripcion",$descripcion);

            return ($stament->execute()) ? $stament->fetchAll() : "Error en la consulta"; 
        }



    }


?>
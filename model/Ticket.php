<?php
require_once(__DIR__ . "/../config/conexion.php");
class Ticket extends Conectar
{

    public function show(int $user_id, string $rol_id)
    {
        try {
            $conectar = parent::conexion();
            parent::set_names();
            $stament = $conectar->prepare("SELECT 
            tck.IdTicket,
            tck.IdUsuario,
            tck.IdCategoria,
            tck.Titulo,
            tck.Descripcion,
            tck.created_at,
            us.Nombre, 
            us.Apellido,
            RTRIM(cat.Descripcion) as Categoria,
            s.name  as status
            FROM ticket tck INNER JOIN categoria cat ON tck.IdCategoria = cat.IdCategoria
            INNER JOIN usuario us on tck.IdUsuario = us.IdUsuario
            inner join status s  on tck.Estado = s.id
            where true and 
             if ((:rolId = 'NULL' ),true , tck.IdUsuario  = :user_id)
            ");
            $stament->bindParam(":user_id", $user_id);
            $stament->bindParam(":rolId", $rol_id);
            $stament->execute();
            return $stament->fetchAll();
        } catch (PDOException $e) {
            // Manejar errores de PDO si es necesario
            throw $e;
        } catch (Exception $e) {
            // Manejar otros tipos de errores
            throw $e;
        }
    }


    public function store(int $idUsuario, int $idCategoria, string $titulo, string $descripcion)
    {
        try {
            $conectar = parent::conexion();
            parent::set_names();
            $stament = $conectar->prepare("INSERT INTO Ticket VALUES (NULL, :idUsuario, :idCategoria, :titulo, :descripcion, 1, NOW())");
            $stament->bindParam(":idUsuario", $idUsuario);
            $stament->bindParam(":idCategoria", $idCategoria);
            $stament->bindParam(":titulo", $titulo);
            $stament->bindParam(":descripcion", $descripcion);
            return $stament->execute();
        } catch (PDOException $e) {
            throw $e;
        } catch (Exception $e) {
            throw $e;
        }
    }
};


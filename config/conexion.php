<?php 

    /* Las sesiones en PHP permiten almacenar datos de usuario de manera persistente entre diferentes páginas o visitas del usuario al sitio web.Las variables de sesión $_SESSION permiten almacenar y recuperar datos específicos del usuario en diferentes partes del sitio web durante la misma sesión. */
    session_start();

    class Conectar {

        /* Private no pueden ser utilizados en clases instanciadas solo dentro de la clase */
        private $host = "localhost";
        private $dbname = "helpdesk";
        private $user = "root";
        private $pass = "";

        /* Protected si pueden ser utilizados dentro de clase y en las subclases (extends) y no en las instancias (new class) */
        protected $PDO;

        protected function conexion(){
            try {
                $this->PDO = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname,$this->user,$this->pass);
                $this->PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $this->PDO;
            } catch (PDOException $e) {
                echo "Error en la conexion BD".$e->getMessage();
                die();
            }
        }

        public function set_names()
        {
            return $this->PDO->query("SET NAMES 'utf8'");
        }

        public static function ruta()
        {
            return "http://localhost/proyectos/HelpDesk";
        }


    }




?>
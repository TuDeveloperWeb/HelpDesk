<?php 

require_once("config/conexion.php");   
    class Usuario extends Conectar{

        public function login(){
            $conectar = parent::conexion();
            parent::set_names();
            if (isset($_POST["enviar"])) {
                $email = $_POST["correo"];
                $pass = $_POST["password"];

                if (empty($email) and empty($pass)  ) {
                    header("Location:".parent::ruta()."/index.php?m=2" );
                    exit();
                }else{
                    $stament = $conectar->prepare("Select * From usuario Where Email=:email and Contraseña=:pass");
                    $stament->bindParam(":email",$email);
                    $stament->bindParam(":pass",$pass);
                    $stament->execute();
                    $resultado = $stament->fetch();

                    if (is_array($resultado) and count($resultado)>0  ) {
                        $_SESSION["IdUsuario"] = $resultado["IdUsuario"];
                        $_SESSION["Nombre"] = $resultado["Nombre"];
                        $_SESSION["Apellido"] = $resultado["Apellido"];

                        header("Location: " . Conectar::ruta() . "/view/Home/index.php");
                        // exit();           
                    }else{
                        header("Location:".Conectar::ruta()."/index.php?m=1");
                        // exit();
                    }

                }


            }
        }

        public function mostrar()
        {
            $conectar = parent::conexion();
            parent::set_names();
            $email = $_POST["correo"];
            $pass = $_POST["password"];
            $stament = $conectar->prepare("Select * From usuario Where Email=:email and Contraseña=:pass");
            $stament->bindParam(":email",$email);
            $stament->bindParam(":pass",$pass);
            $stament->execute();
            $resultado = $stament->fetch();
            

            $_SESSION["Nombre"] = $resultado["Nombre"];
           echo  "Mi nombre es : ".$_SESSION["Nombre"];

        //    print_r($resultado);
        }


    }



?>
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
                    $stament = $conectar->prepare("
                    SELECT 
                    u.IdUsuario,
                    u.Nombre,
                    u.Apellido,
                    JSON_ARRAYAGG(
                        JSON_OBJECT(
                            'rol_id', ru.role_id,
                            'rol_name', r.nombre
                        )
                    ) as roles
                    FROM usuario u  
                    INNER JOIN role_user ru ON ru.user_id = u.IdUsuario 
                    INNER JOIN roles r ON ru.role_id = r.id 
                    WHERE Email=:email and Contraseña=:pass
                    GROUP BY u.IdUsuario, u.Nombre, u.Apellido;
                    ");
                    $stament->bindParam(":email",$email);
                    $stament->bindParam(":pass",$pass);
                    $stament->execute();
                    $resultado = $stament->fetch();

                    if (is_array($resultado) and count($resultado)>0  ) {
                        $_SESSION["IdUsuario"] = $resultado["IdUsuario"];
                        $_SESSION["Nombre"] = $resultado["Nombre"];
                        $_SESSION["Apellido"] = $resultado["Apellido"];
                        $_SESSION['roles'] = json_encode($resultado['roles']);
                        header("Location: " . Conectar::ruta() . "/view/Home/index.php");
                        // exit();           
                    }else{
                        header("Location:".Conectar::ruta()."/index.php?m=1");
                        // exit();
                    }

                }


                $roles = [
                    [
                        'rol_id' => 1,
                        'rol_name' =>'soporte'
                    ],
                    [
                        'rol_id' => 2,
                        'rol_name' =>'usuario'
                    ]
                    ];

                if (count ($roles) >0 ) {
                    
                    for ($i=0; $i <count($roles) ; $i++) { 
                        if ($i['rol_id'] = 1) {
                            // Me muestre los boton de solicitudes del sidebar 
                        } elseif ($i['rol_id'] = 2) {
                            // Me muestre el boton para crear una solicitud 
                        }

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
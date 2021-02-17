<?php
class VerificarUsuarios{
    private $db;
    private $datosUsuario;
    private $usuarioExiste;

    public function __contruct(){
        $this->datosUsuario = array();
    }

    public function ConsultarUsuario($email, $clave){
        require_once("../db/db.php");
        $instanciaClase = new Conectar();
        $instanciaMetodo = $instanciaClase->Conexion();
        if($queryConsultaUsuarios = mysqli_query($instanciaMetodo, "SELECT * FROM USUARIO WHERE CORREO='$email' and CLAVE='$clave'")){
            if(mysqli_num_rows($queryConsultaUsuarios) > 0){
                while($userData = $queryConsultaUsuarios->fetch_assoc()){
                    $this->datosUsuarios[] = $userData;
                }
                return $this->datosUsuarios;
            }else{
                return "El usuario está incorrecto o no existe.";
            }
        }
    }
}
?>
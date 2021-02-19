<?php
$userEmail = $_GET['userEmail'];
$userPassword = $_GET['userPassword'];

//Se hace el llamado al modelo
require_once("../model/personas_model.php");
$instanciaClase = new VerificarUsuarios();
$instanciaMetodo = $instanciaClase->ConsultarUsuario($userEmail, $userPassword);

if($instanciaMetodo == "El usuario está incorrecto o no existe."){
    echo $instanciaMetodo; 
}else{
    echo "Usuario existe.";
}

?>
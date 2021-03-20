<?php
	  session_start();
	  include('class.consultas.php');
	  $usuario  	   = $_POST['username'];
	  $password 	   = $_POST['password'];
	  //$usuario  	   = "php";
	  //$password 	   = "123";
	  $ObjetosPermisos = new Permisos;
	  $Estatus         = 0;
	  $Login           = $ObjetosPermisos->ValidacionLogin($usuario,$password);
	  if(!empty($Login)){
	  	 foreach ($Login as $key => $value) {
	  	 	$Id 			= $value['id_usuario'];
	  	 	$Nombre			= $value['nombre']." ".$value['apellido'];
	  	 	$Estatus_User   = $value['estado'];
	  	 	if($Verificado==0){
	  	 		$Estatus = 3;
	  	 	}elseif($Estatus_User==0) {
	  	 		# code...
	  	 		$Estatus = 2;
	  	 	}else{
	  	 		$Estatus    = 1;
	  	 	}
	  	 	if($Estatus==1){
	  	 		$_SESSION['USERNO'] = $Nombre; 
	  	 		$_SESSION['USERID'] = $Id;
	  	 	}
	  	 }
	  }else{
	  	$Estatus     = 0;
	  }
	  echo $Estatus;
?>
<?php
	  session_start();
	  include('class.consultas.php');

	  $usuario = $_POST['usuario_login'];
	  $password = $_POST['password_login'];

	  $ObjetosPermisos = new Permisos;
	  $Estatus         = 0;
	  $Login           = $ObjetosPermisos->ValidacionLogin($usuario,$password);

	  if(!empty($Login))
	  {
	  	 foreach ($Login as $key => $value) 
	  	 {
	  	 	$Id 			= $value['ID'];
	  	 	$Nombre			= $value['NOMBRE']." ".$value['APELLIDOS'];
	  	 	$Verificado 	= $value['VERIFICADO'];
	  	 	$Estatus_User   = $value['ESTATUS'];

	  	 	if($Verificado==0)
	  	 	{
	  	 		$Estatus = 3;
	  	 	}
	  	 	elseif($Estatus_User==0) 
	  	 	{
	  	 		$Estatus = 2;
	  	 	}
	  	 	else
	  	 	{
	  	 		$Estatus = 1;
	  	 	}

	  	 	if($Estatus==1)
	  	 	{
	  	 		$_SESSION['USERNO'] = $Nombre; 
	  	 		$_SESSION['USERID'] = $Id;
	  	 	}
	  	 }

	  	 header('Location: principal.php');
	  }
	  else
	  {
	  	$Estatus = 0;
	  }

	  echo $Estatus;
?>
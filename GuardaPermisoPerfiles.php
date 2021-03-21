<?php 
	session_start();
    include('class.consultas.php');
    include('clases/class.encriptar.php');
    $ObjetosPermisos = new Permisos;
	$txtIdIconos	= $_POST['txtIdIconos'];
	$txtContador    = $_POST['txtContador'];
	$txtidMenu      = $_POST['txtidMenu'];
	$txtIdIconos    = explode(",",$txtIdIconos);

	for ($i=1;$i<=$txtContador;$i++)
	{
		for($j=0;$j<count($txtIdIconos);$j++)
		{
			$Permisos = $_POST[$i.$txtIdIconos[$j]];
			$Permisos = explode("|",$Permisos);
			$IdIcono  = $Permisos[0];
			$Estatus  = $Permisos[1];
			$IdMenu   = $Permisos[2];
			$IdPerfil = $_POST['txtIdPerfil'];

			$ExistePer= $ObjetosPermisos->PermisoActivado($IdPerfil,$IdIcono,$IdMenu,"0,1");
			if($ExistePer==true)
			{
				$ActualizaPermisos = $ObjetosPermisos->AsignaPermisosPerfiles($IdPerfil,$IdIcono,$IdMenu,$Estatus,"1");
			}
			else
			{
				if($Estatus==1)
				{
					$ActualizaPermisos = $ObjetosPermisos->AsignaPermisosPerfiles($IdPerfil,$IdIcono,$IdMenu,$Estatus,"0");
				}
			}
		}
	}
	echo "1";
?>
<?php

require("clases/config.php");

class conectorDB extends config
{
	private $conexion;
	public function __construct(){
		$this->conexion = parent::conectar();
		return $this->conexion;										
	}
	
	public function EjecutarSentencia($consulta, $valores = array()){  //funcion principal, ejecuta todas las consultas
		$resultado = false;
		
		if($statement = $this->conexion->prepare($consulta)){  //prepara la consulta
			if(preg_match_all("/(:\w+)/", $consulta, $campo, PREG_PATTERN_ORDER)){ //tomo los nombres de los campos iniciados con :xxxxx
				$campo = array_pop($campo); //inserto en un arreglo
				foreach($campo as $parametro){
					$statement->bindValue($parametro, $valores[substr($parametro,1)]);
				}
			}
			try {
				if (!$statement->execute()) { //si no se ejecuta la consulta...
					print_r($statement->errorInfo()); //imprimir errores
					return false;
				}
				$resultado = $statement->fetchAll(PDO::FETCH_ASSOC); //si es una consulta que devuelve valores los guarda en un arreglo.
				$statement->closeCursor();
			}
			catch(PDOException $e){
				echo "Error de ejecución: \n";
				print_r($e->getMessage());
			}	
		}
		return $resultado;
		$this->conexion = null; //cerramos la conexión
	} /// Termina funcion consultarBD
}/// Termina clase conectorDB

class Permisos
{
	private $permisos;
	/*Permisos Iconos*/
	public function iconos(){
		$consulta = "SELECT * FROM icono WHERE estado=1";
		$conexion = new conectorDB;
		$this->permisos = $conexion->EjecutarSentencia($consulta);
		return $this->permisos;
	}
	public function PermisoActivado($Id_Rol,$Id_Icono,$Id_Menu,$Estado){
		$consulta = "SELECT estado FROM asigna_permisos_rol WHERE id_menu='".$Id_Menu."' and id_rol='".$Id_Rol."'";
		$consulta = $consulta." AND id_icono='".$Id_Icono."' AND estado IN (".$Estado.")";
		$conexion = new conectorDB;
		$this->permisos = $conexion->EjecutarSentencia($consulta);
		if(!empty($this->permisos)){
			return true;
		}else{
			return false;
		}
	}
	public function AsignaPermisosRoles($IdRol,$IdIcono,$IdMenu,$Estado,$Accion){
		$Actualizar = false; //creamos una variable de control
		$consulta   = "";
		$valores    = array();
		//Si Accion es 1 Entonces Actualizamos
		if($Accion==1){
			$consulta = "UPDATE asigna_permisos_rol SET estado=:estado WHERE id_rol=:id_rol AND id_icono=:id_icono AND id_menu=:id_menu";
			//variables para actualizar
			$valores = array("id_rol"=>$IdRol,"id_icono"=>$IdIcono,"estado"=>$Estado,"id_menu"=>$IdMenu);
		}else{
			$consulta = "INSERT INTO asigna_permisos_rol (id_rol, id_icono,id_menu) VALUES(:id_rol, :id_icono, :id_menu)";
			//variables para actualizar
			$valores = array("id_rol"=>$IdRol,"id_icono"=>$IdIcono,"id_menu"=>$IdMenu);
		}
		$oConexion = new conectorDB; //instanciamos conector
		$Actualizar= $oConexion->EjecutarSentencia($consulta, $valores);
		
		if($Actualizar !== false){
			return true;
		}
		else{
			return false;
		}
	}
	public function BuscarPermisosRol($idRol){
		$consulta = "SELECT * FROM asigna_permisos_rol WHERE id_rol='".$idRol."' and estado=1";
		$conexion = new conectorDB;
		$this->permisos = $conexion->EjecutarSentencia($consulta);
		return $this->permisos;
	}
	/*Fin Permisos Iconos*/
	public function ValidacionLogin($usuario,$password){
		$consulta = "SELECT * FROM usuario WHERE usuario='".$usuario."' and contrasena='".$password."' limit 1";
		$conexion = new conectorDB;
		$this->permisos = $conexion->EjecutarSentencia($consulta);
		return $this->permisos;
	}
	public function Menu($id){
		$consulta = "SELECT M.id_menu, M.orden,M.descripcion, M.imagen, M.url FROM menu as M INNER JOIN permiso AS P";
		$consulta = $consulta." on M.id_menu=P.id_menu WHERE P.id_usuario=".$id." AND P.estado=1 ORDER BY M.orden ASC";
		$conexion = new conectorDB;
		$this->permisos = $conexion->EjecutarSentencia($consulta);
		return $this->permisos;
	}
	public function listamenu(){
		$consulta = "SELECT * FROM menu WHERE id_menu>0 order by orden ASC";
		$conexion = new conectorDB;
		$this->permisos = $conexion->EjecutarSentencia($consulta);
		return $this->permisos;
	}
	public function iconos_menu($id_usuario,$id_menu){
		$consulta = "SELECT I.id_icono, I.descripcion, I.imagen, P.estado FROM icono As I inner join permiso_icono as P";
		$consulta = $consulta." on I.id_icono=P.id_icono WHERE P.id_usuario = ".$id_usuario." AND P.id_menu = ".$id_menu." AND P.estado=1";
		$conexion = new conectorDB;
		$this->permisos = $conexion->EjecutarSentencia($consulta);
		return $this->permisos;
	}
	public function permisos_accion_ejecucion($id_usuario, $id_menu,$id_icono){
		$consulta = "SELECT I.descripcion, I.imagen, P.estado FROM icono As I inner join permiso_icono as P";
		$consulta = $consulta." on I.id_icono=P.id_icono WHERE P.id_usuario = ".$id_usuario." AND I.id_icono=".$id_icono." AND P.id_menu = ".$id_menu." AND P.estado=1";
		$conexion = new conectorDB;
		$this->permisos = $conexion->EjecutarSentencia($consulta);
		return $this->permisos;
	}
	public function BuscarMenu($id){
		$consulta = "SELECT * FROM menu WHERE id_menu='".$id."' limit 1";
		$conexion = new conectorDB;
		$this->permisos = $conexion->EjecutarSentencia($consulta);
		return $this->permisos;
	}
	public function EliminarMenu($id){
		$consulta  	 = "DELETE FROM menu WHERE id_menu=:id_menu";
		$valores   	 = array("id_menu"=>$id);
		$oConexion 	 = new conectorDB; //instanciamos conector
		$EliminaMenu = $oConexion->EjecutarSentencia($consulta, $valores);
		if($EliminaMenu !== false){
			return true;
		}
		else{
			return false;
		}
	}
	public function ActualizaMenu($descripcion,$url,$ordenamiento,$estatus,$id,$img){
		 $registrar = false; //creamos una variable de control
		 $imagen    = "";
		 $consulta  = "";
		 $valores = array();
		 if($img=="0"){
		 	$consulta = "UPDATE menu SET descripcion=:descripcion, url=:url, orden=:orden, estado=:estado WHERE id_menu=:id_menu";
			//variables para actualizar
			$valores = array("descripcion"=>$descripcion,
							"url"=>$url,
							"orden"=>$ordenamiento,
							"estado"=>$estatus,
							"id_menu"=>$id);
		 }else{
		 	$consulta = "UPDATE menu  SET descripcion=:descripcion, url=:url, imagen=:imagen, orden=:orden, estado=:estado WHERE id_menu=:id_menu";
			//variables para actualizar
			$valores = array("descripcion"=>$descripcion,
							"url"=>$url,
							"orden"=>$ordenamiento,
							"estado"=>$estatus,
							"imagen"=>$img,
							"id_menu"=>$id);
		 }
		
		$oConexion = new conectorDB; //instanciamos conector
		$registrar = $oConexion->EjecutarSentencia($consulta, $valores);
		
		if($registrar !== false){
			return true;
		}
		else{
			return false;
		}
	}
	/*Perfiles*/
	public function Roles(){
		$consulta = "SELECT * FROM rol order by id_rol ASC";
		$conexion = new conectorDB;
		$this->permisos = $conexion->EjecutarSentencia($consulta);
		return $this->permisos;
	}
	public function BuscarPerfiles($id){
		$consulta = "SELECT * FROM rol WHERE id_rol='".$id."' limit 1";
		$conexion = new conectorDB;
		$this->permisos = $conexion->EjecutarSentencia($consulta);
		return $this->permisos;
	}
	public function ActualizaPerfil($IdRol,$DescripcionRol,$EstadoRol,$accion){
		$registrar = false; //creamos una variable de control
		$consulta  = "";
		$valores   = array();
		if($accion==1){
			$consulta = "UPDATE rol SET descripcion=:descripcion, estado=:estado WHERE id_rol=:id_rol";
			//variables para actualizar
			$valores  = array("descripcion"=>$DescripcionRol,"estado"=>$EstadoRol,"id_rol"=>$IdRol);
		}else{
			$consulta = "insert into rol(descripcion, estado) values (:descripcion, :estado)";
			$valores  = array("descripcion"=>$DescripcionRol,"estado"=>$EstadoRol);
		}
		$oConexion = new conectorDB; //instanciamos conector
		$registrar = $oConexion->EjecutarSentencia($consulta, $valores);
		
		if($registrar !== false){
			return true;
		}
		else{
			return false;
		}
	}
	/*Usuarios*/
	public function Usuarios(){
		$consulta = "SELECT * FROM usuario order by id_usuario ASC";
		$conexion = new conectorDB;
		$this->permisos = $conexion->EjecutarSentencia($consulta);
		return $this->permisos;
	}
	public function BuscarUsuario($id){
		$consulta = "SELECT * FROM usuario WHERE id_usuario=".$id."  order by id_usuario ASC";
		$conexion = new conectorDB;
		$this->permisos = $conexion->EjecutarSentencia($consulta);
		return $this->permisos;
	}
	public function BuscaEmail($Email){
		$consulta = "SELECT * FROM usuario WHERE correo='".$Email."' limit 1";
		$conexion = new conectorDB;
		$this->permisos = $conexion->EjecutarSentencia($consulta);
		return $this->permisos;
	}
	public function GuardarUsuario($id,$nombre,$apellidos,$email,$rol,$estatus){
		date_default_timezone_set('America/Bogota');
		$Actualizar = false; //creamos una variable de control
		$consulta   = "";
		$usuario    = explode("@",$email);
		$password   = "";
		$fecha1     = date('Y-m-j H:i:s');
		$valores    = array();
		/*Generamos la contraseña*/
        $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
        for($i=0;$i<12;$i++) {
            $password .= substr($str,rand(0,62),1);
        }
		//Si Accion es 1 Entonces Actualizamos
		if($id!=0){
			$consulta = "UPDATE usuario SET nombre=:nombre,apellido=:apellido, estado=:estado,";
			$consulta = $consulta."tipo_usuario=:tipo_usuario,fecha_actualizacion=:fecha_actualizacion WHERE id_usuario=:id_usuario";
			//variables para actualizar
			$valores = array("nombre"=>$nombre,"apellido"=>$apellidos,"estado"=>$estatus,"tipo_usuario"=>$rol,"fecha_actualizacion"=>$fecha1,"id_usuario"=>$id);
			$this->AsignaPermisosAutomaticosUsuarios($rol,$id);
		}else{
			$consulta = "INSERT INTO usuario (nombre, apellido, correo, usuario, contrasena, fecha_registro, estado, tipo_usuario)";
			$consulta = $consulta." VALUES (:nombre,:apellido,:correo,:usuario,:contrasena,:fecha_registro,:estado,:tipo_usuario)";
			//variables para actualizar
			$valores = array("nombre"=>$nombre,"apellido"=>$apellidos,"correo"=>$email,"usuario"=>$usuario[0],"contrasena"=>$password,"fecha_registro"=>$fecha1,"estado"=>$estatus,"tipo_usuario"=>$estatus);
		}
		$oConexion = new conectorDB; //instanciamos conector
		$Actualizar= $oConexion->EjecutarSentencia($consulta, $valores);
		
		if($Actualizar !== false){
			return true;
		}
		else{
			return false;
		}
	}
	public function EliminaPermisosIconos($idUser){
		$registrar = false; //creamos una variable de control
		$consulta  = "DELETE FROM permiso_icono WHERE id_usuario=:id_usuario AND id_menu !=0";
		$valores   = array("id_usuario"=>$idUser);
		
		$oConexion = new conectorDB; //instanciamos conector
		$registrar = $oConexion->EjecutarSentencia($consulta, $valores);
		
		if($registrar !== false){
			return true;
		}
		else{
			return false;
		}
	}
	public function AsignarPermisosUsuariosIconos($idusuario, $idIcono, $IdMenu){

		/*Buscamos */
		$registrar = false; //creamos una variable de control
		$consulta  = "INSERT INTO permiso_icono (id_usuario, id_icono, id_menu) VALUES (:id_usuario, :id_icono, :id_menu)";
		$valores   = array("id_usuario"=>$idusuario,"id_icono"=>$idIcono,"id_menu"=>$IdMenu);
		
		$oConexion = new conectorDB; //instanciamos conector
		$registrar = $oConexion->EjecutarSentencia($consulta, $valores);
		
		if($registrar !== false){
			return true;
		}
		else{
			return false;
		}
	}
	public function AsignarPermisosUsuariosMenu($idusuario, $IdMenu){
		/*Buscamos Permiso Menu*/
		$consulta1 = "SELECT * FROM permiso WHERE id_usuario='".$idusuario."' AND id_menu='".$IdMenu."'";
		$conexion = new conectorDB;
		$this->permisos = $conexion->EjecutarSentencia($consulta1);
		$PermisoMenu    = $this->permisos;
		$registrar      = false; //creamos una variable de control
		$consulta       = "";
		$valores        = array();
		if(!empty($PermisoMenu)){
			$consulta  = "UPDATE permiso SET estado=:estado WHERE id_usuario=:id_usuario AND id_menu=:id_menu";
			$valores   = array("estado"=>"1","id_usuario"=>$idusuario,"id_menu"=>$IdMenu);
		}else{
			$consulta  = "INSERT INTO permiso (id_usuario, id_menu) VALUES (:id_usuario, :id_menu)";
			$valores   = array("id_usuario"=>$idusuario,"id_menu"=>$IdMenu);
		}
		$oConexion = new conectorDB; //instanciamos conector
		$registrar = $oConexion->EjecutarSentencia($consulta, $valores);
		
		if($registrar !== false){
			return true;
		}
		else{
			return false;
		}
	}
	/*Funcion que se encarga de asignar los permisos de acuerdo al perfil elegido*/
	public function AsignaPermisosAutomaticosUsuarios($idRol, $idUsuario){
		/*Eliminamos los permisos asignados a ese usuario*/
		$EstatusEliminar = $this->EliminaPermisosIconos($idUsuario);
		if($EstatusEliminar==true){
			/*Traemos los permisos asignados a ese perfil*/
			$PermisosRol  = $this->BuscarPermisosRol($idRol);
			if(!empty($PermisosRol)){
				foreach ($PermisosRol as $key => $value) {
					# code...
					$IdIcono      = $value["id_icono"];
					$IdMenu       = $value["id_menu"];
					$this->AsignarPermisosUsuariosIconos($idUsuario,$IdIcono,$IdMenu);
					$this->AsignarPermisosUsuariosMenu($idUsuario,$IdMenu);
				}
			}else{
				echo " <br/>El Perfil Que Selecciono No tiene Asignado Ningun Permiso ";
			}
			
		}
		
	}
}/// TERMINA CLASE USUARIOS ///
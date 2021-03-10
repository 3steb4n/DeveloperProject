<?php

	class Usuario
	{
		private $pdo;

		public $id_usuario;
		public $nombre;
		public $apellido;
		public $correo;
		public $clave;
		public $id_rol;

		// Función Constructor
		public function __CONSTRUCT()
		{
			try
			{
				$this->pdo = Conexion::StartUp();     
			}
			catch(Exception $e)
			{
				die($e->getMessage());
			}
		}
		
		//  Función Listar usuario
		public function Listar_Usuario()
		{
			try
			{
				$result = array();

				$stm = $this->pdo->prepare("SELECT usuario.`nombre`, usuario.`apellido`, usuario.`correo`, rol.`nombre_rol` FROM usuario
											INNER JOIN rol
											ON usuario.`id_rol` = rol.`id_rol`
											WHERE estado = 'Activo'");
				$stm->execute();

				return $stm->fetchAll(PDO::FETCH_OBJ);
			}
			catch(Exception $e)
			{
				die($e->getMessage());
			}
		}

		// Función Obtener usuario por id
		public function getting($id_usuario)
		{
			try 
			{
				$stm = $this->pdo
				          ->prepare("SELECT * FROM usuario WHERE id_usuario = ?");
				          

				$stm->execute(array($id_usuario));
				return $stm->fetch(PDO::FETCH_OBJ);
			} 
			catch (Exception $e) 
			{
				die($e->getMessage());
			}
		}

		// Función Eliminar usuario
		public function Eliminar($id_usuario)
		{
			try 
			{
				$stm = $this->pdo
				            ->prepare("UPDATE usuario SET estado = 'Inactivo' WHERE id_usuario = ?");			          

				$stm->execute(array($id_usuario));
			} 
			catch (Exception $e) 
			{
				die($e->getMessage());
			}
		}

		// Función Actualizar usuario
		public function Actualizar($data)
		{
			try 
			{
				$sql = "UPDATE usuario SET 
							nombre = ?,
							apellido = ?,
							correo = ?,
							clave = ?,
							id_rol = ?
					    WHERE id_usuario = ?";

				$this->pdo->prepare($sql)
				     ->execute(
					    array(
	                        $data->nombre,
	                        $data->apellido,
	                        $data->correo,
	                        $data->clave,
	                        $data->id_rol,
	                        $data->id_usuario
						)
					);
			} 
			catch (Exception $e) 
			{
				die($e->getMessage());
			}
		}

		// Función Registrar usuario
		public function Registrar($data)
		{
			try 
			{
			$sql = "INSERT INTO `usuario` (nombre,apellido,correo,clave,id_rol) 
			        VALUES (?,?,?,?,?)";

			$this->pdo->prepare($sql)
			     ->execute(
					array(
	                    $data->nombre,
	                    $data->apellido,
	                    $data->correo,
	                    $data->clave,
	                    $data->id_rol                  
	                )
				);
			} 
			catch (Exception $e) 
			{
				die($e->getMessage());
			}
		}

	}
?>
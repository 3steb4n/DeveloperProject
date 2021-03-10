<?php

	class Rol
	{
		private $pdo;

		public $id_rol;
		public $nombre_rol;

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
		
		//  Función Listar ROL
		public function Listar_Rol()
		{
			try
			{
				$result = array();

				$stm = $this->pdo->prepare("SELECT * FROM rol WHERE estado_rol = 'Activo'");
				$stm->execute();

				return $stm->fetchAll(PDO::FETCH_OBJ);
			}
			catch(Exception $e)
			{
				die($e->getMessage());
			}
		}

		// Función Obtener ROL por id
		public function getting($id_rol)
		{
			try 
			{
				$stm = $this->pdo
				          ->prepare("SELECT * FROM rol WHERE id_rol = ?");
				          

				$stm->execute(array($id_rol));
				return $stm->fetch(PDO::FETCH_OBJ);
			} 
			catch (Exception $e) 
			{
				die($e->getMessage());
			}
		}

		// Función Eliminar ROL
		public function Eliminar($id_rol)
		{
			try 
			{
				$stm = $this->pdo
				            ->prepare("UPDATE rol SET estado_rol = 'Inactivo' WHERE id_rol = ?");			          

				$stm->execute(array($id_rol));
			} 
			catch (Exception $e) 
			{
				die($e->getMessage());
			}
		}

		// Función Actualizar ROL
		public function Actualizar($data)
		{
			try 
			{
				$sql = "UPDATE rol SET 
							nombre_rol = ?
					    WHERE id_rol = ?";

				$this->pdo->prepare($sql)
				     ->execute(
					    array(
	                        $data->nombre_rol,
	                        $data->id_rol
						)
					);
			} 
			catch (Exception $e) 
			{
				die($e->getMessage());
			}
		}

		// Función Registrar ROL
		public function Registrar($data)
		{
			try 
			{
			$sql = "INSERT INTO `rol` (nombre_rol) 
			        VALUES (?)";

			$this->pdo->prepare($sql)
			     ->execute(
					array(
	                    $data->nombre_rol                    
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
<?php

	class Login
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

		// Función Validar CORREO
		public function ValidarCorreo($data)
		{
			try
			{
				$stm = $this->pdo->prepare("SELECT COUNT(*) conta FROM usuario WHERE correo = ?");
				$stm->execute(array($data->correo));

				return $stm->fetch(PDO::FETCH_OBJ);
			}
			catch(Exception $e)
			{
				die($e->getMessage());
			}
		}

		// Función Validar CONTRASEÑA
		public function ValidarPass($data)
		{
			try
			{
				$stm = $this->pdo->prepare("SELECT COUNT(*) conta FROM usuario WHERE clave = ?");
				$stm->execute(array($data->clave));

				return $stm->fetch(PDO::FETCH_OBJ);
			}
			catch(Exception $e)
			{
				die($e->getMessage());
			}
		}

		// Función Validar USUARIO
		public function ValidarPersona($data)
		{
			try
			{
				$stm = $this->pdo->prepare("SELECT COUNT(*) conta FROM usuario WHERE correo = ? AND clave = ?");
				$stm->execute(array($data->correo, $data->clave));

				return $stm->fetch(PDO::FETCH_OBJ);
			}
			catch(Exception $e)
			{
				die($e->getMessage());
			}
		}

		// Función Cargar Datos USUARIO
		public function CargarPersona($data)
		{
			try
			{
				$stm = $this->pdo->prepare("SELECT nombre, apellido, id_rol FROM usuario WHERE correo = ? AND clave = ?");
				$stm->execute(array($data->correo, $data->clave));

				return $stm->fetch(PDO::FETCH_OBJ);
			}
			catch(Exception $e)
			{
				die($e->getMessage());
			}
		}
	}
?>
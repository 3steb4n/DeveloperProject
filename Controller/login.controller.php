<?php

require_once 'Model/login.php';

	class LoginController
	{
		private $model;

		// Función Constructor
		public function __CONSTRUCT()
		{
			$this->model = new Login();
		}

		// Función Index
		public function Index()
		{	
	        require_once 'View/layouts/header-login.php';
	        require_once 'View/Login/login.php';
	        require_once 'View/layouts/footer-login.php';
	    }

	    // Función Validar Logueo
	    public function Validar()
	    {
	    	$alm = new Login();

	    	$alm->correo = $_POST['email'];
	    	$alm->clave = $_POST['pass'];

	    	$val = $this->model->ValidarCorreo($alm);

	    	if ($val->conta != 0) 
	    	{
	    		$val = $this->model->ValidarPass($alm);

	    		if ($val->conta != 0) 
	    		{
	    			$val = $this->model->ValidarPersona($alm);

	    			if ($val->conta != 0) 
	    			{
	    				$val = $this->model->CargarPersona($alm);

	    				$alm->nombre = $_SESSION['nombre'];
	    				
	    				header('Location: ?c=Dashboard');
	    			}
	    			else
	    			{
	    				$alerta_p = "Este usuario no existe en el sistema";

	    				include_once 'View/layouts/header-login.php';
	        			include_once 'View/Login/login.php';
	        			include_once 'View/layouts/footer-login.php';
	    			}
	    		}
	    		else
	    		{
	    			$alerta_p = "Esta contraseña es incorrecta";

	    			include_once 'View/layouts/header-login.php';
	        		include_once 'View/Login/login.php';
	        		include_once 'View/layouts/footer-login.php';
	    		}
	    	} 
	    	else
	    	{
	    		$alerta_c = "Este correo no existe en el sistema";

	    		include_once 'View/layouts/header-login.php';
	        	include_once 'View/Login/login.php';
	        	include_once 'View/layouts/footer-login.php';
	    	}
	    }
	}
?>
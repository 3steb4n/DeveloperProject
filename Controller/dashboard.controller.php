<?php
	
	require_once 'Model/usuario.php';
	require_once 'Model/rol.php';

	class DashboardController
	{	
		private $model;
		private $model2;

		// Función Constructor
		public function __CONSTRUCT()
		{
			$this->model = new Usuario();
			$this->model2 = new Rol();
		}

		// Función Index
		public function Index()
		{	
			require_once 'View/layouts/aside.php';
	        require_once 'View/layouts/header.php';
	        require_once 'View/Dashboard/dashboard.php';
	        require_once 'View/layouts/footer.php';
	    }
	}
?>
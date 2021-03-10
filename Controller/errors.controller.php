<?php
	
	class ErrorsController
	{

		// Función Constructor
		public function __CONSTRUCT()
		{

		}

		// Función Index
		public function Index()
		{	
			require_once 'View/layouts/aside.php';
	        require_once 'View/layouts/header.php';
	        require_once 'View/Errors/error.php';
	        require_once 'View/layouts/footer.php';
	    }
	}
?>
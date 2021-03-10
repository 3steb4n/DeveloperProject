<?php

require_once 'Model/usuario.php';
require_once 'Model/rol.php';

	class UsuarioController
	{
		private $model;

		// Función Constructor
		public function __CONSTRUCT()
		{
			$this->model = new Usuario();
			$this->model3 = new Rol();
		}

		// Función Index
		public function Index()
		{	
			require_once 'View/layouts/aside.php';
	        require_once 'View/layouts/header.php';;
	        require_once 'View/Usuario/Usuario.php';
	        require_once 'View/layouts/footer.php';
	    }

	    // Función para inicializar el CRUD
		public function Crud()
		{
	        $alm = new Usuario();
	        
	        if(isset($_REQUEST['id_usuario'])){
	            $alm = $this->model->getting($_REQUEST['id_usuario']);
	        }
	        
	        require_once 'View/layouts/aside.php';
	        require_once 'View/layouts/header.php';
	        require_once 'View/Usuario/usuario-editar.php';
	        require_once 'View/layouts/footer.php';
	    }
    
    	// Función para Guardar los cambios echos a la tabla
    	public function Guardar()
	    {
	        $alm = new Usuario();
	        
	        $alm->id_usuario = $_REQUEST['id_usuario'];
	        $alm->nombre = $_REQUEST['nombres'];
	        $alm->apellido = $_REQUEST['apellidos'];
			$alm->correo = $_REQUEST['email'];
			$alm->clave = /*password_hash(*/$_REQUEST['clave']/*, PASSWORD_DEFAULT)*/;
			$alm->id_rol = $_REQUEST['rol'];
			
	        // SI ID PERSONA ES MAYOR QUE CERO (0) INDICA QUE ES UNA ACTUALIZACIÓN DE ESA TUPLA EN LA TABLA PERSONA, SINO SIGNIFICA QUE ES UN NUEVO REGISTRO

	        $alm->id_usuario > 0 
	           ? $this->model->Actualizar($alm)
	           : $this->model->Registrar($alm);

	       header('Location: ?c=Usuario');
	    }
    	
    	// Función para Desactivar un campo
	    public function Eliminar()
	    {
	        $this->model->Eliminar($_REQUEST['id_usuario']);
	        header('Location: ?c=Usuario');
	    }
	}
?>
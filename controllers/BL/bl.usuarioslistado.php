<?php
	$_ruta = "";
    $action = isset($_REQUEST["action"]) ? $_REQUEST["action"] : 'login';

# Mostrar Plantilla Proveedores Nuvo

    if ($action=='usuarioslistado'){
       
        $view = new Smarty;
		$view->display('usuarioslistado.tpl');
	}


	if($action=='ListadoUsuarios')
    {
        $tipo         = 1;
        $usuario      = "";
        $contrasena   = "";
        
        
        $_ruta = "../../";
        require_once ($_ruta."models/DA/da.usuario.php");

        $cls    = new ClsUsuario();
       	$array  = $cls->fcListadoUsuarios($tipo,$usuario,$contrasena); 
       	$cls    = null;
        $array  = array('data' => $array);
        echo json_encode($array);

    }

?>
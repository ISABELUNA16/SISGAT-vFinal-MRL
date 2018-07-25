<?php
	$_ruta = "";
    #require_once ($_ruta."models/DA/da.usuario.php");
    $action = isset($_REQUEST["action"]) ? $_REQUEST["action"] : 'login';

# Mostrar Plantilla PRODUCTOS

    if ($action=='splash'){
       
        $view = new Smarty;	
		$view->display('splash.tpl');
	}else{
		$view->display('login.tpl');
	}
?>	

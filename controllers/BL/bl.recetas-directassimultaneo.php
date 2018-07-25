<?php

	$_ruta = "";
    $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'login';
  


    if ($action=='recetas-directassimultaneo'){
       
        $view = new Smarty;		
		$view->display('recetas-directassimultaneo.tpl');
		
	}else{
		$view->display('login.tpl');
	}
?>	
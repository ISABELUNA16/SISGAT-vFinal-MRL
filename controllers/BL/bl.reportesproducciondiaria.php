<?php
	$_ruta = "";
    $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'login';

    if ($action=='reportesproducciondiaria'){
       
        $view = new Smarty;
		$view->display('reportesproducciondiaria.tpl');

	}else{

		$view->display('login.tpl');
	}
?>	
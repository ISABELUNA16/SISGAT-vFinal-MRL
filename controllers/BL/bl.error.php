<?php
	#Si no existe acción o ésta no es reconocida, mostrará Error  
	$view = new Smarty;
	$view->assign(array('nombres'=>'','paterno'=>'','materno'=>'','perfil'=>''));
	#Si la accion no coincide con la petición = Error
    $acción = isset($_GET["action"]) ? $_GET["action"] : 'error';

    if(isset($_SESSION['id']) && isset($_SESSION['iperfil'])){
    	#variables que están en sesion
    	$_SESSION['id']   		   = $_SESSION['id'];
    	$_SESSION['nombres']   	   = $_SESSION['nombres'];
    	$_SESSION['paterno']       = $_SESSION['paterno'];
    	$_SESSION['materno']       = $_SESSION['materno'];
    	$_SESSION['iperfil']       = $_SESSION['iperfil'];
    	$_SESSION['dperfil']       = $_SESSION['dperfil'];
    	$_SESSION['genero']        = $_SESSION['genero'];
    	$_SESSION['estado']        = $_SESSION['estado'];
    	$_SESSION['modulos']       = $_SESSION['modulos'];

    	if(!empty($_SESSION['id'])){
    		$view->assign(array(
    			'nombres'   => $_SESSION['nombres'],
    			'paterno'   => $_SESSION['paterno'],
    			'materno'   => $_SESSION['materno'],
    			'iperfil'   => $_SESSION['iperfil'],
    			'dperfil'   => $_SESSION['dperfil'],
    			'genero'    => $_SESSION['genero'],
    			'estado'    => $_SESSION['estado'],
    			'modulos'   => $_SESSION['modulos'],
    		));
    		$view->display('error.tpl');
    	}else{
    		$view->display('error.tpl');
    	}
    }else{
    	$view->display('error.tpl');
    }

?>
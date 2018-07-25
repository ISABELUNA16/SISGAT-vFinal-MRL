<?php
	$_SESSION['id']     = '';
    $_SESSION['nombres']= '';
    $_SESSION['paterno']= '';
    $_SESSION['materno']= '';
    $_SESSION['iperfil']= '';
    $_SESSION['dperfil']= '';
    $_SESSION['genero'] = '';
    $_SESSION['estado'] = '';
    $_SESSION['menuv']  = '';

    session_destroy();  

    $view = new Smarty;

    $view->assign(array('url' =>'<meta http-equiv="refresh" content="0;url=?action=login">'));

    $view->display('cerrarsesion.tpl');
?>
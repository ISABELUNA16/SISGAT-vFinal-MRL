<?php
	
	$_ruta = "";
    #require_once ($_ruta."models/DA/da.usuario.php");

    $action = isset($_REQUEST["action"]) ? $_REQUEST["action"] : 'login';
    
	     if ($action=='principal')
	     {
	       
	       $view = new Smarty;
	        #$view->assign(array('id'=>'','nombres' => '', 'dni' => '', 'perfil' => ''));
	       
	        if(isset($_SESSION['id'])){

		       	$_SESSION['id']			=   $_SESSION['id'];
				$_SESSION['nombres'] 	=	$_SESSION['nombres'];
				$_SESSION['dni']		=   $_SESSION['dni'];
				$_SESSION['perfil']		= 	$_SESSION['perfil'];
				
		
				if(!empty($_SESSION['id'])){
					
					$view->assign(array(	
									
									'id'			=> $_SESSION['id'],
									'nombres' 		=> $_SESSION['nombres'],
									'dni'			=> $_SESSION['dni'],
									'perfil'		=> $_SESSION['perfil'],
									'url'			=> '',
							));	

		        	$view->display('principal.tpl');
				
				}else{
					
					$view->assign(array(	

									'id'			=> '',
									'nombres' 		=> '',
									'perfil'		=> '',
									'dni'		    => '',
									'mensaje'		=> '',
									'url'			=> '<meta http-equiv="refresh" content="1;url=?action=login">',
							));	
					
					$view->display('login.tpl');
				} 
			
			#$view->display('principal.tpl');
		    }else{
			
			$view->display('login.tpl');
		    }
		}
    
?>	
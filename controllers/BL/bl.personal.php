<?php
	$_ruta = "";
    $action = isset($_REQUEST["action"]) ? $_REQUEST["action"] : 'login';

# Mostrar Plantilla Proveedores Nuvo

    if ($action=='personal'){
       
        $view = new Smarty;
		$view->display('personal.tpl');
	}


	if($action=='ListadoPersonal')
    {
        $tipo= 1;
        $id=''; 
        
        $_ruta = "../../";
        require_once ($_ruta."models/DA/da.personal.php");

        $cls    = new ClsPersonal();
       	$array  = $cls->fcConsultarPersonal($tipo,$id); 
       	$cls    = null;
        $array  = array('data' => $array);
        echo json_encode($array);

    }

    if($action=='ListadoPersonalIndividual')
    {
        $tipo= 2; 
        $id= $_POST["id"];    
        
        $_ruta = "../../";
        require_once ($_ruta."models/DA/da.personal.php");

        $cls    = new ClsPersonal();
        $array  = $cls->fcConsultarPersonal($tipo,$id); 
        $cls    = null;
        $array  = array('aaData' => $array);
        echo json_encode($array);

    }
?>	
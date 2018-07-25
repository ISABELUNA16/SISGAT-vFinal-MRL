<?php
	$_ruta = "";
    $action = isset($_REQUEST["action"]) ? $_REQUEST["action"] : 'login';

    if ($action=='recetaslistado'){
        $view = new Smarty;
		$view->display('recetaslistado.tpl');
	}


	if($action=='ConsultarRecetas')
    {
        $tipo         = 1;
        $cod         = '';
        $_ruta = "../../";

        require_once ($_ruta."models/DA/da.recetasnuevas.php");
        $cls    = new ClsRecetas();
       	$array  = $cls->fcConsultarRecetas($tipo,$cod); 
       	$cls    = null;
        $array  = array('data' => $array);
        echo json_encode($array);

    }

    if($action=='ConsultarRecetaIndividual')
    {
        $tipo         = 2;
        $cod          = $_POST["id"];

        $_ruta  = "../../";

        require_once ($_ruta."models/DA/da.recetasnuevas.php");
        $cls    = new ClsRecetas();
        $array  = $cls->fcConsultarRecetasIndividual($tipo,$cod); 
        $cls    = null;
        $array  = array('aaData' => $array);
        echo json_encode($array);

    }
    

?>	
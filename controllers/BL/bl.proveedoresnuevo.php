<?php
	$_ruta = "";
    $action = isset($_REQUEST["action"]) ? $_REQUEST["action"] : 'login';

# Mostrar Plantilla Proveedores Nuevo

    if ($action=='proveedoresnuevo'){
       
        $view = new Smarty;
		$view->display('proveedoresnuevo.tpl');
	}


	if($action=='RegistrarProveedor')
    {
        $tipo         = 3;
        $id           = $_POST['id'];
        $ruc  		  = isset($_POST['ruc']) ? $_POST['ruc']:"";
        $razonsocial  = isset($_POST['razonsocial']) ? $_POST['razonsocial']:"";
        $descripcion  = isset($_POST['descripcion']) ? $_POST['descripcion']:"";
        $direccion    = isset($_POST['direccion']) ? $_POST['direccion']:"";
        $telefono     = isset($_POST['telefono']) ? $_POST['telefono']:"";
        $email        = isset($_POST['email']) ? $_POST['email']:"";
        $estado       = 1;

       
        $_ruta = "../../";
        require_once ($_ruta."models/DA/da.proveedoreslistado.php");

        $cls    = new ClsProveedor();
       	$array  = $cls->fcTransaccionProveedor($tipo,$id,$ruc,$razonsocial,$descripcion,$direccion,$telefono,$email,$estado); 
       	$cls    = null;
        $array  = array('aaData' => $array);
        echo json_encode($array);

    }

?>	
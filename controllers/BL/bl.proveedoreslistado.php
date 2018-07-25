<?php
	$_ruta = "";
	 $action = isset($_REQUEST["action"]) ? $_REQUEST["action"] : 'login';
  
    if ($action=='proveedoreslistado'){
       
        $view = new Smarty;		
		$view->display('proveedoreslistado.tpl');
	}


	if($action=='ConsultarProveedores')
    {
        $tipo         = 1;
        $id           = $_POST["id"];
        $razonsocial  = $_POST["razonsocial"];
       
        $_ruta = "../../";
        require_once ($_ruta."models/DA/da.proveedoreslistado.php");

        $cls    = new ClsProveedor();
       	$array  = $cls->fcConsultarProveedor($tipo, $id, $razonsocial); 
       	$cls    = null;
        $array = array('data' => $array);
        echo json_encode($array);

    }

    if($action=='ConsultarProveedorIndividual')
    {
        $tipo         = 2;
        $id           = $_POST["id"];
        $razonsocial  = $_POST["razonsocial"];
        $_ruta = "../../";
        
        require_once ($_ruta."models/DA/da.proveedoreslistado.php");

        $cls    = new ClsProveedor();
       	$array  = $cls->fcConsultarProveedor($tipo,$id,$razonsocial); 
       	$cls    = null;
        $array = array('aaData' => $array);
        echo json_encode($array);
    }

    if($action=='ActualizarRegistro')
    {
        $tipo         = 2;
        $id           = isset($_POST['id']) ? $_POST['id']: "";
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

    if($action=='EliminarRegistro'){

    	$tipo         = 1;
        $id           = isset($_POST['id']) ? $_POST['id']: "";
        $ruc  		  = "";
        $razonsocial  = "";
        $descripcion  = "";
        $direccion    = "";
        $telefono     = "";
        $email        = "";
        $estado       = "";

        $_ruta = "../../";
        require_once ($_ruta."models/DA/da.proveedoreslistado.php");

        $cls    = new ClsProveedor();
       	$array  = $cls->fcTransaccionProveedor($tipo,$id,$ruc,$razonsocial,$descripcion,$direccion,$telefono,$email,$estado); 
       	$cls    = null;
        $array  = array('aaData' => $array);
        echo json_encode($array);


    }
?>	


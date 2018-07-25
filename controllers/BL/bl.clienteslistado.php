<?php

	$_ruta  = "";
    $action = isset($_REQUEST["action"]) ? $_REQUEST["action"] : 'login';

    if ($action=='clienteslistado'){
       
        $view = new Smarty;		
		$view->display('clienteslistado.tpl');
	
	}

	if($action=='ConsultarClientes')
    {
        $tipo         = 1;
        $id           = $_POST["id"];
        $nombre       = $_POST["nombre"];
    
        $_ruta = "../../";

        require_once ($_ruta."models/DA/da.clienteslistado.php");

        $cls    = new ClsCliente();
       	$array  = $cls->fcConsultarCliente($tipo, $id,$nombre); 
       	$cls    = null;
        $array  = array('data' => $array);
        echo json_encode($array);

    }

     if($action=='ConsultarClientesIndividual')
    {
        $tipo         = 3;
        $id           = $_POST["id"];
        $razonsocial  = $_POST["razonsocial"];

        $_ruta = "../../";
        require_once ($_ruta."models/DA/da.clienteslistado.php");

        $cls    = new ClsCliente();
        $array  = $cls->fcConsultarCliente($tipo,$id,$razonsocial); 
        $cls    = null;
        $array = array('aaData' => $array);
        echo json_encode($array);
    }

    if($action=='ActualizarRegistro')
    {
        $tipo         = 2;
        $id           = isset($_POST['id']) ? $_POST['id']: "";
        $razonsocial  = isset($_POST['razonsocial']) ? $_POST['razonsocial']:"";
        $ruc          = isset($_POST['ruc']) ? $_POST['ruc']:"";
        $contacto     = isset($_POST['contacto']) ? $_POST['contacto']:"";
        $telefono     = isset($_POST['telefono']) ? $_POST['telefono']:"";
        $email        = isset($_POST['email']) ? $_POST['email']:"";
        $direccion    = isset($_POST['direccion']) ? $_POST['direccion']:"";
        $estado       = 1;

        $_ruta = "../../";
        require_once ($_ruta."models/DA/da.clienteslistado.php");

        $cls    = new ClsCliente();
        $array  = $cls->fcTransaccionCliente($tipo,$id,$razonsocial,$ruc,$contacto,$telefono,$email,$direccion,$estado); 
        $cls    = null;
        $array  = array('aaData' => $array);
        echo json_encode($array);
    }

    if($action=='EliminarRegistro'){

        $tipo         = 1;
        $id           = isset($_POST['id']) ? $_POST['id']: "";
        $razonsocial  = "";
        $ruc          = "";
        $contacto     = "";
        $telefono     = "";
        $email        = "";
        $direccion    = "";
        $estado       = "";

        $_ruta = "../../";
        require_once ($_ruta."models/DA/da.clienteslistado.php");

        $cls    = new ClsCliente();
        $array  = $cls->fcTransaccionCliente($tipo,$id,$razonsocial,$ruc,$contacto,$telefono,$email,$direccion,$estado); 
        $cls    = null;
        $array  = array('aaData' => $array);
        echo json_encode($array);
    }

    

?>	
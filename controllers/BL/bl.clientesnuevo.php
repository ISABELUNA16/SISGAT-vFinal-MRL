<?php

	$_ruta = "";
    $action = isset($_REQUEST["action"]) ? $_REQUEST["action"] : 'login';
  

# Mostrar Plantilla Clientes Nuevo 

    if ($action=='clientesnuevo'){
       
        $view = new Smarty;		
		$view->display('clientesnuevo.tpl');
	}

# Registrar Cliente
	if($action == 'RegistrarCliente')
	{
		$tipo   	  = 3;
        $id           = $_POST['id'];
        $razonsocial  = isset($_POST['razonsocial']) ? $_POST['razonsocial']:"";
        $ruc  		  = isset($_POST['ruc']) ? $_POST['ruc']:"";
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

?>	
<?php
	$_ruta = "";
    $action = isset($_REQUEST["action"]) ? $_REQUEST["action"] : 'login';
  

# Mostrar Plantilla Prodcutos nuevos

    if ($action=='productosnuevo'){
       
        $view = new Smarty;	
		$view->display('productosnuevo.tpl');
	}

	if($action=='MostrarTipoProducto'){
		
		$tipo 			= 1;
		$descripcion    = '';

		$_ruta = "../../";
		require_once($_ruta."models/DA/da.productosnuevo.php");

		$cls   = new ClsProducto();
		$array = $cls->fcConsultarTipoProducto($tipo,$descripcion);
		$cls   = null;
		$array = array('aaData' => $array);
		echo json_encode($array);

	}

	if($action=='MostrarProveedor'){
		$tipo = 4;
		$id= '';
		$descripcion = '';

		$_ruta = "../../";
		require_once($_ruta."models/DA/da.proveedoreslistado.php");

		$cls   = new ClsProveedor();
		$array  = $cls->fcConsultarProveedor($tipo, $id, $descripcion); 
       	$cls    = null;
        $array = array('aaData' => $array);
        echo json_encode($array);

	}

	if($action=='MostrarTipoColorante'){

		$tipo = 1;
		$descripcion = '';

		$_ruta = "../../";
		require_once($_ruta."models/DA/da.productosnuevo.php");

		$cls   = new ClsProducto();
		$array  = $cls->fcConsultarTipoColorante($tipo,$descripcion); 
       	$cls    = null;
        $array = array('aaData' => $array);
        echo json_encode($array);
	}
	
	if($action=='MostrarUnidades'){

		$tipo = 1;
		$descripcion = '';

		$_ruta = "../../";
		require_once($_ruta."models/DA/da.productosnuevo.php");

		$cls   = new ClsProducto();
		$array  = $cls->fcConsultarUnidades($tipo,$descripcion); 
       	$cls    = null;
        $array = array('aaData' => $array);
        echo json_encode($array);
	
	}
	
	//Mostrar último registro de la familia de productos 

	if($action=='maxReg'){
		$tipo = 1;
		$indice= $_POST["indice"];

		$_ruta = "../../";
		require_once($_ruta."models/DA/da.productosnuevo.php");

		$cls   = new ClsProducto();
		$array  = $cls->fcConsultarMaxRegistro($tipo,$indice); 
       	$cls    = null;
        $array = array('aaData' => $array);
        echo json_encode($array);
	}

	//REGISTRAR PRODUCTO

	if($action=='registrarProd'){
		$tipo 				= 3;
		$idproducto  		= isset($_POST['idproducto']) ? $_POST['idproducto']:"";
		$descripcion 		= isset($_POST['descripcion']) ? $_POST['descripcion']:"";
		$idproveedor 		= isset($_POST['idproveedor']) ? $_POST['idproveedor']:"";
		$idtipoproducto 	= isset($_POST['idtipoproducto']) ? $_POST['idtipoproducto']:"";
		$idtipocolorante 	= isset($_POST['idtipocolorante']) ? $_POST['idtipocolorante']:"";
		$stock 				= isset($_POST['stock']) ? $_POST['stock']:"";
		$idunidad 			= isset($_POST['idunidad']) ? $_POST['idunidad']:"";
		$costo 				= isset($_POST['costo']) ? $_POST['costo']:"";
		$fecha 				= isset($_POST['fecha']) ? $_POST['fecha']:"";
		$estado 			= 1;

		$_ruta = "../../";
        require_once ($_ruta."models/DA/da.productosnuevo.php");

        $cls    = new ClsProducto();
       	$array  = $cls->fcTransaccionProducto($tipo,$idproducto,$descripcion,$idproveedor,$idtipoproducto,$idtipocolorante,$stock,$idunidad,$costo,$fecha,$estado); 
       	$cls    = null;
        $array  = array('aaData' => $array);
        echo json_encode($array);

	}
?>
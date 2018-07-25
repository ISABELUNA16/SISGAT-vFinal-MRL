<?php
	$_ruta = "";
    $action = isset($_REQUEST["action"]) ? $_REQUEST["action"] : 'login';

    if ($action=='productoslistado'){
        $view = new Smarty;
		$view->display('productoslistado.tpl');
	}


	if($action=='ConsultarProductos')
    {
        $tipo         = 1;
        $id           = $_POST["id"];
        $nombre       = $_POST["nombre"]; 
        $_ruta = "../../";

        require_once ($_ruta."models/DA/da.productosnuevo.php");
        $cls    = new ClsProducto();
       	$array  = $cls->fcConsultarProducto($tipo,$nombre,$id); 
       	$cls    = null;
        $array  = array('data' => $array);
        echo json_encode($array);

    }

    if($action=='ConsultarProductosIndividual')
    {
        $tipo = 4;
        $nombre = '';
        $id = $_POST["id"];

        $_ruta = "../../";
        require_once($_ruta."models/DA/da.productosnuevo.php");
        $cls    = new ClsProducto();
        $array  = $cls->fcConsultarProductoIndividual($tipo,$nombre, $id); 
        $cls = null;
        $array = array('aaData' => $array);
        echo json_encode($array);

    }

    if($action=='ActualizarRegistro'){
     
        $tipo              = 2;
        $id                = isset($_POST['id']) ? $_POST['id']: "";
        $descripcion       = isset($_POST['descripcion']) ? $_POST['descripcion']:"";
        $proveedor         = isset($_POST['proveedor']) ? $_POST['proveedor']:"";
        $tipoproducto      = isset($_POST['tipoproducto']) ? $_POST['tipoproducto']:"";
        $tipocolorante     = isset($_POST['tipocolorante']) ? $_POST['tipocolorante']:"";
        $stock             = isset($_POST['stock']) ? $_POST['stock']:"";
        $und               = isset($_POST['und']) ? $_POST['und']:"";
        $costo             = isset($_POST['costo']) ? $_POST['costo']:"";
        $fecha             = isset($_POST['fecha']) ? $_POST['fecha']:"";
        $estado            = 1;

        $_ruta = "../../";
        require_once ($_ruta."models/DA/da.productosnuevo.php");
        $cls    = new ClsProducto();
        $array  = $cls->fcTransaccionProducto($tipo,$id,$descripcion,$proveedor,$tipoproducto,$tipocolorante,$stock,$und,$costo,$fecha,$estado);
        $cls    = null;
        $array  = array('aaData' => $array);
        echo json_encode($array);
    }


    if($action=='EliminarRegistro'){
        $tipo               = 1;
        $idproducto         = isset($_POST['idproducto']) ? $_POST['idproducto']:"";
        $descripcion        = "";
        $idproveedor        = "";
        $idtipoproducto     = "";
        $idtipocolorante    = "";
        $stock              = "";
        $idunidad           = "";
        $costo              = "";
        $fecha              = "";
        $estado             = "";

        $_ruta = "../../";
        require_once ($_ruta."models/DA/da.productosnuevo.php");

        $cls    = new ClsProducto();
        $array  = $cls->fcTransaccionProducto($tipo,$idproducto,$descripcion,$idproveedor,$idtipoproducto,$idtipocolorante,$stock,$idunidad,$costo,$fecha,$estado); 
        $cls    = null;
        $array  = array('aaData' => $array);
        echo json_encode($array);


    }


?>	
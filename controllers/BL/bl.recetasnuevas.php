<?php

    $_ruta = "";
    $action = isset($_REQUEST["action"]) ? $_REQUEST["action"] : 'login';
  
    if ($action=='recetasnuevas'){
        $view = new Smarty;		
		$view->display('recetasnuevas.tpl');
	}

	if($action=='MostrarTenido'){
		
		$tipo = 1;
		$nombre = '';

		$_ruta = "../../";
		require_once($_ruta."models/DA/da.recetasnuevas.php");

		$cls   = new ClsRecetas();
		$array = $cls->fcConsultarTenido($tipo,$nombre);
		$cls   = null;
		$array = array('aaData' => $array);
		echo json_encode($array);

	}

	if($action=='MostrarTipoTenido'){
		
		$tipo = 1;
		$nombre = '';

		$_ruta = "../../";
		require_once($_ruta."models/DA/da.recetasnuevas.php");

		$cls   = new ClsRecetas();
		$array = $cls->fcConsultarTipoTenido($tipo,$nombre);
		$cls   = null;
		$array = array('aaData' => $array);
		echo json_encode($array);

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
        $array  = array('aaData' => $array);
        echo json_encode($array);

    }

    if($action=='MostrarMaquina'){
		
		$tipo = 1;
		$nombre = '';

		$_ruta = "../../";
		require_once($_ruta."models/DA/da.recetasnuevas.php");

		$cls   = new ClsRecetas();
		$array = $cls->fcConsultarMaquina($tipo,$nombre);
		$cls   = null;
		$array = array('aaData' => $array);
		echo json_encode($array);

	}

	//Mostrar último registro de la familia de recetas 

	if($action=='maxReg'){
		$tipo = $_POST["tipo"];
		$indice= $_POST["indice"];

		$_ruta = "../../";
		require_once($_ruta."models/DA/da.recetasnuevas.php");

		$cls   = new ClsRecetas();
		$array  = $cls->fcConsultarMaxRegistro($tipo,$indice); 
       	$cls    = null;
        $array = array('aaData' => $array);
        echo json_encode($array);
	}

	
	//Registrar Productos N en Receta - Detalle
	if ($action=='registrarRecetaDetalle') {
		
		$tipo 				= 3;
		$id_receta  		= isset($_POST["id_receta"]) ? $_POST["id_receta"]:"";
		$id_producto 		= isset($_POST["id_producto"]) ? $_POST["id_producto"]:"";
		$cantidad 			= isset($_POST["cantidad"]) ? $_POST["cantidad"]:"";
		$solucion 			= isset($_POST["solucion"]) ? $_POST["solucion"]:"";
		$costo 				= isset($_POST["costo"]) ? $_POST["costo"]:"";
		$total 				= isset($_POST["total"]) ? $_POST["total"]:"";
		$estado 			= isset($_POST["estado"]) ? $_POST["estado"]:"";;
	
		$_ruta = "../../";
        require_once ($_ruta."models/DA/da.recetasnuevas.php");

        $cls    = new ClsRecetas();
       	$array  = $cls->fcTransaccionRecetaDetalle($tipo,$id_receta,$id_producto,$cantidad,$solucion,$costo,$total,$estado); 
       	$cls    = null;
        $array  = array('aaData'=> $array);
        echo json_encode($array);
	}


	if ($action=='registrarRecetaHead') {
		
		$tipo 			= 3;
		$id_receta  	= isset($_POST["id_receta"]) ? $_POST["id_receta"]:"";
		$indice      	= isset($_POST["indice"]) ? $_POST["indice"]:"";
		$partida 		= isset($_POST["partida"]) ? $_POST["partida"]:"";
		$color  		= isset($_POST["color"]) ? $_POST["color"]:"";
		$tela 		    = isset($_POST["tela"]) ? $_POST["tela"]:"";
		$rb 			= isset($_POST["rb"]) ? $_POST["rb"]:"";
		$peso 			= isset($_POST["peso"]) ? $_POST["peso"]:"";
		$volumen 		= isset($_POST["volumen"]) ? $_POST["volumen"]:"";
		$rollo 			= isset($_POST["rollo"]) ? $_POST["rollo"]:"";
		$curva 			= isset($_POST["curva"]) ? $_POST["curva"]:"";
		$fecha 			= isset($_POST["fecha"]) ? $_POST["fecha"]:"";
		$total 			= isset($_POST["total"]) ? $_POST["total"]:"";
		$hidro  		= isset($_POST["hidro"]) ? $_POST["hidro"]:"";
		$compactado 	= isset($_POST["compactado"]) ? $_POST["compactado"]:"";
		$observaciones 	= isset($_POST["observaciones"]) ? $_POST["observaciones"]:"";
		$id_tenido 		= isset($_POST["id_tenido"]) ? $_POST["id_tenido"]:"";
		$id_tipotenido 	= isset($_POST["id_tipotenido"]) ? $_POST["id_tipotenido"]:"";
		$id_cliente 	= isset($_POST["id_cliente"]) ? $_POST["id_cliente"]:"";
		$id_maquina 	= isset($_POST["id_maquina"]) ? $_POST["id_maquina"]:"";
		$estado 		= 1;

		$_ruta = "../../";
        require_once($_ruta."models/DA/da.recetasnuevas.php");

        $cls    = new ClsRecetas();
       	$array  = $cls->fcTransaccionRecetaHead($tipo,$id_receta,$indice,$partida,$color,$tela,$rb,$peso,$volumen,$rollo,$curva,$fecha,$total,$hidro,$compactado,$observaciones,$id_tenido,$id_tipotenido,$id_cliente,$id_maquina,$estado); 
       	$cls    = null;
        $array  = array('aaData' => $array);
        echo json_encode($array);
	}

?>	

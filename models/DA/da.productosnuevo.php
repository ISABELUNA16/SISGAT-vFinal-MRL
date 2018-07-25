<?php
    /**
     * Clase que permite realizar operaciones de mantenimiento para la tabla "tb_alm_producto"
     * 
     * @author:     Rosmery Isabel Luna Tito 
     * @versión:    1.0
     * @fecha:      31/07/2017
     */
    class ClsProducto{
       
        public $tipo;
        public $descripcion;
        
        var $_objMys=null;
        var $_msg = "";
        var $_nColumnas = 0;
        var $_nFilas = 0;
        
        public function __construct()
        {                           }
        
        public function __destruct()
        {                           }
        
        public function conectarBD()
        {
            if($this->_objMys==null)
            {
                require 'daMYSQLI.php';    
                $this->_objMys  = new ClsBd();
            }
            
            $this->_cn 	= $this->_objMys->fcConectar();
        }
        /**
         * Metodo que valida el inicio de sesión del usuario de la tabla "tb_alm_producto"
         * @param type $tipo        Tipo de operación del usuario 1:Listar 2.- Buscar.
         * @param type $descripcion      Nombre del tipo de producto .
         * @param type $contraseña  Contraseña de usuario.
         */
        function fcConsultarProducto($tipo, $nombre, $id)
        {
            $this->conectarBD();
            $arrayVal = null;
           # $_usuario =(trim($usuario)<>"")? $usuario :"";
            $sqlProc  = "CALL sp_alm_consultarproducto(?,?,?)";
            $arrayVal = array($tipo, $nombre, $id);
            $arrayTip = array('i', 's', 's');
            $refSP    = null;
            
            $refSP = $this->_objMys->fcEjecutarConsulta($sqlProc,$this->_cn,$arrayVal , $arrayTip);
            $datos = array();
            $cont = 0;
            $fila = $this->_objMys->bind_result_array($refSP);
            
            if(!$refSP->error)
            {
                while ($refSP->fetch())
                {
                    $json_array[$cont] = $this->_objMys->getCopy($fila);
                    $cont = $cont + 1;
                }
                if($cont>0)
                {
                    return $json_array;
                }
            }
            
            $this->_total = $cont;
            $refSP->free_result();
            $refSP->close();
            unset($refSP);
            $refSP = null;
            
            return $datos;
        }
        

        function fcConsultarTipoProducto($tipo, $descripcion)
        {
            $this->conectarBD();
            $arrayVal = null;
            $sqlProc  = "CALL sp_alm_consultartipoproducto(?,?)";
            $arrayVal = array($tipo,$descripcion);
            $arrayTip = array('i','s');
            $refSP    = null;
            
            $refSP = $this->_objMys->fcEjecutarConsulta($sqlProc,$this->_cn,$arrayVal , $arrayTip);
            $datos = array();
            $cont = 0;
            $fila = $this->_objMys->bind_result_array($refSP);
            
            if(!$refSP->error)
            {
                while ($refSP->fetch())
                {
                    $json_array[$cont] = $this->_objMys->getCopy($fila);
                    $cont = $cont + 1;
                }
                if($cont>0)
                {
                    return $json_array;
                }
            }
            
            $this->_total = $cont;
            $refSP->free_result();
            $refSP->close();
            unset($refSP);
            $refSP = null;
            
            return $datos;
        }

        function fcConsultarTipoColorante($tipo, $descripcion){
            $this->conectarBD();
            $arrayVal = null;
            $sqlProc  = "CALL sp_alm_tipoproductocolorante(?,?)";
            $arrayVal = array($tipo,$descripcion);
            $arrayTip = array('i','s');
            $refSP    = null;
            
            $refSP = $this->_objMys->fcEjecutarConsulta($sqlProc,$this->_cn,$arrayVal , $arrayTip);
            $datos = array();
            $cont = 0;
            $fila = $this->_objMys->bind_result_array($refSP);
            
            if(!$refSP->error)
            {
                while ($refSP->fetch())
                {
                    $json_array[$cont] = $this->_objMys->getCopy($fila);
                    $cont = $cont + 1;
                }
                if($cont>0)
                {
                    return $json_array;
                }
            }
            
            $this->_total = $cont;
            $refSP->free_result();
            $refSP->close();
            unset($refSP);
            $refSP = null;
            
            return $datos;
        }
        
        function fcConsultarUnidades($tipo, $descripcion){

            $this->conectarBD();
            $arrayVal = null;
            $sqlProc  = "CALL sp_gen_consultarunidades(?,?)";
            $arrayVal = array($tipo,$descripcion);
            $arrayTip = array('i','s');
            $refSP    = null;
            
            $refSP = $this->_objMys->fcEjecutarConsulta($sqlProc,$this->_cn,$arrayVal , $arrayTip);
            $datos = array();
            $cont = 0;
            $fila = $this->_objMys->bind_result_array($refSP);
            
            if(!$refSP->error)
            {
                while ($refSP->fetch())
                {
                    $json_array[$cont] = $this->_objMys->getCopy($fila);
                    $cont = $cont + 1;
                }
                if($cont>0)
                {
                    return $json_array;
                }
            }
            
            $this->_total = $cont;
            $refSP->free_result();
            $refSP->close();
            unset($refSP);
            $refSP = null;
            
            return $datos;
        }

         function fcConsultarMaxRegistro($tipo, $indice){

            $this->conectarBD();
            $arrayVal = null;
            $sqlProc  = "CALL sp_maxRegistros(?,?)";
            $arrayVal = array($tipo,$indice);
            $arrayTip = array('i','i');
            $refSP    = null;
            
            $refSP = $this->_objMys->fcEjecutarConsulta($sqlProc,$this->_cn,$arrayVal , $arrayTip);
            $datos = array();
            $cont = 0;
            $fila = $this->_objMys->bind_result_array($refSP);
            
            if(!$refSP->error)
            {
                while ($refSP->fetch())
                {
                    $json_array[$cont] = $this->_objMys->getCopy($fila);
                    $cont = $cont + 1;
                }
                if($cont>0)
                {
                    return $json_array;
                }
            }
            
            $this->_total = $cont;
            $refSP->free_result();
            $refSP->close();
            unset($refSP);
            $refSP = null;
            
            return $datos;
        }
        
        function fcConsultarProductoIndividual($tipo, $nombre, $id){
            $this->conectarBD();
            $arrayVal = null;
            $sqlProc = 'CALL sp_alm_consultarproducto(?,?,?)';
            $arrayVal = array($tipo, $nombre, $id);
            $arrayTip = array('i','s','i');
            $refSP = null;

            $refSP = $this->_objMys->fcEjecutarConsulta($sqlProc,$this->_cn,$arrayVal , $arrayTip);
            $datos = array();
            $cont = 0;
            $fila = $this->_objMys->bind_result_array($refSP);
            
            if(!$refSP->error)
            {
                while ($refSP->fetch())
                {
                    $json_array[$cont] = $this->_objMys->getCopy($fila);
                    $cont = $cont + 1;
                }
                if($cont>0)
                {
                    return $json_array;
                }
            }
            
            $this->_total = $cont;
            $refSP->free_result();
            $refSP->close();
            unset($refSP);
            $refSP = null;
            
            return $datos;
        }
        /**
         * Metodo que permite realizar el mantenimiento en la tabla "tb_sis_usuario"
         * @param type $tipo        Tipo de operación del usuario 1:Insertar 2:Actualizar 3:Eliminar.
         * @param type $id          Identificador del usuario.
         * @param type $idpersonal  Identificador del personal.
         * @param type $usuario     Nombre de usuario.
         * @param type $contraseña  Contraseña de usuario.
         * @param type $estado      Estado de usuario.
         **/

        
        function fcTransaccionProducto($tipo,$id,$descripcion,$idproveedor,$idtipoproducto,$idtipocolorante,$stock,$idunidad,$costo,$fecha,$estado)
        {
            $this->conectarBD();
            $arrayVal = null;
            $sqlProc  = "CALL sp_alm_crud_producto(?,?,?,?,?,?,?,?,?,?,?)";
            $arrayVal = array($tipo,$id,$descripcion,$idproveedor,$idtipoproducto,$idtipocolorante,$stock,$idunidad,$costo,$fecha,$estado);
            $arrayTip = array('i','i','s','i','i','i','i','i','d','s','i');
            
            $refSP = $this->_objMys->fcEjecutaIU($sqlProc,$this->_cn,$arrayVal , $arrayTip);
            return trim($refSP);
        }  

              
    }
?>
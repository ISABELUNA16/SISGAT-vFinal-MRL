<?php
    /**
     * Clase que permite realizar operaciones de mantenimiento para la tabla "tb_cont_proveedores"
     * 
     * @author:     Rosmery Isabel Luna Tito 
     * @versión:    1.0
     * @fecha:      11/07/2017
     */
    class ClsProveedor {
       
        public $tipo;
        public $id;
        public $razonsocial;
        
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
         * Metodo que valida el inicio de sesión del usuario de la tabla "tb_cont_proveedor"
         * @param type $tipo        Tipo de operación del usuario 1:Listar 2:Buscar 3:Login.
         * @param type $usuario     Nombre de usuario.
         * @param type $contraseña  Contraseña de usuario.
         */

        function fcConsultarProveedor($tipo, $id, $razonsocial)
        {
            $this->conectarBD();
            $arrayVal = null;
            $sqlProc  = "CALL sp_cont_consultarproveedor(?,?,?)";
            $arrayVal = array($tipo, $id, $razonsocial);
            $arrayTip = array('i', 'i', 's');
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

        /**
         * Metodo que permite realizar el mantenimiento en la tabla "tb_cont_proveedores"
         * @param type $tipo        Tipo de operación del proveedor  3:Insertar.
         * @param type $id           Identificador del usuario.
         * @param type $ruc          ruc.
         * @param type $razonsocial  razonsocial.
         * @param type $descripcion  descripcion.
         * @param type $direccion    direccion.
         * @param type $telefono     telefono.
         * @param type $email        Estado de usuario.
         * @param type $estado       Estado de usuario.
         */
        
       function fcTransaccionProveedor($tipo,$id,$ruc,$razonsocial,$descripcion,$direccion,$telefono,$email,$estado)
        {
            $this->conectarBD();
            $arrayVal = null;
            $sqlProc  = "CALL sp_cont_crud_proveedor(?,?,?,?,?,?,?,?,?)";
            $arrayVal = array($tipo,$id,$ruc,$razonsocial,$descripcion,$direccion,$telefono,$email,$estado);
            $arrayTip = array('i','i','i','s','s','s','i','s','i');
            
            $refSP = $this->_objMys->fcEjecutaIU($sqlProc,$this->_cn,$arrayVal , $arrayTip);
            return trim($refSP);
        }
       

    }
?>
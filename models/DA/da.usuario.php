<?php
    /**
     * Clase que permite realizar operaciones de mantenimiento para la tabla "tb_adm_usuario"
     * 
     * @author:     Rosmery Isabel Luna Tito 
     * @versión:    1.0
     * @fecha:      06/06/2017
     */
    class ClsUsuario {
       
        public $tipo;
        public $id;
        public $usuario;
        public $contrasena;
        
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
         * Metodo que valida el inicio de sesión del usuario de la tabla "tb_adm_usuario"
         * @param type $tipo        Tipo de operación del usuario 1:Listar 2:Buscar 3:Login.
         * @param type $usuario     Nombre de usuario.
         * @param type $contraseña  Contraseña de usuario.
         */
        function fcConsultarUsuario($tipo, $usuario, $contrasena)
        {
            $this->conectarBD();
            $arrayVal = null;
            $_usuario =(trim($usuario)<>"")? $usuario :"";
            $sqlProc  = "CALL sp_adm_consultarusuario(?,?,?)";
            $arrayVal = array($tipo, $usuario, $contrasena);
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
        

        /** FUNCION QUE MUESTRA EL LISTADO DE USUARIOS**/

        function fcListadoUsuarios($tipo, $usuario, $contrasena)
        {
            $this->conectarBD();
            $arrayVal = null;
           # $_usuario =(trim($usuario)<>"")? $usuario :"";
            $sqlProc  = "CALL sp_adm_consultarusuario(?,?,?)";
            $arrayVal = array($tipo, $usuario, $contrasena);
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


        /**
         * Metodo que permite realizar el mantenimiento en la tabla "tb_sis_usuario"
         * @param type $tipo        Tipo de operación del usuario 1:Insertar 2:Actualizar 3:Eliminar.
         * @param type $id          Identificador del usuario.
         * @param type $idpersonal  Identificador del personal.
         * @param type $usuario     Nombre de usuario.
         * @param type $contraseña  Contraseña de usuario.
         * @param type $estado      Estado de usuario.
         */
        
       /* function fcTransaccionUsuario($tipo, $id, $idpersonal, $usuario, $contrasena, $estado)
        {
            $this->conectarBD();
            $arrayVal = null;
            $sqlProc  = "CALL sp_sis_transaccionusuario(?,?,?,?,?,?)";
            $arrayVal = array($tipo, $id, $idpersonal, $usuario, $contrasena, $estado);
            $arrayTip = array('i','s','s','i');
            
            $refSP = $this->_objMys->fcEjecutaIU($sqlProc,$this->_cn,$arrayVal , $arrayTip);
            return trim($refSP);
        }*/
    }
?>
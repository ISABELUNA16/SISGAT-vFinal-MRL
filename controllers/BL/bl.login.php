<?php

    $_ruta = "";

    require_once ($_ruta."models/DA/da.usuario.php");

    #session_start();

    $action = isset($_REQUEST["action"]) ? $_REQUEST["action"] : 'login';


    if ($action=='login')
    {
        $view = new Smarty;

        $view->assign(array('clase' => 'class="hide"', 'mensaje' => '', 'usuario' => '', 'contrasena' => '', 'focus' => 'autofocus', 'focps' => '', 'url' => '', 'img' => ''));

        $usuario    = isset($_REQUEST["usuario"])      ?   $_REQUEST["usuario"] : '';
        $contrasena = isset($_REQUEST["contrasena"])   ?   $_REQUEST["contrasena"] : '';

        $tipo       = 3;                        #Almacena el tipo de consulta de la tabla tb_sis_usuario
        $usuario    = utf8_decode($usuario);    #Almacena el nombre del usuario
        $contrasena = $contrasena;              #Almacena la contraseña del usuario

        if(isset($_POST['usuario']) && isset($_POST['contrasena']))
        {
            if(!empty($_POST['usuario']))
            {
                if(!empty($_POST['contrasena']))
                {
                    $_objReg = new ClsUsuario ();
                    $cls = new ClsUsuario();
                    $array = $cls->fcConsultarUsuario($tipo, $usuario, $contrasena);
                    $responce = new stdClass();

                    if(sizeof($array)==0)
                    {
                        $view->assign(array('clase' => 'class="texto-mensaje-alert texto-centro texto-14"', 'mensaje' => 'Sus credenciales son incorrectas', 'usuario' => '', 'contrasena' => '', 'focus' => 'autofocus', 'focps' => '','url' => '','img' => ''));
                    }
                    else
                    {
                        for ($i=0;$i<sizeof($array);$i++)
                        {
                            $row = $array[$i];
                            $_SESSION['id']         =   $row['id'];
                            $_SESSION['nombres']    =   utf8_encode($row['nombres']);
                            $_SESSION['perfil']     =   utf8_encode($row['perfil']);
                            $_SESSION['dni']        =   $row['dni'];
                            $_SESSION['estado']     =   $row['estado'];
                        }

                        if($_SESSION['estado']==0)
                        {
                            $view->assign(array('clase' => 'class="texto-mensaje-warning texto-centro texto-14"', 'mensaje' => 'Su cuenta esta desactivada', 'usuario' => '', 'contrasena' => '', 'focus' => 'autofocus', 'focps' => '', 'url' => '','img' => ''));

                            session_destroy();

                        }else{
                            
                            #<img src="views/templates/login/image/iconoCargando.gif">
                            #setcookie('session', 0);
                            #ini_set(session.cookie_lifetime, 0);
                            #$action=="modulos";
                            
                            $view->assign(array('clase' => 'class="texto-mensaje-success texto-centro texto-14"', 'mensaje' => 'Bienvenido al SISGAT <br>' .$_SESSION['nombres'], 'usuario' => '', 'contrasena' => '', 'focus' => 'autofocus', 'focps' => '', 'icono' => '', 'url' => '<meta http-equiv="refresh" content="1;url=?action=splash">', 'img'=>''));
                            
                        }
                    }
                }else{
                    $view->assign(array('clase' => 'class="texto-mensaje-alert texto-centro texto-14"', 'mensaje' => 'Escriba su contraseña', 'usuario' => $usuario, 'contrasena' => '', 'focus' => '', 'focps' => 'autofocus', 'url' => ''));
                }
            }else{
                $view->assign(array('clase' => 'class="texto-mensaje-alert texto-centro texto-14"', 'mensaje' => 'Escriba su nombre de usuario', 'usuario' => '', 'contrasena' => $contrasena, 'focus' => 'autofocus', 'focps' => '', 'url' => ''));
            }
        }else{
            $view->assign(array('clase' => 'class="hide"', 'mensaje' => '', 'usuario' => '', 'contrasena' => '', 'focus' => 'autofocus', 'focps' => '', 'url' => ''));
        }

        $view->display('login.tpl');
    }
?>

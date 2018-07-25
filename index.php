<?php
    
    include('models/Libs/smarty/Smarty.class.php');
    //session_destroy();
    session_start();
    
    $actioniew = new Smarty;
    $action = isset($_REQUEST["action"]) ? $_REQUEST["action"] : 'login';

   /* if(isset($_SESSION['id']) && isset($_SESSION['iperfil']))
    {
        if(!empty($_SESSION['id']))
        {
           
            echo $_SESSION['id'];
            echo $_SESSION['nombres'];

            $_SESSION['id']         =   $_SESSION['id'];
            $_SESSION['nombres']    =   $_SESSION['nombres'];
            $_SESSION['perfil']     =   $_SESSION['perfil'];
            $_SESSION['dni']        =   $_SESSION['dni'];
            $_SESSION['estado']     =   $_SESSION['estado'];
            
            if($_SESSION['id']!=0)
            {
                if($action == 'login'){
                    $action = 'login';
                }
            }else{
                if($action != 'login'){
                    $action = 'login';
                }
            }
        }else{
            if($action != 'login'){
                $action = 'login';
            }
        }
    }
    else
    {
        if($action != 'login'){
            $action = 'login';
        }
    }*/

    if(is_file('controllers/BL/bl.'.$action.'.php'))
    {
        include_once('controllers/BL/bl.'.$action.'.php');
    }else{
        include_once('controllers/BL/bl.error.php');
    }

?>
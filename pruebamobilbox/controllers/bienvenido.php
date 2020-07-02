<?php

class Bienvenido  extends Controller{

    function __construct()
    {
        parent::__construct();
    }

    function render(){
        sleep(2); 
        session_start();
                if ( $_SESSION['usuario'] ==""  and  $_SESSION['contrasena'] ==""  ) {
            header('Location:'.constant('URL').'login');
            die();        
        }

        $this->view->render('bienvenido/index');
    }

} 

?>
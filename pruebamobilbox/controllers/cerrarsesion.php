<?php

class cerrarsesion extends Controller{

    function __construct()
    {
        sleep(2); 
        session_start();
        session_destroy();
        header('Location:'.constant('URL').'login');
        
    }




}


?>
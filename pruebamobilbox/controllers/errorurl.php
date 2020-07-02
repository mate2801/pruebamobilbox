<?php

class Errorurl extends Controller{

    function __construct()
    {
        sleep(2); 
        parent::__construct();
        $this->view->render('errorurl/index');

    }
} 

?>
<?php

class publicarNoticia  extends Controller{

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

        $this->view->render('publicarnoticia/index');
    }

    function validarNoticia(){
        sleep(2); 
        session_start();

        $idusuario = $_SESSION['idUsuario'];

        $imagen = $_FILES['imagen'];

        $titulo = $_POST['titulo'];

        $descripcion = $_POST['descripcion'];

        if ($titulo == "") {
            echo '<div class="alert alert-danger">
            <strong>ERROR!</strong> El campo titulo no puede ir vacío.
            </div>';
        }
        
        else if($descripcion ==""){
            echo '<div class="alert alert-danger">
            <strong>ERROR!</strong> El campo descripcion no puede ir vacío. 
            </div>';
        }else if ( $imagen['type'] =='image/jpg' or $imagen['type']=='image/jpeg' ) {
           
           $nombre_encriptado = md5($imagen['tmp_name']).".jpg";
           $ruta =  "public/img/".$nombre_encriptado;
           move_uploaded_file($imagen['tmp_name'],$ruta);
           $this->model->registrarNoticia($titulo,$descripcion,$ruta,$idusuario);
           echo 1;
        
        } else {
            echo '<div class="alert alert-danger">
            <strong>ERROR!</strong> imagen no validad solo formatos .jpg y .jpeg
            </div>';
        }


         
    }

} 

?>
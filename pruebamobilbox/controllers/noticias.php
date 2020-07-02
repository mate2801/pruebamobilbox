<?php

class noticias  extends Controller{

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

        $this->view->query = $this->model->selectNoticias();
        $this->view->render('noticias/index');
    }

    function editarNoticia($param = null){
        sleep(2); 
        $idNoticia = $param[0];
        session_start();
        if ( $_SESSION['usuario'] ==""  and  $_SESSION['contrasena'] =="") {
         header('Location:'.constant('URL').'login');
         die();
       }
       $this->view->query2 = $this->model->selectNoticiasPorId($idNoticia);
       $this->view->render('noticias/editarnoticia');

    }


    function validarEditarNoticia(){
        sleep(2); 
        
        session_start();
        if ( $_SESSION['usuario'] ==""  and  $_SESSION['contrasena'] =="") {
         header('Location:'.constant('URL').'login');
         die();
       }
       
       $idnoticia = $_POST['idNoticia'];

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



        }else{
            sleep(2);    
            $nombre_encriptado = md5($imagen['tmp_name']).".jpg";
            $ruta =  "public/img/".$nombre_encriptado;
            move_uploaded_file($imagen['tmp_name'],$ruta);
            $this->model->actualizarNoticia($idnoticia,$titulo,$descripcion,$ruta);
            echo 1;
        
    
        }

}
} 

?>
<?php

class Login  extends Controller{

    function __construct()
    {
        parent::__construct();
    }

    function render(){
        sleep(2); 
        $this->view->render('login/index');
    }

    function validarUsuario(){
        sleep(2); 

        session_start();
        
        $usuario = $_POST['usuario'] ;
        $contrasenaa = $_POST['contrasena'];

        $contrasena = md5($contrasenaa);

        $this->view->datos = $this->model->validarUsuario($usuario,$contrasena);

                /*------VARIABLES PARA REUTILIZAR ---------*/

        
                $_SESSION['idUsuario'] =  $this->view->datos['idUsuario'];

                $_SESSION['usuario'] =  $this->view->datos['usuario'];

                $_SESSION['contrasena'] =  $this->view->datos['contrasena'];
        

        if ($usuario == "") {
            echo '<div class="alert alert-danger">
            <strong>ERROR!</strong> El campo usuario no puede ir vacío.
            </div>';
        }
        
        else if($contrasenaa ==""){
            echo '<div class="alert alert-danger">
            <strong>ERROR!</strong> El campo contraseña no puede ir vacío. 
            </div>';
        }

        else if($this->view->datos > 0){
              echo 1 ;      
        }
         else{
            echo  '<div class="alert alert-danger">
            <strong>ERROR!</strong> Datos incorretos "Inténtelo de nuevo"  
            </div>';
        }

    


    }
} 

?>
<?php


class RegistroPersona  extends Controller{

    function __construct()
    {
        parent::__construct();
    }

    function render(){
        sleep(2); 
        $this->view->render('registropersona/index');
    }


   

   
    function validarRegistroPersona(){

        
        
            sleep(2);                 

               $usuario = $_POST['usuario'];
               $email = $_POST['email'];
               $contrasena = $_POST['contrasena'];


            //Consulta para validar que el email no exista en nuestra base de datos//
            $this->view->f =$this->model->validaremailexiste($email);
            //----------fin consulta----------//
            //Consulta para validar que el email no exista en nuestra base de datos//
            $this->view->y =$this->model->validarusuarioexiste($usuario);
            //----------fin consulta----------//
                      
            //---- VALIDACIONES DEL USUARIO----- ///
            if($usuario == "" )  {
            echo '<div class="alert alert-danger">
            <strong>ERROR!</strong>  El campo Usuario no puede ir vacío.
            </div>'; 
            }

            //Comprovar si usuario existe 
            else if($this->view->y > 0){
            echo '<div class="alert alert-danger">
            <strong>ERROR!</strong>  El usuario ya ha sido registrado, intenta con otro.
            </div>';
            }

            //---- VALIDACIONES DEL  EMAIL----- ///  
            else if(strlen($email) == 0){ 
            echo '<div class="alert alert-danger">
            <strong>ERROR!</strong>  El campo Email no puede ir vacío.
            </div>';
            }   
            // , NO VALIDO email  
            else if(!preg_match("/^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i",$email)){ 
            echo '<div class="alert alert-danger">
            <strong>ERROR!</strong>  Debe ingresar un Email valido.
            </div>';   
            }  

            //---- VALIDACIONES DEL  EMAIL(VALIDAR QUE EL EMAIL NO EXISTA EN LA BASE DE DATOS)----- ///      
            //Comprovar si email existe 
            else if($this->view->f > 0){
            echo '<div class="alert alert-danger">
            <strong>ERROR!</strong>  El Email ya ha sido registrado, intenta con otro.
            </div>';
            } 
            //comprovar que la contraseña no este vacia
            else if($contrasena == "" ) { 
            echo '<div class="alert alert-danger">
            <strong>ERROR!</strong>  Ingrese su constraseña.
            </div>';
            }




            //---- REGISTRAR USUARIO CORRECTAMENTE----- /// 

                  else {                   
                     $this->model->registrarPersona($usuario,$contrasena,$email);
                     echo 1;                  
            }
            
    }


}

?>
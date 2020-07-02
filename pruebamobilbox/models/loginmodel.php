<?php

class loginModel extends Model
{
    function __construct()
    {
        parent::__construct();

    }


      function validarUsuario($usuario,$contrasena){
        $conexion = $this->db->connect();
        $consulta="SELECT idUsuario,usuario,contrasena,correo from usuariosmobilbox
        where usuario = :Usuario and contrasena = :Contrasena  ";
        $stmt=$conexion->prepare($consulta);
        $stmt->bindParam(':Usuario',$usuario,PDO::PARAM_STR);
        $stmt->bindParam(':Contrasena',$contrasena,PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
        $conexion = null;
        $stmt= null;
        $result = null;  
        }


 

    
    
}

?>
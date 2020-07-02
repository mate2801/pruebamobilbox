<?php

class RegistroPersonaModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }


 
      

        /*Metodos para registrar un nuevo usuario*/

        public function  validaremailexiste($email){
        $conexion = $this->db->connect();
        $consulta ="SELECT correo from usuariosmobilbox where  correo = :Email ";
        $stmt=$conexion->prepare($consulta);
        $stmt->bindParam(':Email',$email,PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
        $conexion = null;
        $stmt= null;
        $result = null; 
        }


        public function  validarusuarioexiste($usuario){
        $conexion = $this->db->connect();
        $consulta ="SELECT usuario from usuariosmobilbox where  usuario = :Usuario ";
        $stmt=$conexion->prepare($consulta);
        $stmt->bindParam(':Usuario',$usuario,PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
        $conexion = null;
        $stmt= null;
        $result = null; 
        }

       

        public function  registrarPersona($usuario,$contrasena,$email){
        $conexion = $this->db->connect();
        // emcriptacion de contraseña
        $contrasenaa = md5($contrasena);
        $consulta  ="INSERT into usuariosmobilbox(correo,usuario,contrasena) values (?,?,?)";
        $stmt=$conexion->prepare($consulta);
        $stmt->bindParam(1,$email,PDO::PARAM_STR);
        $stmt->bindParam(2,$usuario,PDO::PARAM_STR);
        $stmt->bindParam(3,$contrasenaa,PDO::PARAM_STR);
        $stmt->execute();
        }      
}
?>
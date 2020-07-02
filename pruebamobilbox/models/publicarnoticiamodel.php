<?php

class publicarNoticiaModel extends Model
{
    function __construct()
    {
        parent::__construct();

    }

    function registrarNoticia($titulo,$descripcion,$ruta,$idusuario){   
            $conexion = $this->db->connect();
            ini_set('date.timezone','America/Bogota'); 
            $fecha  = date("Y-m-d H:i:s");
            $consulta  ="INSERT into noticiasmobilbox(titulo,descripcion,urlimg,fecha,usuario_idusuario) values (?,?,?,?,?)";
            $stmt=$conexion->prepare($consulta);
            $stmt->bindParam(1,$titulo,PDO::PARAM_STR);
            $stmt->bindParam(2,$descripcion,PDO::PARAM_STR);
            $stmt->bindParam(3,$ruta,PDO::PARAM_STR);
            $stmt->bindParam(4,$fecha,PDO::PARAM_STR);
            $stmt->bindParam(5,$idusuario,PDO::PARAM_INT);
            $stmt->execute();            
        }



    
}

?>
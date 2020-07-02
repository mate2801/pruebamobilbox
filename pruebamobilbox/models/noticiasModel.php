<?php

class noticiasModel extends Model
{
    function __construct()
    {
        parent::__construct();

    }


      function selectNoticias(){
        $conexion = $this->db->connect();
        $consulta="SELECT idNoticias,descripcion,urlimg,usuario_idusuario,titulo,fecha FROM noticiasmobilbox ;";
        $stmt=$conexion->prepare($consulta);
        $stmt->execute();
        return $stmt;
        $conexion = null;
        $stmt= null;
        }


        function selectNoticiasPorId($IdNoticia){
          $conexion = $this->db->connect();
          $consulta="SELECT idNoticias,descripcion,urlimg,usuario_idusuario,titulo,fecha FROM noticiasmobilbox 
          WHERE idNoticias = ?;";
          $stmt=$conexion->prepare($consulta);
          $stmt->bindParam(1,$IdNoticia,PDO::PARAM_INT);
          $stmt->execute();
          $resul = $stmt->fetch();
          return $resul;
          $conexion = null;
          $stmt= null;
          $resul= null;
          }


          function actualizarNoticia($IdNoticia,$titulo,$descripcion,$img){
            $conexion = $this->db->connect();
            $consulta="UPDATE `noticiasmobilbox` SET `descripcion`=?,`urlimg`=?,
            `titulo`=?
            WHERE `idNoticias`= ?;";
            $stmt=$conexion->prepare($consulta);
            $stmt->bindParam(1,$descripcion,PDO::PARAM_INT);
            $stmt->bindParam(2,$img,PDO::PARAM_STR);
            $stmt->bindParam(3,$titulo,PDO::PARAM_STR);
            $stmt->bindParam(4,$IdNoticia,PDO::PARAM_INT);
            $stmt->execute();

            }


 

    
    
}

?>
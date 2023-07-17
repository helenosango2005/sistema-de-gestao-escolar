<?php
class Modelo{

  private $asisalum;
  private $db;

  public function __construct(){
      $this->asisalum=array();
      $this->db=new PDO('mysql:host=localhost;dbname=rpv2',"root","");
  }
  public function mostrar($tabla,$condicion){
      $consulta="SELECT asisalum.codasis, alumnos.nombrea, asisalum.presen, asisalum.fechare FROM asisalum INNER JOIN alumnos ON asisalum.codalum= alumnos.codalum";

      $resultado=$this->db->query($consulta);
      while ($tabla=$resultado->fetchAll(PDO::FETCH_ASSOC)) {
          $this->asisalum[]=$tabla;
      }
      return $this->asisalum;
    }
    public function  insertar(Modelo $data){
    try {
      $query="INSERT INTO asisalum (codalum, presen,fechare)VALUES(?,?,?)";

      $this->db->prepare($query)->execute(array($data->codalum, $data->presen, $data->fechare));

    }catch (Exception $e) {

      die($e->getMessage());
    }
    }
  public function actualizar($tabla,$data,$condicion){
      $consulta="UPDATE $tabla SET $data WHERE $condicion";
      $resultado=$this->db->query($consulta);
      if($resultado){
          return true;
      }else{
          return false;
      }
  }
  public function eliminar($tabla,$condicion){
      $consulta="DELETE FROM $tabla WHERE $condicion";
      $resultado=$this->db->query($consulta);
      if($resultado){
          return true;
      }else{
          return false;
      }
  }
}

 ?>

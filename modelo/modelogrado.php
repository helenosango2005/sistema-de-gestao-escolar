<?php
class Modelo{

  private $grado;
  private $db;




  public function __construct(){
      $this->grado=array();
      $this->db=new PDO('mysql:host=localhost;dbname=rpv2',"root","");
  }
  public function mostrar($tabla,$condicion){
      $consulta="SELECT grado.codgra, grado.nomgra, grado.fecha_create FROM grado";

      $resultado=$this->db->query($consulta);
      while ($tabla=$resultado->fetchAll(PDO::FETCH_ASSOC)) {
          $this->grado[]=$tabla;
      }
      return $this->grado;
    }
    public function  insertar(Modelo $data){
    try {
      $query="INSERT INTO grado (nomgra)VALUES(?)";

      $this->db->prepare($query)->execute(array($data->nomgra));

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

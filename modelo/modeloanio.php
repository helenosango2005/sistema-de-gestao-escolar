<?php
class Modelo{

  private $anoaca;
  private $db;




  public function __construct(){
      $this->anoaca=array();
      $this->db=new PDO('mysql:host=localhost;dbname=rpv2',"root","");
  }
  public function mostrar($tabla,$condicion){
      $consulta="SELECT anoaca.codano, anoaca.nomano, anoaca.titulo, anoaca.fecha_registro FROM anoaca";

      $resultado=$this->db->query($consulta);
      while ($tabla=$resultado->fetchAll(PDO::FETCH_ASSOC)) {
          $this->anoaca[]=$tabla;
      }
      return $this->anoaca;
    }
    public function  insertar(Modelo $data){
    try {
      $query="INSERT INTO anoaca (nomano,titulo)VALUES(?,?)";

      $this->db->prepare($query)->execute(array($data->nomano,$data->titulo));

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

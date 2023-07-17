<?php
class Modelo{

  private $libro;
  private $db;




  public function __construct(){
      $this->libro=array();
      $this->db=new PDO('mysql:host=localhost;dbname=rpv2',"root","");
  }
  public function mostrar($tabla,$condicion){
      $consulta="SELECT libro.codlibro, libro.codigol,libro.titu, libro.canti,libro.subt, libro.aut, libro.foto,libro.archi,libro.anopu, libro.edito, libro.idiom, libro.pagi, libro.pes,grado.nomgra, libro.esta, libro.fecreg, libro.fecha_create FROM libro INNER JOIN grado ON libro.codgra= grado.codgra";

      $resultado=$this->db->query($consulta);
      while ($tabla=$resultado->fetchAll(PDO::FETCH_ASSOC)) {
          $this->libro[]=$tabla;
      }
      return $this->libro;
    }
    public function  insertar(Modelo $data){
    try {
      $query="INSERT INTO libro (codigol, titu, canti, subt, aut, foto, archi,anopu,edito,idiom,pagi,pes,codgra,esta,fecreg)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

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

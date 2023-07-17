<?php
class Modelo{

  private $seccion;
  private $db;
  public $codsec;
  public $nomsec;
  public $capacidad;
  public $codclase;
  public $coddoce;

  public function __construct(){
      $this->seccion=array();
      $this->db=new PDO('mysql:host=localhost;dbname=rpv2',"root","");
  }
  public function mostrar($tabla,$condicion){
      $consulta="SELECT seccion.codsec, seccion.nomsec, seccion.capacidad,clase.nomclase,docente.nomprof, seccion.fecha_create  FROM seccion INNER JOIN clase ON seccion.codclase = clase.codclase INNER JOIN docente ON seccion.coddoce = docente.coddoce";

      $resultado=$this->db->query($consulta);
      while ($tabla=$resultado->fetchAll(PDO::FETCH_ASSOC)) {
          $this->seccion[]=$tabla;
      }
      return $this->seccion;
    }
    public function  insertar(Modelo $data){
    try {
      $query="INSERT INTO seccion (nomsec,capacidad,codclase,coddoce)VALUES(?,?,?,?)";

      $this->db->prepare($query)->execute(array($data->nomsec,$data->capacidad,$data->codclase,$data->coddoce));

    }catch (Exception $e) {

      die($e->getMessage());
    }
    }
    public function llenarclase(){



    try{
      $consulta="SELECT * FROM clase";
      $smt=$this->db->prepare($consulta);
      $smt->execute();
      return $smt->fetchAll(PDO::FETCH_OBJ);


    }catch(Exception $e){


    }

    }

    public function llenardocente(){



    try{
      $consulta="SELECT * FROM docente";
      $smt=$this->db->prepare($consulta);
      $smt->execute();
      return $smt->fetchAll(PDO::FETCH_OBJ);


    }catch(Exception $e){


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

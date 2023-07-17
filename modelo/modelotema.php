<?php
class Modelo{

  private $tema;
  private $db;

  public $codtem;
  public $nomtema;
  public $codclase;
  public $coddoce;
  
  public function __construct(){
      $this->tema=array();
      $this->db=new PDO('mysql:host=localhost;dbname=rpv2',"root","");
  }
  public function mostrar($tabla,$condicion){
      $consulta="SELECT tema.codtem, tema.nomtema,clase.nomclase, docente.nomprof, tema.fecha_create  FROM tema INNER JOIN clase ON tema.codclase = clase.codclase INNER JOIN docente ON tema.coddoce = docente.coddoce";

      $resultado=$this->db->query($consulta);
      while ($tabla=$resultado->fetchAll(PDO::FETCH_ASSOC)) {
          $this->tema[]=$tabla;
      }
      return $this->tema;
    }
    public function  insertar(Modelo $data){
    try {
      $query="INSERT INTO tema (nomtema,codclase,coddoce)VALUES(?,?,?)";

      $this->db->prepare($query)->execute(array($data->nomtema,$data->codclase,$data->coddoce));

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

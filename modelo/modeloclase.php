<?php
class Modelo{

  private $clase;
  private $db;

  public $codclase;
  public $nomclase;
  public $coddoce;
  public $codgra;
  public $codano;
  public $tipo;

  public $info;





  public function __construct(){
      $this->clase=array();
      $this->db=new PDO('mysql:host=localhost;dbname=rpv2',"root","");
  }
  public function mostrar($tabla,$condicion){
      $consulta="SELECT clase.codclase, clase.nomclase, docente.nomprof,grado.nomgra,anoaca.nomano,clase.tipo,clase.info,clase.fecha_create  FROM clase INNER JOIN docente ON clase.coddoce = docente.coddoce INNER JOIN grado ON clase.codgra = grado.codgra INNER JOIN anoaca ON clase.codano=anoaca.codano";

      $resultado=$this->db->query($consulta);
      while ($tabla=$resultado->fetchAll(PDO::FETCH_ASSOC)) {
          $this->clase[]=$tabla;
      }
      return $this->clase;
    }
    public function  insertar(Modelo $data){
    try {
      $query="INSERT INTO clase (nomclase,coddoce,codgra,codano,tipo,info)VALUES(?,?,?,?,?,?)";

      $this->db->prepare($query)->execute(array($data->nomclase,$data->coddoce,$data->codgra,$data->codano,$data->tipo,$data->info));

    }catch (Exception $e) {

      die($e->getMessage());
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
	public function llenargrado(){



    try{
      $consulta="SELECT * FROM grado";
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

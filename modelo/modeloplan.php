<?php
class Modelo{

  private $plan;
  private $db;
  
public $codplane;
  public $titu;
  public $descrp;

  public $codclase;
  public $archi;
  public $estado;





  public function __construct(){
      $this->plan=array();
      $this->db=new PDO('mysql:host=localhost;dbname=rpv2',"root","");
  }
  public function mostrar($tabla,$condicion){
      $consulta="SELECT plan.codplane, plan.titu, plan.descrp,clase.nomclase,plan.archi, plan.fecha_create, plan.estado FROM plan INNER JOIN clase ON plan.codclase = clase.codclase";

      $resultado=$this->db->query($consulta);
      while ($tabla=$resultado->fetchAll(PDO::FETCH_ASSOC)) {
          $this->plan[]=$tabla;
      }
      return $this->plan;
    }
    public function  insertar(Modelo $data){
    try {
      $query="INSERT INTO plan (titu,descrp,codclase, archi,estado)VALUES(?,?,?,?,?)";

      $this->db->prepare($query)->execute(array($data->titu,$data->descrp,$data->codclase,$data->archi,$data->estado));

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

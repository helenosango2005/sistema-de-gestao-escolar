<?php
class Modelo{

  private $asignacion;
  private $db;
  public $codasig;
  public $tituloa;
  public $fechaini;
  public $fecha_limite;
  public $coddoce;
  public $codclase;
  public $codsec;
  public $archiv;
  public $estado;
  

  public function __construct(){
      $this->asignacion=array();
      $this->db=new PDO('mysql:host=localhost;dbname=rpv2',"root","");
  }
  public function mostrar($tabla,$condicion){
      $consulta="SELECT asignacion.codasig, asignacion.tituloa, asignacion.fechaini, asignacion.fecha_limite,docente.nomprof,clase.nomclase, seccion.nomsec, asignacion.archiv, asignacion.fecha_create, asignacion.estado FROM asignacion INNER JOIN docente ON asignacion.coddoce = docente.coddoce INNER JOIN clase ON asignacion.codclase = clase.codclase  INNER JOIN seccion ON asignacion.codsec = seccion.codsec";

      $resultado=$this->db->query($consulta);
      while ($tabla=$resultado->fetchAll(PDO::FETCH_ASSOC)) {
          $this->asignacion[]=$tabla;
      }
      return $this->asignacion;
    }
    public function  insertar(Modelo $data){
    try {
      $query="INSERT INTO asignacion (tituloa,fechaini,fecha_limite,coddoce,codclase,codsec,archiv,estado)VALUES(?,?,?,?,?,?,?,?)";

      $this->db->prepare($query)->execute(array($data->tituloa,$data->fechaini,$data->fecha_limite,$data->coddoce,$data->codclase,$data->codsec,$data->archiv,$data->estado));

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

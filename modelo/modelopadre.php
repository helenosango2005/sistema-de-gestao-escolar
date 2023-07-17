<?php
class Modelo{

  private $padres;
  private $db;
  public $codpad;
public $dni;
public $nompadr;
public $apepa;
public $propa;
public $email;
public $telef;
public $celular;
public $sexo;
public $direcc;
public $foto;
public $estado;
public $usuaP;
public $password;
public $fecha_registro;




  public function __construct(){
      $this->padres=array();
      $this->db=new PDO('mysql:host=localhost;dbname=rpv2',"root","");
  }
  public function mostrar($tabla,$condicion){
      $consulta="SELECT * FROM padres";

      $resultado=$this->db->query($consulta);
      while ($tabla=$resultado->fetchAll(PDO::FETCH_ASSOC)) {
          $this->padres[]=$tabla;
      }
      return $this->padres;
    }
    public function  insertar(Modelo $data){
    try {
      $query="INSERT INTO padres (dni,nompadr,apepa,propa,email,telef,celular,sexo,direcc,foto,estado,usuaP,password)
	  VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";

      $this->db->prepare($query)->execute(array($data->dni,$data->nompadr,$data->apepa,$data->propa,$data->email,
	  
	  $data->telef,$data->celular,$data->sexo,$data->direcc,$data->foto,$data->estado,$data->usuaP,$data->password));

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

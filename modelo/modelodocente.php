<?php
class Modelo{

  private $docente;
  private $db;




  public function __construct(){
      $this->docente=array();
      $this->db=new PDO('mysql:host=localhost;dbname=rpv2',"root","");
  }
  public function mostrar($tabla,$condicion){
      $consulta="SELECT docente.coddoce, docente.dnido, docente.nomprof, docente.apeprof, docente.fech_naci, docente.sex, docente.email, docente.telef, docente.direc,docente.dia_ing, docente.foto, docente.nomusu, docente.passw,  docente.estado, docente.role,docente.fecha_registro FROM docente";

      $resultado=$this->db->query($consulta);
      while ($tabla=$resultado->fetchAll(PDO::FETCH_ASSOC)) {
          $this->docente[]=$tabla;
      }
      return $this->docente;
    }
    public function  insertar(Modelo $data){
    try {
      $query="INSERT INTO docente (dnido,nomprof,apeprof,fech_naci,sex,email,telef,direc,dia_ing,foto,nomusu,password,estado)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";

      $this->db->prepare($query)->execute(array($data->dnido,$data->nomprof,$data->apeprof,$data->fech_naci,$data->sex,$data->email,$data->telef,           $data->direc,$data->dia_ing,$data->foto,$data->nomusu,
	  $data->password,$data->estado));

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

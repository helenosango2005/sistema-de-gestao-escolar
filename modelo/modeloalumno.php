<?php
class Modelo{

  private $alumnos;
  private $db;
  public $codalum;
  public $dnia;
  public $nombrea;
  public $apellidoa;
  public $codpad;
  public $fecha_naci;
  public $genero;
  public $grupo_san;
  public $direccion;
  public $pais;
  public $codclase;
  public $codsec;
  public $codgra;
  public $foto;
  public $usualu;
  public $password;
  public $role;
  public $fechare;

  public $estado;
  

  public function __construct(){
      $this->alumnos=array();
      $this->db=new PDO('mysql:host=localhost;dbname=rpv2',"root","");
  }
  public function mostrar($tabla,$condicion){
      $consulta="SELECT alumnos.codalum, alumnos.dnia, alumnos.nombrea, alumnos.apellidoa, padres.nompadr,  grado.nomgra, clase.nomclase, seccion.nomsec, 
	  alumnos.fecha_naci, alumnos.genero, alumnos.grupo_san, alumnos.direccion, alumnos.pais,alumnos.foto, alumnos.usualu, alumnos.password,alumnos.role,alumnos.fechare ,alumnos.estado, alumnos.fecha_create 
	  FROM alumnos INNER JOIN padres ON alumnos.codpad = padres.codpad INNER JOIN grado ON alumnos.codgra=grado.codgra INNER JOIN clase ON alumnos.codclase= clase.codclase INNER JOIN seccion ON alumnos.codsec=seccion.codsec";

      $resultado=$this->db->query($consulta);
      while ($tabla=$resultado->fetchAll(PDO::FETCH_ASSOC)) {
          $this->alumnos[]=$tabla;
      }
      return $this->alumnos;
    }
    public function  insertar(Modelo $data){
    try {
      $query="INSERT INTO alumnos(dnia,nombrea,apellidoa,codpad,fecha_naci,genero,grupo_san,direccion,pais,codclase,
	  codsec,codgra,foto,usuario,password,estado) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
	 $this->db->prepare($query)->execute(array($data->dnia,$data->nombrea,$data->apellidoa,$data->codpad,$data->fecha_naci,$data->genero,$data->grupo_san
	  ,$data->direccion,$data->pais,$data->codclase,$data->codsec,$data->codgra,$data->foto,$data->usuario,$data->password,$data->estado));

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

<?php
require_once '../modelo/modeloalumno.php';
class alumnocontrolador{

    public $model;
  public function __construct() {
        $this->model=new Modelo();
    }
    function mostrar(){
        $alumnos=new Modelo();

        $dato=$alumnos->mostrar("alumnos", "1");
        require_once '../vista/alumnos/mostrar.php';
    }


    //INSERTAR
  public  function nuevo(){
        require_once '../vista/alumnos/nuevo.php';
    }
    //aca ando haciendo
    public function recibir(){
                $alm = new Modelo();
                $alm->dnia=$_POST['txtdnia'];
                $alm->nombrea=$_POST['txtnomb'];
                $alm->apellidoa=$_POST['txtape'];
				$alm->codpad=$_POST['cbocodp'];
                $alm->fecha_naci=$_POST['txtfec'];
				$alm->genero=$_POST['cbogen'];
				$alm->grupo_san=$_POST['cbogrup'];
				$alm->direccion=$_POST['txtdire'];
				$alm->pais=$_POST['cbopas'];
				$alm->codclase=$_POST['cboclas'];
				$alm->codsec=$_POST['cbosecc'];
				$alm->codgra=$_POST['cbograd'];
				$alm->foto=$_POST['txtfoto'];
				$alm->usualu=$_POST['txtusu'];
				$alm->password=$_POST['txtpass'];
				$alm->role=$_POST['cborole'];
				$alm->fechare=$_POST['txtfech'];
				
				$alm->estado=$_POST['cboest'];
				


     $this->model->insertar($alm);
     //-------------
header("Location: alumnos.php");

          }

            //ELIMINAR
            function eliminar(){
                $codalum=$_REQUEST['codalum'];
                $condicion="codalum=$codalum";
                $alumnos=new Modelo();
                $dato=$alumnos->eliminar("alumnos", $condicion);
                header("location:alumnos.php");
            }

    }

<?php
require_once '../modelo/modelodocente.php';
class docentecontrolador{

    public $model;
  public function __construct() {
        $this->model=new Modelo();
    }
    function mostrar(){
        $docente=new Modelo();

        $dato=$docente->mostrar("docente", "1");
        require_once '../vista/docente/mostrar.php';
    }


    //INSERTAR
  public  function nuevo(){
        require_once '../vista/docente/nuevo.php';
    }
    //aca ando haciendo
    public function recibir(){
                $alm = new Modelo();
                $alm->dnido=$_POST['txtdni'];
                $alm->nomprof=$_POST['txtnom'];
                $alm->apeprof=$_POST['txtape'];
                $alm->fech_naci=$_POST['txtfecha'];
                $alm->sex=$_POST['cbogene'];
                $alm->email=$_POST['txtemail'];
                $alm->telef=$_POST['txttele'];
                $alm->direc=$_POST['txtdire'];
                $alm->dia_ing=$_POST['txtdia'];
				$alm->foto=$_POST['txtfoto'];
                $alm->nomusu=$_POST['txtusu'];
                $alm->passw=$_POST['txtpass'];
				
                $alm->estado=$_POST['cboesta'];

     $this->model->insertar($alm);
     //-------------
header("Location: docente.php");

          }

            //ELIMINAR
            function eliminar(){
                $coddoce=$_REQUEST['coddoce'];
                $condicion="coddoce=$coddoce";
                $docente=new Modelo();
                $dato=$docente->eliminar("docente", $condicion);
                header("location:docente.php");
            }

    }

<?php
require_once '../modelo/modeloclase.php';
class clasecontrolador{

    public $model;
  public function __construct() {
        $this->model=new Modelo();
    }
    function mostrar(){
        $clase=new Modelo();

        $dato=$clase->mostrar("clase", "1");
        require_once '../vista/clase/mostrar.php';
    }


    //INSERTAR
  public  function nuevo(){
        require_once '../vista/clase/nuevo.php';
    }
    //aca ando haciendo
    public function recibir(){
                $alm = new Modelo();
                $alm->nomclase=$_POST['txtnomclase'];
                $alm->coddoce=$_POST['cbodoce'];
				$alm->codgra=$_POST['cbogrado'];
				$alm->codano=$_POST['cboano'];
				$alm->tipo=$_POST['cbotip'];
                $alm->info=$_POST['txtinfo'];


     $this->model->insertar($alm);
     //-------------
header("Location: clase.php");

          }

            //ELIMINAR
            function eliminar(){
                $codclase=$_REQUEST['codclase'];
                $condicion="codclase=$codclase";
                $clase=new Modelo();
                $dato=$clase->eliminar("clase", $condicion);
                header("location:clase.php");
            }

    }

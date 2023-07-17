<?php
require_once '../modelo/modeloplan.php';
class plancontrolador{

    public $model;
  public function __construct() {
        $this->model=new Modelo();
    }
    function mostrar(){
        $plan=new Modelo();

        $dato=$plan->mostrar("plan", "1");
        require_once '../vista/plan/mostrar.php';
    }


    //INSERTAR
  public  function nuevo(){
        require_once '../vista/plan/nuevo.php';
    }
    //aca ando haciendo
    public function recibir(){
                $alm = new Modelo();
                $alm->titu=$_POST['txttitu'];
                $alm->descrp=$_POST['txtdescrp'];
				
                $alm->codclase=$_POST['cboclase'];
                $alm->archi=$_POST['txtarchi'];
				$alm->estado=$_POST['cboestado'];


     $this->model->insertar($alm);
     //-------------
header("Location: plan.php");

          }

            //ELIMINAR
            function eliminar(){
                $codplane=$_REQUEST['codplane'];
                $condicion="codplane=$codplane";
                $plan=new Modelo();
                $dato=$plan->eliminar("plan", $condicion);
                header("location:plan.php");
            }

    }

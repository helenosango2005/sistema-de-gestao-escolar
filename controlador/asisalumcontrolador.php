<?php
require_once '../modelo/modeloasisa.php';
class asisalumcontrolador{

    public $model;
  public function __construct() {
        $this->model=new Modelo();
    }
    function mostrar(){
        $asisalum=new Modelo();

        $dato=$asisalum->mostrar("asisalum", "1");
        require_once '../vista/asisalum/mostrar.php';
    }


    //INSERTAR
  public  function nuevo(){
        require_once '../vista/asisalum/nuevo.php';
    }
    //aca ando haciendo
    public function recibir(){
                $alm = new Modelo();
                $alm->codalum=$_POST['cboalum'];
                $alm->presen=$_POST['cbopre'];
				$alm->fechare=$_POST['txtfech'];
               
                

     $this->model->insertar($alm);
     //-------------
header("Location: asisalum.php");

          }

            //ELIMINAR
            function eliminar(){
                $codasis=$_REQUEST['codasis'];
                $condicion="codasis=$codasis";
                $asisalum=new Modelo();
                $dato=$asisalum->eliminar("asisalum", $condicion);
                header("location:asisalum.php");
            }

    }

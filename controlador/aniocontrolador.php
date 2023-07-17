<?php
require_once '../modelo/modeloanio.php';
class aniocontrolador{

    public $model;
  public function __construct() {
        $this->model=new Modelo();
    }
    function mostrar(){
        $anoaca=new Modelo();

        $dato=$anoaca->mostrar("anoaca", "1");
        require_once '../vista/anoaca/mostrar.php';
    }


    //INSERTAR
  public  function nuevo(){
        require_once '../vista/anoaca/nuevo.php';
    }
    //aca ando haciendo
    public function recibir(){
                $alm = new Modelo();
                $alm->nomano=$_POST['txtnomanio'];
                $alm->titulo=$_POST['txttitul'];
               
                

     $this->model->insertar($alm);
     //-------------
header("Location: anoaca.php");

          }

            //ELIMINAR
            function eliminar(){
                $codanio=$_REQUEST['codanio'];
                $condicion="codanio=$codanio";
                $anoaca=new Modelo();
                $dato=$anoaca->eliminar("anoaca", $condicion);
                header("location:anoaca.php");
            }

    }

<?php
require_once '../modelo/modelogrado.php';
class gradocontrolador{

    public $model;
  public function __construct() {
        $this->model=new Modelo();
    }
    function mostrar(){
        $grado=new Modelo();

        $dato=$grado->mostrar("grado", "1");
        require_once '../vista/grado/mostrar.php';
    }


    //INSERTAR
  public  function nuevo(){
        require_once '../vista/grado/nuevo.php';
    }
    //aca ando haciendo
    public function recibir(){
                $alm = new Modelo();
                $alm->nomgra=$_POST['txtnomgra'];
                
                

     $this->model->insertar($alm);
     //-------------
header("Location: grado.php");

          }

            //ELIMINAR
            function eliminar(){
                $codgra=$_REQUEST['codgra'];
                $condicion="codgra=$codgra";
                $grado=new Modelo();
                $dato=$grado->eliminar("grado", $condicion);
                header("location:grado.php");
            }

    }

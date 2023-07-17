<?php
require_once '../modelo/modelotema.php';
class temacontrolador{

    public $model;
  public function __construct() {
        $this->model=new Modelo();
    }
    function mostrar(){
        $tema=new Modelo();

        $dato=$tema->mostrar("tema", "1");
        require_once '../vista/tema/mostrar.php';
    }


    //INSERTAR
  public  function nuevo(){
        require_once '../vista/tema/nuevo.php';
    }
    //aca ando haciendo
    public function recibir(){
                $alm = new Modelo();
				$alm->nomtema=$_POST['txtnomtema'];
                $alm->codclase=$_POST['cboclase'];
                $alm->coddoce=$_POST['cbodoce'];
               
               
                


     $this->model->insertar($alm);
     //-------------
header("Location: tema.php");

          }

            //ELIMINAR
            function eliminar(){
                $codtem=$_REQUEST['codtem'];
                $condicion="codtem=$codtem";
                $tema=new Modelo();
                $dato=$tema->eliminar("tema", $condicion);
                header("location:tema.php");
            }

    }

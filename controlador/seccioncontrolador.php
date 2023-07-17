<?php
require_once '../modelo/modeloseccion.php';
class seccioncontrolador{

    public $model;
  public function __construct() {
        $this->model=new Modelo();
    }
    function mostrar(){
        $seccion=new Modelo();

        $dato=$seccion->mostrar("seccion", "1");
        require_once '../vista/seccion/mostrar.php';
    }


    //INSERTAR
  public  function nuevo(){
        require_once '../vista/seccion/nuevo.php';
    }
    //aca ando haciendo
    public function recibir(){
                $alm = new Modelo();
                $alm->nomsec=$_POST['txtnomsecc'];
                $alm->capacidad=$_POST['txtcapaci'];
                $alm->codclase=$_POST['cboclase'];
                $alm->coddoce=$_POST['cbodoce'];


     $this->model->insertar($alm);
     //-------------
header("Location: seccion.php");

          }

            //ELIMINAR
            function eliminar(){
                $codsec=$_REQUEST['codsec'];
                $condicion="codsec=$codsec";
                $seccion=new Modelo();
                $dato=$seccion->eliminar("seccion", $condicion);
                header("location:seccion.php");
            }

    }

<?php
require_once '../modelo/modeloasignacion.php';
class asignacioncontrolador{

    public $model;
  public function __construct() {
        $this->model=new Modelo();
    }
    function mostrar(){
        $asignacion=new Modelo();

        $dato=$asignacion->mostrar("asignacion", "1");
        require_once '../vista/asignacion/mostrar.php';
    }


    //INSERTAR
  public  function nuevo(){
        require_once '../vista/asignacion/nuevo.php';
    }
    //aca ando haciendo
    public function recibir(){
                $alm = new Modelo();
                $alm->tituloa=$_POST['txttituloa'];
				$alm->fechaini=$_POST['txtfeini'];
                $alm->fecha_limite=$_POST['txtfechali'];
                $alm->coddoce=$_POST['cbodoce'];
				$alm->codclase=$_POST['cbocla'];
                $alm->codsec=$_POST['cbosec'];
				$alm->archiv=$_POST['txtarch'];
				$alm->estado=$_POST['cboestado'];


     $this->model->insertar($alm);
     //-------------
header("Location: asignacion.php");

          }

            //ELIMINAR
            function eliminar(){
                $codasig=$_REQUEST['codasig'];
                $condicion="codasig=$codasig";
                $asignacion=new Modelo();
                $dato=$asignacion->eliminar("asignacion", $condicion);
                header("location:asignacion.php");
            }

    }

<?php
require_once '../modelo/modelolibro.php';
class librocontrolador{

    public $model;
  public function __construct() {
        $this->model=new Modelo();
    }
    function mostrar(){
        $libro=new Modelo();

        $dato=$libro->mostrar("libro", "1");
        require_once '../vista/libro/mostrar.php';
    }


    //INSERTAR
  public  function nuevo(){
        require_once '../vista/libro/nuevo.php';
    }
    //aca ando haciendo
    public function recibir(){
                $alm = new Modelo();
                $alm->codigol=$_POST['txtcodi'];
				$alm->titu=$_POST['txttitu'];
				$alm->canti=$_POST['txtcant'];
				$alm->subt=$_POST['txtsub'];
				$alm->aut=$_POST['txtaut'];
				$alm->foto=$_POST['txtft'];
				$alm->archi=$_POST['txtarc'];
				$alm->anopu=$_POST['txtano'];
				$alm->edito=$_POST['txtedi'];
				$alm->idiom=$_POST['cbidio'];
				$alm->pagi=$_POST['txtpag'];
				$alm->pes=$_POST['txtpes'];
				$alm->codgra=$_POST['cbogrado'];
				$alm->esta=$_POST['txtesta'];
				$alm->fecreg=$_POST['txtfech'];
                
                

     $this->model->insertar($alm);
     //-------------
header("Location: libro.php");

          }

            //ELIMINAR
            function eliminar(){
                $codlibro=$_REQUEST['codlibro'];
                $condicion="codlibro=$codlibro";
                $libro=new Modelo();
                $dato=$libro->eliminar("libro", $condicion);
                header("location:libro.php");
            }

    }

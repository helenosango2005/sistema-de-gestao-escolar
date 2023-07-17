<?php
require_once '../modelo/modelopadre.php';
class padrecontrolador{

    public $model;
  public function __construct() {
        $this->model=new Modelo();
    }
    function mostrar(){
        $padres=new Modelo();

        $dato=$padres->mostrar("padres", "1");
        require_once '../vista/padre/mostrar.php';
    }


    //INSERTAR
  public  function nuevo(){
        require_once '../vista/padre/nuevo.php';
    }
    //aca ando haciendo
    public function recibir(){
                $alm = new Modelo();
                $alm->dni=$_POST['txtdnip'];
               
                $alm->nompadr=$_POST['txtnompa'];
                
                $alm->apepa=$_POST['txtapepa'];
				$alm->propa=$_POST['txtpropa'];
                $alm->email=$_POST['txtemail'];
                $alm->telef=$_POST['txttelefo'];
				$alm->celular=$_POST['txtcelu'];
                $alm->sexo=$_POST['cbosexo'];
                $alm->direcc=$_POST['txtdirecci'];
                $alm->foto=$_POST['txtfoto']; 
                $alm->estado=$_POST['cboestado'];
				$alm->usuaP=$_POST['txtusup'];
				$alm->password=$_POST['txtpassw'];
				

     $this->model->insertar($alm);
     //-------------
header("Location:padre.php");

          }

            //ELIMINAR
            function eliminar(){
                $codpad=$_REQUEST['codpad'];
                $condicion="codpad=$codpad";
                $padres=new Modelo();
                $dato=$padres->eliminar("padres", $condicion);
                header("location:padre.php");
            }

    }

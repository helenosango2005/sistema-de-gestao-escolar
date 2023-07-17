<?php
require_once '../controlador/clasecontrolador.php';
$objclase=new clasecontrolador();
$op="mostrar";
if(isset($_REQUEST['op']))
    $op=$_REQUEST['op'];
    if($op=="mostrar")
    $objclase->mostrar();
    elseif ($op=="nuevo")
        $objclase->nuevo();
    elseif ($op=="guardar")
        $objclase->guardar();
    elseif ($op=="editar")
        $objclase->editar();
    elseif($op=="update")
        $objclase->update();
        elseif($op=="insertar")
            $objclase->insertar();
        elseif($op=="recibir")
            $objclase->recibir();
            elseif($op=="eliminar")
                $objclase->eliminar();
?>

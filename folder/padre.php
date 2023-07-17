<?php
require_once '../controlador/padrecontrolador.php';
$objpadre=new padrecontrolador();
$op="mostrar";
if(isset($_REQUEST['op']))
    $op=$_REQUEST['op'];
    if($op=="mostrar")
    $objpadre->mostrar();
    elseif ($op=="nuevo")
        $objpadre->nuevo();
    elseif ($op=="guardar")
        $objpadre->guardar();
    elseif ($op=="editar")
        $objpadre->editar();
    elseif($op=="update")
        $objpadre->update();
        elseif($op=="insertar")
            $objpadre->insertar();
        elseif($op=="recibir")
            $objpadre->recibir();
            elseif($op=="eliminar")
                $objpadre->eliminar();
?>

<?php
require_once '../controlador/asisalumcontrolador.php';
$objasisalum=new asisalumcontrolador();
$op="mostrar";
if(isset($_REQUEST['op']))
    $op=$_REQUEST['op'];
    if($op=="mostrar")
    $objasisalum->mostrar();
    elseif ($op=="nuevo")
        $objasisalum->nuevo();
    elseif ($op=="guardar")
        $objasisalum->guardar();
    elseif ($op=="editar")
        $objasisalum->editar();
    elseif($op=="update")
        $objasisalum->update();
        elseif($op=="insertar")
            $objasisalum->insertar();
        elseif($op=="recibir")
            $objasisalum->recibir();
            elseif($op=="eliminar")
                $objasisalum->eliminar();
?>

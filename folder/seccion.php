<?php
require_once '../controlador/seccioncontrolador.php';
$objseccion=new seccioncontrolador();
$op="mostrar";
if(isset($_REQUEST['op']))
    $op=$_REQUEST['op'];
    if($op=="mostrar")
    $objseccion->mostrar();
    elseif ($op=="nuevo")
        $objseccion->nuevo();
    elseif ($op=="guardar")
        $objseccion->guardar();
    elseif ($op=="editar")
        $objseccion->editar();
    elseif($op=="update")
        $objseccion->update();
        elseif($op=="insertar")
            $objseccion->insertar();
        elseif($op=="recibir")
            $objseccion->recibir();
            elseif($op=="eliminar")
                $objseccion->eliminar();
?>

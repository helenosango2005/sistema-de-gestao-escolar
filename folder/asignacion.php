<?php
require_once '../controlador/asignacioncontrolador.php';
$objasignacion=new asignacioncontrolador();
$op="mostrar";
if(isset($_REQUEST['op']))
    $op=$_REQUEST['op'];
    if($op=="mostrar")
    $objasignacion->mostrar();
    elseif ($op=="nuevo")
        $objasignacion->nuevo();
    elseif ($op=="guardar")
        $objasignacion->guardar();
    elseif ($op=="editar")
        $objasignacion->editar();
    elseif($op=="update")
        $objasignacion->update();
        elseif($op=="insertar")
            $objasignacion->insertar();
        elseif($op=="recibir")
            $objasignacion->recibir();
            elseif($op=="eliminar")
                $objasignacion->eliminar();
?>

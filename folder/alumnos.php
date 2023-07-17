<?php
require_once '../controlador/alumnocontrolador.php';
$objalumno=new alumnocontrolador();
$op="mostrar";
if(isset($_REQUEST['op']))
    $op=$_REQUEST['op'];
    if($op=="mostrar")
    $objalumno->mostrar();
    elseif ($op=="nuevo")
        $objalumno->nuevo();
    elseif ($op=="guardar")
        $objalumno->guardar();
    elseif ($op=="editar")
        $objalumno->editar();
    elseif($op=="update")
        $objalumno->update();
        elseif($op=="insertar")
            $objalumno->insertar();
        elseif($op=="recibir")
            $objalumno->recibir();
            elseif($op=="eliminar")
                $objalumno->eliminar();
?>

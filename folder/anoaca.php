<?php
require_once '../controlador/aniocontrolador.php';
$objanio=new aniocontrolador();
$op="mostrar";
if(isset($_REQUEST['op']))
    $op=$_REQUEST['op'];
    if($op=="mostrar")
    $objanio->mostrar();
    elseif ($op=="nuevo")
        $objanio->nuevo();
    elseif ($op=="guardar")
        $objanio->guardar();
    elseif ($op=="editar")
        $objanio->editar();
    elseif($op=="update")
        $objanio->update();
        elseif($op=="insertar")
            $objanio->insertar();
        elseif($op=="recibir")
            $objanio->recibir();
            elseif($op=="eliminar")
                $objanio->eliminar();
?>

<?php
require_once '../controlador/plancontrolador.php';
$objplan=new plancontrolador();
$op="mostrar";
if(isset($_REQUEST['op']))
    $op=$_REQUEST['op'];
    if($op=="mostrar")
    $objplan->mostrar();
    elseif ($op=="nuevo")
        $objplan->nuevo();
    elseif ($op=="guardar")
        $objplan->guardar();
    elseif ($op=="editar")
        $objplan->editar();
    elseif($op=="update")
        $objplan->update();
        elseif($op=="insertar")
            $objplan->insertar();
        elseif($op=="recibir")
            $objplan->recibir();
            elseif($op=="eliminar")
                $objplan->eliminar();
?>

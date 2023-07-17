<?php
require_once '../controlador/temacontrolador.php';
$objtema=new temacontrolador();
$op="mostrar";
if(isset($_REQUEST['op']))
    $op=$_REQUEST['op'];
    if($op=="mostrar")
    $objtema->mostrar();
    elseif ($op=="nuevo")
        $objtema->nuevo();
    elseif ($op=="guardar")
        $objtema->guardar();
    elseif ($op=="editar")
        $objtema->editar();
    elseif($op=="update")
        $objtema->update();
        elseif($op=="insertar")
            $objtema->insertar();
        elseif($op=="recibir")
            $objtema->recibir();
            elseif($op=="eliminar")
                $objtema->eliminar();
?>

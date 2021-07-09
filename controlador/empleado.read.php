<?php
include_once("../entidad/empleado.entidad.php");
include_once("../modelo/empleado.modelo.php");
include_once("session.php");

if ($_SESSION["rol"]=="Administrador") {
$empleadoE = new entidad\Empleado();
$empleadoM = new modelo\Empleado($empleadoE);
$retorno = $empleadoM->read();

unset($empleadoE);
unset($empleadoM);

echo json_encode($retorno);
}else{
    echo "<script> alert('Primero Debes Iniciar Sesion');window.location.href='../vista/login.frm.php'</script>";
}
?>
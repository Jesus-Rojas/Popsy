<?php
include_once("../entidad/empleado.entidad.php");
include_once("../modelo/empleado.modelo.php");

$idEmpleado=$_POST['txtIdEmpleadoModal'];

$empleadoE = new entidad\Empleado();
$empleadoE->setIdEmpleado($idEmpleado);

$empleadoM = new modelo\Empleado($empleadoE);
$retorno = $empleadoM->delete();

unset($empleadoE);
unset($empleadoM);

echo json_encode($retorno);

?>
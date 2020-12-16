<?php
include_once("../entidad/empleado.entidad.php");
include_once("../modelo/empleado.modelo.php");

$idEmpleado=$_POST['txtIdEmpleadoModal'];
$identificacion=$_POST['txtIdentificacionModal'];
$nombre=$_POST['txtNombreModal'];
$apellido=$_POST['txtApellidoModal'];
$user=$_POST['txtUsuarioModal'];
$password=$_POST['txtPasswordModal'];

$empleadoE = new entidad\Empleado();
$empleadoE->setIdEmpleado($idEmpleado);
$empleadoE->setIdentificacion($identificacion);
$empleadoE->setNombre($nombre);
$empleadoE->setApellido($apellido);
$empleadoE->setUser($user);
$empleadoE->setPassword($password);

$empleadoM = new modelo\Empleado($empleadoE);
$retorno = $empleadoM->update();

unset($empleadoE);
unset($empleadoM);

echo json_encode($retorno);

?>
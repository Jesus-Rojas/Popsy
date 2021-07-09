<?php
include_once("../entidad/empleado.entidad.php");
include_once("../modelo/empleado.modelo.php");

$identificacion=$_POST['txtIdentificacion'];
$nombre=$_POST['txtNombre'];
$apellido=$_POST['txtApellido'];
$user=$_POST['txtUser'];
$password=$_POST['txtPassword'];

$empleadoE = new entidad\Empleado();
$empleadoE->setIdentificacion($identificacion);
$empleadoE->setNombre($nombre);
$empleadoE->setApellido($apellido);
$empleadoE->setUser($user);
$empleadoE->setPassword($password);

$empleadoM = new modelo\Empleado($empleadoE);
$retorno = $empleadoM->create();

unset($empleadoE);
unset($empleadoM);

echo json_encode($retorno);

?>
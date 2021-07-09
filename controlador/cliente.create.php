<?php
include_once("../entidad/cliente.entidad.php");
include_once("../modelo/cliente.modelo.php");

$identificacion = $_POST["txtCedulaVen"];
$nombre = $_POST["txtNombreVen"];
$apellido = $_POST["txtApellidoVen"];
$clienteE = new entidad\Cliente();
$clienteE->setIdentificacion($identificacion);
$clienteE->setNombre($nombre);
$clienteE->setApellido($apellido);
$clienteM = new modelo\Cliente($clienteE);
$retorno = $clienteM->create();

unset($clienteE);
unset($clienteM);

echo json_encode($retorno);
?>
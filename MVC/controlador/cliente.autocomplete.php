<?php
include_once("../entidad/cliente.entidad.php");
include_once("../modelo/cliente.modelo.php");
include_once("session.php");

$identificacion = $_GET["term"];
$clienteE = new entidad\Cliente();
$clienteE->setIdentificacion($identificacion);
$clienteM = new modelo\Cliente($clienteE);
$retorno = $clienteM->autocomplete();

unset($clienteE);
unset($clienteM);

echo json_encode($retorno);

?>
<?php
include_once("../entidad/venta.entidad.php");
include_once("../modelo/venta.modelo.php");
include_once("../entidad/cliente.entidad.php");
include_once("../modelo/cliente.modelo.php");

$idCliente = $_POST["txtIdCliente"];
$puntos = $_POST["puntos"];
$total = $_POST["total"];

$clienteE = new entidad\Cliente();
$clienteE->setIdCliente($idCliente);
$clienteE->setPuntos($puntos);
$clienteM = new modelo\Cliente($clienteE);
$retorno = $clienteM->updatePuntos();

unset($clienteE);
unset($clienteM);

$ventaE = new entidad\Venta();
$ventaE->setIdCliente($idCliente);
$ventaE->setTotal($total);
$ventaM = new modelo\Venta($ventaE);
$retorno = [$ventaM->create(),$retorno];

unset($ventaE);
unset($ventaM);

echo json_encode($retorno);
?>
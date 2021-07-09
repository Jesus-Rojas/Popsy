<?php
include_once("../entidad/sabor.entidad.php");
include_once("../modelo/sabor.modelo.php");
include_once("session.php");

$SaborE = new entidad\Sabor();
$SaborM = new modelo\Sabor($SaborE);
$retorno = $SaborM->read();

unset($SaborE);
unset($SaborM);

echo json_encode($retorno);

?>
<?php
include_once("../entidad/sabor.entidad.php");
include_once("../modelo/sabor.modelo.php");

$idSabor=$_POST['txtIdSabor'];

$saborE = new entidad\Sabor();
$saborE->setIdSabor($idSabor);
$saborM = new modelo\Sabor($saborE);
$retorno = $saborM->delete();

unset($saborE);
unset($saborM);

echo json_encode($retorno);

?>
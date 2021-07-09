<?php
include_once("../entidad/sabor.entidad.php");
include_once("../modelo/sabor.modelo.php");

$nombre = $_POST['txtNombreSabor'];
$cantidad = $_POST['cantidad'];
$categoria = $_POST['selCategoria'];
$ingredientes = $_POST['checkIngredientes'];
$imagen = $_FILES['txtImagenSabor'];

$saborE = new entidad\Sabor();
$saborE->setNombre($nombre);
$saborE->setCantidad($cantidad);
$saborE->setIdCategoria($categoria);
$saborE->setImagen($imagen);
$saborE->setIngredientes($ingredientes);

$saborM = new modelo\Sabor($saborE);
$retorno = $saborM->create();

unset($saborE);
unset($saborM);

echo json_encode($retorno);
?>
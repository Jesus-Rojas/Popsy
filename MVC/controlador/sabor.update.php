<?php
include_once("../entidad/sabor.entidad.php");
include_once("../modelo/sabor.modelo.php");

$idSabor=$_POST['txtIdSabor'];
$cantidad = $_POST['cantidadModal'];
$idCategoria = $_POST['selCategoriaModal'];
$nombre = $_POST['txtNombreSaborModal'];
$ingredientes = $_POST['checkIngredientesModal'];
$imagen = $_FILES['txtImagenSaborModal'];
$urlImagen = $_POST['urlImagenSaborModal'];


$saborE = new entidad\Sabor();
$saborE->setIdSabor($idSabor);
$saborE->setIdCategoria($idCategoria);
$saborE->setNombre($nombre);
$saborE->setCantidad($cantidad);
$saborE->setIngredientes($ingredientes);
$saborE->setImagen($imagen);
$saborE->setUrlImagen($urlImagen);


$saborM = new modelo\Sabor($saborE);
$retorno = $saborM->update();

unset($saborE);
unset($saborM);

echo json_encode($retorno);
?>
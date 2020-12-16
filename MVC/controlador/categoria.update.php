<?php
include_once("../entidad/categoria.entidad.php");
include_once("../modelo/categoria.modelo.php");

$idCat=$_POST['txtIdCatModal'];
$nombreCat=$_POST['txtNombreCatModal'];
$precioCat=$_POST['txtPrecioCatModal'];

$categoriaE = new entidad\Categoria();
$categoriaE->setIdCat($idCat);
$categoriaE->setNombreCat($nombreCat);
$categoriaE->setPrecioCat($precioCat);

$categoriaM = new modelo\Categoria($categoriaE);
$retorno = $categoriaM->update();

unset($categoriaE);
unset($categoriaM);

echo json_encode($retorno);

?>
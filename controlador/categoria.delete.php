<?php
include_once("../entidad/categoria.entidad.php");
include_once("../modelo/categoria.modelo.php");

$idCat=$_POST['txtIdCatModal'];

$categoriaE = new entidad\Categoria();
$categoriaE->setIdCat($idCat);

$categoriaM = new modelo\Categoria($categoriaE);
$retorno = $categoriaM->delete();

unset($categoriaE);
unset($categoriaM);

echo json_encode($retorno);

?>
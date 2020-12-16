<?php
include_once("../entidad/categoria.entidad.php");
include_once("../modelo/categoria.modelo.php");

$nombreCat=$_POST['txtNombreCat'];
$precioCat=$_POST['txtPrecioCat'];

$categoriaE = new entidad\Categoria();
$categoriaE->setNombreCat($nombreCat);
$categoriaE->setPrecioCat($precioCat);

$categoriaM = new modelo\Categoria($categoriaE);
$retorno = $categoriaM->create();

unset($categoriaE);
unset($categoriaM);

echo json_encode($retorno);

?>

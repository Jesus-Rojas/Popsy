<?php
include_once("../entidad/categoria.entidad.php");
include_once("../modelo/categoria.modelo.php");
include_once("session.php");

$categoriaE = new entidad\Categoria();
$categoriaM = new modelo\Categoria($categoriaE);
$retorno = $categoriaM->read();

unset($categoriaE);
unset($categoriaM);

echo json_encode($retorno);
?>
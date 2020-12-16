<?php
include_once("../entidad/ingrediente.entidad.php");
include_once("../modelo/ingrediente.modelo.php");
include_once("session.php");

$ingredienteE = new entidad\Ingrediente();
$ingredienteM = new modelo\Ingrediente($ingredienteE);
$retorno = $ingredienteM->read();

unset($ingredienteE);
unset($ingredienteM);

echo json_encode($retorno);
?>
<?php
include_once("../entidad/ingrediente.entidad.php");
include_once("../modelo/ingrediente.modelo.php");

$idIngrediente=$_POST['txtIdIngModal'];
$ingredienteE = new entidad\Ingrediente();
$ingredienteE->setIdIngrediente($idIngrediente);

$ingredienteM = new modelo\Ingrediente($ingredienteE);
$retorno = $ingredienteM->delete();

unset($ingredienteE);
unset($ingredienteM);

echo json_encode($retorno);
?>
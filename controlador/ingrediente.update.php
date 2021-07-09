<?php
include_once("../entidad/ingrediente.entidad.php");
include_once("../modelo/ingrediente.modelo.php");

$idIngrediente=$_POST['txtIdIngModal'];
$nombre=$_POST['txtNombreIngModal'];
$ingredienteE = new entidad\Ingrediente();
$ingredienteE->setIdIngrediente($idIngrediente);
$ingredienteE->setNombre($nombre);

$ingredienteM = new modelo\Ingrediente($ingredienteE);
$retorno = $ingredienteM->update();

unset($ingredienteE);
unset($ingredienteM);

echo json_encode($retorno);
?>
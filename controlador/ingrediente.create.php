<?php
include_once("../entidad/ingrediente.entidad.php");
include_once("../modelo/ingrediente.modelo.php");

$nombre=$_POST['txtNombreIng'];
echo $nombre;
$ingredienteE = new entidad\Ingrediente();
$ingredienteE->setNombre($nombre);

$ingredienteM = new modelo\Ingrediente($ingredienteE);
$retorno = $ingredienteM->create();

unset($ingredienteE);
unset($ingredienteM);

echo json_encode($retorno);
?>
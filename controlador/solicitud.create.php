<?php
include_once("../entidad/solicitud.entidad.php");
include_once("../modelo/solicitud.modelo.php");

$idEmpleado = $_POST['idEmpleado'];
$txt = $_POST['txtArea'];

$solicitudE = new entidad\Solicitud();
$solicitudE->setIdEmpleado($idEmpleado);
$solicitudE->setTxt($txt);

$solicitudM = new modelo\Solicitud($solicitudE);
$retorno = $solicitudM->create();

unset($solicitudE);
unset($solicitudM);

echo json_encode($retorno);
?>
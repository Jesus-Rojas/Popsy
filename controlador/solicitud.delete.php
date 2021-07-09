<?php
include_once("../entidad/solicitud.entidad.php");
include_once("../modelo/solicitud.modelo.php");

$idSolicitud = $_POST['txtIdSolicitud'];

$solicitudE = new entidad\Solicitud();
$solicitudE->setIdSolicitud($idSolicitud);

$solicitudM = new modelo\Solicitud($solicitudE);
$retorno = $solicitudM->delete();

unset($solicitudE);
unset($solicitudM);

echo json_encode($retorno);
?>
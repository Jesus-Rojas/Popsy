<?php
include_once("../entidad/solicitud.entidad.php");
include_once("../modelo/solicitud.modelo.php");
include_once("session.php");

if ($_SESSION["rol"]=="Administrador") {
$solicitudE = new entidad\Solicitud();

$solicitudM = new modelo\Solicitud($solicitudE);
$retorno = $solicitudM->read();

unset($solicitudE);
unset($solicitudM);

echo json_encode($retorno);
}else{
    echo "<script> alert('Primero Debes Iniciar Sesion');window.location.href='../vista/login.frm.php'</script>";
}
?>
<?php
include_once("../entidad/login.entidad.php");
include_once("../modelo/login.modelo.php");

session_start();

$usuario = $_POST['txtUsuario'];
$password = $_POST['txtPassword'];

$loginE = new entidad\Login();
$loginE->setUsuario($usuario);
$loginE->setPassword($password);

$loginM = new modelo\Login($loginE);
$retorno = $loginM->validar();

if (!empty($retorno)) {
    if (array_key_exists('nombre', $retorno[0])) {
        $_SESSION["idEmpleado"] = $retorno[0]["id_empleado"];
        $_SESSION["rol"] = $retorno[0]["rol"];
        $_SESSION["nombre"] = $retorno[0]["nombre"];
        $_SESSION["apellido"] = $retorno[0]["apellido"];
    }
}

unset($loginE);
unset($loginM);

echo json_encode($retorno);
?>
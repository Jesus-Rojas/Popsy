<?php
session_start();

if (!$_SESSION) {
    echo "<script> alert('Primero Debes Iniciar Sesion');window.location.href='../vista/login.frm.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/jquery-ui.css">
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/datatables.css">
    <link rel="stylesheet" href="../css/custom.css">
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/jquery-ui.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/all.js"></script>
    <script src="../js/datatables.js"></script>
    <script src="../js/dataTables.buttons.js"></script>
    <script src="../js/login.js"></script>
    <?php 
        session_start();
        if (!$_SESSION) {
            echo "<script>localStorage.removeItem('user');</script>";
        }
    ?>
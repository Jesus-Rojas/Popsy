<?php include_once('header.php') ?>
<?php 
    if ($_SESSION) {
        echo "<script>window.location.href='http://localhost/proyectos/Popsy/MVC/vista/venta.frm.php'</script>";
    }
?>
<title>Login</title>
</head>

<body>
    <div class="container-fluid">
        <form id="loginFrm">
        <div class="row">
            <div class="col-4" style="color:transparent;">a</div>
            <div class="col-4 text-center">
                <main class="form-signin mt-5">
                    <form>
                        <img class="mb-4 mt-5 rounded-circle w-50" src="../img/logo2.jpeg">
                        <input type="text" id="txtUsuario" name="txtUsuario" class="form-control" placeholder="User" required autofocus>
                        <input type="password" id="txtPassword" name="txtPassword" class="form-control"
                            placeholder="Password" required>
                        <button class="w-100 btn btn-lg btn-primary" id="btnLogin" type="button">Login</button>
                        <p class="mt-5 mb-3 text-muted">&copy; 2017-2020</p>
                    </form>
                </main>
            </div>
            <div class="col-4" style="color:transparent;">a</div>
        </div>
    </form>
    </div>
</body>

</html>
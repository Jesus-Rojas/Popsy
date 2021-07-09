<?php   include_once("header.php")   ?>
    <title>Formulario Ventas</title>
</head>
<body hidden>
    <div class="container-fluid">
    <?php   include_once("nav.php")   ?>
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <form id="ventaFrm">
                    <div class="row form-group">
                        <div class="col-12 mb-3 mt-5">
                            <h1 class="text-center">VENTA</h1>
                        </div>
                        <a href=""></a>
                        <div class="col-12">
                            <label>Cedula Cliente</label>
                            <input hidden class="form-control" id="txtIdCliente" type="number" name="txtIdCliente">
                            <input class="form-control" id="txtCedulaVen" type="text" name="txtCedulaVen">
                        </div>
                        <div class="col-12">
                            <label>Nombre Cliente</label>
                            <input class="form-control" id="txtNombreVen" type="text" name="txtNombreVen" readonly>
                        </div>
                        <div class="col-12 txtApellidoVen" hidden>
                            <label>Apellido Cliente</label>
                            <input class="form-control" id="txtApellidoVen" type="text" name="txtApellidoVen">
                        </div>
                        <div class="col-12">
                            <label>Puntos Cliente</label>
                            <input class="form-control" id="txtPuntosVen" value="0" type="number" name="txtPuntosVen" readonly>
                        </div>
                        <div class="col-12 mt-4" style="margin-bottom: 2em;">
                            <a class="btn btn-primary mr-3" id="btnRegistrarVenta" hidden>Registrar Venta</a>
                            <a class="btn btn-primary mr-3" id="btnNuevo" hidden>Nuevo</a>
                            <a class="btn btn-primary mr-3" id="btnRegistrarUsuario" hidden>Registrar Usuario</a>
                        </div>
                    </div>
                    <div class="row">
                        <h1 class="text-center col-12">SABORES</h1>
                    </div>
                    <div class="row">
                        <div id="sabores"></div>
                    </div>
                    <div class="row my-5">
                        <input hidden type="number" name="total" id="total">
                        <h1>Total $<span id="respuesta">0</span></h1>
                    </div>
                    <div class="row">
                        <input hidden type="number" name="puntos" id="puntos">
                        <h1>Puntos: <span id="puntosTotal">0</span></h1>
                    </div>
                    
                </form>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
    <script src="../js/venta.js"></script>
</body>
</html>
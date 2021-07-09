<?php include_once('header.php') ?>
    <title>Login</title>
</head>
<body hidden id="body22">
<div class="container-fluid">
    <?php   include_once("nav.php")   ?>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <form id="empleadoFrm">
                    <div class="row form-group">
                        <div class="col-12 mb-3 mt-5">
                            <h1 class="text-center">Empleados</h1>
                        </div>
                        <div class="col-12">
                            <label>Identificacion</label>
                            <input class="form-control" id="txtIdentificacion" type="number" name="txtIdentificacion">
                        </div>
                        <div class="col-12">
                            <label>Nombre</label>
                            <input class="form-control" id="txtNombre" type="text" name="txtNombre">
                        </div>
                        <div class="col-12">
                            <label>Apellido</label>
                            <input class="form-control" id="txtApellido" type="text" name="txtApellido">
                        </div>
                        <div class="col-12">
                            <label>Usuario</label>
                            <input class="form-control" id="txtUser" type="text" name="txtUser">
                        </div>
                        <div class="col-12">
                            <label>Contraseña</label>
                            <input class="form-control" id="txtPassword" type="password" name="txtPassword" autocomplete="off">
                        </div>

                        <div class="col-12 mt-4" style="margin-bottom: 2em;">
                            <a class="btn btn-primary mr-3" id="btnRegistrar">Registrar</a>
                        </div>
                    </div>
                    <div class="row justify-content-center" id="respuesta">
                    </div>
                    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button type="button" class="btn btn-primary modalConfirmacion" data-dismiss="modal"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-3"></div>
        </div>
    </div>
    <script src="../js/empleado.js"></script>
</body>
</html>
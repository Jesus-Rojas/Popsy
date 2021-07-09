<?php include_once("header.php")   ?>
<title>Formulario Sabores</title>
</head>

<body hidden>
    <form id="frmSabores" method="POST" enctype="multipart/form-data">
        <div class="container-fluid">
            <?php include_once("nav.php")   ?>
            <div class="row">
                <div class="col-2"></div>
                <div class="col-8">
                    <div class="col-12 mb-5 mt-5">
                        <h1 class="text-center">SABORES</h1>
                    </div>
                    <div class="row mb-1">
                        <div class="col-6">Nombre Sabor de Helado</div>
                        <div class="col-6"><input type="text" id="txtNombreSabor" name="txtNombreSabor"></div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-6">Cantidad</div>
                        <div class="col-6"><input type="number" id="cantidad" name="cantidad" min="1" value="1"></div>
                    </div>
                    <div class="row">
                        <div class="col-6">Categoria</div>
                        <div class="col-6">
                            <select id="selCategoria" name="selCategoria">
                                <option value="0" selected disabled>Seleccionar</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">Ingredientes</div>
                        <div class="col-6" id="ingredientes">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">Imagen referencia</div>
                        <div class="col-6">
                            <div id="divImagen" class="col-12 justify-content-center text-center">
                                <p class="texto" style="padding-top: 0.5em;">Click Aqui</p>
                                <input type="file" accept="image/*" name="txtImagenSabor" id="txtImagenSabor" class="txtImagenSabor" onchange="imagenServidor(this.id,'divImagen')">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <input type="button" value="registro" name="btnSubmit" id="btnRegistrar">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-2"></div>
            <div style="margin-top: 3em;" class="row justify-content-center" id="respuesta">
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
                            <button type="button" class="btn btn-primary modalConfirmacion"></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script src="../js/sabores.js"></script>
</body>

</html>
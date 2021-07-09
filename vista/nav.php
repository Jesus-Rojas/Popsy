<div class="row bg-dark p-2">
    <div class="col-12 row">
        <div class="col-9" id="permisos"></div>

        <div class="col-3">
            <ul class="nav justify-content-end pt-3">
                <li class="nav-item mr-3 pt-1">
                    <p class="text-light" id="user"></p>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-lind btn btn-danger" id="btnCerrarLogin">Cerrar Sesion</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<script>
    const objeto = JSON.parse(localStorage.getItem('user'));
    $("#user").html(`${objeto[0].nombre} ${objeto[0].apellido}`);
</script>
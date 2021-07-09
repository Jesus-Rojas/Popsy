$(document).ready(()=>{
    $(document).on("click","#btnLogin",()=>{
        let a = $("#txtUsuario").val();
        let b = $("#txtPassword").val();
        if (a==""||b=="") {
            return alert("Todos los campos son obligatorios")
        }
        $.ajax({
            url:"../controlador/login.create.php",
            type:"POST",
            datatype:"JSON",
            data:$("#loginFrm").serialize()
        }).done((json)=>{
            json=JSON.parse(json);
            if (json.length!=0) {
                localStorage.setItem('user', JSON.stringify(json));
                window.location.href="venta.frm.php";
            }else{
                alert("Usuario o contraseña incorrecto(s)")
            }
        }).fail((xhr,status,error)=>{
            console.log(error);
        })
    });
    $(window).on("load",()=>{
        if (window.location.href=="http://localhost/proyectos/Popsy/vista/login.frm.php") {
            return
        }
        $.ajax({
            url:"../controlador/login.read.php",
            type:"POST",
            datatype:"JSON",
            data:null
        }).done((json)=>{
            if (json==0) {
                alert("Primero Debes Iniciar Sesion")
                window.location.href="login.frm.php";
            }else{
                let x = JSON.parse(localStorage.getItem('user'));
                let j = "";
                let b = window.location.pathname.split("/");
                let condicional = "";
                for (let i = b.length-2; i < b.length; i++) {
                    if (b.length-1==i) {
                        condicional += b[i]
                    } else {
                        condicional += b[i]+"/";
                    }
                }
                if (x[0].rol=="Administrador") {
                    j += `<ul class="nav justify-content-start">
                    <li class="nav-item align-self-center mr-3">
                        <img class="img" src="../img/logo.jpg">
                    </li>
                    <li class="nav-item align-self-center">
                        <a href="categoria.frm.php" class="nav-link active text-light">Categorias</a>
                    </li>
                    <li class="nav-item align-self-center">
                        <a href="ingrediente.frm.php" class="nav-link active text-light">Ingredientes</a>
                    </li>
                    <li class="nav-item align-self-center">
                        <a href="sabor.frm.php" class="nav-link text-light">Sabores</a>
                    </li>
                    <li class="nav-item align-self-center">
                        <a href="venta.frm.php" class="nav-link text-light">Ventas</a>
                    </li>
                    <li class="nav-item align-self-center">
                        <a href="empleado.frm.php" class="nav-link text-light">Empleados</a>
                    </li>
                    <li class="nav-item align-self-center">
                        <a href="solicitudes.frm.php" class="nav-link text-light">Solicitudes</a>
                    </li>
                    </ul>`;
                    switch (condicional) {
                        case "vista/solicitud.frm.php":
                            window.location.href="venta.frm.php";
                            break;
                        default:
                            document.querySelector("body").hidden=false;
                            break;
                    }
                }else{
                    j += `<ul class="nav justify-content-start">
                    <li class="nav-item align-self-center mr-3">
                        <img class="img" src="../img/logo.jpg">
                    </li>
                    <li class="nav-item align-self-center">
                        <a href="venta.frm.php" class="nav-link text-light">Ventas</a>
                    </li>
                    <li class="nav-item align-self-center">
                        <a href="solicitud.frm.php" class="nav-link text-light">Solicitud</a>
                    </li>
                    </ul>`;
                    switch (condicional) {
                        case "vista/solicitudes.frm.php":
                            window.location.href='venta.frm.php';
                            break;
                        case "vista/empleado.frm.php":
                            window.location.path='venta.frm.php';
                            break;
                        case "vista/categoria.frm.php":
                            window.location.href='venta.frm.php';
                            break;
                        case "vista/sabor.frm.php":
                            window.location.href='venta.frm.php';
                            break;
                        case "vista/ingrediente.frm.php":
                            window.location.href='venta.frm.php';
                            break;
                        default:
                            document.querySelector("body").hidden=false;
                            break;
                    }
                }
                $("#permisos").append(j);
            }
        }).fail((xhr,status,error)=>{
            console.log(error);
        })
    });
    $(document).on("click","#btnCerrarLogin",()=>{
        $.ajax({
            url:"../controlador/login.delete.php",
            type:"POST",
            datatype:"JSON",
            data:null
        }).done((json)=>{
            alert(json)
            window.location.href="login.frm.php";
        }).fail((xhr,status,error)=>{
            console.log(error);
        })
    });
});
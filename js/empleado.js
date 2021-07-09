$(document).ready(()=>{
    buscar();
    $(document).on("click","#btnRegistrar",()=>{
        let a = $("#txtIdentificacion").val();
        let b = $("#txtNombre").val();
        let c = $("#txtApellido").val();
        let d = $("#txtUser").val();
        let e = $("#txtPassword").val();
        if (a==""||b==""||c==""||d==""||e=="") {
            return alert("Se deben llenar todos los campos")
        }
        $.ajax({
            url:"../controlador/empleado.create.php",
            type:"POST",
            datatype:"JSON",
            data:$("#empleadoFrm").serialize()
        }).done((json)=>{
            console.log(json);
            limpiarCampos();
            buscar();
        }).fail((xhr,status,error)=>{
            console.log(error);
        })
    });

    $(document).on("click","#updateModal",()=>{
        $.ajax({
            url:"../controlador/empleado.update.php",
            type:"POST",
            datatype:"JSON",
            data:$("#empleadoFrm").serialize()
        }).done((json)=>{
            console.log(json);
            buscar();
        }).fail((xhr,status,error)=>{
            console.log(error);
        })
    });

    $(document).on("click","#deleteModal",()=>{
        $.ajax({
            url:"../controlador/empleado.delete.php",
            type:"POST",
            datatype:"JSON",
            data:$("#empleadoFrm").serialize()
        }).done((json)=>{
            console.log(json);
            buscar();
        }).fail((xhr,status,error)=>{
            console.log(error);
        })
    });
    function limpiarCampos() {
        let a = $("#txtIdentificacion").val("");
        let b = $("#txtNombre").val("");
        let c = $("#txtApellido").val("");
        let d = $("#txtUser").val("");
        let e = $("#txtPassword").val("");
    }

    function buscar() {
        $.ajax({
            url:"../controlador/empleado.read.php",
            type:"POST",
            datatype:"JSON",
            data:null
        }).done((json)=>{
            try {
                crearMatriz(JSON.parse(json));
                $('#myTable').DataTable({
                    "language": {
                        "url": "../js/Spanish.json",
                        "buttons":{
                            copyTitle: "Registro(s) Copiado(s)",
                            copySuccess:{
                                _:'%d Registros Copiados',
                                1:'%d Registros Copiado'
                            }
                        }
                    },
                    dom: 'Bfrtip',
                    buttons: [ 
                        {
                            extend: 'pdfHtml5',
                            text: '<i class="fas fa-file-pdf"></i>',
                            download: 'open',
                            titleAttr:"PDF",
                            title: 'Reporte de empleados',
                            exportOptions: {
                                columns:[0,1,2,3,4]
                            }
                        },
                        {
                            extend: 'excelHtml5',
                            text: '<i class="fas fa-file-excel"></i>',
                            autoFilter: true,
                            titleAttr:"Excel",
                            title: 'Reporte de empleados',
                            exportOptions: {
                                columns:[0,1,2,3,4]
                            }
                        },
                        {
                            extend: 'copyHtml5',
                            text: '<i class="fas fa-copy"></i>',
                            titleAttr:"Copiar",
                            title: 'Reporte de empleados',
                            exportOptions: {
                                columns:[0,1,2,3,4]
                            }
                        },
                        {
                            extend: 'print',
                            text: '<i class="fas fa-print"></i>',
                            titleAttr:"Imprimir",
                            title: 'Reporte de empleados',
                            exportOptions: {
                                columns:[0,1,2,3,4]
                            }
                        }
                ]
                });
            } catch (e) {
                console.log(e)
            }
        }).fail((xhr,status,error)=>{
            console.log(error);
        })
    }
});

function crearMatriz(x) {
    let datos = "<table id='myTable' class='table table-dark text-center' border=3><thead><tr><td>Identificacion</td><td>Nombre</td><td>Apellido</td><td>Usuario</td><td>Contraseña</td><td>Modificar</td><td>Eliminar</td></tr></thead>";
    datos += "<tbody>";
    $.each(x,(key,value)=>{
        datos +=`<tr class='bgTable'><td>${value.identificacion}</td>`;
        datos +=`<td>${value.nombre}</td>`;
        datos +=`<td>${value.apellido}</td>`;
        datos +=`<td>${value.usuario}</td>`;
        datos +=`<td>${value.clave}</td>`;
        datos += `<td><a class="btn btn-info" onclick="modal('update');accion(${value.id_empleado},'${value.identificacion}','${value.nombre}','${value.apellido}','${value.usuario}','${value.clave}');" data-toggle="modal" data-target="#modal"><i class="far fa-edit"></i></a></td>`
        datos += `<td><a class="btn btn-danger" onclick="modal('delete');accion(${value.id_empleado});" data-toggle="modal" data-target="#modal"><i class="far fa-trash-alt"></i></a></td></tr>`
    });
    datos += `</tbody></table>`;
    $("#respuesta").html(datos);
}
function modal(x){
    let j = "";
    if (x=="update"){
        $("#exampleModalLongTitle").html("Modificar Empleado");
        j = '<table class="table"><tbody>';
        j+= '<tr hidden><td>Id:</td><td><center><input readonly class="w-100" type="number" id="txtIdEmpleadoModal" name="txtIdEmpleadoModal"></center></td></tr>'
        j+='<tr><td>Identificacion:</td><td><center><input class="w-100" type="text" id="txtIdentificacionModal" name="txtIdentificacionModal"></center></td></tr>'
        j+='<tr><td>Nombre:</td><td><center><input class="w-100" type="text" id="txtNombreModal" name="txtNombreModal"></center></td></tr>'
        j+='<tr><td>Apellido:</td><td><center><input class="w-100" type="text" id="txtApellidoModal" name="txtApellidoModal"></center></td></tr>'
        j+='<tr><td>Usuario:</td><td><center><input class="w-100" type="text" id="txtUsuarioModal" name="txtUsuarioModal"></center></td></tr>'
        j += '<tr><td>Contraseña:</td><td><center><input class="w-100" type="number" id="txtPasswordModal" name="txtPasswordModal"></center></td></tr></tbody></table>'
        $(".modal-body").html(j);
        $(".modalConfirmacion").html("Modificar");
        $(".modalConfirmacion").prop("id","updateModal");
    }else{
        $("#exampleModalLongTitle").html("Desea continuar?");
        j = '<table class="table"><tbody>';
        j+= '<tr hidden><td>Id:</td><td><center><input hidden class="w-100" type="number" id="txtIdEmpleadoModal" name="txtIdEmpleadoModal"></center></td></tr></tbody></table>'
        $(".modal-body").html(j);
        $(".modalConfirmacion").html("Eliminar");
        $(".modalConfirmacion").prop("id","deleteModal");
    }
}
function accion(a,b="",c="",d="",e="",f="") {
    $("#txtIdEmpleadoModal").val(a)
    $("#txtIdentificacionModal").val(b)
    $("#txtNombreModal").val(c)
    $("#txtApellidoModal").val(d)
    $("#txtUsuarioModal").val(e)
    $("#txtPasswordModal").val(f)
}

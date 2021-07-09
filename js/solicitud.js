$(document).ready(()=>{
    $(document).on("click","#btnRegistrar",()=>{
        let a = $("#txtArea").val();
        if (a=="") {
            return alert("Se debe llenar el campo")
        }
        let b = JSON.parse(localStorage.getItem("user"));
        $("#idEmpleado").val(b[0].id_empleado);
        $.ajax({
            url:"../controlador/solicitud.create.php",
            type:"POST",
            datatype:"JSON",
            data:$("#solicitudFrm").serialize()
        }).done((json)=>{
            $("#txtArea").val("");
        }).fail((xhr,status,error)=>{
            console.log(error);
        })
    });
    if (window.location.pathname=="/proyectos/Popsy/MVC/vista/solicitudes.frm.php") {
        buscar();
    }

    $(document).on("click","#updateModal",()=>{
        $.ajax({
            url:"../controlador/solicitud.update.php",
            type:"POST",
            datatype:"JSON",
            data:$("#categoriaFrm").serialize()
        }).done((json)=>{
            console.log(json);
            buscar();
        }).fail((xhr,status,error)=>{
            console.log(error);
        })
    });

    $(document).on("click","#deleteModal",()=>{
        $.ajax({
            url:"../controlador/solicitud.delete.php",
            type:"POST",
            datatype:"JSON",
            data:$("#categoriaFrm").serialize()
        }).done((json)=>{
            console.log(json);
            buscar();
        }).fail((xhr,status,error)=>{
            console.log(error);
        })
    });

    function buscar() {
        $.ajax({
            url:"../controlador/solicitud.read.php",
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
                            title: 'Reporte de solicitudes',
                            exportOptions: {
                                columns:[0,1]
                            }
                        },
                        {
                            extend: 'excelHtml5',
                            text: '<i class="fas fa-file-excel"></i>',
                            autoFilter: true,
                            titleAttr:"Excel",
                            title: 'Reporte de solicitudes',
                            exportOptions: {
                                columns:[0,1]
                            }
                        },
                        {
                            extend: 'copyHtml5',
                            text: '<i class="fas fa-copy"></i>',
                            titleAttr:"Copiar",
                            title: 'Reporte de solicitudes',
                            exportOptions: {
                                columns:[0,1]
                            }
                        },
                        {
                            extend: 'print',
                            text: '<i class="fas fa-print"></i>',
                            titleAttr:"Imprimir",
                            title: 'Reporte de solicitudes',
                            exportOptions: {
                                columns:[0,1]
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
    let datos = "<table id='myTable' class='table table-dark text-center' border=3><thead><tr><td>Empleado</td><td>Texto</td><td>Eliminar</td></tr></thead>"
    datos += "<tbody>"
    $.each(x,(key,value)=>{
        datos +=`<tr class='bgTable'><td>${value.nombre+" "+value.apellido}</td>`
        datos +=`<td>${value.texto}</td>`
        datos += `<td><a class="btn btn-danger" onclick="modal();accion(${value.id_solicitud});" data-toggle="modal" data-target="#modal"><i class="far fa-trash-alt"></i></a></td></tr>`
    });
    datos += `</tbody></table>`;
    $("#respuesta").html(datos);
}
function modal(){
    let j = "";
    $("#exampleModalLongTitle").html("Desea continuar?");
    j = '<table class="table"><tbody>';
    j+= '<tr hidden><td>Id:</td><td><center><input hidden class="w-100" type="number" id="txtIdSolicitud" name="txtIdSolicitud"></center></td></tr></tbody></table>'
    $(".modal-body").html(j);
    $(".modalConfirmacion").html("Eliminar");
    $(".modalConfirmacion").prop("id","deleteModal");
    
}
function accion(a) {
    $("#txtIdSolicitud").val(a)
}
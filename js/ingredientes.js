$(document).ready(()=>{
    buscar();
    $(document).on("click","#btnRegistrar",()=>{
        let a = $("#txtNombreIng").val();
        if (a=="") {
            return alert("Se deben llenar todos los campos")
        }
        $.ajax({
            url:"../controlador/ingrediente.create.php",
            type:"POST",
            datatype:"JSON",
            data:$("#ingredienteFrm").serialize()
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
            url:"../controlador/ingrediente.update.php",
            type:"POST",
            datatype:"JSON",
            data:$("#ingredienteFrm").serialize()
        }).done((json)=>{
            console.log(json);
            buscar();
        }).fail((xhr,status,error)=>{
            console.log(error);
        })
    });

    $(document).on("click","#deleteModal",()=>{
        $.ajax({
            url:"../controlador/ingrediente.delete.php",
            type:"POST",
            datatype:"JSON",
            data:$("#ingredienteFrm").serialize()
        }).done((json)=>{
            console.log(json);
            buscar();
        }).fail((xhr,status,error)=>{
            console.log(error);
        })
    });
    function limpiarCampos() {
        $("#txtNombreIng").val("");
    }

    function buscar() {
        $.ajax({
            url:"../controlador/ingrediente.read.php",
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
                            title: 'Reporte de ingredientes',
                            exportOptions: {
                                columns:[0]
                            }
                        },
                        {
                            extend: 'excelHtml5',
                            text: '<i class="fas fa-file-excel"></i>',
                            autoFilter: true,
                            titleAttr:"Excel",
                            title: 'Reporte de ingredientes',
                            exportOptions: {
                                columns:[0]
                            }
                        },
                        {
                            extend: 'copyHtml5',
                            text: '<i class="fas fa-copy"></i>',
                            titleAttr:"Copiar",
                            title: 'Reporte de ingredientes',
                            exportOptions: {
                                columns:[0]
                            }
                        },
                        {
                            extend: 'print',
                            text: '<i class="fas fa-print"></i>',
                            titleAttr:"Imprimir",
                            title: 'Reporte de ingredientes',
                            exportOptions: {
                                columns:[0]
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
    let datos = "<table id='myTable' class='table table-dark text-center' border=3><thead><tr><td>Nombre</td><td>Modificar</td><td>Eliminar</td></tr></thead>"
    datos += "<tbody>";
    $.each(x,(key,value)=>{
        datos +=`<tr class='bgTable'><td>${value.nombre}</td>`
        datos += `<td><a class="btn btn-info" onclick="modal('update');accion(${value.id_ingrediente},'${value.nombre}');" data-toggle="modal" data-target="#modal"><i class="far fa-edit"></i></a></td>`;
        datos += `<td><a class="btn btn-danger" onclick="modal('delete');accion(${value.id_ingrediente},'${value.nombre}');" data-toggle="modal" data-target="#modal"><i class="far fa-trash-alt"></i></a></td></tr>`;
    });
    datos += `</tbody></table>`;
    $("#respuesta").html(datos);
}
function modal(x){
    let j = "";
    if (x=="update"){
        $("#exampleModalLongTitle").html("Modificar Ingrediente");
        j = '<table class="table"><tbody>';
        j+= '<tr hidden><td>Id:</td><td><center><input readonly class="w-100" type="number" id="txtIdIngModal" name="txtIdIngModal"></center></td></tr>';
        j+='<tr><td>Nombre:</td><td><center><input class="w-100" type="text" id="txtNombreIngModal" name="txtNombreIngModal"></center></td></tr></tbody></table>';
        $(".modal-body").html(j);
        $(".modalConfirmacion").html("Modificar");
        $(".modalConfirmacion").prop("id","updateModal");
    }else{
        $("#exampleModalLongTitle").html("Desea continuar?");
        j = '<table class="table"><tbody>';
        j+= '<tr hidden><td>Id:</td><td><center><input hidden class="w-100" type="number" id="txtIdIngModal" name="txtIdIngModal"></center></td></tr></tbody></table>';
        $(".modal-body").html(j);
        $(".modalConfirmacion").html("Eliminar");
        $(".modalConfirmacion").prop("id","deleteModal");
    }
}
function accion(a,b) {
    $("#txtIdIngModal").val(a);
    $("#txtNombreIngModal").val(b);
    
}

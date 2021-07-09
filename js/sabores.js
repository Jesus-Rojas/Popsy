$(document).ready(() => {
    $(document).on('click', '#btnRegistrar', () => {
        let x = validarCampos('#txtNombreSabor','.ingredientes','#cantidad','registrar','#txtImagenSabor','#selCategoria');
        if (!x) {
            return
        }
        let formulario = new FormData($("#frmSabores")[0]);
        $.ajax({
            url: "../controlador/sabor.create.php",
            type: "POST",
            dataType: "JSON",
            data: formulario,
            processData: false,
            contentType: false
        }).done(json => {
            limpiarCampos();
            buscar();
        }).fail((xhr, status, error) => {
            console.log(error)
        })
    });

    cargarCategorias("#selCategoria");
    cargarIngredientes("#ingredientes");

    $(document).on("click", "#updateModal", () => {
        let x = validarCampos('#txtNombreSaborModal','.ingredientesModal','#cantidadModal');
        if (!x) {
            return
        }
        let formulario = new FormData($("#frmSabores")[0]);
        $.ajax({
            url: "../controlador/sabor.update.php",
            type: "POST",
            datatype: "JSON",
            data: formulario,
            processData: false,
            contentType: false
        }).done(json => {
            buscar();
        }).fail((xhr, status, error) => {
            console.log(error);
        })
        cerrarModal()
    });

    $(document).on("click", "#deleteModal", () => {
        cerrarModal();
        $.ajax({
            url: "../controlador/sabor.delete.php",
            type: "POST",
            datatype: "JSON",
            data: $("#frmSabores").serialize()
        }).done((json) => {
            console.log(json);
            buscar();
        }).fail((xhr, status, error) => {
            console.log(error);
        })
    });
    
    buscar();
    limpiarImagen();
});
function buscar() {
    $.ajax({
        url: "../controlador/sabor.read.php",
        type: "POST",
        datatype: "JSON",
        data: null
    }).done((json) => {
        try {
            if (json==[]) {
                return
            }
            json=JSON.parse(json);
            crearMatriz(json[0],json[1]);
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
                            columns:[0,1,2,3]
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        text: '<i class="fas fa-file-excel"></i>',
                        autoFilter: true,
                        titleAttr:"Excel",
                        title: 'Reporte de ingredientes',
                        exportOptions: {
                            columns:[0,1,2,3]
                        }
                    },
                    {
                        extend: 'copyHtml5',
                        text: '<i class="fas fa-copy"></i>',
                        titleAttr:"Copiar",
                        title: 'Reporte de ingredientes',
                        exportOptions: {
                            columns:[0,1,2,3]
                        }
                    },
                    {
                        extend: 'print',
                        text: '<i class="fas fa-print"></i>',
                        titleAttr:"Imprimir",
                        title: 'Reporte de ingredientes',
                        exportOptions: {
                            columns:[0,1,2,3]
                        }
                    }
                ]
            });
        } catch (e) {
            console.log(e)
        }
    }).fail((xhr, status, error) => {
        console.log(error);
    })
}
function limpiarImagen() {
    $("#divImagen").css('background-color', `red`);
    $("#divImagen").css('background-image', `none`);
    $(`.texto`).css('color', `white`);
}
function limpiarCampos() {
    $("#txtNombreSabor").val("");
    $("#selCategoria option[value='0']").prop("selected", true);
    $(".ingredientes").prop("checked", false);
    $("#imagenHelado").val("");
    limpiarImagen();
}
function crearMatriz(x,y) {
    let datos = "<table id='myTable' class='table table-dark text-center' border=3><thead><tr><td>Nombre</td><td>Categoria</td><td>Ingredientes</td><td>Cantidad</td><td>Imagen</td><td>Modificar</td><td>Eliminar</td></tr></thead>"
    datos += "<tbody>";
    let categoria="",ingrediente,idIngrediente;
    $.each(x, (key, value) => {
        categoria=$(`#selCategoria option[value='${value.id_categoria}']`).text();
        datos += `<tr class='bgTable'><td>${value.nombre}</td>`
        datos += `<td>${categoria}</td>`;
        ingrediente="";
        idIngrediente="";
        $.each(y,(k,v)=>{
            if (v.id_sabor==value.id_sabor) {
                ingrediente+=`${v.nombre}, `;
                idIngrediente+=`${v.id_ingrediente},`;
            }
        });
        datos += `<td>${ingrediente.slice(0,-2)}</td>`;
        datos += `<td>${value.cantidad}</td>`;
        datos += `<td><img src="${value.imagen}" style="width: 2em;height: 2em;" alt=""></td>`;
        datos += `<td><a class="btn btn-info" onclick="modal('update');accion(${value.id_sabor},${value.id_categoria},'${value.nombre}','${value.imagen}',true,'${idIngrediente.slice(0,-1)}',${value.cantidad});" data-toggle="modal" data-target="#modal"><i class="far fa-edit"></i></a></td>`;
        datos += `<td><a class="btn btn-danger" onclick="modal('delete');accion(${value.id_sabor});" data-toggle="modal" data-target="#modal"><i class="far fa-trash-alt"></i></a></td></tr>`;
    });
    datos += `</tbody></table>`;
    $("#respuesta").html(datos);
}
function cerrarModal() {
    $('#modal').modal('hide');
}
function modal(x) {
    let j = "";
    if (x == "update") {
        $("#exampleModalLongTitle").html("Modificar Ingrediente");
        j = '<table class="table"><tbody>';
        j += '<tr hidden><td>Id Sabor:</td><td><center><input readonly class="w-100" type="number" id="txtIdSabor" name="txtIdSabor"></center></td></tr>';
        j += '<tr><td>Nombre:</td><td><center><input class="w-100" type="text" id="txtNombreSaborModal" name="txtNombreSaborModal"></center></td></tr>';
        j += '<tr><td>Cantidad:</td><td><center><input class="w-100" type="number" id="cantidadModal" name="cantidadModal" min="1"></center></td></tr>';
        j += `<tr><td>Categoria:</td><td>
                <select id="selCategoriaModal" name="selCategoriaModal">
                    <option value=0 selected disabled>Seleccione</option>
                </select></td></tr>`;
        j += `<tr><td>Ingredientes:</td><td>
                <div class="col-12" id="ingredientesModal">
                </div></td></tr>`;
        j += '<tr hidden><td>Imagen:</td><td><center><input readonly class="w-100" type="text" id="urlImagenSaborModal" name="urlImagenSaborModal"></center></td></tr>';
        j += `<tr><td style="padding-bottom: 0;">Imagen:</td><td style="padding-bottom: 0;"><center>
            <div id="divImagenModal" class="col-12">
                <p id="textoModal">a</p>
                <input type="file" accept="image/*" name="txtImagenSaborModal" id="txtImagenSaborModal" class="txtImagenSabor" onchange="imagenServidor(this.id,'divImagenModal','se modifico')">
            </div></center></td></tr></tbody></table>`;
        $(".modal-body").html(j);
        $(".modalConfirmacion").html("Modificar");
        $(".modalConfirmacion").prop("id", "updateModal");
    } else {
        $("#exampleModalLongTitle").html("Desea continuar?");
        j = '<table class="table"><tbody>';
        j += '<tr hidden><td>Id:</td><td><center><input hidden class="w-100" type="number" id="txtIdSabor" name="txtIdSabor"></center></td></tr></tbody></table>';
        $(".modal-body").html(j);
        $(".modalConfirmacion").html("Eliminar");
        $(".modalConfirmacion").prop("id", "deleteModal");
    }
}
function accion(a="",b="",c="",d="",e=false,f="",g="") {
    $("#txtIdSabor").val(a);
    if (e) {
        $("#txtNombreSaborModal").val(c);
        $("#cantidadModal").val(g);
        let x = ""
        cargarCategorias("#selCategoriaModal");
        setTimeout(() => {
            $(`#selCategoriaModal option[value=${b}]`).prop("selected", true);
        }, 130);
        if (f!="") {
            cargarIngredientes('#ingredientesModal','ingredientesModal','checkIngredientesModal[]',"modal");
            console.log(f);
            f = f.split(',');
            
            setTimeout(() => {
                x = document.querySelectorAll(".ingredientesModal");
                for (const iterar of f) {
                    for (const iterator of x) {
                        if (iterator.value==iterar) {
                            iterator.checked=true;
                        }
                    }
                }
            }, 200);
        }
        $("#divImagenModal").css('background-image', `url(${d})`);
        $(`#divImagenModal`).css('background-color', `transparent`);
        $(`#textoModal`).css('color', `transparent`);
    }
}
function imagenServidor(a,b,c="") {
    let input = document.getElementById(a);
    let fReader = new FileReader();
    fReader.readAsDataURL(input.files[0]);
    fReader.onloadend = function(event){
        $(`#${b}`).css('background-image', `url(${event.target.result})`);
        $(`#${b}`).css('background-color', `transparent`);
        $(`.texto`).css('color', `transparent`);
    }
    if (c!="") {
        $(`#urlImagenSaborModal`).val("se modifico")
    }
}
function cargarCategorias(x) {
    $.ajax({
        url: "../controlador/categoria.read.php",
        type: "POST",
        dataType: "JSON",
        data: null
    }).done(json => {
        const select = $(x);
        let option = "";
        $.each(json, (key, value) => {
            option = `<option value="${value.id_categoria}">${value.nombre}</option>`
            select.append(option);
        })
        let m = $("#selCategoria option").length;
        console.log(m)
    }).fail((xhr, status, error) => {
        console.log(error)
    })
}
function cargarIngredientes(x,y='ingredientes',z="checkIngredientes[]",m="") {
    $.ajax({
        url: "../controlador/ingrediente.read.php",
        type: "POST",
        dataType: "JSON",
        data: null
    }).done(json => {
        let padre = $(x);
        let ingrediente = "";
        if (m=="") {
            $.each(json, (key, value) => {
                ingrediente = `<label>${value.nombre}</label>
                <input class='${y}' type="checkbox" style="margin-right:3px" name="${z}" value="${value.id_ingrediente}">`
                padre.append(ingrediente);
            });
        }else{
            $.each(json, (key, value) => {
                ingrediente = `<label style="margin:0px">${value.nombre}</label>
                <input class='${y}' type="checkbox" name="${z}" value="${value.id_ingrediente}"><br>`
                padre.append(ingrediente);
            });
        }
        
    }).fail((xhr, status, error) => {
        console.log(error)
    })
}
function validarCampos(nombre,checkbox,cantidad,condicional="",imagen="",option="") {
    let a = $(`${nombre}`).val();
    let f = $(`${cantidad}`).val();
    if (f<0) {
        alert("La cantidad debe ser mayor o igual a 0");
        return false;
    }
    let d = document.querySelectorAll(`${checkbox}`);
    let e = false;
    for (const iterator of d) {
        if (iterator.checked) {
            e =  true;
            break;
        }
    }
    if (condicional=='registrar') {
        let b = $(`${imagen}`).val();
        let c = $(`${option} :selected`).val();
        if (a==""||b==""||c==0||!e) {
            alert("Se deben llenar todos los campos");
            return false;
        }
    }else{
        if (a==""||!e) {
            alert("Se deben llenar todos los campos");
            return false;
        }
    }
    return true;
}
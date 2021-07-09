$(document).ready(()=>{
    $("#txtCedulaVen").on("keyup",()=>{
        if ($("#txtCedulaVen").val()=="") {
            limpiarCampos();
            cantidadSabor()
            $("#btnRegistrarUsuario").prop("hidden",true);
            $("#btnNuevo").prop("hidden",true);
            $("#txtNombreVen").prop("readonly",true);
            $(".txtApellidoVen").prop("hidden",true);
        }
    });
    $("#txtCedulaVen").autocomplete({
        source: (request,response) => {
                    $.ajax({
                        url:"../controlador/cliente.autocomplete.php",
                        datatype:"JSON",
                        data:{
                            term: request.term
                        },
                        success: data=>{
                            data=JSON.parse(data);
                            let x = new Array();
                            $.each(data,(key,value)=>{
                                x.push({'value':value.identificacion,'label':value.nombre+" "+value.apellido,'puntos':value.puntos,'id':value.id_cliente});
                            });
                            if (data[0]==undefined) {
                                $("#btnNuevo").prop("hidden",false);
                                limpiarCampos();
                            }else{
                                limpiarCampos();
                                $("#btnNuevo").prop("hidden",true);
                                $("#btnRegistrarUsuario").prop("hidden",true);
                                $("#txtNombreVen").prop("readonly",true);
                                $(".txtApellidoVen").prop("hidden",true);
                            }
                            response(x);
                        }
                    })
                },
        minLenght: 1,
        select: function (e,ui) {
            $("#txtNombreVen").val(ui.item.label);
            $("#txtIdCliente").val(ui.item.id);
            $("#txtPuntosVen").val(ui.item.puntos);
            cantidadSabor();
            $("#btnRegistrarVenta").prop("hidden",false);
            
        }
    });
    cargarCategorias();
    $("#btnNuevo").on("click",()=>{
        $("#txtNombreVen").prop("readonly",false);
        $(".txtApellidoVen").prop("hidden",false);
        $("#btnNuevo").prop("hidden",true);
        $("#btnRegistrarUsuario").prop("hidden",false);
        $("#txtNombreVen").val("");
        $("#txtPuntosVen").val(0);
        $("#txtApellidoVen").val("");
    });
    $("#btnRegistrarUsuario").on("click",()=>{
        let x = validarCampos();
        if (!x) {
            return
        }
        $("#btnNuevo").prop("hidden",true);
        $("#txtNombreVen").prop("readonly",true);
        $(".txtApellidoVen").prop("hidden",true);
        $("#btnRegistrarVenta").prop("hidden",false);
        $("#btnRegistrarUsuario").prop("hidden",true);
        $.ajax({
            url:"../controlador/cliente.create.php",
            type:"POST",
            datatype:"JSON",
            data:$("#ventaFrm").serialize()
        }).done(json => {
            $("#txtIdCliente").val(json);
        }).fail((xhr, status, error) => {
            console.log(error)
        })
        let a = $("#txtNombreVen").val();
        let b = $("#txtApellidoVen").val();
        $("#txtNombreVen").val(a+" "+b);
    });
    $("#btnRegistrarVenta").on("click",()=>{
        let x = validarInput();
        if (x) {
            return alert ("Se debe comprar minimo un producto")
        }
        $("#txtCedulaVen").val("");
        
        let a = $("#puntosTotal").html();
        $("#puntos").val(a);
        let b = $("#respuesta").html();
        $("#total").val(b);
        $.ajax({
            url:"../controlador/venta.create.php",
            type:"POST",
            datatype:"JSON",
            data:$("#ventaFrm").serialize()
        }).done(json => {
            console.log(json);
        }).fail((xhr, status, error) => {
            console.log(error)
        });
        limpiarCampos();
        limpiarInput()
        cantidadSabor();
    });
});
$("#sabores").on("input",(e)=>{
    cantidadSabor();
})
function validarInput() {
    let a = $("#sabores input");
    for (const iterator of a) {
        if (iterator.classList.length!=0) {
            if (iterator.value>0) {
                return false;
            }
        }
    }
    return true
}
function limpiarInput() {
    let a = $("#sabores input");
    for (const iterator of a) {
        if (iterator.classList.length!=0) {
            iterator.value=0;
        }
    }
}
function cantidadSabor() {
    let total = 0;
    let precio = "";
    let id = "";
    let input = "";
    let hijos = $(`#sabores`).children();
    for (const iterator of hijos) {
        precio = iterator.firstChild.value;
        id = iterator.id;
        input = $(`.${id}`)
        $.each(input,(i,field)=>{
            total += parseInt(field.value)*precio;
        });
    }
    let a = $("#txtPuntosVen").val();
    let puntos = parseInt(a);
    puntos += Math.round(total/1000);
    $("#puntosTotal").html(`${puntos}`);
    $("#respuesta").html(total);
}
function limpiarCampos() {
    $("#txtPuntosVen").val(0);
    $("#txtNombreVen").val("");
    $("#btnRegistrarVenta").prop("hidden",true);
}
function cargarSabores(x) {
    $.ajax({
        url:"../controlador/sabor.read.php",
        type:"POST",
        datatype:"JSON",
        data:null
    }).done((json)=>{
        try {
            json=JSON.parse(json);
            let imagen="",div="",bolean=false,categoria= new Array();
            $.each(x,(k,v)=>{
                $.each(json[0],(key,value)=>{
                    if (v.id_categoria==value.id_categoria) {
                        bolean=true;
                        imagen += `<div class="text-center"><h6>${value.nombre}</h6><img src='${value.imagen}' style="width:7em;height:7em;" class='m-1 img-thumbnail' alt="${value.nombre}"><br><input style="width:7em;" class="${v.nombre}" name="${v.nombre}[]" type="number" min='0' value="0"></div>`;
                    }
                });
                if (bolean) {
                    div = `<div class="col-12 row mt-3" id="${v.nombre}"><input type="text" value="${v.precio}" hidden><h3>${v.nombre}</h3><div class="col-12 row">${imagen}</div></div>`;
                    $("#sabores").append(div);
                    bolean=false;
                    imagen="";
                    categoria.push(`#${v.nombre}`);
                }
            });
        } catch (e) {
            console.log(e)
        }
    }).fail((xhr,status,error)=>{
        console.log(error);
    })
}
function cargarCategorias() {
    $.ajax({
        url: "../controlador/categoria.read.php",
        type: "POST",
        dataType: "JSON",
        data: null,
        success: json =>{
            cargarSabores(json);
        },
        error: (xhr,status,error)=>{
            console.log(error)
        }
    });
}
function validarCampos() {
    let a = $("#txtNombreVen").val();
    let b = $("#txtApellidoVen").val();
    if (a==""||b=="") {
        alert("Todos los campos son obligatorios");
        return false;
    }
    return true;
}
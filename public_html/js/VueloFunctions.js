/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var dt_lenguaje_espanol = {
    decimal:        "",
    emptyTable:     "No existe información",
    info:           "Mostrando del _START_ al _END_ de un total de _TOTAL_ registros",
    infoEmpty:      "Mostrando 0 a 0 de 0 registros",
    infoFiltered:   "(filtered from _MAX_ total entries)",
    infoPostFix:    "",
    thousands:      ",",
    lengthMenu:     "Mostrar _MENU_ registros por página",
    loadingRecords: "Cargando, por favor espere...",
    processing:     "Procesando...",
    search:         "Buscar ",
    zeroRecords:    "No se encontraron registros que cumplan con el criterio",
    paginate: {
        first:      "Primero",
        last:       "Último",
        next:       "Siguiente",
        previous:   "Anterior"
    }
};


$(function () { //para la creación de los controles
    //agrega los eventos las capas necesarias
    $("#enviar").click(function () {
        addOrUpdateVuelo(false);
    });
    //agrega los eventos las capas necesarias
    $("#cancelar").click(function () {
        cancelAction();
    });    //agrega los eventos las capas necesarias

    $("#btMostarForm").click(function () {
        //muestra el fomurlaior
        clearFormVuelo();
        $("#typeAction").val("add_Vuelo");
        $("#myModalFormulario").modal();
    });
});

//*********************************************************************
//cuando el documento esta cargado se procede a cargar la información
//*********************************************************************

$(document).ready(function () {
    cargarTablas();

});

//*********************************************************************
//Agregar o modificar la información
//*********************************************************************

function addOrUpdateVuelo() {
    //Se envia la información por ajax
    if (validar()) {
        $.ajax({
            url: '../backend/Base-Aerolinea/controller/VueloController.php',
            data: {
                action:         $("#typeAction").val(),
                id_Vuelo:        $("#txtid_Vuelo").val(),
                Fecha_Hora:    $("#txtFecha_Hora").val(),
                Ruta_idRuta:  $("#txtRuta_idRuta").val(),
                Tipo_Avion_idAviones:          $("#txtTipo_Avion_idTipo_Aviones").val()
            },
            error: function () { //si existe un error en la respuesta del ajax
                swal("Error", "Se presento un error al enviar la informacion", "error");
            },
            success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
                var messageComplete = data.trim();
                var responseText = messageComplete.substring(2);
                var typeOfMessage = messageComplete.substring(0, 2);
                if (typeOfMessage === "M~") { //si todo esta corecto
                    swal("Confirmacion", responseText, "success");
                    clearFormPersona();
                    $('#dt_vuelo').DataTable().ajax.reload();
                } else {//existe un error
                    swal("Error", responseText, "error");
                }
            },
            type: 'POST'
        });
    }else{
        swal("Error de validación", "Los datos del formulario no fueron digitados, por favor verificar", "error");
    }
}

//*****************************************************************
//*****************************************************************
function validar() {
    var validacion = true;

    
    //valida cada uno de los campos del formulario
    //Nota: Solo si fueron digitados
    if ($("#txtid_Vuelo").val() === "") {
        validacion = false;
    }

    if ($("#txtFecha_Hora").val() === "") {
        validacion = false;
    }

    if ($("#txtRuta_idRuta").val() === "") {
        validacion = false;
    }

    
    if ($("#txtTipo_Avion_idAviones").val() === "") {
        validacion = false;
    }


    return validacion;
}

//*****************************************************************
//*****************************************************************

function clearFormVuelo() {
    $('#formVuelo').trigger("reset");
}

//*****************************************************************
//*****************************************************************

function cancelAction() {
    //clean all fields of the form
    clearFormVuelo();
    $("#typeAction").val("add_Vuelo");
    $("#myModalFormulario").modal("hide");
}

//*****************************************************************
//*****************************************************************

function showALLVuelo(ocultarModalBool) {
    //Se envia la información por ajax
    $.ajax({
        url: '../backend/Base-Aerolinea/controller/VueloController.php',
        data: {
            action: "showAll_Vuelo"
        },
        error: function () { //si existe un error en la respuesta del ajax
            alert("Se presento un error a la hora de cargar la información de las Vuelo en la base de datos");
            if (ocultarModalBool) {
                ocultarModal("myModal");
            }
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
            $("#divResult").html(data);
            // se oculta el modal esta funcion se encuentra en el utils.js
            
        },
        type: 'POST'
    });
}

//*****************************************************************
//*****************************************************************

function showVueloByID(id_Vuelo) {
    //Se envia la información por ajax
    $.ajax({
        url: '../backend/Base-Aerolinea/controller/VueloController.php',
        data: {
            action: "show_Vuelo",
            id_Vuelo: id_Vuelo
        },
        error: function () { //si existe un error en la respuesta del ajax
            alert("Se presento un error a la hora de cargar la información de las Vuelo en la base de datos");
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
            var objVueloJSon = JSON.parse(data);
            $("#txtid_Vuelo").val(objVueloJSon.id_Vuelo);
            $("#txtFecha_Hora").val(objVueloJSon.Fecha_Hora);
            $("#txtRuta_idRuta").val(objVueloJSon.Ruta_idRuta);
            $("#txtTipo_Avion_idAviones").val(objVueloJSon.Tipo_Avion_idTipo_Aviones);
            $("#typeAction").val("update_Vuelo");
            $("#myModalFormulario").modal();
        },
        type: 'POST'
    });
}

//*****************************************************************
//*****************************************************************

function deleteVueloByID(id_Vuelo) {
    //Se envia la información por ajax
    $.ajax({
        url: '../backend/Base-Aerolinea/controller/VueloController.php',
        data: {
            action: "delete_Vuelo",
            id_Vuelo: id_Vuelo
        },
        error: function () { //si existe un error en la respuesta del ajax
            alert("Se presento un error a la hora de cargar la información de las Vuelo en la base de datos");
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
            var responseText = data.substring(2);
            var typeOfMessage = data.substring(0, 2);
            if (typeOfMessage === "M~") { //si todo esta corecto
                swal("Eliminacion realizada", responseText, "success");
              $('#dt_vuelo').DataTable().ajax.reload();
            } else {//existe un error
                swal("Error", responseText, "error");
            }
        },
        type: 'POST'
    });
}

function mostrarModal(idDiv, titulo, mensaje) {
    $("#" + idDiv + "Title").html(titulo);
    $("#" + idDiv + "Message").html(mensaje);
    $("#" + idDiv).modal();
}

function ocultarModal(idDiv) {
    $("#" + idDiv).modal("hide");
}

function cargarTablas() {



    var dataTableVuelo_const = function () {
        if ($("#dt_vuelo").length) {
            $("#dt_vuelo").DataTable({
                dom: "Bfrtip",
                bFilter: false,
                ordering: false,
                buttons: [
                    {
                        extend: "copy",
                        className: "btn-sm",
                        text: "Copiar"
                    },
                    {
                        extend: "csv",
                        className: "btn-sm",
                        text: "Exportar a CSV"
                    },
                    {
                        extend: "print",
                        className: "btn-sm",
                        text: "Imprimir"
                    }

                ],
                "columnDefs": [
                    {
                        targets: 5,
                        className: "dt-center",
                        render: function (data, type, row, meta) {
                            var botones = '<button type="button" class="btn btn-default btn-xs" aria-label="Left Align" onclick="showVueloByID(\'' + row[0] + '\');">Cargar</button> ';
                            botones += '<button type="button" class="btn btn-default btn-xs" aria-label="Left Align" onclick="deleteVueloByID(\'' + row[0] + '\');">Eliminar</button>';
                            return botones;
                        }
                    }

                ],
                pageLength: 2,
                language: dt_lenguaje_espanol,
                ajax: {
                    url: '../backend/Base-Aerolinea/controller/VueloController.php',
                    type: "POST",
                    data: function (d) {
                        return $.extend({}, d, {
                            action: "showAll_Vuelo"
                        });
                    }
                },
                drawCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                    $('#dt_vuelo').DataTable().columns.adjust().responsive.recalc();
                }
            });
        }
    };



    TableManageButtons = function () {
        "use strict";
        return {
            init: function () {
                dataTableVuelo_const();
                $(".dataTables_filter input").addClass("form-control input-rounded ml-sm");
            }
        };
    }();

    TableManageButtons.init();
}

//*******************************************************************************
//evento que reajusta la tabla en el tamaño de la pantall
//*******************************************************************************

window.onresize = function () {
    $('#dt_vuelo').DataTable().columns.adjust().responsive.recalc();
};


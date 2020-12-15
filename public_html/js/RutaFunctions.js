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
        addOrUpdateRuta(false);
    });
    //agrega los eventos las capas necesarias
    $("#cancelar").click(function () {
        cancelAction();
    });    //agrega los eventos las capas necesarias

    $("#btMostarForm").click(function () {
        //muestra el fomurlaior
        clearFormRuta();
        $("#typeAction").val("add_Ruta");
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

function addOrUpdateRuta() {
    //Se envia la información por ajax
    if (validar()) {
        $.ajax({
            url: '../backend/Base-Aerolinea/controller/RutaController.php',
            data: {
                action:         $("#typeAction").val(),
                idRuta:         $("#txtidRuta").val(),
                Recorrido:   $("#txtRecorrido").val(),
                Tiempo:    $("#txtTiempo").val(),
                Valor:  $("#txtValor").val()
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
                    clearFormRuta();
                    showALLRuta();
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
    if ($("#txtidRuta").val() === "") {
        validacion = false;
    }

    if ($("#txtRecorrido").val() === "") {
        validacion = false;
    }

    if ($("#txtTiempo").val() === "") {
        validacion = false;
    }

    if ($("#txtValor").val() === "") {
        validacion = false;
    
    }


    return validacion;
}

//*****************************************************************
//*****************************************************************

function clearFormRuta() {
    $('#formRuta').trigger("reset");
}

//*****************************************************************
//*****************************************************************

function cancelAction() {
    //clean all fields of the form
    clearFormRuta();
    $("#typeAction").val("add_Ruta");
    $("#myModalFormulario").modal("hide");
}

//*****************************************************************
//*****************************************************************

function showALLRuta(ocultarModalBool) {
    //Se envia la información por ajax
    $.ajax({
        url: '../backend/Base-Aerolinea/controller/RutaController.php',
        data: {
            action: "showAll_Ruta"
        },
        error: function () { //si existe un error en la respuesta del ajax
            alert("Se presento un error a la hora de cargar la información de las Ruta en la base de datos");
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

function showRutaByID(idRuta) {
    //Se envia la información por ajax
    $.ajax({
        url: '../backend/Base-Aerolinea/controller/RutaController.php',
        data: {
            action: "show_Ruta",
            idRuta: idRuta
        },
        error: function () { //si existe un error en la respuesta del ajax
            alert("Se presento un error a la hora de cargar la información de las Ruta en la base de datos");
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
            var objRutaJSon = JSON.parse(data);
            $("#txtidRuta").val(objRutaJSon.idRuta);
            $("#txtRecorrido").val(objRutaJSon.Recorrido);
            $("#txtTiempo").val(objRutaJSon.Tiempo);
            $("#txtValor").val(objRutaJSon.Valor);
            $("#typeAction").val("update_Ruta");
            $("#myModalFormulario").modal();
        },
        type: 'POST'
    });
}

//*****************************************************************
//*****************************************************************

function deleteRutaByID(idRuta) {
    //Se envia la información por ajax
    $.ajax({
        url: '../backend/Base-Aerolinea/controller/RutaController.php',
        data: {
            action: "delete_Ruta",
            idRuta: idRuta
        },
        error: function () { //si existe un error en la respuesta del ajax
            alert("Se presento un error a la hora de cargar la información de las Ruta en la base de datos");
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
            var responseText = data.substring(2);
            var typeOfMessage = data.substring(0, 2);
            if (typeOfMessage === "M~") { //si todo esta corecto
                mostrarModal("myModal", "Resultado de la acción", responseText);
                showALLRuta(false);
            } else {//existe un error
                mostrarModal("myModal", "Error", responseText);
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



    var dataTableRuta_const = function () {
        if ($("#dt_Ruta").length) {
            $("#dt_Ruta").DataTable({
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
                        targets: 4,
                        className: "dt-center",
                        render: function (data, type, row, meta) {
                            var botones = '<button type="button" class="btn btn-default btn-xs" aria-label="Left Align" onclick="showRutaByID(\'' + row[0] + '\');">Cargar</button> ';
                            botones += '<button type="button" class="btn btn-default btn-xs" aria-label="Left Align" onclick="deleteRutaByID(\'' + row[0] + '\');">Eliminar</button>';
                            return botones;
                        }
                    }

                ],
                pageLength: 2,
                language: dt_lenguaje_espanol,
                ajax: {
                    url: '../backend/Base-Aerolinea/controller/RutaController.php',
                    type: "POST",
                    data: function (d) {
                        return $.extend({}, d, {
                            action: "showAll_Ruta"
                        });
                    }
                },
                drawCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                    $('#dt_Ruta').DataTable().columns.adjust().responsive.recalc();
                }
            });
        }
    };



    TableManageButtons = function () {
        "use strict";
        return {
            init: function () {
                dataTableRuta_const();
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
    $('#dt_Ruta').DataTable().columns.adjust().responsive.recalc();
};

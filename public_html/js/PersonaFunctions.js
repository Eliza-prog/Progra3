//*****************************************************************
//Inyección de eventos en el HTML
//*****************************************************************
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
        addOrUpdatePersona(false);
    });
    //agrega los eventos las capas necesarias
    $("#cancelar").click(function () {
        cancelAction();
    });    //agrega los eventos las capas necesarias

    $("#btMostarForm").click(function () {
        //muestra el fomurlaior
        clearFormPersona();
        $("#typeAction").val("add_Persona");
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

function addOrUpdatePersona() {
    //Se envia la información por ajax
    if (validar()) {
        $.ajax({
            url: '../backend/Base-Aerolinea/controller/PersonaController.php',
            data: {
                action: $("#typeAction").val(),
                cliente: $("#txtcliente").val(),
                contrasena: $("#txtcontrasena").val(),
                nombre: $("#txtnombre").val(),
                apellido1: $("#txtapellido1").val(),
                apellido2: $("#txtapellido2").val(),
                correo: $("#txtcorreo").val(),
                fecha_nacimiento: $("#txtfecha_nacimiento").val(),
                direccion: $("#txtdireccion").val(),
                telefono1: $("#txttelefono1").val(),
                sexo: $("#txtsexo").val()
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
                    $('#dt_personas').DataTable().ajax.reload();
                } else {//existe un error
                    swal("Error", responseText, "error");
                }
            },
            type: 'POST'
        });
    } else {
        swal("Error de validación", "Los datos del formulario no fueron digitados, por favor verificar", "error");
    }
}

//*****************************************************************
//*****************************************************************
function validar() {
    var validacion = true;


    //valida cada uno de los campos del formulario
    //Nota: Solo si fueron digitados
    if ($("#txtcliente").val() === "") {
        validacion = false;
    }

    if ($("#txtcontrasena").val() === "") {
        validacion = false;
    }

    if ($("#txtnombre").val() === "") {
        validacion = false;
    }

    if ($("#txtapellido1").val() === "") {
        validacion = false;
    }

    if ($("#txtapellido2").val() === "") {
        validacion = false;
    }

    if ($("#txtcorreo").val() === "") {
        validacion = false;
    }

    if ($("#txtfecha_nacimiento").val() === "") {
        validacion = false;
    }

    if ($("#txtdireccion").val() === "") {
        validacion = false;
    }
    if ($("#txttelefono1").val() === "") {
        validacion = false;
    }

    if ($("#txtsexo").val() === "") {
        validacion = false;
    }




    return validacion;
}

//*****************************************************************
//*****************************************************************

function clearFormPersona() {
    $('#formPersona').trigger("reset");
}

//*****************************************************************
//*****************************************************************

function cancelAction() {
    //clean all fields of the form
    clearFormPersona();
    $("#typeAction").val("add_Persona");
    $("#myModalFormulario").modal("hide");
}



//*****************************************************************
//*****************************************************************

function showPersonaByID(cliente) {
    //Se envia la información por ajax
    $.ajax({
        url: '../backend/Base-Aerolinea/controller/PersonaController.php',
        data: {
            action: "show_Persona",
            cliente: cliente
        },
        error: function () { //si existe un error en la respuesta del ajax
            alert("Se presento un error a la hora de cargar la información de las Persona en la base de datos");
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
            var objPersonaJSon = JSON.parse(data);
            $("#txtcliente").val(objPersonaJSon.cliente);
            $("#txtcontrasena").val(objPersonaJSon.contrasena);
            $("#txtnombre").val(objPersonaJSon.nombre);
            $("#txtapellido1").val(objPersonaJSon.apellido1);
            $("#txtapellido2").val(objPersonaJSon.apellido2);
            $("#txtfecha_nacimiento").val(objPersonaJSon.fecha_nacimiento);
            $("#txtcorreo").val(objPersonaJSon.correo);
            $("#txtdireccion").val(objPersonaJSon.direccion);
            $("#txttelefono1").val(objPersonaJSon.telefono1);
            $("#txtsexo").val(objPersonaJSon.sexo);
            $("#typeAction").val("update_Persona");
            $("#myModalFormulario").modal();
        },
        type: 'POST'
    });
}

//*****************************************************************
//*****************************************************************

function deletePersonaByID(cliente) {
    //Se envia la información por ajax
    $.ajax({
        url: '../backend/Base-Aerolinea/controller/PersonaController.php',
        data: {
            action: "delete_Persona",
            cliente: cliente
        },
        error: function () { //si existe un error en la respuesta del ajax
            alert("Se presento un error a la hora de cargar la información de las Persona en la base de datos");
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
            var responseText = data.substring(2);
            var typeOfMessage = data.substring(0, 2);
            if (typeOfMessage === "M~") { //si todo esta corecto
                swal("Eliminacion realizada", responseText, "success");
              $('#dt_personas').DataTable().ajax.reload();
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



    var dataTablePersonas_const = function () {
        if ($("#dt_personas").length) {
            $("#dt_personas").DataTable({
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
                        targets: 10,
                        className: "dt-center",
                        render: function (data, type, row, meta) {
                            var botones = '<button type="button" class="btn btn-default btn-xs" aria-label="Left Align" onclick="showPersonaByID(\'' + row[0] + '\');">Cargar</button> ';
                            botones += '<button type="button" class="btn btn-default btn-xs" aria-label="Left Align" onclick="deletePersonaByID(\'' + row[0] + '\');">Eliminar</button>';
                            return botones;
                        }
                    }

                ],
                pageLength: 2,
                language: dt_lenguaje_espanol,
                ajax: {
                    url: '../backend/Base-Aerolinea/controller/PersonaController.php',
                    type: "POST",
                    data: function (d) {
                        return $.extend({}, d, {
                            action: "showAll_Persona"
                        });
                    }
                },
                drawCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                    $('#dt_personas').DataTable().columns.adjust().responsive.recalc();
                }
            });
        }
    };



    TableManageButtons = function () {
        "use strict";
        return {
            init: function () {
                dataTablePersonas_const();
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
    $('#dt_personas').DataTable().columns.adjust().responsive.recalc();
};






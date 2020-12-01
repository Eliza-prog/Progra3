//*****************************************************************
//Inyección de eventos en el HTML
//*****************************************************************



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
    showALLPersona(true);
    
});

//*********************************************************************
//Agregar o modificar la información
//*********************************************************************

function addOrUpdatePersona(ocultarModalBool) {
    //Se envia la información por ajax
    if (validar()) {
        $.ajax({
            url: '../backend/Base-Aerolinea/controller/PersonaController.php',
            data: {
                action:         $("#typeAction").val(),
                PK_cedula:      $("#txtPK_cedula").val(),
                nombre:         $("#txtnombre").val(),
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
                    showALLPersona();
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
    if ($("#PK_cedula").val() === "") {
        validacion = false;
    }

    if ($("#nombre").val() === "") {
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

function showALLPersona(ocultarModalBool) {
    //Se envia la información por ajax
    $.ajax({
        url: '../backend/Base-Aerolinea/controller/PersonaController.php',
        data: {
            action: "showAll_Persona"
        },
        error: function () { //si existe un error en la respuesta del ajax
            alert("Se presento un error a la hora de cargar la información de las Persona en la base de datos");
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

function showPersonaByID(PK_cedula) {
    //Se envia la información por ajax
    $.ajax({
        url: 'admin/PersonaController.php',
        data: {
            action: "show_Persona",
            PK_cedula: PK_cedula
        },
        error: function () { //si existe un error en la respuesta del ajax
            alert("Se presento un error a la hora de cargar la información de las Persona en la base de datos");
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
            var objPersonaJSon = JSON.parse(data);
            $("#txtPK_cedula").val(objPersonaJSon.PK_cedula);
            $("#txtnombre").val(objPersonaJSon.nombre);
            $("#typeAction").val("update_Persona");
            $("#myModalFormulario").modal();
        },
        type: 'POST'
    });
}

//*****************************************************************
//*****************************************************************

function deletePersonaByID(PK_cedula) {
    //Se envia la información por ajax
    $.ajax({
        url: '../backend/Base-Aerolinea/controller/PersonaController.php',
        data: {
            action: "delete_Persona",
            PK_cedula: PK_cedula
        },
        error: function () { //si existe un error en la respuesta del ajax
            alert("Se presento un error a la hora de cargar la información de las Persona en la base de datos");
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
            var responseText = data.substring(2);
            var typeOfMessage = data.substring(0, 2);
            if (typeOfMessage === "M~") { //si todo esta corecto
                mostrarModal("myModal", "Resultado de la acción", responseText);
                showALLPersona(false);
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


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function () { //para la creación de los controles
    //agrega los eventos las capas necesarias
    $("#enviar").click(function () {
        addOrUpdatePersona_PK_cedula(false);
    });
    //agrega los eventos las capas necesarias
    $("#cancelar").click(function () {
        cancelAction();
    });    //agrega los eventos las capas necesarias

    $("#btMostarForm").click(function () {
        //muestra el fomurlaior
        clearFormPersona_PK_cedula();
        $("#typeAction").val("add_Persona_PK_cedula");
        $("#myModalFormulario").modal();
    });
});

//*********************************************************************
//cuando el documento esta cargado se procede a cargar la información
//*********************************************************************

$(document).ready(function () {
    showALLPersona_PK_cedula(true);
    
});

//*********************************************************************
//Agregar o modificar la información
//*********************************************************************

function addOrUpdatePersona_PK_cedula(ocultarModalBool) {
    //Se envia la información por ajax
    if (validar()) {
        $.ajax({
            url: '../backend/controller/Persona_PK_cedulaController.php',
            data: {
                action:         $("#typeAction").val(),
                idPersona_PK_cedula:         $("#txtidPersona_PK_cedula").val(),
                Vuelo_idVuelo:   $("#txtVuelo_idVuelo").val(),
                Asiento:    $("#txtAsiento").val()
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
                    clearFormPersona_PK_cedula();
                    showALLPersona_PK_cedula();
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
    if ($("#txtidPersona_PK_cedula").val() === "") {
        validacion = false;
    }

    if ($("#txtVuelo_idVuelo").val() === "") {
        validacion = false;
    }

    if ($("#txtAsiento").val() === "") {
        validacion = false;
    }

   


    return validacion;
}

//*****************************************************************
//*****************************************************************

function clearFormPersona_PK_cedula() {
    $('#formPersona_PK_cedula').trigger("reset");
}

//*****************************************************************
//*****************************************************************

function cancelAction() {
    //clean all fields of the form
    clearFormPersona_PK_cedula();
    $("#typeAction").val("add_Persona_PK_cedula");
    $("#myModalFormulario").modal("hide");
}

//*****************************************************************
//*****************************************************************

function showALLPersona_PK_cedula(ocultarModalBool) {
    //Se envia la información por ajax
    $.ajax({
        url: '../backend/controller/Persona_PK_cedulaController.php',
        data: {
            action: "showAll_Persona_PK_cedula"
        },
        error: function () { //si existe un error en la respuesta del ajax
            alert("Se presento un error a la hora de cargar la información de las Persona_PK_cedula en la base de datos");
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

function showPersona_PK_cedulaByID(idPersona_PK_cedula) {
    //Se envia la información por ajax
    $.ajax({
        url: 'admin/Persona_PK_cedulaController.php',
        data: {
            action: "show_Persona_PK_cedula",
            idPersona_PK_cedula: idPersona_PK_cedula
        },
        error: function () { //si existe un error en la respuesta del ajax
            alert("Se presento un error a la hora de cargar la información de las Persona_PK_cedula en la base de datos");
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
            var objPersona_PK_cedulaJSon = JSON.parse(data);
            $("#txtidPersona_PK_cedula").val(objPersona_PK_cedulaJSon.idPersona_PK_cedula);
            $("#txtVuelo_idVuelo").val(objPersona_PK_cedulaJSon.Vuelo_idVuelo);
            $("#txtAsiento").val(objPersona_PK_cedulaJSon.Asiento);
            $("#typeAction").val("update_Persona_PK_cedula");
            $("#myModalFormulario").modal();
        },
        type: 'POST'
    });
}

//*****************************************************************
//*****************************************************************

function deletePersona_PK_cedulaByID(idPersona_PK_cedula) {
    //Se envia la información por ajax
    $.ajax({
        url: 'admin/Persona_PK_cedulaController.php',
        data: {
            action: "delete_Persona_PK_cedula",
            idPersona_PK_cedula: idPersona_PK_cedula
        },
        error: function () { //si existe un error en la respuesta del ajax
            alert("Se presento un error a la hora de cargar la información de las Persona_PK_cedula en la base de datos");
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
            var responseText = data.substring(2);
            var typeOfMessage = data.substring(0, 2);
            if (typeOfMessage === "M~") { //si todo esta corecto
                mostrarModal("myModal", "Resultado de la acción", responseText);
                showALLPersona_PK_cedula(false);
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

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function () { //para la creación de los controles
    //agrega los eventos las capas necesarias
    $("#enviar").click(function () {
        addOrUpdateidReservacion(false);
    });
    //agrega los eventos las capas necesarias
    $("#cancelar").click(function () {
        cancelAction();
    });    //agrega los eventos las capas necesarias

    $("#btMostarForm").click(function () {
        //muestra el fomurlaior
        clearFormidReservacion();
        $("#typeAction").val("add_idReservacion");
        $("#myModalFormulario").modal();
    });
});

//*********************************************************************
//cuando el documento esta cargado se procede a cargar la información
//*********************************************************************

$(document).ready(function () {
    showALLidReservacion(true);
    
});

//*********************************************************************
//Agregar o modificar la información
//*********************************************************************

function addOrUpdateidReservacion(ocultarModalBool) {
    //Se envia la información por ajax
    if (validar()) {
        $.ajax({
            url: '../backend/controller/idReservacionController.php',
            data: {
                action:               $("#typeAction").val(),
                idReservacion:  $("#txtidReservacion").val(),
                Numero_Fila:        $("#txtNumero_Fila").val(),
                Numero_Asiento:              $("#txtNumero_Asiento").val(),
                Vuelo_id_Vuelo:              $("#txtVuelo_id_Vuelo").val(),
                Fecha_Reserva:              $("#txtFecha_Reserva").val(),
                Persona_Usuario1:              $("#txtPersona_Usuario1").val()
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
                    clearFormidReservacion();
                    showALLidReservacion();
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
    if ($("#txtidReservacion").val() === "") {
        validacion = false;
    }

    if ($("#txtNumero_Fila").val() === "") {
        validacion = false;
    }

    if ($("#txtNumero_Asiento").val() === "") {
        validacion = false;
    }
    
    if ($("#txtVuelo_id_Vuelo").val() === "") {
        validacion = false;
    }
    
    if ($("#txtFecha_Reserva").val() === "") {
        validacion = false;
    }
    
    if ($("#txtPersona_Usuario1").val() === "") {
        validacion = false;
    }

   


    return validacion;
}

//*****************************************************************
//*****************************************************************

function clearFormidReservacion() {
    $('#formidReservacion').trigger("reset");
}

//*****************************************************************
//*****************************************************************

function cancelAction() {
    //clean all fields of the form
    clearFormidReservacion();
    $("#typeAction").val("add_idReservacion");
    $("#myModalFormulario").modal("hide");
}

//*****************************************************************
//*****************************************************************

function showALLidReservacion(ocultarModalBool) {
    //Se envia la información por ajax
    $.ajax({
        url: '../backend/controller/idReservacionController.php',
        data: {
            action: "showAll_idReservacion"
        },
        error: function () { //si existe un error en la respuesta del ajax
            alert("Se presento un error a la hora de cargar la información de las idReservacion en la base de datos");
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

function showidReservacionByID(idReservacion) {
    //Se envia la información por ajax
    $.ajax({
        url: 'admin/idReservacionController.php',
        data: {
            action: "show_idReservacion",
            idReservacion: idReservacion
        },
        error: function () { //si existe un error en la respuesta del ajax
            alert("Se presento un error a la hora de cargar la información de las idReservacion en la base de datos");
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
            var objidReservacionJSon = JSON.parse(data);
            $("#txtidReservacion").val(objidReservacionJSon.idReservacion);
            $("#txtNumero_Fila").val(objidReservacionJSon.Numero_Fila);
            $("#txtNumero_Asiento").val(objidReservacionJSon.Numero_Asiento);
            $("#txtVuelo_id_Vuelo").val(objidReservacionJSon.Vuelo_id_Vuelo);
            $("#txtFecha_Reserva").val(objidReservacionJSon.Fecha_Reserva);
            $("#txtPersona_Usuario1").val(objidReservacionJSon.Persona_Usuario1);
            $("#typeAction").val("update_idReservacion");
            $("#myModalFormulario").modal();
        },
        type: 'POST'
    });
}

//*****************************************************************
//*****************************************************************

function deleteidReservacionByID(idReservacion) {
    //Se envia la información por ajax
    $.ajax({
        url: 'admin/idReservacionController.php',
        data: {
            action: "delete_idReservacion",
            idReservacion: idReservacion
        },
        error: function () { //si existe un error en la respuesta del ajax
            alert("Se presento un error a la hora de cargar la información de las idReservacion en la base de datos");
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
            var responseText = data.substring(2);
            var typeOfMessage = data.substring(0, 2);
            if (typeOfMessage === "M~") { //si todo esta corecto
                mostrarModal("myModal", "Resultado de la acción", responseText);
                showALLidReservacion(false);
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

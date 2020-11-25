/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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
    showALLVuelo(true);
    
});

//*********************************************************************
//Agregar o modificar la información
//*********************************************************************

function addOrUpdateVuelo(ocultarModalBool) {
    //Se envia la información por ajax
    if (validar()) {
        $.ajax({
            url: '../backend/controller/VueloController.php',
            data: {
                action:         $("#typeAction").val(),
                idVuelo:        $("#txtidVuelo").val(),
                Ruta_idRuta:    $("#txtRuta_idRuta").val(),
                Avion_idAvion:  $("#txtAvion_idAvion").val(),
                Persona_PK_cedula:  $("#txtPersona_PK_cedula").val(),
                Costo:          $("#txtCosto").val()
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
                    clearFormVuelo();
                    showALLVuelo();
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
    if ($("#txtidVuelo").val() === "") {
        validacion = false;
    }

    if ($("#txtRuta_idRuta").val() === "") {
        validacion = false;
    }

    if ($("#txtAvion_idAvion").val() === "") {
        validacion = false;
    }

    if ($("#txtPersona_PK_cedula").val() === "") {
        validacion = false;
    }
    
    if ($("#txtCosto").val() === "") {
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
        url: '../backend/controller/VueloController.php',
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

function showVueloByID(idVuelo) {
    //Se envia la información por ajax
    $.ajax({
        url: 'admin/VueloController.php',
        data: {
            action: "show_Vuelo",
            idVuelo: idVuelo
        },
        error: function () { //si existe un error en la respuesta del ajax
            alert("Se presento un error a la hora de cargar la información de las Vuelo en la base de datos");
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
            var objVueloJSon = JSON.parse(data);
            $("#txtidVuelo").val(objVueloJSon.idVuelo);
            $("#txtRuta_idRuta").val(objVueloJSon.Ruta_idRuta);
            $("#txtAvion_idAvion").val(objVueloJSon.Avion_idAvion);
            $("#txtPersona_PK_cedula").val(objVueloJSon.Persona_PK_cedula);
            $("#txtCosto").val(objVueloJSon.Costo);
            $("#typeAction").val("update_Vuelo");
            $("#myModalFormulario").modal();
        },
        type: 'POST'
    });
}

//*****************************************************************
//*****************************************************************

function deleteVueloByID(idVuelo) {
    //Se envia la información por ajax
    $.ajax({
        url: 'admin/VueloController.php',
        data: {
            action: "delete_Vuelo",
            idVuelo: idVuelo
        },
        error: function () { //si existe un error en la respuesta del ajax
            alert("Se presento un error a la hora de cargar la información de las Vuelo en la base de datos");
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
            var responseText = data.substring(2);
            var typeOfMessage = data.substring(0, 2);
            if (typeOfMessage === "M~") { //si todo esta corecto
                mostrarModal("myModal", "Resultado de la acción", responseText);
                showALLVuelo(false);
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


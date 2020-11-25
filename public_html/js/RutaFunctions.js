/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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
    showALLRuta(true);
    
});

//*********************************************************************
//Agregar o modificar la información
//*********************************************************************

function addOrUpdateRuta(ocultarModalBool) {
    //Se envia la información por ajax
    if (validar()) {
        $.ajax({
            url: '../backend/controller/RutaController.php',
            data: {
                action:         $("#typeAction").val(),
                idRuta:         $("#txtidRuta").val(),
                Horario_idHorario:   $("#txtHorario_idHorario").val(),
                Origen_idOrigen1:    $("#txtOrigen_idOrigen1").val(),
                Destino_idDestino1:  $("#txtDestino_idDestino1").val()
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

    if ($("#txtHorario_idHorario").val() === "") {
        validacion = false;
    }

    if ($("#txtOrigen_idOrigen1").val() === "") {
        validacion = false;
    }

    if ($("#txtDestino_idDestino1").val() === "") {
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
        url: '../backend/controller/RutaController.php',
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
        url: 'admin/RutaController.php',
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
            $("#txtHorario_idHorario").val(objRutaJSon.Horario_idHorario);
            $("#txtOrigen_idOrigen1").val(objRutaJSon.Origen_idOrigen1);
            $("#txtDestino_idDestino1").val(objRutaJSon.Destino_idDestino1);
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
        url: 'admin/RutaController.php',
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


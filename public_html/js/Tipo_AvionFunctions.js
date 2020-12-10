/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function () { //para la creación de los controles
    //agrega los eventos las capas necesarias
    $("#enviar").click(function () {
        addOrUpdateAvion(false);
    });
    //agrega los eventos las capas necesarias
    $("#cancelar").click(function () {
        cancelAction();
    });    //agrega los eventos las capas necesarias

    $("#btMostarForm").click(function () {
        //muestra el fomurlaior
        clearFormAvion();
        $("#typeAction").val("add_Avion");
        $("#myModalFormulario").modal();
    });
});

//*********************************************************************
//cuando el documento esta cargado se procede a cargar la información
//*********************************************************************

$(document).ready(function () {
    showALLAvion(true);
    
});

//*********************************************************************
//Agregar o modificar la información
//*********************************************************************

function addOrUpdateAvion(ocultarModalBool) {
    //Se envia la información por ajax
    if (validar()) {
        $.ajax({
            url: '../backend/controller/AvionController.php',
            data: {
                action:         $("#typeAction").val(),
                idTipo_Avion:        $("#txtidTipo_Avion").val(),
                Fecha:         $("#txtFecha").val(),
                Modelo:      $("#txtModelo").val(),
                Marca:   $("#txtMarca").val(),
                Fila:       $("#txtFila").val(),
                Asiento_Fila:       $("#txtAsiento_Fila").val()
                
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
                    clearFormAvion();
                    showALLAvion();
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
    if ($("#txtidTipo_Avion").val() === "") {
        validacion = false;
    }

    if ($("#txtFecha").val() === "") {
        validacion = false;
    }

    if ($("#txtModelo").val() === "") {
        validacion = false;
    }

    if ($("#txtMarca").val() === "") {
        validacion = false;
    }

    if ($("#txtFila").val() === "") {
        validacion = false;
    }

    if ($("#txtAsiento_Fila").val() === "") {
        validacion = false;
    }


    return validacion;
}

//*****************************************************************
//*****************************************************************

function clearFormAvion() {
    $('#formAvion').trigger("reset");
}

//*****************************************************************
//*****************************************************************

function cancelAction() {
    //clean all fields of the form
    clearFormAvion();
    $("#typeAction").val("add_Avion");
    $("#myModalFormulario").modal("hide");
}

//*****************************************************************
//*****************************************************************

function showALLAvion(ocultarModalBool) {
    //Se envia la información por ajax
    $.ajax({
        url: '../backend/controller/AvionController.php',
        data: {
            action: "showAll_Avion"
        },
        error: function () { //si existe un error en la respuesta del ajax
            alert("Se presento un error a la hora de cargar la información de las Avion en la base de datos");
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

function showAvionByID(idTipo_Avion) {
    //Se envia la información por ajax
    $.ajax({
        url: 'admin/AvionController.php',
        data: {
            action: "show_Avion",
            idTipo_Avion: idTipo_Avion
        },
        error: function () { //si existe un error en la respuesta del ajax
            alert("Se presento un error a la hora de cargar la información de las Avion en la base de datos");
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
            var objAvionJSon = JSON.parse(data);
            $("#txtidTipo_Avion").val(objAvionJSon.idTipo_Avion);
            $("#txtFecha").val(objAvionJSon.Fecha);
            $("#txtModelo").val(objAvionJSon.Modelo);
            $("#txtMarca").val(objAvionJSon.Marca);
            $("#txtFila").val(objAvionJSon.Fila);
            $("#txtAsiento_Fila").val(objAvionJSon.Asiento_Fila);
            $("#typeAction").val("update_Avion");
            $("#myModalFormulario").modal();
        },
        type: 'POST'
    });
}

//*****************************************************************
//*****************************************************************

function deleteAvionByID(idTipo_Avion) {
    //Se envia la información por ajax
    $.ajax({
        url: 'admin/AvionController.php',
        data: {
            action: "delete_Avion",
            idTipo_Avion: idTipo_Avion
        },
        error: function () { //si existe un error en la respuesta del ajax
            alert("Se presento un error a la hora de cargar la información de las Avion en la base de datos");
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
            var responseText = data.substring(2);
            var typeOfMessage = data.substring(0, 2);
            if (typeOfMessage === "M~") { //si todo esta corecto
                mostrarModal("myModal", "Resultado de la acción", responseText);
                showALLAvion(false);
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

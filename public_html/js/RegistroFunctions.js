/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function () { //para la creación de los controles
    //agrega los eventos las capas necesarias
    $("#Registrar").click(function () {
        addOrUpdateRegistro(false);
    });
    //agrega los eventos las capas necesarias
    $("#cancelar").click(function () {
        cancelAction();
    });    //agrega los eventos las capas necesarias

    $("#btMostarForm").click(function () {
        //muestra el fomurlaior
        clearFormRegistro();
        $("#typeAction").val("add_Registro");
        $("#myModalFormulario").modal();
    });
});

//*********************************************************************
//cuando el documento esta cargado se procede a cargar la información
//*********************************************************************

$(document).ready(function () {
    showALLRegistro(true);
    
});

//*********************************************************************
//Agregar o modificar la información
//*********************************************************************

function addOrUpdateRegistro(ocultarModalBool) {
    //Se envia la información por ajax
    if (validar()) {
        $.ajax({
            url: '../backend/controller/RegistroController.php',
            data: {
                action:         $("#typeAction").val(),
                idRegistro:     $("#txtidRegistro").val(),
                NombreUsuario:  $("#NombreUsuario").val(),
                Contraseña:     $("#Contraseña").val(),
                Email:          $("#Email").val(),
                FechaRegistro:  $("#txtFechaRegistro").val(),
                Personas_PK_cedula:    $("#PK_cedula").val()
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
                    clearFormRegistro();
                    showALLRegistro();
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
    if ($("#txtidRegistro").val() === "") {
        validacion = false;
    }

    if ($("#txtNombreUsuario").val() === "") {
        validacion = false;
    }

    if ($("#txtContraseña").val() === "") {
        validacion = false;
    }

    if ($("#txtEmail").val() === "") {
        validacion = false;
    }

    if ($("#txtFechaRegistro").val() === "") {
        validacion = false;
    }

    if ($("#txtPersonas_PK_cedula").val() === "") {
        validacion = false;
    }



    return validacion;
}

//*****************************************************************
//*****************************************************************

function clearFormRegistro() {
    $('#formRegistro').trigger("reset");
}

//*****************************************************************
//*****************************************************************

function cancelAction() {
    //clean all fields of the form
    clearFormRegistro();
    $("#typeAction").val("add_Registro");
    $("#myModalFormulario").modal("hide");
}

//*****************************************************************
//*****************************************************************

function showALLRegistro(ocultarModalBool) {
    //Se envia la información por ajax
    $.ajax({
        url: '../backend/controller/RegistroController.php',
        data: {
            action: "showAll_Registro"
        },
        error: function () { //si existe un error en la respuesta del ajax
            alert("Se presento un error a la hora de cargar la información de las Registro en la base de datos");
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

function showRegistroByID(idRegistro) {
    //Se envia la información por ajax
    $.ajax({
        url: 'admin/RegistroController.php',
        data: {
            action: "show_Registro",
            idRegistro: idRegistro
        },
        error: function () { //si existe un error en la respuesta del ajax
            alert("Se presento un error a la hora de cargar la información de las Registro en la base de datos");
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
            var objRegistroJSon = JSON.parse(data);
            $("#txtidRegistro").val(objRegistroJSon.idRegistro);
            $("#txtNombreUsuario").val(objRegistroJSon.NombreUsuario);
            $("#txtContraseña").val(objRegistroJSon.Contraseña);
            $("#txtEmail").val(objRegistroJSon.Email);
            $("#txtFechaRegistro").val(objRegistroJSon.FechaRegistro);
            $("#txtPersonas_PK_cedula").val(objRegistroJSon.Personas_PK_cedula);
            $("#typeAction").val("update_Registro");
            $("#myModalFormulario").modal();
        },
        type: 'POST'
    });
}

//*****************************************************************
//*****************************************************************

function deleteRegistroByID(idRegistro) {
    //Se envia la información por ajax
    $.ajax({
        url: 'admin/RegistroController.php',
        data: {
            action: "delete_Registro",
            idRegistro: idRegistro
        },
        error: function () { //si existe un error en la respuesta del ajax
            alert("Se presento un error a la hora de cargar la información de las Registro en la base de datos");
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
            var responseText = data.substring(2);
            var typeOfMessage = data.substring(0, 2);
            if (typeOfMessage === "M~") { //si todo esta corecto
                mostrarModal("myModal", "Resultado de la acción", responseText);
                showALLRegistro(false);
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


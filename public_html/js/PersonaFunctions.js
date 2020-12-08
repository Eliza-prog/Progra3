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
                usuario:      $("#txtusuario").val(),
                contrasena:         $("#txtcontrasena").val(),
                nombre:         $("#txtnombre").val(),
                apellido1:      $("#txtapellido1").val(),
                apellido2:      $("#txtapellido2").val(),
                correo:         $("#txtcorreo").val(),
                fecha_nacimiento:  $("#txtfecha_nacimiento").val(),
                direccion:         $("#txtdireccion").val(),
                telefono1:         $("#txttelefono1").val(),
                telefono2:         $("#txttelefono2").val(),
                tipo_usuario:         $("#txttipo_usuario").val(),
                sexo:           $("#txtsexo").val()
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
    if ($("#txtusuario").val() === "") {
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
    if ($("#txttelefono2").val() === "") {
        validacion = false;
    }

    if ($("#txttipo_usuario").val() === "") {
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

function showPersonaByID(usuario) {
    //Se envia la información por ajax
    $.ajax({
        url: 'admin/PersonaController.php',
        data: {
            action: "show_Persona",
            usuario: usuario
        },
        error: function () { //si existe un error en la respuesta del ajax
            alert("Se presento un error a la hora de cargar la información de las Persona en la base de datos");
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
            var objPersonaJSon = JSON.parse(data);
            $("#txtusuario").val(objPersonaJSon.usuario);
            $("#txtcontrasena").val(objPersonaJSon.usuario);
            $("#txtnombre").val(objPersonaJSon.nombre);
            $("#txtapellido1").val(objPersonaJSon.apellido1);
            $("#txtapellido2").val(objPersonaJSon.apellido2);
            $("#txtfecNacimiento").val(objPersonaJSon.fecNacimiento);
            $("#txtdireccion").val(objPersonaJSon.usuario);
            $("#txttelefono1").val(objPersonaJSon.usuario);
            $("#txttelefono2").val(objPersonaJSon.usuario);
            $("#txttipo_usuario").val(objPersonaJSon.usuario);
            $("#txtsexo").val(objPersonaJSon.sexo);
            $("#txtlastUser").val(objPersonaJSon.lastUser);
            $("#typeAction").val("update_Persona");
            $("#myModalFormulario").modal();
        },
        type: 'POST'
    });
}

//*****************************************************************
//*****************************************************************

function deletePersonaByID(usuario) {
    //Se envia la información por ajax
    $.ajax({
        url: '../backend/Base-Aerolinea/controller/PersonaController.php',
        data: {
            action: "delete_Persona",
            usuario: usuario
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





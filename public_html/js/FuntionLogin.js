
$(function () { //para la creación de los controles
    //agrega los eventos las capas necesarias
    $("#login").click(function () {
        Login();
    });
});


function Login() {
    //Se envia la información por ajax
    $.ajax({
        url: '../backend/Base-Aerolinea/controller/PersonaController.php',
        data: {
            action: "persona_Login",
            cliente: $("#user_name").val(),
            contrasena: $("#password").val()
        },
        error: function () { //si existe un error en la respuesta del ajax
            alert("Se presento un error a la hora de cargar la información de las Persona en la base de datos");
        },
        success: function (data) {
            var responseText = data.substring(2);
            var typeOfMessage = data.substring(0, 2);
            if (typeOfMessage === "M~") { //si todo esta corecto
                swal("Hecho", responseText, "success");
                location.reload();
            } else {//existe un error
                swal("Error", responseText, "error");
            }
        },
        type: 'POST'
    });
}

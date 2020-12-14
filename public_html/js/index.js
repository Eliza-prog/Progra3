
$(document).ready(function () {
    
    $("#ContenidoRegistro").hide();
    $("#admin").hide();
    
    
    
    $("#Login").click(function () {
        $("#ContenidoLogin").show();
        $("#ContenidoRegistro").hide();
    });


    $("#Registro").click(function () {
        $("#ContenidoLogin").hide();
        $("#ContenidoRegistro").show();
    });

});


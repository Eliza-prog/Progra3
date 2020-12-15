
$(document).ready(function () {
    
    $("#ContenidoRegistro").hide();
    //$("#admin").show();
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


 $(function () { //para la creación de los controles
    //agrega los eventos las capas necesarias
    $("#1-a").click(function () {
        setAsientos("7","A");
    });
   
    //agrega los eventos las capas necesarias
    $("#1-b").click(function () {
        setAsientos("7","B");
    });    
   
    //agrega los eventos las capas necesarias
    $("#1-c").click(function () {
        setAsientos("7","C");
    });
   
    //vuelos botones1
    $("#precio1").click(function () {
        definirVuelo(110,"vuelo COD.230");
        setVuelo("230");
    });
   
    $("#precio2").click(function () {
        definirVuelo(120,"vuelo COD.240");
        setVuelo("240");
    });
   
    //vuelos botones2
    $("#precio3").click(function () {
        definirVuelo(220,"vuelo COD.250");
        setVuelo("250");
    });
   
    $("#precio4").click(function () {
        definirVuelo(230,"vuelo COD.260");
        setVuelo("260");
    });
   
    //vuelos botones3
    $("#precio5").click(function () {
        definirVuelo(330,"vuelo COD.270");
        setVuelo("270");
    });
   
    $("#precio6").click(function () {
        definirVuelo(340,"vuelo COD.280");
        setVuelo("280");
    });
   
    //vuelos botones4
    $("#precio7").click(function () {
        definirVuelo(440,"vuelo COD.290");
        setVuelo("290");
    });
   
    $("#precio8").click(function () {
        definirVuelo(450,"vuelo COD.300");
        setVuelo("300");
    });
   
    $("#enviar").click(function () {
        Bool();
    });
});

function Bool(){
    document.getElementById("bool_item").value = "false";
}

function definirVuelo(_valor1,_valor2) {
    document.getElementById("precio_item").value = _valor1;
    document.getElementById("vuelo_item").value = _valor2;
}

function setVuelo(numero) {
    document.getElementById("txtVuelo").value = numero;
}

function setAsientos(fila,asiento){
    document.getElementById("txtFila").value = fila;
    document.getElementById("txtAsiento").value = asiento;
}



//------------
 $(function () { //para la creación de los controles  
    //agrega los eventos las capas necesarias
    $("#7a").click(function () {
        setAsientos("7","A");
    });
   
    //agrega los eventos las capas necesarias
    $("#7b").click(function () {
        setAsientos("7","B");
    });    
   
    //agrega los eventos las capas necesarias
    $("#7c").click(function () {
        setAsientos("7","C");
    });
    //agrega los eventos las capas necesarias
    $("#8a").click(function () {
        setAsientos("8","A");
    });
   
    //agrega los eventos las capas necesarias
    $("#8b").click(function () {
        setAsientos("8","B");
    });    
   
    //agrega los eventos las capas necesarias
    $("#8c").click(function () {
        setAsientos("8","C");
    });
    //agrega los eventos las capas necesarias
    $("#9a").click(function () {
        setAsientos("9","A");
    });
   
    //agrega los eventos las capas necesarias
    $("#9b").click(function () {
        setAsientos("9","B");
    });    
   
    //agrega los eventos las capas necesarias
    $("#9c").click(function () {
        setAsientos("9","C");
    });
   
    //agrega los eventos las capas necesarias
    $("#7d").click(function () {
        setAsientos("7","D");
    });
   
    //agrega los eventos las capas necesarias
    $("#7e").click(function () {
        setAsientos("7","E");
    });    
   
    //agrega los eventos las capas necesarias
    $("#7f").click(function () {
        setAsientos("7","F");
    });
   
    //agrega los eventos las capas necesarias
    $("#8d").click(function () {
        setAsientos("8","D");
    });
   
    //agrega los eventos las capas necesarias
    $("#8e").click(function () {
        setAsientos("8","E");
    });    
   
    //agrega los eventos las capas necesarias
    $("#8f").click(function () {
        setAsientos("8","F");
    });
   
    //agrega los eventos las capas necesarias
    $("#9d").click(function () {
        setAsientos("9","D");
    });
   
    //agrega los eventos las capas necesarias
    $("#9e").click(function () {
        setAsientos("9","E");
    });    
   
    //agrega los eventos las capas necesarias
    $("#9f").click(function () {
        setAsientos("9","F");
    });

    //vuelos botones1
    $("#precio1").click(function () {
        definirVuelo(110,"vuelo COD.230");
        setVuelo("230");
    });
   
    $("#precio2").click(function () {
        definirVuelo(120,"vuelo COD.240");
        setVuelo("240");
    });
   
    //vuelos botones2
    $("#precio3").click(function () {
        definirVuelo(220,"vuelo COD.250");
        setVuelo("250");
    });
   
    $("#precio4").click(function () {
        definirVuelo(230,"vuelo COD.260");
        setVuelo("260");
    });
   
    //vuelos botones3
    $("#precio5").click(function () {
        definirVuelo(330,"vuelo COD.270");
        setVuelo("270");
    });
   
    $("#precio6").click(function () {
        definirVuelo(340,"vuelo COD.280");
        setVuelo("280");
    });
   
    //vuelos botones4
    $("#precio7").click(function () {
        definirVuelo(440,"vuelo COD.290");
        setVuelo("290");
    });
   
    $("#precio8").click(function () {
        definirVuelo(450,"vuelo COD.300");
        setVuelo("300");
    });
   
    $("#enviar").click(function () {
        Bool();
    });
});

function Bool(){
    document.getElementById("bool_item").value = "false";
}

function definirVuelo(_valor1,_valor2) {
    document.getElementById("precio_item").value = _valor1;
    document.getElementById("vuelo_item").value = _valor2;
}

function setVuelo(numero) {
    document.getElementById("txtVuelo").value = numero;
}

function setAsientos(fila,asiento){
    document.getElementById("txtFila").value = fila;
    document.getElementById("txtAsiento").value = asiento;
}


$(document).ready(function () {
    genera_tabla();
    genera_tabla2();
    //genera_tabla3();
    //genera_tabla4();


});

function genera_tabla() {
    // Obtener la referencia del elemento body
    body = document.getElementsByClassName("asientos")[0];

    // Crea un elemento <table> y un elemento <tbody>
    tabla = document.createElement("table");
    tabla.setAttribute("id", "tabla1");
    tabla.setAttribute("border", "1");
    tblBody = document.createElement("tbody");
    contador = 0;
    Fila = "";
    // Crea las celdas
    for (i = 0; i < 3; i++) {
        // Crea las hileras de la tabla
        hilera = document.createElement("tr");
        hilera.setAttribute("id","txtNumero_Fila");
        hilera.setAttribute("value",i+1);
        if (i === 0) {
            Fila = "A";
        }
        if (i === 1) {
            Fila = "B";
        }
        if (i === 2) {
            Fila = "C";
        }



        for (j = 0; j < 11; j++) {

            celda = document.createElement("td");
            celda.setAttribute("id","txtNumero_Asiento");
            celda.setAttribute("value",j+1);
            info = document.createElement("button");
            info.setAttribute("class", " desocupado");
            info.setAttribute("Onclick", "cambiarBack(this)");
            textoCelda = document.createTextNode(Fila + "-" + (j + 1));
            info.appendChild(textoCelda);
            celda.appendChild(info);
            hilera.appendChild(celda);


            contador++;
        }

        // agrega la hilera al final de la tabla (al final del elemento tblbody)
        tblBody.appendChild(hilera);

    }

    // posiciona el <tbody> debajo del elemento <table>
    tabla.appendChild(tblBody);
    // appends <table> into <body>
    body.appendChild(tabla);
    // modifica el atributo "border" de la tabla y lo fija a "2";


}
function genera_tabla2() {
    // Obtener la referencia del elemento body
    body = document.getElementsByClassName("asientos")[0];

    // Crea un elemento <table> y un elemento <tbody>
    tabla = document.createElement("table");
    tabla.setAttribute("id", "tabla2");
    tabla.setAttribute("class", "tabladerecha");
    tblBody = document.createElement("tbody");
    contador = 0;
    Fila = "";
    // Crea las celdas
    for (i = 0; i < 3; i++) {
        // Crea las hileras de la tabla
        hilera = document.createElement("tr");
        if (i === 0) {
            Fila = "D";
        }
        if (i === 1) {
            Fila = "E";
        }
        if (i === 2) {
            Fila = "F";
        }


        for (j = 0; j < 11; j++) {

            celda = document.createElement("td");
            info = document.createElement("button");
            info.setAttribute("class", " desocupado");
            info.setAttribute("Onclick", "cambiarBack(this)");
            textoCelda = document.createTextNode(Fila + "-" + (j + 1));
            info.appendChild(textoCelda);
            celda.appendChild(info);
            hilera.appendChild(celda);


            contador++;
        }

        // agrega la hilera al final de la tabla (al final del elemento tblbody)
        tblBody.appendChild(hilera);

    }

    // posiciona el <tbody> debajo del elemento <table>
    tabla.appendChild(tblBody);
    // appends <table> into <body>
    body.appendChild(tabla);
    // modifica el atributo "border" de la tabla y lo fija a "2";


}

function genera_tabla3() {
    // Obtener la referencia del elemento body
    body = document.getElementsByClassName("asientos")[0];

    // Crea un elemento <table> y un elemento <tbody>
    tabla = document.createElement("table");
    tabla.setAttribute("border", "1");
    tabla.setAttribute("id", "tabla3");
    tblBody = document.createElement("tbody");
    contador = 0;
    Fila = "";
    // Crea las celdas
    for (i = 0; i < 3; i++) {
        // Crea las hileras de la tabla
        hilera = document.createElement("tr");
        if (i === 0) {
            Fila = "A";
        }
        if (i === 1) {
            Fila = "B";
        }
        if (i === 2) {
            Fila = "C";
        }


        for (j = 0; j < 11; j++) {

            celda = document.createElement("td");
            info = document.createElement("button");
            info.setAttribute("class", " desocupado");
            info.setAttribute("Onclick", "cambiarBack(this)");
            textoCelda = document.createTextNode(Fila + "-" + (j + 1));
            info.appendChild(textoCelda);
            celda.appendChild(info);
            hilera.appendChild(celda);


            contador++;
        }

        // agrega la hilera al final de la tabla (al final del elemento tblbody)
        tblBody.appendChild(hilera);

    }

    // posiciona el <tbody> debajo del elemento <table>
    tabla.appendChild(tblBody);
    // appends <table> into <body>
    body.appendChild(tabla);
    // modifica el atributo "border" de la tabla y lo fija a "2";


}

function genera_tabla4() {
    // Obtener la referencia del elemento body
    body = document.getElementsByClassName("asientos")[0];

    // Crea un elemento <table> y un elemento <tbody>
    tabla = document.createElement("table");
    tabla.setAttribute("border", "1");
    tabla.setAttribute("class", "tabla4");
    tblBody = document.createElement("tbody");
    contador = 0;
    Fila = "";
    // Crea las celdas
    for (i = 0; i < 3; i++) {
        // Crea las hileras de la tabla
        hilera = document.createElement("tr");
        if (i === 0) {
            Fila = "D";
        }
        if (i === 1) {
            Fila = "E";
        }
        if (i === 2) {
            Fila = "F";
        }


        for (j = 0; j < 11; j++) {

            celda = document.createElement("td");
            info = document.createElement("button");
            info.setAttribute("class", " desocupado");
            info.setAttribute("Onclick", "cambiarBack(this)");
            textoCelda = document.createTextNode(Fila + "-" + (j + 1));
            info.appendChild(textoCelda);
            celda.appendChild(info);
            hilera.appendChild(celda);


            contador++;
        }

        // agrega la hilera al final de la tabla (al final del elemento tblbody)
        tblBody.appendChild(hilera);

    }

    // posiciona el <tbody> debajo del elemento <table>
    tabla.appendChild(tblBody);
    // appends <table> into <body>
    body.appendChild(tabla);
    // modifica el atributo "border" de la tabla y lo fija a "2";


}




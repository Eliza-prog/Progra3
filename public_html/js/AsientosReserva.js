/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function () {
    genera_tabla();


});
         
    function genera_tabla() {
        // Obtener la referencia del elemento body
        body = document.getElementsByClassName("asientos")[0];

        // Crea un elemento <table> y un elemento <tbody>
        tabla = document.createElement("table");
        tabla.setAttribute("class","table");
        tblBody = document.createElement("tbody");
        contador= 0;
        Fila="";
        // Crea las celdas
        for (i = 0; i < 4; i++) {
            // Crea las hileras de la tabla
            hilera = document.createElement("tr");
            if(i===0){
                    Fila="A";
                }if(i===1){
                    Fila="B";
                }if(i===2){
                    Fila="C";
                }if(i===3){
                    Fila="D";
                }if(i===4){
                    Fila="E";
                }
                
            for (j = 0; j < 15; j++) {
                
                celda = document.createElement("td");                
                info = document.createElement("div");
                info.setAttribute("class","asiento desocupado");
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
        tabla.setAttribute("border", "2");
        
    }
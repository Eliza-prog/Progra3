

$(document).ready(function () {
    genera_tabla();
    

});




function genera_tabla() {
  // Obtener la referencia del elemento body
   body = document.getElementsByTagName("body")[0];
 
  // Crea un elemento <table> y un elemento <tbody>
   tabla   = document.createElement("table");
   tblBody = document.createElement("tbody");
   contador=0;
  // Crea las celdas
  for ( i = 0; i < 4; i++) {
    // Crea las hileras de la tabla
    hilera = document.createElement("tr");
 
    for ( j = 0; j < 15; j++) {
      // Crea un elemento <td> y un nodo de texto, haz que el nodo de
      // texto sea el contenido de <td>, ubica el elemento <td> al final
      // de la hilera de la tabla
      celda = document.createElement("td");
      textoCelda = document.createTextNode("celda en la fila "+(i+1)+", asiento "+(j+1)+contador);
      celda.appendChild(textoCelda);
      hilera.appendChild(celda);
      contador++;
    }
 
    // agrega la hilera al final de la tabla (al final del elemento tblbody)
    tblBody.appendChild(hilera);
    contador++;
  }
 
  // posiciona el <tbody> debajo del elemento <table>
  tabla.appendChild(tblBody);
  // appends <table> into <body>
  body.appendChild(tabla);
  // modifica el atributo "border" de la tabla y lo fija a "2";
  tabla.setAttribute("border", "2");
  
}

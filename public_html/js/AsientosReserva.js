/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function () {
    Asientos();
    

});

function Asientos() {

    avion = {
        asientos: [
            {numero: "1A", ocupado: false},
            {numero: "1B", ocupado: false},
            {numero: "2A", ocupado: true},
            {numero: "2B", ocupado: false},
            {numero: "3A", ocupado: true},
            {numero: "3B", ocupado: false},
            {numero: "4A", ocupado: false},
            {numero: "4B", ocupado: true},
            {numero: "5A", ocupado: false},
            {numero: "5B", ocupado: false},
            {numero: "6A", ocupado: false},
            {numero: "6B", ocupado: false},
        ]
    };

// Llamar al atributo asientos del objeto avion
// Hacer un for de los asientos
// Comprobar disponibilidad
// si es falso el asiento es verde
// Colocar asiento


    avionContainer = document.getElementById("avion-container");
    avionContainer.innerHTML = "";
    asientos = avion.asientos;

    Campo = "";
    contador = 0;

    cajaPeq = document.createElement("div");
    cajaPeq.setAttribute("class", "col s4");

    for (var i = 0; i < asientos.length; i++) {
        Campo = document.createElement("div");
        Campo.innerHTML = asientos[i].numero;
        
        
        
        //[i] posicion de i
        if (asientos[i].ocupado) {
            Campo.setAttribute("class", "ocupado asiento");
        } else {
            Campo.setAttribute("class", "desocupado asiento");
        }
        ;
        
        if(asientos[i].ocupado===true){
            Campo.removeAttribute("Onclick","cambiarBack(this)")
        }else            
            Campo.setAttribute("Onclick", "cambiarBack(this)");


        if (cajaPeq.children.length >= 2) {
            avionContainer.appendChild(cajaPeq);
            cajaPeq = document.createElement("div");
            cajaPeq.setAttribute("class", "col s4");
            cajaPeq.appendChild(Campo);
        } else {
            cajaPeq.appendChild(Campo);
            contador++;
        }
        ;
        if (i == asientos.length - 1) {
            avionContainer.appendChild(cajaPeq);
        }
    }
    ;

}


<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once ("../bo/ReservacionBo.php");
require_once ("../domain/Reservacion.php");

$obj_Reservacion = new Reservacion();
$obj_Reservacion->setidReservacion(123);
$obj_Reservacion->setNumero_Fila(5);
$obj_Reservacion->setNumero_Asiento(15);
$obj_Reservacion->setVuelo_id_Vuelo(456);
$obj_Reservacion->setFecha_Reserva("2020-08-15");
$obj_Reservacion->setPersona_Usuario1("Maria");



  

$bo_Reservacion = new ReservacionBo();

$operacion = 1; //variable para pruebas

switch ($operacion) {
    case 1: //Prueba para guardar en la base de datos
        $bo_Reservacion->add($obj_Reservacion);
        echo("<h1>Prueba de agregar exitosa</h1>");
    break;

    case 2: //Prueba para modificar en la base de datos
        $bo_Reservacion->update($obj_Reservacion);
        echo("<h1>Prueba de modificar exitosa</h1>");
    break;

    case 3: //Prueba para eliminar en la base de datos
        $bo_Reservacion->delete($obj_Reservacion);
        echo("<h1>Prueba de eliminar exitosa</h1>");
    break;

    case 4: //Prueba para consultar en la base de datos
        $ReservacionConsultada = $bo_Reservacion->searchById($obj_Reservacion);
        echo("<h1>Prueba de consultar por ID exitosa exitosa</h1>");
        echo (json_encode($ReservacionConsultada));
    break;

    case 5: //Prueba para consultar todos en la base de datos
        $resutlado = $bo_Reservacion->getAll();
        echo("<h1>Prueba de consultar todos los registros exitosa</h1>");
        echo (json_encode($resutlado->GetArray()));
    break;

    default:
    break;
}

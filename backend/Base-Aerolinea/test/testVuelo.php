<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once ("../bo/VueloBo.php");
require_once ("../domain/Vuelo.php");


$obj_Vuelo = new Vuelo();
$obj_Vuelo->setid_Vuelo(404);
$obj_Vuelo->setFecha_Hora("2020-08-16 20:00:00");
$obj_Vuelo->setRuta_idRuta(1234);
$obj_Vuelo->setTipo_Avion_idTipo_Aviones(10);

  

$bo_Vuelo = new VueloBo();

$operacion = 1;//variable para pruebas

switch ($operacion) {
    case 1: //Prueba para guardar en la base de datos
        $bo_Vuelo->add($obj_Vuelo);
        echo("<h1>Prueba de agregar exitosa</h1>");
    break;

    case 2: //Prueba para modificar en la base de datos
        $bo_Vuelo->update($obj_Vuelo);
        echo("<h1>Prueba de modificar exitosa</h1>");
    break;

    case 3: //Prueba para eliminar en la base de datos
        $bo_Vuelo->delete($obj_Vuelo);
        echo("<h1>Prueba de eliminar exitosa</h1>");
    break;

    case 4: //Prueba para consultar en la base de datos
        $VueloConsultada = $bo_Vuelo->searchById($obj_Vuelo);
        echo("<h1>Prueba de consultar por ID exitosa exitosa</h1>");
        echo (json_encode($VueloConsultada));
    break;

    case 5: //Prueba para consultar todos en la base de datos
        $resutlado = $bo_Vuelo->getAll();
        echo("<h1>Prueba de consultar todos los registros exitosa</h1>");
        echo (json_encode($resutlado->GetArray()));
    break;

    default:
    break;
}

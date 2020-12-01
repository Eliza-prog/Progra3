<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once ("../bo/RutaBo.php");
require_once ("../domain/Ruta.php");

$obj_Ruta = new Ruta();
$obj_Ruta->setIdRuta(123909);
$obj_Ruta->setHorario_idHorario(897383);
$obj_Ruta->setOrigen_idOrigen1(689900);
$obj_Ruta->setDestino_idDestino1(83982776);


  

$bo_Ruta = new RutaBo();

$operacion = 1; //variable para pruebas

switch ($operacion) {
    case 1: //Prueba para guardar en la base de datos
        $bo_Ruta->add($obj_Ruta);
        echo("<h1>Prueba de agregar exitosa</h1>");
    break;

    case 2: //Prueba para modificar en la base de datos
        $bo_Ruta->update($obj_Ruta);
        echo("<h1>Prueba de modificar exitosa</h1>");
    break;

    case 3: //Prueba para eliminar en la base de datos
        $bo_Ruta->delete($obj_Ruta);
        echo("<h1>Prueba de eliminar exitosa</h1>");
    break;

    case 4: //Prueba para consultar en la base de datos
        $RutaConsultada = $bo_Ruta->searchById($obj_Ruta);
        echo("<h1>Prueba de consultar por ID exitosa exitosa</h1>");
        echo (json_encode($RutaConsultada));
    break;

    case 5: //Prueba para consultar todos en la base de datos
        $resutlado = $bo_Ruta->getAll();
        echo("<h1>Prueba de consultar todos los registros exitosa</h1>");
        echo (json_encode($resutlado->GetArray()));
    break;

    default:
    break;
}

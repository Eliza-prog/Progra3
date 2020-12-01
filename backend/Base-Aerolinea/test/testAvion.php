<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once ("../bo/AvionBo.php");
require_once ("../domain/Avion.php");

$obj_Avion = new Avion();
$obj_Avion->setIdAvion(123410);
$obj_Avion->setNombre("hvhgv");
$obj_Avion->setTipoAvion("kbhj");
$obj_Avion->setPasajerosMax(200);
$obj_Avion->setCargaMax(14);
$obj_Avion->setcantidad(800);


$bo_Avion = new AvionBo();

$operacion = 1; //variable para pruebas

switch ($operacion) {
    case 1: //Prueba para guardar en la base de datos
        $bo_Avion->add($obj_Avion);
        echo("<h1>Prueba de agregar exitosa</h1>");
    break;

    case 2: //Prueba para modificar en la base de datos
        $bo_Avion->update($obj_Avion);
        echo("<h1>Prueba de modificar exitosa</h1>");
    break;

    case 3: //Prueba para eliminar en la base de datos
        $bo_Avion->delete($obj_Avion);
        echo("<h1>Prueba de eliminar exitosa</h1>");
    break;

    case 4: //Prueba para consultar en la base de datos
        $AvionConsultada = $bo_Avion->searchById($obj_Avion);
        echo("<h1>Prueba de consultar por ID exitosa exitosa</h1>");
        echo (json_encode($AvionConsultada));
    break;

    case 5: //Prueba para consultar todos en la base de datos
        $resutlado = $bo_Avion->getAll();
        echo("<h1>Prueba de consultar todos los registros exitosa</h1>");
        echo (json_encode($resutlado->GetArray()));
    break;

    default:
    break;
}

<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once ("../bo/Tipo_AvionBo.php");
require_once ("../domain/Tipo_Avion.php");

$obj_Tipo_Avion = new Tipo_Avion();
$obj_Tipo_Avion->setidTipo_Avion(10);
$obj_Tipo_Avion->setFecha(2004);
$obj_Tipo_Avion->setModelo("505");
$obj_Tipo_Avion->setMarca("hola");
$obj_Tipo_Avion->setFila(16);
$obj_Tipo_Avion->setAsiento_Fila(7);


$bo_Tipo_Avion = new Tipo_AvionBo();

$operacion = 1; //variable para pruebas

switch ($operacion) {
    case 1: //Prueba para guardar en la base de datos
        $bo_Tipo_Avion->add($obj_Tipo_Avion);
        echo("<h1>Prueba de agregar exitosa</h1>");
    break;

    case 2: //Prueba para modificar en la base de datos
        $bo_Tipo_Avion->update($obj_Tipo_Avion);
        echo("<h1>Prueba de modificar exitosa</h1>");
    break;

    case 3: //Prueba para eliminar en la base de datos
        $bo_Tipo_Avion->delete($obj_Tipo_Avion);
        echo("<h1>Prueba de eliminar exitosa</h1>");
    break;

    case 4: //Prueba para consultar en la base de datos
        $Tipo_AvionConsultada = $bo_Tipo_Avion->searchById($obj_Tipo_Avion);
        echo("<h1>Prueba de consultar por ID exitosa exitosa</h1>");
        echo (json_encode($Tipo_AvionConsultada));
    break;

    case 5: //Prueba para consultar todos en la base de datos
        $resutlado = $bo_Tipo_Avion->getAll();
        echo("<h1>Prueba de consultar todos los registros exitosa</h1>");
        echo (json_encode($resutlado->GetArray()));
    break;

    default:
    break;
}

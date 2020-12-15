<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once ("../bo/PersonaBo.php");
require_once ("../domain/Persona.php");
/*
$obj_Persona = new Personas();
$obj_Persona->setcliente(112540148);
$obj_Persona->setnombre("Esteba mod");
$obj_Persona->setApellido1("Garita");
$obj_Persona->setApellido2("Fonseca");
$obj_Persona->setSexo(1);
$obj_Persona->setObservaciones("Prueba");
$obj_Persona->setFecNacimiento("19850830");
$obj_Persona->setLastUser("chgari");
*/


$obj_Persona = new Persona();
$obj_Persona->setcliente(402480931);
$obj_Persona->setnombre("Esteban");
$obj_Persona->setcontrasena("Esteban");
$obj_Persona->setfecha_nacimiento("2020-05-08");
$obj_Persona->setapellido1("Murillo");
$obj_Persona->setapellido2("Chaves");
$obj_Persona->setcorreo("hbhhue@bbfe");
$obj_Persona->setdireccion("san jose");
$obj_Persona->settelefono1(678901074);
$obj_Persona->setsexo("f");


  

$bo_Persona = new PersonaBo();

$operacion = 1; //variable para pruebas

switch ($operacion) {
    case 1: //Prueba para guardar en la base de datos
        $bo_Persona->add($obj_Persona);
        echo("<h1>Prueba de agregar exitosa</h1>");
    break;

    case 2: //Prueba para modificar en la base de datos
        $bo_Persona->update($obj_Persona);
        echo("<h1>Prueba de modificar exitosa</h1>");
    break;

    case 3: //Prueba para eliminar en la base de datos
        $bo_Persona->delete($obj_Persona);
        echo("<h1>Prueba de eliminar exitosa</h1>");
    break;

    case 4: //Prueba para consultar en la base de datos
        $PersonaConsultada = $bo_Persona->searchById($obj_Persona);
        echo("<h1>Prueba de consultar por ID exitosa exitosa</h1>");
        echo (json_encode($PersonaConsultada));
    break;

    case 5: //Prueba para consultar todos en la base de datos
        $resutlado = $bo_Persona->getAll();
        echo("<h1>Prueba de consultar todos los registros exitosa</h1>");
        echo (json_encode($resutlado->GetArray()));
    break;

    default:
    break;
}

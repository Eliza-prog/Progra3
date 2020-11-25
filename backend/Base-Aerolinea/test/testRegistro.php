<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


require_once ("../bo/registrosBo.php");
require_once ("../domain/registros.php");

$obj_registro = new Registro();
$obj_registro->setIdRegistro(1);
$obj_registro->setNombre("Esteban");
$obj_registro->setApellido1("Murillo");
$obj_registro->setApellido2("Chaves");
$obj_registro->setNombreUsuario("estebanjm1");
$obj_registro->setContraseña("paco12345");
$obj_registro->setEmail("estebanjm1@hotmail.com");
$obj_registro->setFechaNaci("20001014");
  

$bo_registro = new registroBo();

$operacion = 1; //variable para pruebas

switch ($operacion) {
    case 1: //Prueba para guardar en la base de datos
        $bo_registro->add($obj_registro);
        echo("<h1>Prueba de agregar exitosa</h1>");
    break;

    case 2: //Prueba para modificar en la base de datos
        $bo_registro->update($obj_registro);
        echo("<h1>Prueba de modificar exitosa</h1>");
    break;

    case 3: //Prueba para eliminar en la base de datos
        $bo_registro->delete($obj_registro);
        echo("<h1>Prueba de eliminar exitosa</h1>");
    break;

    case 4: //Prueba para consultar en la base de datos
        $registroConsultada = $bo_registro->searchById($obj_registro);
        echo("<h1>Prueba de consultar por ID exitosa exitosa</h1>");
        echo (json_encode($registroConsultada));
    break;

    case 5: //Prueba para consultar todos en la base de datos
        $resutlado = $bo_registro->getAll();
        echo("<h1>Prueba de consultar todos los registros exitosa</h1>");
        echo (json_encode($resutlado->GetArray()));
    break;

    default:
    break;
}
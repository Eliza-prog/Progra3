<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


require_once ("../bo/RegistroBo.php");
require_once ("../domain/Registro.php");

$obj_Registro = new Registro();
$obj_Registro->setIdRegistro(1);
$obj_Registro->setNombreUsuario("estebanjm1");
$obj_Registro->setContraseña("paco12345");
$obj_Registro->setEmail("estebanjm1@hotmail.com");
$obj_Registro->setFechaRegistro(20/10/15);
$obj_Registro->setPersonas_PK_cedula(1234567);
  

$bo_Registro = new RegistroBo();

$operacion = 1; //variable para pruebas

switch ($operacion) {
    case 1: //Prueba para guardar en la base de datos
        $bo_Registro->add($obj_Registro);
        echo("<h1>Prueba de agregar exitosa</h1>");
    break;

    case 2: //Prueba para modificar en la base de datos
        $bo_Registro->update($obj_Registro);
        echo("<h1>Prueba de modificar exitosa</h1>");
    break;

    case 3: //Prueba para eliminar en la base de datos
        $bo_Registro->delete($obj_Registro);
        echo("<h1>Prueba de eliminar exitosa</h1>");
    break;

    case 4: //Prueba para consultar en la base de datos
        $RegistroConsultada = $bo_Registro->searchById($obj_Registro);
        echo("<h1>Prueba de consultar por ID exitosa exitosa</h1>");
        echo (json_encode($RegistroConsultada));
    break;

    case 5: //Prueba para consultar todos en la base de datos
        $resutlado = $bo_Registro->getAll();
        echo("<h1>Prueba de consultar todos los Registro exitosa</h1>");
        echo (json_encode($resutlado->GetArray()));
    break;

    default:
    break;
}
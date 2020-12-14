<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_name('LoginUsuario');
session_start();

if ((!isset($_SESSION["Usuario"])) && (!isset($_SESSION["tipo_usuario"]))) {
    echo ("El atributo proyecto_usuario no existe en sesion, por favor ejecutar el archivo php que la crea<br>");
} else {

    $arreglo = $_SESSION['Usuario'];
    $arreglo1 = $_SESSION['tipo_usuario']; // obtiene el dato de la sesión
    echo('Usuario iniciado: ');
    print_r($arreglo);



    if ($arreglo1 === "2") {
        echo(' Y tipo de acceso : Admin ');
        print_r($arreglo1);
    } else {
        echo('Y tipo de acceso : Standar ');
        print_r($arreglo1);
    }
}

echo("<br><br>Estado de la sesión :" . session_status());
echo("<br>ID de la sesión :" . session_id() );

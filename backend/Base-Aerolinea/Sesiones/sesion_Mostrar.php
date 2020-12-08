<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_name('Progra');
session_start();

if (!(isset($_SESSION["proyecto_usuario"])) && !(isset($_SESSION["proyecto_tipo_usuario"]))) {
    echo ("El atributo proyecto_usuario no existe en sesion, por favor ejecutar el archivo php que la crea<br>");
    $arreglo = $_SESSION['Progra_usuario'];
    $arreglo1 = $_SESSION['Progra_tipo_usuario']; // obtiene el dato de la sesión
    echo('Usuario iniciado: ');
    print_r($arreglo);
    echo('Y tipo de accesos : ');
    print_r($arreglo1);
    
}

echo("<br><br>Estado de la sesión :".session_status());
echo("<br>ID de la sesión :".session_id() );
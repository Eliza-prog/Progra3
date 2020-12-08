<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_name('Progra');
session_start();

if (!(isset($_SESSION['arregloValores']))) {
    echo ("El atributo arregloValores no existe en sesion, por favor ejecutar el archivo php que la crea<br>");
}else{
    echo ("El atributo arregloValores existe en sesion, se procede a eliminar el primer valor, si este existe<br><br>");
    $arreglo = $_SESSION['arregloValores']; // obtiene el dato de la sesión
    
    if(count($arreglo)>0){
        echo ("El  numero ".$arreglo[0]. " fue eliminado al arreglo de la sesion<br>");
        unset($arreglo[0]);
        $_SESSION['arregloValores'] = $arreglo; // regresa el dato de la sesión
    }
    
}

echo("<br>Estado de la sesión :".session_status());
echo("<br>ID de la sesión :".session_id() );
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_name('Progra');
session_start();
session_destroy();
$header = "http://localhost/Proyecto_AEROLINEA/public_html/Login.php";
$header("location:".$header);
echo("La sesión fue destruida correctamente");
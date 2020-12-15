<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_name('LoginCliente');
session_start();
session_destroy();
echo("La sesión fue destruida correctamente");
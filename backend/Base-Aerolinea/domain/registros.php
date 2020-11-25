<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once("baseDomain.php");


class Registro extends BaseDomain implements \JsonSerializable{

    //attributes
    private $idRegistro;
    private $Nombre;
    private $Apellido1;
    private $Apellido2;
    private $NombreUsuario;
    private $Contraseña;
    private $Email;
    private $fecNacimiento;
    private $FechaRegistro;

    //constructors
    public function __construct() {
        parent::__construct();
    }

    public static function createNullRegistro() {
        $instance = new self();
        return $instance;
    }

    public static function createRegistros($idRegistro, $Nombre, $Apellido1, $Apellido2, $NombreUsuario, $Contraseña, $Email,$fecNacimiento, $ultModificacion, $FechaRegistro) {
        $instance = new self();
        $instance->idRegistro       = $idRegistro;
        $instance->Nombre           = $Nombre;
        $instance->Apellido1        = $Apellido1;
        $instance->Apellido2        = $Apellido2;
        $instance->NombreUsuario    = $NombreUsuario;
        $instance->Contraseña       = $Contraseña;
        $instance->Email            = $Email;
        $instance->fecNacimiento        = $fecNacimiento;
        $instance->setFechaRegistro($ultModificacion);
        return $instance;
    }
    
    function getIdRegistro() {
        return $this->idRegistro;
    }

    function getNombre() {
        return $this->Nombre;
    }

    function getApellido1() {
        return $this->Apellido1;
    }

    function getApellido2() {
        return $this->Apellido2;
    }

    function getNombreUsuario() {
        return $this->NombreUsuario;
    }

    function getContraseña() {
        return $this->Contraseña;
    }

    function getEmail() {
        return $this->Email;
    }

    function getfecNacimiento() {
        return $this->fecNacimiento;
    }

    function getFechaRegistro() {
        return $this->FechaRegistro;
    }

    function setIdRegistro($idRegistro): void {
        $this->idRegistro = $idRegistro;
    }

    function setNombre($Nombre): void {
        $this->Nombre = $Nombre;
    }

    function setApellido1($Apellido1): void {
        $this->Apellido1 = $Apellido1;
    }

    function setApellido2($Apellido2): void {
        $this->Apellido2 = $Apellido2;
    }

    function setNombreUsuario($NombreUsuario): void {
        $this->NombreUsuario = $NombreUsuario;
    }

    function setContraseña($Contraseña): void {
        $this->Contraseña = $Contraseña;
    }

    function setEmail($Email): void {
        $this->Email = $Email;
    }

    function setfecNacimiento($fecNacimiento): void {
        $this->fecNacimiento = $fecNacimiento;
    }

    function setFechaRegistro($FechaRegistro): void {
        $this->FechaRegistro = $FechaRegistro;
    }
    
    
    
    
    public function jsonSerialize() {
        return get_object_vars($this);
    }

}


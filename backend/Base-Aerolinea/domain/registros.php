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
    private $NombreUsuario;
    private $Contraseña;
    private $Email;   
    private $FechaRegistro;
    private $Personas_PK_cedula;

    //constructors
    public function __construct() {
        parent::__construct();
    }

    public static function createNullRegistro() {
        $instance = new self();
        return $instance;
    }

    public static function createRegistro($idRegistro, $NombreUsuario, $Contraseña, $Email,$fecNacimiento, $FechaRegistro,$Personas_PK_cedula) {
        $instance = new self();
        $instance->idRegistro       = $idRegistro;
        $instance->NombreUsuario    = $NombreUsuario;
        $instance->Contraseña       = $Contraseña;
        $instance->Email            = $Email;
        $instance->FechaRegistro    =$FechaRegistro;
        $instance->Personas_PK_cedula    =$Personas_PK_cedula;
        return $instance;
    }
    
    function getIdRegistro() {
        return $this->idRegistro;
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

    function getFechaRegistro() {
        return $this->FechaRegistro;
    }
    function getPersonas_PK_cedula() {
        return $this->Personas_PK_cedula;
    }

    function setIdRegistro($idRegistro): void {
        $this->idRegistro = $idRegistro;
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

    function setFechaRegistro($FechaRegistro): void {
        $this->FechaRegistro = $FechaRegistro;
    }
    
    function setPersonas_PK_cedula($Personas_PK_cedula): void {
        $this->Personas_PK_cedula = $Personas_PK_cedula;
    }
 
    public function jsonSerialize() {
        return get_object_vars($this);
    }

}


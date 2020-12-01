<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once("baseDomain.php");


class Vuelo extends BaseDomain implements \JsonSerializable{

    //attributes
    private $idVuelo;
    private $Ruta_idRuta;
    private $Avion_idAvion;
    private $Costo;


    //constructors
    public function __construct() {
        parent::__construct();
    }

    public static function createNullVuelo() {
        $instance = new self();
        return $instance;
    }

    public static function createVuelo($idVuelo, $Ruta_idRuta, $Avion_idAvion, $Costo) {
        $instance = new self();
        $instance->idVuelo        = $idVuelo;
        $instance->Ruta_idRuta           = $Ruta_idRuta;
        $instance->Avion_idAvion        = $Avion_idAvion;
        $instance->Costo        = $Costo;
        return $instance;
    }
    
    function getIdVuelo() {
        return $this->idVuelo;
    }

    function getRuta_idRuta() {
        return $this->Ruta_idRuta;
    }

    function getAvion_idAvion() {
        return $this->Avion_idAvion;
    }

  
    function getCosto() {
        return $this->Costo;
    }

    function setIdVuelo($idVuelo): void {
        $this->idVuelo = $idVuelo;
    }

    function setRuta_idRuta($Ruta_idRuta): void {
        $this->Ruta_idRuta = $Ruta_idRuta;
    }

    function setAvion_idAvion($Avion_idAvion): void {
        $this->Avion_idAvion = $Avion_idAvion;
    }

    function setCosto($Costo): void {
        $this->Costo = $Costo;
    }
    
    
     public function jsonSerialize() {
        return get_object_vars($this);
    }

}
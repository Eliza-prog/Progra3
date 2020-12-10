<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once("baseDomain.php");


class Vuelo extends BaseDomain implements \JsonSerializable{

    //attributes
    private $id_Vuelo;
    private $Fecha_Hora;
    private $Ruta_idRuta;
    private $Tipo_Avion_idTipo_Aviones;


    //constructors
    public function __construct() {
        parent::__construct();
    }

    public static function createNullVuelo() {
        $instance = new self();
        return $instance;
    }

    public static function createVuelo($id_Vuelo, $Fecha_Hora, $Ruta_idRuta, $Tipo_Avion_idTipo_Aviones) {
        $instance = new self();
        $instance->id_Vuelo                         = $id_Vuelo;
        $instance->Fecha_Hora                       = $Fecha_Hora;
        $instance->Ruta_idRuta                      = $Ruta_idRuta;
        $instance->Tipo_Avion_idTipo_Aviones        = $Tipo_Avion_idTipo_Aviones;
        return $instance;
    }
    
    function getid_Vuelo() {
        return $this->id_Vuelo;
    }

    function getFecha_Hora() {
        return $this->Fecha_Hora;
    }

    function getRuta_idRuta() {
        return $this->Ruta_idRuta;
    }

  
    function getTipo_Avion_idTipo_Aviones() {
        return $this->Tipo_Avion_idTipo_Aviones;
    }

    function setid_Vuelo($id_Vuelo): void {
        $this->id_Vuelo = $id_Vuelo;
    }

    function setFecha_Hora($Fecha_Hora): void {
        $this->Fecha_Hora = $Fecha_Hora;
    }

    function setRuta_idRuta($Ruta_idRuta): void {
        $this->Ruta_idRuta = $Ruta_idRuta;
    }

    function setTipo_Avion_idTipo_Aviones($Tipo_Avion_idTipo_Aviones): void {
        $this->Tipo_Avion_idTipo_Aviones = $Tipo_Avion_idTipo_Aviones;
    }
    
    
     public function jsonSerialize() {
        return get_object_vars($this);
    }

}
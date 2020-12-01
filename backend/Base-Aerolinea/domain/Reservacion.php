<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once("baseDomain.php");

/**
 * @author ChGari
 * Date Last  modification: Tue Jul 07 16:42:51 CST 2020
 * Comment: It was created
 *
 */
class Reservacion extends BaseDomain implements \JsonSerializable{

    //attributes
    private $Persona_PK_cedula;
    private $Vuelo_idVuelo;
    private $Asiento;
    private $Destino_idDestino1;

    

    //constructors
    public function __construct() {
        parent::__construct();
    }

    public static function createNullReservacion() {
        $instance = new self();
        return $instance;
    }

    public static function createReservacion($Persona_PK_cedula, $Vuelo_idVuelo, $Asiento) {
        $instance = new self();
        $instance->Persona_PK_cedula        = $Persona_PK_cedula;
        $instance->Vuelo_idVuelo           = $Vuelo_idVuelo;
        $instance->Asiento        = $Asiento;
        

        return $instance;
    }

    /****************************************************************************/
    //properties
    /****************************************************************************/
    public function getPersona_PK_cedula() {
        return $this->Persona_PK_cedula;
    }

    public function setPersona_PK_cedula($Persona_PK_cedula) {
        $this->Persona_PK_cedula = $Persona_PK_cedula;
    }

    /****************************************************************************/

    public function getVuelo_idVuelo() {
        return $this->Vuelo_idVuelo;
    }

    public function setVuelo_idVuelo($Vuelo_idVuelo) {
        $this->Vuelo_idVuelo = $Vuelo_idVuelo;
    }

    /****************************************************************************/

    public function getAsiento() {
        return $this->Asiento;
    }

    public function setAsiento($Asiento) {
        $this->Asiento = $Asiento;
    }

    /****************************************************************************/

    /****************************************************************************/
    //Convertir el obj a JSON
    /****************************************************************************/
    

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}

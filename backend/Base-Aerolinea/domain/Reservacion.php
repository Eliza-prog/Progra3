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
    private $idReservacion;
    private $Numero_Fila;
    private $Numero_Asiento;
    private $Vuelo_id_Vuelo;
    private $Fecha_Reserva;
    private $Persona_Cliente1;




    //constructors
    public function __construct() {
        parent::__construct();
    }

    public static function createNullReservacion() {
        $instance = new self();
        return $instance;
    }

    public static function createReservacion($idReservacion, $Numero_Fila, $Numero_Asiento, $Vuelo_id_Vuelo, $Fecha_Reserva, $Persona_Cliente1) {
        $instance = new self();
        $instance->idReservacion         = $idReservacion;
        $instance->Numero_Fila           = $Numero_Fila;
        $instance->Numero_Asiento        = $Numero_Asiento;
        $instance->Vuelo_id_Vuelo        = $Vuelo_id_Vuelo;
        $instance->Fecha_Reserva         = $Fecha_Reserva;
        $instance->Persona_Cliente1      = $Persona_Cliente1;
        

        return $instance;
    }

    /****************************************************************************/
    //properties
    /****************************************************************************/
    public function getidReservacion() {
        return $this->idReservacion;
    }

    public function setidReservacion($idReservacion) {
        $this->idReservacion = $idReservacion;
    }

    /****************************************************************************/

    public function getNumero_Fila() {
        return $this->Numero_Fila;
    }

    public function setNumero_Fila($Numero_Fila) {
        $this->Numero_Fila = $Numero_Fila;
    }

    /****************************************************************************/

    public function getNumero_Asiento() {
        return $this->Numero_Asiento;
    }

    public function setNumero_Asiento($Numero_Asiento) {
        $this->Numero_Asiento = $Numero_Asiento;
    }
    
    public function getVuelo_id_Vuelo() {
        return $this->Vuelo_id_Vuelo;
    }

    public function setVuelo_id_Vuelo($Vuelo_id_Vuelo) {
        $this->Vuelo_id_Vuelo = $Vuelo_id_Vuelo;
    }
    
    public function getFecha_Reserva() {
        return $this->Fecha_Reserva;
    }

    public function setFecha_Reserva($Fecha_Reserva) {
        $this->Fecha_Reserva = $Fecha_Reserva;
    }
    
    public function getPersona_Cliente1() {
        return $this->Persona_Cliente1;
    }

    public function setPersona_Cliente1($Persona_Cliente1) {
        $this->Persona_Cliente1 = $Persona_Cliente1;
    }

    /****************************************************************************/

    /****************************************************************************/
    //Convertir el obj a JSON
    /****************************************************************************/
    public function jsonSerialize() {
        return get_object_vars($this);
    }

}

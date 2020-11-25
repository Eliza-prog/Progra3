<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once("baseDomain.php");


class Horario extends BaseDomain implements \JsonSerializable{

    //attributes
    private $idHorario;
    private $Descrip;
    private $Salida;
    private $Llegada;


    //constructors
    public function __construct() {
        parent::__construct();
    }

    public static function createNullHorario() {
        $instance = new self();
        return $instance;
    }

    public static function createHorario($idHorario, $Descrip, $Salida, $Llegada) {
        $instance = new self();
        $instance->idHorario        = $idHorario;
        $instance->Descrip           = $Descrip;
        $instance->Salida        = $Salida;
        $instance->Llegada        = $Llegada;
        return $instance;
    }
    
    function getIdHorario() {
        return $this->idHorario;
    }

    function getDescrip() {
        return $this->Descrip;
    }

    function getSalida() {
        return $this->Salida;
    }

    function getLlegada() {
        return $this->Llegada;
    }

    function setIdHorario($idHorario): void {
        $this->idHorario = $idHorario;
    }

    function setDescrip($Descrip): void {
        $this->Descrip = $Descrip;
    }

    function setSalida($Salida): void {
        $this->Salida = $Salida;
    }

    function setLlegada($Llegada): void {
        $this->Llegada = $Llegada;
    }
    
    
     public function jsonSerialize() {
        return get_object_vars($this);
    }

}
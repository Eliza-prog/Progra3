<?php

require_once("baseDomain.php");

class Persona extends BaseDomain implements \JsonSerializable{

    //attributes
    private $PK_cedula;
    private $nombre;

    //constructors
    public function __construct() {
        parent::__construct();
    }

    public static function createNullPersonas() {
        $instance = new self();
        return $instance;
    }

    public static function createPersona($PK_cedula, $nombre) {
        $instance = new self();
        $instance->PK_cedula        = $PK_cedula;
        $instance->nombre           = $nombre;
        return $instance;
    }

    /****************************************************************************/
    //properties
    /****************************************************************************/
    function getPK_cedula() {
        return $this->PK_cedula;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setPK_cedula($PK_cedula): void {
        $this->PK_cedula = $PK_cedula;
    }

    function setNombre($nombre): void {
        $this->nombre = $nombre;
    }

    /****************************************************************************/
    //Convertir el obj a JSON
    /****************************************************************************/
    

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}

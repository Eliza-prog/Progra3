<?php

require_once("baseDomain.php");

/**
 * @author ChGari
 * Date Last  modification: Tue Jul 07 16:42:51 CST 2020
 * Comment: It was created
 *
 */
class Tipo_Avion extends BaseDomain implements \JsonSerializable{

    //attributes
    private $idTipo_Avion;
    private $Fecha;
    private $Modelo;
    private $Marca;
    private $Fila;
    private $Asiento_Fila;
 
    

    //constructors
    public function __construct() {
        parent::__construct();
    }

    public static function createNullTipo_Avion() {
        $instance = new self();
        return $instance;
    }

    public static function createTipo_Avion($idTipo_Avion, $Fecha, $Modelo, $Marca, $Fila, $Asiento_Fila) {
        $instance = new self();
        $instance->idTipo_Avion        = $idTipo_Avion;
        $instance->Fecha         = $Fecha;
        $instance->Modelo      = $Modelo;
        $instance->Marca   = $Marca;
        $instance->Fila       = $Fila;
        $instance->Asiento_Fila       = $Asiento_Fila;
        
 
        return $instance;
    }

    /****************************************************************************/
    //properties
    /****************************************************************************/
    public function getidTipo_Avion() {
        return $this->idTipo_Avion;
    }

    public function setidTipo_Avion($idTipo_Avion) {
        $this->idTipo_Avion = $idTipo_Avion;
    }

    /****************************************************************************/

    public function getFecha() {
        return $this->Fecha;
    }

    public function setFecha($Fecha) {
        $this->Fecha = $Fecha;
    }

    /****************************************************************************/

    public function getModelo() {
        return $this->Modelo;
    }

    public function setModelo($Modelo) {
        $this->Modelo = $Modelo;
    }

    /****************************************************************************/

    public function getMarca() {
        return $this->Marca;
    }

    public function setMarca($Marca) {
        $this->Marca = $Marca;
    }

    /****************************************************************************/

    public function getFila() {
        return $this->Fila;
    }

    public function setFila($Fila) {
        $this->Fila = $Fila;
    }

    /****************************************************************************/

    public function getAsiento_Fila() {
        return $this->Asiento_Fila;
    }

    public function setAsiento_Fila($Asiento_Fila) {
        $this->Asiento_Fila = $Asiento_Fila;
    }

  
    /****************************************************************************/
    //Convertir el obj a JSON
    /****************************************************************************/
    

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}

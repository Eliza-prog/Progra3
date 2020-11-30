<?php

require_once("baseDomain.php");

/**
 * @author ChGari
 * Date Last  modification: Tue Jul 07 16:42:51 CST 2020
 * Comment: It was created
 *
 */
class Avion extends BaseDomain implements \JsonSerializable{

    //attributes
    private $idAvion;
    private $nombre;
    private $TipoAvion;
    private $PasajerosMax;
    private $CargaMax;
    private $cantidad;
 
    

    //constructors
    public function __construct() {
        parent::__construct();
    }

    public static function createNullAvion() {
        $instance = new self();
        return $instance;
    }

    public static function createAvion($idAvion, $nombre, $TipoAvion, $PasajerosMax, $CargaMax, $cantidad) {
        $instance = new self();
        $instance->idAvion        = $idAvion;
        $instance->nombre         = $nombre;
        $instance->TipoAvion      = $TipoAvion;
        $instance->PasajerosMax   = $PasajerosMax;
        $instance->CargaMax       = $CargaMax;
        $instance->cantidad       = $cantidad;
        
 
        return $instance;
    }

    /****************************************************************************/
    //properties
    /****************************************************************************/
    public function getidAvion() {
        return $this->idAvion;
    }

    public function setidAvion($idAvion) {
        $this->idAvion = $idAvion;
    }

    /****************************************************************************/

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    /****************************************************************************/

    public function getTipoAvion() {
        return $this->TipoAvion;
    }

    public function setTipoAvion($TipoAvion) {
        $this->TipoAvion = $TipoAvion;
    }

    /****************************************************************************/

    public function getPasajerosMax() {
        return $this->PasajerosMax;
    }

    public function setPasajerosMax($PasajerosMax) {
        $this->PasajerosMax = $PasajerosMax;
    }

    /****************************************************************************/

    public function getCargaMax() {
        return $this->CargaMax;
    }

    public function setCargaMax($CargaMax) {
        $this->CargaMax = $CargaMax;
    }

    /****************************************************************************/

    public function getcantidad() {
        return $this->cantidad;
    }

    public function setcantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

  
    /****************************************************************************/
    //Convertir el obj a JSON
    /****************************************************************************/
    

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}

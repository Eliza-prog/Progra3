<?php

require_once("baseDomain.php");

/**
 * @author ChGari
 * Date Last  modification: Tue Jul 07 16:42:51 CST 2020
 * Comment: It was created
 *
 */
class Ruta extends BaseDomain implements \JsonSerializable{

    //attributes
    private $idRuta;
    private $Horario_idHorario;
    private $Origen_idOrigen1;
    private $Destino_idDestino1;

    

    //constructors
    public function __construct() {
        parent::__construct();
    }

    public static function createNullRuta() {
        $instance = new self();
        return $instance;
    }

    public static function createRuta($idRuta, $Horario_idHorario, $Origen_idOrigen1, $Destino_idDestino1) {
        $instance = new self();
        $instance->idRuta        = $idRuta;
        $instance->Horario_idHorario           = $Horario_idHorario;
        $instance->Origen_idOrigen1        = $Origen_idOrigen1;
        $instance->Destino_idDestino1        = $Destino_idDestino1;

        return $instance;
    }

    /****************************************************************************/
    //properties
    /****************************************************************************/
    public function getidRuta() {
        return $this->idRuta;
    }

    public function setidRuta($idRuta) {
        $this->idRuta = $idRuta;
    }

    /****************************************************************************/

    public function getNombre() {
        return $this->Horario_idHorario;
    }

    public function setNombre($Horario_idHorario) {
        $this->Horario_idHorario = $Horario_idHorario;
    }

    /****************************************************************************/

    public function getOrigen_idOrigen1() {
        return $this->Origen_idOrigen1;
    }

    public function setOrigen_idOrigen1($Origen_idOrigen1) {
        $this->Origen_idOrigen1 = $Origen_idOrigen1;
    }

    /****************************************************************************/

    public function getDestino_idDestino1() {
        return $this->Destino_idDestino1;
    }

    public function setDestino_idDestino1($Destino_idDestino1) {
        $this->Destino_idDestino1 = $Destino_idDestino1;
    }

    /****************************************************************************/

    public function getUltUsuario() {
        return $this->ultUsuario;
    }

    public function setUltUsuario($ultUsuario) {
        $this->ultUsuario = $ultUsuario;
    }

    /****************************************************************************/
    //Convertir el obj a JSON
    /****************************************************************************/
    

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}
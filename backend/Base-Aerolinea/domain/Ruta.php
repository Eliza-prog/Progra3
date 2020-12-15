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
    private $Recorrido;
    private $Tiempo;
    private $Valor;

    

    //constructors
    public function __construct() {
        parent::__construct();
    }

    public static function createNullRuta() {
        $instance = new self();
        return $instance;
    }

    public static function createRuta($idRuta, $Recorrido, $Tiempo, $Valor) {
        $instance = new self();
        $instance->idRuta        = $idRuta;
        $instance->Recorrido           = $Recorrido;
        $instance->Tiempo        = $Tiempo;
        $instance->Valor        = $Valor;

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

    public function getRecorrido() {
        return $this->Recorrido;
    }

    public function setRecorrido($Recorrido) {
        $this->Recorrido = $Recorrido;
    }

    /****************************************************************************/

    public function getTiempo() {
        return $this->Tiempo;
    }

    public function setTiempo($Tiempo) {
        $this->Tiempo = $Tiempo;
    }

    /****************************************************************************/

    public function getValor() {
        return $this->Valor;
    }

    public function setValor($Valor) {
        $this->Valor = $Valor;
    }

    /****************************************************************************/


    /****************************************************************************/
    //Convertir el obj a JSON
    /****************************************************************************/
    

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}
<?php

/**
 * @author ChGari
 * Date Last  modification: Tue Jul 07 16:42:51 CST 2020
 * Comment: It was created
 *
 */
class BaseDomain {

    //attributes
    
    private $FechaRegistro;

    //constructors
    public function __construct() {
        
    }


    function getFechaRegistro() {
        return $this->FechaRegistro;
    }

    function setFechaRegistro($FechaRegistro): void {
        $this->FechaRegistro = $FechaRegistro;
    }

        /****************************************************************************/
    //Convertir el obj a JSON
    /****************************************************************************/
    

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}

//end of the class
?>
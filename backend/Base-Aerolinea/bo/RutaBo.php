<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once("../domain/Ruta.php");
require_once("../dao/RutaDao.php");

class RutaBo {

    private $RutaDao;

    public function __construct() {
        $this->RutaDao = new RutaDao();
    }

    public function getRutaDao() {
        return $this->RutaDao;
    }

    public function setRutaDao(RutaDao $RutaDao) {
        $this->RutaDao = $RutaDao;
    }


    public function add(Ruta $Ruta) {
        try {
            if (!$this->RutaDao->exist($Ruta)) {
                $this->RutaDao->add($Ruta);
            } else {
                throw new Exception("El Ruta ya existe en la base de datos!!");
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    
    public function update(Ruta $Ruta) {
        try {
            $this->RutaDao->update($Ruta);
        } catch (Exception $e) {
            throw $e;
        }
    }


    public function delete(Ruta $Ruta) {
        try {
            $this->RutaDao->delete($Ruta);
        } catch (Exception $e) {
            throw $e;
        }
    }



    public function searchById(Ruta $Ruta) {
        try {
            return $this->RutaDao->searchById($Ruta);
        } catch (Exception $e) {
            throw $e;
        }
    }



    public function getAll() {
        try {
            return $this->RutaDao->getAll();
        } catch (Exception $e) {
            throw $e;
        }
    }

}

//end of the class RutaBo
?>
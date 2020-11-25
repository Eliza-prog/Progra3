<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once("../domain/Vuelo.php");
require_once("../dao/VueloDao.php");


class VueloBo {

    private $VueloDao;

    public function __construct() {
        $this->VueloDao = new VueloDao();
    }

    public function getVueloDao() {
        return $this->VueloDao;
    }

    public function setVueloDao(VueloDao $VueloDao) {
        $this->VueloDao = $VueloDao;
    }

    //***********************************************************
    //agrega a una persona a la base de datos
    //***********************************************************

    public function add(Vuelo $Vuelo) {
        try {
            if (!$this->VueloDao->exist($Vuelo)) {
                $this->VueloDao->add($Vuelo);
            } else {
                throw new Exception("El Vuelo ya existe en la base de datos!!");
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //modifica a una persona a la base de datos
    //***********************************************************

    public function update(Vuelo $Vuelo) {
        try {
            $this->VueloDao->update($Vuelo);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //eliminar a una persona a la base de datos
    //***********************************************************

    public function delete(Vuelo $Vuelo) {
        try {
            $this->VueloDao->delete($Vuelo);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //consulta a una persona a la base de datos
    //***********************************************************

    public function searchById(Vuelo $Vuelo) {
        try {
            return $this->VueloDao->searchById($Vuelo);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //consultar todas las Vuelo de la base de datos
    //***********************************************************

    public function getAll() {
        try {
            return $this->VueloDao->getAll();
        } catch (Exception $e) {
            throw $e;
        }
    }

}

//end of the class VueloBo
?>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once("../domain/Registro.php");
require_once("../dao/RegistroDao.php");

class RegistroBo {

    private $RegistroDao;

    public function __construct() {
        $this->RegistroDao = new RegistroDao();
    }

    public function getRegistroDao() {
        return $this->RegistroDao;
    }

    public function setRegistroDao(RegistroDao $RegistroDao) {
        $this->RegistroDao = $RegistroDao;
    }



    public function add(Registro $Registro) {
        try {
            if (!$this->RegistroDao->exist($Registro)) {
                $this->RegistroDao->add($Registro);
            } else {
                throw new Exception("El Registro ya existe en la base de datos!!");
            }
        } catch (Exception $e) {
            throw $e;
        }
    }



    public function update(Registro $Registro) {
        try {
            $this->RegistroDao->update($Registro);
        } catch (Exception $e) {
            throw $e;
        }
    }



    public function delete(Registro $Registro) {
        try {
            $this->RegistroDao->delete($Registro);
        } catch (Exception $e) {
            throw $e;
        }
    }



    public function searchById(Registro $Registro) {
        try {
            return $this->RegistroDao->searchById($Registro);
        } catch (Exception $e) {
            throw $e;
        }
    }



    public function getAll() {
        try {
            return $this->RegistroDao->getAll();
        } catch (Exception $e) {
            throw $e;
        }
    }

}

//end of the class RegistroBo
?>

<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once("../domain/Reservacion.php");
require_once("../dao/ReservacionDao.php");

class ReservacionBo {

    private $ReservacionDao;

    public function __construct() {
        $this->ReservacionDao = new ReservacionDao();
    }

    public function getReservacionDao() {
        return $this->ReservacionDao;
    }

    public function setReservacionDao(ReservacionDao $ReservacionDao) {
        $this->ReservacionDao = $ReservacionDao;
    }


    public function add(Reservacion $Reservacion) {
        try {
            if (!$this->ReservacionDao->exist($Reservacion)) {
                $this->ReservacionDao->add($Reservacion);
            } else {
                throw new Exception("El Reservacion ya existe en la base de datos!!");
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    
    public function update(Reservacion $Reservacion) {
        try {
            $this->ReservacionDao->update($Reservacion);
        } catch (Exception $e) {
            throw $e;
        }
    }


    public function delete(Reservacion $Reservacion) {
        try {
            $this->ReservacionDao->delete($Reservacion);
        } catch (Exception $e) {
            throw $e;
        }
    }



    public function searchById(Reservacion $Reservacion) {
        try {
            return $this->ReservacionDao->searchById($Reservacion);
        } catch (Exception $e) {
            throw $e;
        }
    }



    public function getAll() {
        try {
            return $this->ReservacionDao->getAll();
        } catch (Exception $e) {
            throw $e;
        }
    }

}

//end of the class ReservacionBo
?>
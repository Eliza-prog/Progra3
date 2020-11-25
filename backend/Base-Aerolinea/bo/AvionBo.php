<?php


require_once("../domain/Avion.php");
require_once("../dao/AvionDao.php");

/**
 * @author ChGari
 * Date Last  modification: Tue Jul 07 16:42:51 CST 2020
 * Comment: It was created
 *
 */
class AvionBo {

    private $AvionDao;

    public function __construct() {
        $this->AvionDao = new AvionDao();
    }

    public function getAvionDao() {
        return $this->AvionDao;
    }

    public function setAvionDao(AvionDao $AvionDao) {
        $this->AvionDao = $AvionDao;
    }

    //***********************************************************
    //agrega a una persona a la base de datos
    //***********************************************************

    public function add(Avion $Avion) {
        try {
            if (!$this->AvionDao->exist($Avion)) {
                $this->AvionDao->add($Avion);
            } else {
                throw new Exception("El Avion ya existe en la base de datos!!");
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //modifica a una persona a la base de datos
    //***********************************************************

    public function update(Avion $Avion) {
        try {
            $this->AvionDao->update($Avion);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //eliminar a una persona a la base de datos
    //***********************************************************

    public function delete(Avion $Avion) {
        try {
            $this->AvionDao->delete($Avion);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //consulta a una persona a la base de datos
    //***********************************************************

    public function searchById(Avion $Avion) {
        try {
            return $this->AvionDao->searchById($Avion);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //consultar todas las Avion de la base de datos
    //***********************************************************

    public function getAll() {
        try {
            return $this->AvionDao->getAll();
        } catch (Exception $e) {
            throw $e;
        }
    }

}

//end of the class AvionBo
?>

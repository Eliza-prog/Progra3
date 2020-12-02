<?php


require_once("../domain/Prueba.php");
require_once("../dao/PruebaDao.php");

/**
 * @author ChGari
 * Date Last  modification: Tue Jul 07 16:42:51 CST 2020
 * Comment: It was created
 *
 */
class PruebaBo {

    private $PruebaDao;

    public function __construct() {
        $this->PruebaDao = new PruebaDao();
    }

    public function getPruebaDao() {
        return $this->PruebaDao;
    }

    public function setPruebaDao(PruebaDao $PruebaDao) {
        $this->PruebaDao = $PruebaDao;
    }

    //***********************************************************
    //agrega a una persona a la base de datos
    //***********************************************************

    public function add(Prueba $Prueba) {
        try {
            if (!$this->PruebaDao->exist($Prueba)) {
                $this->PruebaDao->add($Prueba);
            } else {
                throw new Exception("El Prueba ya existe en la base de datos!!");
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //modifica a una persona a la base de datos
    //***********************************************************

    public function update(Prueba $Prueba) {
        try {
            $this->PruebaDao->update($Prueba);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //eliminar a una persona a la base de datos
    //***********************************************************

    public function delete(Prueba $Prueba) {
        try {
            $this->PruebaDao->delete($Prueba);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //consulta a una persona a la base de datos
    //***********************************************************

    public function searchById(Prueba $Prueba) {
        try {
            return $this->PruebaDao->searchById($Prueba);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //consultar todas las Prueba de la base de datos
    //***********************************************************

    public function getAll() {
        try {
            return $this->PruebaDao->getAll();
        } catch (Exception $e) {
            throw $e;
        }
    }

}

//end of the class PruebaBo
?>
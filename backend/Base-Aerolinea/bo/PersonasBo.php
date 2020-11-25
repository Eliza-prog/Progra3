<?php


require_once("../domain/personas.php");
require_once("../dao/personasDao.php");

/**
 * @author ChGari
 * Date Last  modification: Tue Jul 07 16:42:51 CST 2020
 * Comment: It was created
 *
 */
class PersonasBo {

    private $PersonasDao;

    public function __construct() {
        $this->PersonasDao = new PersonasDao();
    }

    public function getPersonasDao() {
        return $this->PersonasDao;
    }

    public function setPersonasDao(PersonasDao $PersonasDao) {
        $this->PersonasDao = $PersonasDao;
    }

    //***********************************************************
    //agrega a una persona a la base de datos
    //***********************************************************

    public function add(Personas $Personas) {
        try {
            if (!$this->PersonasDao->exist($Personas)) {
                $this->PersonasDao->add($Personas);
            } else {
                throw new Exception("El Personas ya existe en la base de datos!!");
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //modifica a una persona a la base de datos
    //***********************************************************

    public function update(Personas $Personas) {
        try {
            $this->PersonasDao->update($Personas);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //eliminar a una persona a la base de datos
    //***********************************************************

    public function delete(Personas $Personas) {
        try {
            $this->PersonasDao->delete($Personas);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //consulta a una persona a la base de datos
    //***********************************************************

    public function searchById(Personas $Personas) {
        try {
            return $this->PersonasDao->searchById($Personas);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //consultar todas las Personas de la base de datos
    //***********************************************************

    public function getAll() {
        try {
            return $this->PersonasDao->getAll();
        } catch (Exception $e) {
            throw $e;
        }
    }

}

//end of the class PersonasBo
?>
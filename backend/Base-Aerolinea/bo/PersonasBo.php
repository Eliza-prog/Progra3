<?php


require_once("../domain/Persona.php");
require_once("../dao/PersonaDao.php");

/**
 * @author ChGari
 * Date Last  modification: Tue Jul 07 16:42:51 CST 2020
 * Comment: It was created
 *
 */
class PersonaBo {

    private $PersonaDao;

    public function __construct() {
        $this->PersonaDao = new PersonaDao();
    }

    public function getPersonaDao() {
        return $this->PersonaDao;
    }

    public function setPersonaDao(PersonaDao $PersonaDao) {
        $this->PersonaDao = $PersonaDao;
    }

    //***********************************************************
    //agrega a una persona a la base de datos
    //***********************************************************

    public function add(Persona $Persona) {
        try {
            if (!$this->PersonaDao->exist($Persona)) {
                $this->PersonaDao->add($Persona);
            } else {
                throw new Exception("El Persona ya existe en la base de datos!!");
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //modifica a una persona a la base de datos
    //***********************************************************

    public function update(Persona $Persona) {
        try {
            $this->PersonaDao->update($Persona);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //eliminar a una persona a la base de datos
    //***********************************************************

    public function delete(Persona $Persona) {
        try {
            $this->PersonaDao->delete($Persona);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //consulta a una persona a la base de datos
    //***********************************************************

    public function searchById(Persona $Persona) {
        try {
            return $this->PersonaDao->searchById($Persona);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //consultar todas las Persona de la base de datos
    //***********************************************************

    public function getAll() {
        try {
            return $this->PersonaDao->getAll();
        } catch (Exception $e) {
            throw $e;
        }
    }

}

//end of the class PersonaBo
?>
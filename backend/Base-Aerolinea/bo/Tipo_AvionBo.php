<?php


require_once("../domain/Tipo_Avion.php");
require_once("../dao/Tipo_AvionDao.php");

/**
 * @author ChGari
 * Date Last  modification: Tue Jul 07 16:42:51 CST 2020
 * Comment: It was created
 *
 */
class Tipo_AvionBo {

    private $Tipo_AvionDao;

    public function __construct() {
        $this->Tipo_AvionDao = new Tipo_AvionDao();
    }

    public function getTipo_AvionDao() {
        return $this->Tipo_AvionDao;
    }

    public function setTipo_AvionDao(Tipo_AvionDao $Tipo_AvionDao) {
        $this->Tipo_AvionDao = $Tipo_AvionDao;
    }

    //***********************************************************
    //agrega a una persona a la base de datos
    //***********************************************************

    public function add(Tipo_Avion $Tipo_Avion) {
        try {
            if (!$this->Tipo_AvionDao->exist($Tipo_Avion)) {
                $this->Tipo_AvionDao->add($Tipo_Avion);
            } else {
                throw new Exception("El Tipo_Avion ya existe en la base de datos!!");
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //modifica a una persona a la base de datos
    //***********************************************************

    public function update(Tipo_Avion $Tipo_Avion) {
        try {
            $this->Tipo_AvionDao->update($Tipo_Avion);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //eliminar a una persona a la base de datos
    //***********************************************************

    public function delete(Tipo_Avion $Tipo_Avion) {
        try {
            $this->Tipo_AvionDao->delete($Tipo_Avion);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //consulta a una persona a la base de datos
    //***********************************************************

    public function searchById(Tipo_Avion $Tipo_Avion) {
        try {
            return $this->Tipo_AvionDao->searchById($Tipo_Avion);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //consultar todas las Tipo_Avion de la base de datos
    //***********************************************************

    public function getAll() {
        try {
            return $this->Tipo_AvionDao->getAll();
        } catch (Exception $e) {
            throw $e;
        }
    }

}

//end of the class Tipo_AvionBo
?>


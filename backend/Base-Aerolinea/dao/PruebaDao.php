<?php

require_once("../../utlis/adodb5/adodb.inc.php");
require_once("../domain/Prueba.php");

/**
 * 
 * @author ChGari
 * Date Last  modification: Tue Jul 07 16:42:51 CST 2020
 * Comment: It was created
 *
 */

//this attribute enable to see the SQL's executed in the data base

class PersonaDao {
    private $labAdodb;

    public function __construct() {
        $driver = 'mysqli';
        $this->labAdodb = newAdoConnection($driver);
        $this->labAdodb->setCharset('utf8');
        //$this->labAdodb->setConnectionParameter('CharacterSet', 'WE8ISO8859P15');
        $this->labAdodb->Connect("localhost", "root","Bases1", "progra3");
        
        $this->labAdodb->debug=true;
    }

    //***********************************************************
    //agrega a una persona a la base de datos
    //***********************************************************

    public function add(Persona $Persona) {

        try {
            $sql = sprintf("insert into Persona (PK_cedula, nombre) 
                                          values (%s,%s)",
                    $this->labAdodb->Param("PK_cedula"),
                    $this->labAdodb->Param("nombre"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["PK_cedula"]       = $Persona->getPK_cedula();
            $valores["nombre"]          = $Persona->getNombre();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo insertar el registro (Error generado en el metodo add de la clase PersonaDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //verifica si una persona existe en la base de datos por ID
    //***********************************************************

    public function exist(Persona $Persona) {

        $exist = false;
        try {
            $sql = sprintf("select * from Persona where  PK_cedula = %s ",
                            $this->labAdodb->Param("PK_cedula"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["PK_cedula"] = $Persona->getPK_cedula();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            if ($resultSql->RecordCount() > 0) {
                $exist = true;
            }
            return $exist;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener el registro (Error generado en el metodo exist de la clase PersonaDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //modifica una persona en la base de datos
    //***********************************************************

    public function update(Persona $Persona) {

        try {
            $sql = sprintf("update Persona set nombre = %s, 
                            where PK_cedula = %s",
                    $this->labAdodb->Param("nombre"),
                    $this->labAdodb->Param("PK_cedula"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["nombre"]          = $Persona->getNombre();
            $valores["PK_cedula"]       = $Persona->getPK_cedula();
            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo actualizar el registro (Error generado en el metodo update de la clase PersonaDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //elimina una persona en la base de datos
    //***********************************************************

    public function delete(Persona $Persona) {

        try {
            $sql = sprintf("delete from Persona where  PK_cedula = %s",
                            $this->labAdodb->Param("PK_cedula"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["PK_cedula"] = $Persona->getPK_cedula();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo eliminar el registro (Error generado en el metodo delete de la clase PersonaDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //busca a una persona en la base de datos
    //***********************************************************

    public function searchById(Persona $Persona) {

        $returnPersona = null;
        try {
            $sql = sprintf("select * from Persona where  PK_cedula = %s",
                            $this->labAdodb->Param("PK_cedula"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["PK_cedula"] = $Persona->getPK_cedula();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            
            if ($resultSql->RecordCount() > 0) {
                $returnPersona = Persona::createNullPersona();
                $returnPersona->setPK_cedula($resultSql->Fields("PK_cedula"));
                $returnPersona->setNombre($resultSql->Fields("nombre"));
            }
        } catch (Exception $e) {
            throw new Exception('No se pudo consultar el registro (Error generado en el metodo searchById de la clase PersonaDao), error:'.$e->getMessage());
        }
        return $returnPersona;
    }

    //***********************************************************
    //obtiene la información de las Persona en la base de datos
    //***********************************************************
    
    public function getAll() {

        try {
            $sql = sprintf("select * from Persona");
            $resultSql = $this->labAdodb->Execute($sql);
            return $resultSql;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAll de la clase PersonaDao), error:'.$e->getMessage());
        }
    }

}

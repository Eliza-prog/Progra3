<?php

require_once("../../utlis/adodb5/adodb.inc.php");
require_once("../domain/registros.php");

/**
 * 
 * @author ChGari
 * Date Last  modification: Tue Jul 07 16:42:51 CST 2020
 * Comment: It was created
 *
 */

//this attribute enable to see the SQL's executed in the data base

class registrosDao {
    private $labAdodb;

    public function __construct() {
        $driver = 'mysqli';
        $this->labAdodb = newAdoConnection($driver);
        $this->labAdodb->setCharset('utf8');
        //$this->labAdodb->setConnectionParameter('CharacterSet', 'WE8ISO8859P15');
        $this->labAdodb->Connect("localhost", "root","root", "mydb");
        
        $this->labAdodb->debug=true;
    }

    //***********************************************************
    //agrega a una persona a la base de datos
    //***********************************************************

    public function add(registros $registros) {

        try {
            $sql = sprintf("insert into registros (idRegistro,NombreUsuario, Contraseña,Email,FechaRegistro,Personas_PK_cedula) 
                                          values (%s,%s,%s,%s,%s,%s,%s,%s,CURDATE())",
                    $this->labAdodb->Param("idRegistro"),
                    $this->labAdodb->Param("NombreUsuario"),
                    $this->labAdodb->Param("Contraseña"),
                    $this->labAdodb->Param("Email"),
                    $this->labAdodb->Param("FechaRegistro"),
                    $this->labAdodb->Param("Personas_PK_cedula"));
     
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["idRegistro"]       = $registros->getidRegistro();
            $valores["NombreUsuario"]   = $registros->getNombreUsuario();
            $valores["Contraseña"]            = $registros->getContraseña();
            $valores["Email"]            = $registros->getEmail();
            $valores["FechaRegistro"]            = $registros->getFechaRegistro();
            $valores["Personas_PK_cedula"]            = $registros->getPersonas_PK_cedula();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo insertar el registro (Error generado en el metodo add de la clase registrosDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //verifica si una persona existe en la base de datos por ID
    //***********************************************************

    public function exist(registros $registros) {

        $exist = false;
        try {
            $sql = sprintf("select * from registros where  idRegistro = %s ",
                            $this->labAdodb->Param("idRegistro"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["idRegistro"] = $registros->getidRegistro();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            if ($resultSql->RecordCount() > 0) {
                $exist = true;
            }
            return $exist;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener el registro (Error generado en el metodo exist de la clase registrosDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //modifica una persona en la base de datos
    //***********************************************************

    public function update(registros $registros) {

        try {
            $sql = sprintf("update registros set  
                                                NombreUsuario = %s, 
                                                Contraseña = %s, 
                                                Email = %s,
                                                FechaRegistro = %s,
                                                Personas_PK_cedula,
                                               
                            where idRegistro = %s",
                    $this->labAdodb->Param("NombreUsuario"),
                    $this->labAdodb->Param("Contraseña"),
                    $this->labAdodb->Param("Email"),
                    $this->labAdodb->Param("FechaRegistro"),
                    $this->labAdodb->Param("Personas_PK_cedula"),
                    $this->labAdodb->Param("idRegistro"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["NombreUsuario"]   = $registros->getNombreUsuario();
            $valores["Contraseña"]            = $registros->getContraseña();
            $valores["Email"]   = $registros->getEmail();
            $valores["FechaRegistro"]        = $registros->getFechaRegistro();
            $valores["Personas_PK_cedula"]       = $registros->getPersonas_PK_cedula();
            $valores["idRegistro"]       = $registros->getidRegistro();
            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo actualizar el registro (Error generado en el metodo update de la clase registrosDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //elimina una persona en la base de datos
    //***********************************************************

    public function delete(registros $registros) {

        try {
            $sql = sprintf("delete from registros where  idRegistro = %s",
                            $this->labAdodb->Param("idRegistro"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["idRegistro"] = $registros->getidRegistro();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo eliminar el registro (Error generado en el metodo delete de la clase registrosDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //busca a una persona en la base de datos
    //***********************************************************

    public function searchById(registros $registros) {

        $returnregistros = null;
        try {
            $sql = sprintf("select * from registros where  idRegistro = %s",
                            $this->labAdodb->Param("idRegistro"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["idRegistro"] = $registros->getidRegistro();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            
            if ($resultSql->RecordCount() > 0) {
                $returnregistros = registros::createNullregistros();
                $returnregistros->setidRegistro($resultSql->Fields("idRegistro"));
                $returnregistros->setNombreUsuario($resultSql->Fields("NombreUsuario"));
                $returnregistros->setContraseña($resultSql->Fields("Contraseña"));
                $returnregistros->setobservaciones($resultSql->Fields("Email"));
                $returnregistros->setNombreUsuario($resultSql->Fields("FechaRegistro"));
                $returnregistros->setNombreUsuario($resultSql->Fields("Personas_PK_cedula"));
            }
        } catch (Exception $e) {
            throw new Exception('No se pudo consultar el registro (Error generado en el metodo searchById de la clase registrosDao), error:'.$e->getMessage());
        }
        return $returnregistros;
    }

    //***********************************************************
    //obtiene la información de las registros en la base de datos
    //***********************************************************
    
    public function getAll() {

        try {
            $sql = sprintf("select * from registros");
            $resultSql = $this->labAdodb->Execute($sql);
            return $resultSql;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAll de la clase registrosDao), error:'.$e->getMessage());
        }
    }

}
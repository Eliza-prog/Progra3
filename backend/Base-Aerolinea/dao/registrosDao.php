<?php

require_once("../../utlis/adodb5/adodb.inc.php");
require_once("../domain/Registro.php");

/**
 * 
 * @author ChGari
 * Date Last  modification: Tue Jul 07 16:42:51 CST 2020
 * Comment: It was created
 *
 */

//this attribute enable to see the SQL's executed in the data base

class RegistroDao {
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

    public function add(Registro $Registro) {

        try {
            $sql = sprintf("insert into Registro (idRegistro,NombreUsuario, Contraseña,Email,FechaRegistro,Personas_PK_cedula) 
                                          values (%s,%s,%s,%s,%s,%s,%s,%s,CURDATE())",
                    $this->labAdodb->Param("idRegistro"),
                    $this->labAdodb->Param("NombreUsuario"),
                    $this->labAdodb->Param("Contraseña"),
                    $this->labAdodb->Param("Email"),
                    $this->labAdodb->Param("FechaRegistro"),
                    $this->labAdodb->Param("Personas_PK_cedula"));
     
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["idRegistro"]       = $Registro->getidRegistro();
            $valores["NombreUsuario"]   = $Registro->getNombreUsuario();
            $valores["Contraseña"]            = $Registro->getContraseña();
            $valores["Email"]            = $Registro->getEmail();
            $valores["FechaRegistro"]            = $Registro->getFechaRegistro();
            $valores["Personas_PK_cedula"]            = $Registro->getPersonas_PK_cedula();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo insertar el registro (Error generado en el metodo add de la clase RegistroDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //verifica si una persona existe en la base de datos por ID
    //***********************************************************

    public function exist(Registro $Registro) {

        $exist = false;
        try {
            $sql = sprintf("select * from Registro where  idRegistro = %s ",
                            $this->labAdodb->Param("idRegistro"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["idRegistro"] = $Registro->getidRegistro();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            if ($resultSql->RecordCount() > 0) {
                $exist = true;
            }
            return $exist;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener el registro (Error generado en el metodo exist de la clase RegistroDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //modifica una persona en la base de datos
    //***********************************************************

    public function update(Registro $Registro) {

        try {
            $sql = sprintf("update Registro set  
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

            $valores["NombreUsuario"]   = $Registro->getNombreUsuario();
            $valores["Contraseña"]            = $Registro->getContraseña();
            $valores["Email"]   = $Registro->getEmail();
            $valores["FechaRegistro"]        = $Registro->getFechaRegistro();
            $valores["Personas_PK_cedula"]       = $Registro->getPersonas_PK_cedula();
            $valores["idRegistro"]       = $Registro->getidRegistro();
            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo actualizar el registro (Error generado en el metodo update de la clase RegistroDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //elimina una persona en la base de datos
    //***********************************************************

    public function delete(Registro $Registro) {

        try {
            $sql = sprintf("delete from Registro where  idRegistro = %s",
                            $this->labAdodb->Param("idRegistro"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["idRegistro"] = $Registro->getidRegistro();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo eliminar el registro (Error generado en el metodo delete de la clase RegistroDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //busca a una persona en la base de datos
    //***********************************************************

    public function searchById(Registro $Registro) {

        $returnRegistro = null;
        try {
            $sql = sprintf("select * from Registro where  idRegistro = %s",
                            $this->labAdodb->Param("idRegistro"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["idRegistro"] = $Registro->getidRegistro();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            
            if ($resultSql->RecordCount() > 0) {
                $returnRegistro = Registro::createNullRegistro();
                $returnRegistro->setidRegistro($resultSql->Fields("idRegistro"));
                $returnRegistro->setNombreUsuario($resultSql->Fields("NombreUsuario"));
                $returnRegistro->setContraseña($resultSql->Fields("Contraseña"));
                $returnRegistro->setobservaciones($resultSql->Fields("Email"));
                $returnRegistro->setNombreUsuario($resultSql->Fields("FechaRegistro"));
                $returnRegistro->setNombreUsuario($resultSql->Fields("Personas_PK_cedula"));
            }
        } catch (Exception $e) {
            throw new Exception('No se pudo consultar el registro (Error generado en el metodo searchById de la clase RegistroDao), error:'.$e->getMessage());
        }
        return $returnRegistro;
    }

    //***********************************************************
    //obtiene la información de las Registro en la base de datos
    //***********************************************************
    
    public function getAll() {

        try {
            $sql = sprintf("select * from Registro");
            $resultSql = $this->labAdodb->Execute($sql);
            return $resultSql;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los Registro (Error generado en el metodo getAll de la clase RegistroDao), error:'.$e->getMessage());
        }
    }

}
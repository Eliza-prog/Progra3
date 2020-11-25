<?php

require_once("../../utlis/adodb5/adodb.inc.php");
require_once("../domain/Vuelo.php");

/**
 * 
 * @author ChGari
 * Date Last  modification: Tue Jul 07 16:42:51 CST 2020
 * Comment: It was created
 *
 */

//this attribute enable to see the SQL's executed in the data base

class VueloDao {
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

    public function add(Vuelo $Vuelo) {

        try {
            $sql = sprintf("insert into Vuelo (idVuelo, Tipo, Ruta_idRuta, Costo, observaciones, LASTUSER, LASTMODIFICATION) 
                                          values (%s,%s,%s,%s,%s,%s,%s,%s,CURDATE())",
                    $this->labAdodb->Param("idVuelo"),
                    $this->labAdodb->Param("Tipo"),
                    $this->labAdodb->Param("Ruta_idRuta"),
                    $this->labAdodb->Param("Costo"),
                    $this->labAdodb->Param("observaciones"),
                    $this->labAdodb->Param("LASTUSER"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["idVuelo"]       = $Vuelo->getidVuelo();
            $valores["Tipo"]          = $Vuelo->getTipo();
            $valores["Ruta_idRuta"]       = $Vuelo->getRuta_idRuta();
            $valores["Costo"]       = $Vuelo->getCosto();
            $valores["observaciones"]   = $Vuelo->getobservaciones();
            $valores["LASTUSER"]        = $Vuelo->getLastUser();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo insertar el registro (Error generado en el metodo add de la clase VueloDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //verifica si una persona existe en la base de datos por ID
    //***********************************************************

    public function exist(Vuelo $Vuelo) {

        $exist = false;
        try {
            $sql = sprintf("select * from Vuelo where  idVuelo = %s ",
                            $this->labAdodb->Param("idVuelo"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["idVuelo"] = $Vuelo->getidVuelo();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            if ($resultSql->RecordCount() > 0) {
                $exist = true;
            }
            return $exist;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener el registro (Error generado en el metodo exist de la clase VueloDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //modifica una persona en la base de datos
    //***********************************************************

    public function update(Vuelo $Vuelo) {

        try {
            $sql = sprintf("update Vuelo set Tipo = %s, 
                                                Ruta_idRuta = %s, 
                                                Costo = %s, 
                                                observaciones = %s, 
                                                LASTUSER = %s, 
                                                LASTMODIFICATION = CURDATE() 
                            where idVuelo = %s",
                    $this->labAdodb->Param("Tipo"),
                    $this->labAdodb->Param("Ruta_idRuta"),
                    $this->labAdodb->Param("Costo"),
                    $this->labAdodb->Param("observaciones"),
                    $this->labAdodb->Param("LASTUSER"),
                    $this->labAdodb->Param("idVuelo"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["Tipo"]          = $Vuelo->getTipo();
            $valores["Ruta_idRuta"]       = $Vuelo->getRuta_idRuta();
            $valores["Costo"]       = $Vuelo->getCosto();
            $valores["observaciones"]   = $Vuelo->getobservaciones();
            $valores["LASTUSER"]        = $Vuelo->getLastUser();
            $valores["idVuelo"]       = $Vuelo->getidVuelo();
            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo actualizar el registro (Error generado en el metodo update de la clase VueloDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //elimina una persona en la base de datos
    //***********************************************************

    public function delete(Vuelo $Vuelo) {

        try {
            $sql = sprintf("delete from Vuelo where  idVuelo = %s",
                            $this->labAdodb->Param("idVuelo"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["idVuelo"] = $Vuelo->getidVuelo();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo eliminar el registro (Error generado en el metodo delete de la clase VueloDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //busca a una persona en la base de datos
    //***********************************************************

    public function searchById(Vuelo $Vuelo) {

        $returnVuelo = null;
        try {
            $sql = sprintf("select * from Vuelo where  idVuelo = %s",
                            $this->labAdodb->Param("idVuelo"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["idVuelo"] = $Vuelo->getidVuelo();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            
            if ($resultSql->RecordCount() > 0) {
                $returnVuelo = Vuelo::createNullVuelo();
                $returnVuelo->setidVuelo($resultSql->Fields("idVuelo"));
                $returnVuelo->setTipo($resultSql->Fields("Tipo"));
                $returnVuelo->setRuta_idRuta($resultSql->Fields("Ruta_idRuta"));
                $returnVuelo->setCosto($resultSql->Fields("Costo"));
                $returnVuelo->setobservaciones($resultSql->Fields("observaciones"));
            }
        } catch (Exception $e) {
            throw new Exception('No se pudo consultar el registro (Error generado en el metodo searchById de la clase VueloDao), error:'.$e->getMessage());
        }
        return $returnVuelo;
    }

    //***********************************************************
    //obtiene la información de las Vuelo en la base de datos
    //***********************************************************
    
    public function getAll() {

        try {
            $sql = sprintf("select * from Vuelo");
            $resultSql = $this->labAdodb->Execute($sql);
            return $resultSql;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAll de la clase VueloDao), error:'.$e->getMessage());
        }
    }

}
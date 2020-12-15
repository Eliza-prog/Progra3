<?php

require_once("../../utlis/adodb5/adodb.inc.php");
require_once("../domain/Ruta.php");

/**
 * 
 * @author ChGari
 * Date Last  modification: Tue Jul 07 16:42:51 CST 2020
 * Comment: It was created
 *
 */

//this attribute enable to see the SQL's executed in the data base

class RutaDao {
    private $labAdodb;

    public function __construct() {
        $driver = 'mysqli';
        $this->labAdodb = newAdoConnection($driver);
        $this->labAdodb->setCharset('utf8');
        //$this->labAdodb->setConnectionParameter('CharacterSet', 'WE8ISO8859P15');
        $this->labAdodb->Connect("localhost", "root","root", "progra3");
        
        $this->labAdodb->debug=true;
    }

    //***********************************************************
    //agrega a una persona a la base de datos
    //***********************************************************

    public function add(Ruta $Ruta) {

        try {
            $sql = sprintf("insert into Ruta (idRuta, Recorrido, Tiempo, Valor) 
                                          values (%s,%s,%s,%s)",
                    $this->labAdodb->Param("idRuta"),
                    $this->labAdodb->Param("Recorrido"),
                    $this->labAdodb->Param("Tiempo"),
                    $this->labAdodb->Param("Valor"));

            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["idRuta"]       = $Ruta->getidRuta();
            $valores["Recorrido"]          = $Ruta->getRecorrido();
            $valores["Tiempo"]       = $Ruta->getTiempo();
            $valores["Valor"]       = $Ruta->getValor();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo insertar el registro (Error generado en el metodo add de la clase RutaDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //verifica si una persona existe en la base de datos por ID
    //***********************************************************

    public function exist(Ruta $Ruta) {

        $exist = false;
        try {
            $sql = sprintf("select * from Ruta where  idRuta = %s ",
                            $this->labAdodb->Param("idRuta"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["idRuta"] = $Ruta->getidRuta();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            if ($resultSql->RecordCount() > 0) {
                $exist = true;
            }
            return $exist;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener el registro (Error generado en el metodo exist de la clase RutaDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //modifica una persona en la base de datos
    //***********************************************************

    public function update(Ruta $Ruta) {

        try {
            $sql = sprintf("update Ruta set Recorrido = %s, 
                                                Tiempo = %s, 
                                                Valor = %s    
                                                
                            where idRuta = %s",
                    $this->labAdodb->Param("Recorrido"),
                    $this->labAdodb->Param("Tiempo"),
                    $this->labAdodb->Param("Valor"),
                    $this->labAdodb->Param("idRuta"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["Recorrido"]          = $Ruta->getRecorrido();
            $valores["Tiempo"]       = $Ruta->getTiempo();
            $valores["Valor"]       = $Ruta->getValor();
            $valores["idRuta"]       = $Ruta->getidRuta();
            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo actualizar el registro (Error generado en el metodo update de la clase RutaDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //elimina una persona en la base de datos
    //***********************************************************

    public function delete(Ruta $Ruta) {

        try {
            $sql = sprintf("delete from Ruta where  idRuta = %s",
                            $this->labAdodb->Param("idRuta"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["idRuta"] = $Ruta->getidRuta();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo eliminar el registro (Error generado en el metodo delete de la clase RutaDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //busca a una persona en la base de datos
    //***********************************************************

    public function searchById(Ruta $Ruta) {

        $returnRuta = null;
        try {
            $sql = sprintf("select * from Ruta where  idRuta = %s",
                            $this->labAdodb->Param("idRuta"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["idRuta"] = $Ruta->getidRuta();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            
            if ($resultSql->RecordCount() > 0) {
                $returnRuta = Ruta::createNullRuta();
                $returnRuta->setidRuta($resultSql->Fields("idRuta"));
                $returnRuta->setRecorrido($resultSql->Fields("Recorrido"));
                $returnRuta->setTiempo($resultSql->Fields("Tiempo"));
                $returnRuta->setValor($resultSql->Fields("Valor"));

            }
        } catch (Exception $e) {
            throw new Exception('No se pudo consultar el registro (Error generado en el metodo searchById de la clase RutaDao), error:'.$e->getMessage());
        }
        return $returnRuta;
    }

    //***********************************************************
    //obtiene la información de las Ruta en la base de datos
    //***********************************************************
    
    public function getAll() {

        try {
            $sql = sprintf("select * from Ruta");
            $resultSql = $this->labAdodb->Execute($sql);
            return $resultSql;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAll de la clase RutaDao), error:'.$e->getMessage());
        }
    }

}


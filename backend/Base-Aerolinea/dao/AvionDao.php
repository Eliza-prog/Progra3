<?php

require_once("../../utlis/adodb5/adodb.inc.php");
require_once("../domain/Avion.php");

/**
 * 
 * @author ChGari
 * Date Last  modification: Tue Jul 07 16:42:51 CST 2020
 * Comment: It was created
 *
 */

//this attribute enable to see the SQL's executed in the data base

class AvionDao {
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

    public function add(Avion $Avion) {

        try {
            $sql = sprintf("insert into Avion (idAvion, Fecha, Modelo, Marca, Fila, Asiento_Fila) 
                                          values (%s,%s,%s,%s,%s,%s)",
                    $this->labAdodb->Param("idAvion"),
                    $this->labAdodb->Param("Fecha"),
                    $this->labAdodb->Param("Modelo"),
                    $this->labAdodb->Param("Marca"),
                    $this->labAdodb->Param("Fila"),
                    $this->labAdodb->Param("Asiento_Fila"));       
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["idAvion"]   = $Avion->getidAvion();
            $valores["Fecha"]          = $Avion->getFecha();
            $valores["Modelo"]         = $Avion->getModelo();
            $valores["Marca"]          = $Avion->getMarca();
            $valores["Fila"]           = $Avion->getFila();
            $valores["Asiento_Fila"]   = $Avion->getAsiento_Fila();

            

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo insertar el registro (Error generado en el metodo add de la clase AvionDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //verifica si una persona existe en la base de datos por ID
    //***********************************************************

    public function exist(Avion $Avion) {

        $exist = false;
        try {
            $sql = sprintf("select * from Avion where  idAvion = %s ",
                            $this->labAdodb->Param("idAvion"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["idAvion"] = $Avion->getidAvion();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            if ($resultSql->RecordCount() > 0) {
                $exist = true;
            }
            return $exist;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener el registro (Error generado en el metodo exist de la clase AvionDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //modifica una persona en la base de datos
    //***********************************************************

    public function update(Avion $Avion) {

        try {
            $sql = sprintf("update Avion set Fecha = %s, 
                                                Modelo = %s, 
                                                Marca = %s, 
                                                Fila = %s, 
                                                Asiento_Fila = %s
                                                
                            where idAvion = %s",
                    $this->labAdodb->Param("Fecha"),
                    $this->labAdodb->Param("Modelo"),
                    $this->labAdodb->Param("Marca"),
                    $this->labAdodb->Param("Fila"),
                    $this->labAdodb->Param("Asiento_Fila"),                   
                    $this->labAdodb->Param("idAvion"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["Fecha"]          = $Avion->getFecha();
            $valores["Modelo"]       = $Avion->getModelo();
            $valores["Marca"]       = $Avion->getMarca();
            $valores["Fila"]   = $Avion->getFila();
            $valores["Asiento_Fila"]            = $Avion->getAsiento_Fila();
            
            
            $valores["idAvion"]       = $Avion->getidAvion();
            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo actualizar el registro (Error generado en el metodo update de la clase AvionDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //elimina una persona en la base de datos
    //***********************************************************

    public function delete(Avion $Avion) {

        try {
            $sql = sprintf("delete from Avion where  idAvion = %s",
                            $this->labAdodb->Param("idAvion"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["idAvion"] = $Avion->getidAvion();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo eliminar el registro (Error generado en el metodo delete de la clase AvionDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //busca a una persona en la base de datos
    //***********************************************************

    public function searchById(Avion $Avion) {

        $returnAvion = null;
        try {
            $sql = sprintf("select * from Avion where  idAvion = %s",
                            $this->labAdodb->Param("idAvion"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["idAvion"] = $Avion->getidAvion();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            
            if ($resultSql->RecordCount() > 0) {
                $returnAvion = Avion::createNullAvion();
                $returnAvion->setidAvion($resultSql->Fields("idAvion"));
                $returnAvion->setFecha($resultSql->Fields("Fecha"));
                $returnAvion->setModelo($resultSql->Fields("Modelo"));
                $returnAvion->setMarca($resultSql->Fields("Marca"));
                $returnAvion->setFila($resultSql->Fields("Fila"));
                $returnAvion->setAsiento_Fila($resultSql->Fields("Asiento_Fila"));
            
          
            }
        } catch (Exception $e) {
            throw new Exception('No se pudo consultar el registro (Error generado en el metodo searchById de la clase AvionDao), error:'.$e->getMessage());
        }
        return $returnAvion;
    }

    //***********************************************************
    //obtiene la información de las Avion en la base de datos
    //***********************************************************
    
    public function getAll() {

        try {
            $sql = sprintf("select * from Avion");
            $resultSql = $this->labAdodb->Execute($sql);
            return $resultSql;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAll de la clase AvionDao), error:'.$e->getMessage());
        }
    }

}
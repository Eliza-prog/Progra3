<?php

require_once("../../utlis/adodb5/adodb.inc.php");
require_once("../domain/Tipo_Avion.php");

/**
 * 
 * @author ChGari
 * Date Last  modification: Tue Jul 07 16:42:51 CST 2020
 * Comment: It was created
 *
 */

//this attribute enable to see the SQL's executed in the data base

class Tipo_AvionDao {
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

    public function add(Tipo_Avion $Tipo_Avion) {

        try {
            $sql = sprintf("insert into Tipo_Avion (idTipo_Avion, Fecha, Modelo, Marca, Fila, Asiento_Fila) 
                                          values (%s,%s,%s,%s,%s,%s)",
                    $this->labAdodb->Param("idTipo_Avion"),
                    $this->labAdodb->Param("Fecha"),
                    $this->labAdodb->Param("Modelo"),
                    $this->labAdodb->Param("Marca"),
                    $this->labAdodb->Param("Fila"),
                    $this->labAdodb->Param("Asiento_Fila"));       
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["idTipo_Avion"]   = $Tipo_Avion->getidTipo_Avion();
            $valores["Fecha"]          = $Tipo_Avion->getFecha();
            $valores["Modelo"]         = $Tipo_Avion->getModelo();
            $valores["Marca"]          = $Tipo_Avion->getMarca();
            $valores["Fila"]           = $Tipo_Avion->getFila();
            $valores["Asiento_Fila"]   = $Tipo_Avion->getAsiento_Fila();

            

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo insertar el registro (Error generado en el metodo add de la clase Tipo_AvionDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //verifica si una persona existe en la base de datos por ID
    //***********************************************************

    public function exist(Tipo_Avion $Tipo_Avion) {

        $exist = false;
        try {
            $sql = sprintf("select * from Tipo_Avion where  idTipo_Avion = %s ",
                            $this->labAdodb->Param("idTipo_Avion"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["idTipo_Avion"] = $Tipo_Avion->getidTipo_Avion();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            if ($resultSql->RecordCount() > 0) {
                $exist = true;
            }
            return $exist;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener el registro (Error generado en el metodo exist de la clase Tipo_AvionDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //modifica una persona en la base de datos
    //***********************************************************

    public function update(Tipo_Avion $Tipo_Avion) {

        try {
            $sql = sprintf("update Tipo_Avion set Fecha = %s, 
                                                Modelo = %s, 
                                                Marca = %s, 
                                                Fila = %s, 
                                                Asiento_Fila = %s
                                                
                            where idTipo_Avion = %s",
                    $this->labAdodb->Param("Fecha"),
                    $this->labAdodb->Param("Modelo"),
                    $this->labAdodb->Param("Marca"),
                    $this->labAdodb->Param("Fila"),
                    $this->labAdodb->Param("Asiento_Fila"),                   
                    $this->labAdodb->Param("idTipo_Avion"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["Fecha"]          = $Tipo_Avion->getFecha();
            $valores["Modelo"]       = $Tipo_Avion->getModelo();
            $valores["Marca"]       = $Tipo_Avion->getMarca();
            $valores["Fila"]   = $Tipo_Avion->getFila();
            $valores["Asiento_Fila"]            = $Tipo_Avion->getAsiento_Fila();
            
            
            $valores["idTipo_Avion"]       = $Tipo_Avion->getidTipo_Avion();
            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo actualizar el registro (Error generado en el metodo update de la clase Tipo_AvionDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //elimina una persona en la base de datos
    //***********************************************************

    public function delete(Tipo_Avion $Tipo_Avion) {

        try {
            $sql = sprintf("delete from Tipo_Avion where  idTipo_Avion = %s",
                            $this->labAdodb->Param("idTipo_Avion"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["idTipo_Avion"] = $Tipo_Avion->getidTipo_Avion();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo eliminar el registro (Error generado en el metodo delete de la clase Tipo_AvionDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //busca a una persona en la base de datos
    //***********************************************************

    public function searchById(Tipo_Avion $Tipo_Avion) {

        $returnTipo_Avion = null;
        try {
            $sql = sprintf("select * from Tipo_Avion where  idTipo_Avion = %s",
                            $this->labAdodb->Param("idTipo_Avion"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["idTipo_Avion"] = $Tipo_Avion->getidTipo_Avion();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            
            if ($resultSql->RecordCount() > 0) {
                $returnTipo_Avion = Tipo_Avion::createNullTipo_Avion();
                $returnTipo_Avion->setidTipo_Avion($resultSql->Fields("idTipo_Avion"));
                $returnTipo_Avion->setFecha($resultSql->Fields("Fecha"));
                $returnTipo_Avion->setModelo($resultSql->Fields("Modelo"));
                $returnTipo_Avion->setMarca($resultSql->Fields("Marca"));
                $returnTipo_Avion->setFila($resultSql->Fields("Fila"));
                $returnTipo_Avion->setAsiento_Fila($resultSql->Fields("Asiento_Fila"));
            
          
            }
        } catch (Exception $e) {
            throw new Exception('No se pudo consultar el registro (Error generado en el metodo searchById de la clase Tipo_AvionDao), error:'.$e->getMessage());
        }
        return $returnTipo_Avion;
    }

    //***********************************************************
    //obtiene la información de las Tipo_Avion en la base de datos
    //***********************************************************
    
    public function getAll() {

        try {
            $sql = sprintf("select * from Tipo_Avion");
            $resultSql = $this->labAdodb->Execute($sql);
            return $resultSql;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAll de la clase Tipo_AvionDao), error:'.$e->getMessage());
        }
    }

}
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
        $this->labAdodb->Connect("localhost", "root","root", "mydb");
        
        $this->labAdodb->debug=true;
    }

    //***********************************************************
    //agrega a una persona a la base de datos
    //***********************************************************

    public function add(Avion $Avion) {

        try {
            $sql = sprintf("insert into Avion (idAvion, nombre, TipoAvion, PasajerosMax, CargaMax, cantidad) 
                                          values (%s,%s,%s,%s,%s,%s,CURDATE())",
                    $this->labAdodb->Param("idAvion"),
                    $this->labAdodb->Param("nombre"),
                    $this->labAdodb->Param("TipoAvion"),
                    $this->labAdodb->Param("PasajerosMax"),
                    $this->labAdodb->Param("CargaMax"),
                    $this->labAdodb->Param("cantidad"));       
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["idAvion"]       = $Avion->getidAvion();
            $valores["nombre"]          = $Avion->getnombre();
            $valores["TipoAvion"]       = $Avion->getTipoAvion();
            $valores["PasajerosMax"]       = $Avion->getPasajerosMax();
            $valores["CargaMax"]   = $Avion->getCargaMax();
            $valores["cantidad"]            = $Avion->getcantidad();

            

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
            $sql = sprintf("update Avion set nombre = %s, 
                                                TipoAvion = %s, 
                                                PasajerosMax = %s, 
                                                CargaMax = %s, 
                                                cantidad = %s,
                                                
                            where idAvion = %s",
                    $this->labAdodb->Param("nombre"),
                    $this->labAdodb->Param("TipoAvion"),
                    $this->labAdodb->Param("PasajerosMax"),
                    $this->labAdodb->Param("CargaMax"),
                    $this->labAdodb->Param("cantidad"),
                    $this->labAdodb->Param("Personas_PK_cedula"),
                    
                    $this->labAdodb->Param("idAvion"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["nombre"]          = $Avion->getnombre();
            $valores["TipoAvion"]       = $Avion->getTipoAvion();
            $valores["PasajerosMax"]       = $Avion->getPasajerosMax();
            $valores["CargaMax"]   = $Avion->getCargaMax();
            $valores["cantidad"]            = $Avion->getcantidad();
            
            
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
                $returnAvion->setnombre($resultSql->Fields("nombre"));
                $returnAvion->setTipoAvion($resultSql->Fields("TipoAvion"));
                $returnAvion->setPasajerosMax($resultSql->Fields("PasajerosMax"));
                $returnAvion->setCargaMax($resultSql->Fields("CargaMax"));
                $returnAvion->setcantidad($resultSql->Fields("cantidad"));
            
          
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
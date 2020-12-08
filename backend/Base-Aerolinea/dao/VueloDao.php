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
        $this->labAdodb->Connect("localhost", "root","root", "progra3");
        
        $this->labAdodb->debug=true;
    }

    //***********************************************************
    //agrega a una persona a la base de datos
    //***********************************************************

    public function add(Vuelo $Vuelo) {

        try {
            $sql = sprintf("insert into Vuelo (id_Vuelo, Fecha_Hora,Ruta_idRuta, Tipo_Avion_idTipo_Aviones) 
                                          values (%s,%s,%s,%s)",
                    $this->labAdodb->Param("id_Vuelo"),
                    $this->labAdodb->Param("Fecha_Hora"),
                    $this->labAdodb->Param("Ruta_idRuta"),
                    $this->labAdodb->Param("Tipo_Avion_idTipo_Aviones"));
             
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["id_Vuelo"]             = $Vuelo->getid_Vuelo();
            $valores["Fecha_Hora"]         = $Vuelo->getFecha_Hora();
            $valores["Ruta_idRuta"]       = $Vuelo->getRuta_idRuta();
            $valores["Tipo_Avion_idTipo_Aviones"]               = $Vuelo->getTipo_Avion_idTipo_Aviones();
           

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
            $sql = sprintf("select * from Vuelo where  id_Vuelo = %s ",
                            $this->labAdodb->Param("id_Vuelo"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["id_Vuelo"] = $Vuelo->getid_Vuelo();

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
            $sql = sprintf("update Vuelo set id_Vuelo = %s, 
                                                Fecha_Hora = %s,
                                                Ruta_idRuta = %s,
                                                Tipo_Avion_idTipo_Aviones = %s 
                                                
                            where id_Vuelo = %s",
                    $this->labAdodb->Param("Fecha_Hora"),
                    $this->labAdodb->Param("Ruta_idRuta"),
                    $this->labAdodb->Param("Tipo_Avion_idTipo_Aviones"),
                    $this->labAdodb->Param("id_Vuelo"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();


            $valores["Fecha_Hora"]       = $Vuelo->getFecha_Hora();
            $valores["Ruta_idRuta"]          = $Vuelo->getRuta_idRuta();
            $valores["Tipo_Avion_idTipo_Aviones"]       = $Vuelo->getTipo_Avion_idTipo_Aviones();
            $valores["id_Vuelo"]       = $Vuelo->getid_Vuelo();
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
            $sql = sprintf("delete from Vuelo where  id_Vuelo = %s",
                            $this->labAdodb->Param("id_Vuelo"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["id_Vuelo"] = $Vuelo->getid_Vuelo();

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
            $sql = sprintf("select * from Vuelo where  id_Vuelo = %s",
                            $this->labAdodb->Param("id_Vuelo"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["id_Vuelo"] = $Vuelo->getid_Vuelo();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            
            if ($resultSql->RecordCount() > 0) {
                $returnVuelo = Vuelo::createNullVuelo();
                $returnVuelo->setid_Vuelo($resultSql->Fields("id_Vuelo"));
                $returnVuelo->setFecha_Hora($resultSql->Fields("Fecha_Hora"));
                $returnVuelo->setRuta_idRuta($resultSql->Fields("Ruta_idRuta"));
                $returnVuelo->setTipo_Avion_idTipo_Aviones($resultSql->Fields("Tipo_Avion_idTipo_Aviones"));
                
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
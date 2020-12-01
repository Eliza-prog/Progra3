<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once("../../utlis/adodb5/adodb.inc.php");
require_once("../domain/Reservacion.php");

/**
 * 
 * @author ChGari
 * Date Last  modification: Tue Jul 07 16:42:51 CST 2020
 * Comment: It was created
 *
 */

//this attribute enable to see the SQL's executed in the data base

class ReservacionDao {
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

    public function add(Reservacion $Reservacion) {

        try {
            $sql = sprintf("insert into Reservacion (Persona_PK_cedula, Vuelo_idVuelo, Asiento, Destino_idDestino1) 
                                          values (%s,%s,%s,%s)",
                    $this->labAdodb->Param("Persona_PK_cedula"),
                    $this->labAdodb->Param("Vuelo_idVuelo"),
                    $this->labAdodb->Param("Asiento"));
                    

            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["Persona_PK_cedula"]       = $Reservacion->getPersona_PK_cedula();
            $valores["Vuelo_idVuelo"]          = $Reservacion->getVuelo_idVuelo();
            $valores["Asiento"]       = $Reservacion->getAsiento();
            

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo insertar el registro (Error generado en el metodo add de la clase ReservacionDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //verifica si una persona existe en la base de datos por ID
    //***********************************************************

    public function exist(Reservacion $Reservacion) {

        $exist = false;
        try {
            $sql = sprintf("select * from Reservacion where  Persona_PK_cedula = %s ",
                            $this->labAdodb->Param("Persona_PK_cedula"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["Persona_PK_cedula"] = $Reservacion->getPersona_PK_cedula();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            if ($resultSql->RecordCount() > 0) {
                $exist = true;
            }
            return $exist;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener el registro (Error generado en el metodo exist de la clase ReservacionDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //modifica una persona en la base de datos
    //***********************************************************

    public function update(Reservacion $Reservacion) {

        try {
            $sql = sprintf("update Reservacion set Vuelo_idVuelo = %s, 
                                                Asiento = %s, , 
                                                LASTMODIFICATION = CURDATE() 
                            where Persona_PK_cedula = %s",
                    $this->labAdodb->Param("Vuelo_idVuelo"),
                    $this->labAdodb->Param("Asiento"),
                    $this->labAdodb->Param("Persona_PK_cedula"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["Vuelo_idVuelo"]          = $Reservacion->getVuelo_idVuelo();
            $valores["Asiento"]       = $Reservacion->getAsiento(); $Reservacion->getDestino_idDestino1();
            $valores["Persona_PK_cedula"]       = $Reservacion->getPersona_PK_cedula();
            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo actualizar el registro (Error generado en el metodo update de la clase ReservacionDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //elimina una persona en la base de datos
    //***********************************************************

    public function delete(Reservacion $Reservacion) {

        try {
            $sql = sprintf("delete from Reservacion where  Persona_PK_cedula = %s",
                            $this->labAdodb->Param("Persona_PK_cedula"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["Persona_PK_cedula"] = $Reservacion->getPersona_PK_cedula();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo eliminar el registro (Error generado en el metodo delete de la clase ReservacionDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //busca a una persona en la base de datos
    //***********************************************************

    public function searchById(Reservacion $Reservacion) {

        $returnReservacion = null;
        try {
            $sql = sprintf("select * from Reservacion where  Persona_PK_cedula = %s",
                            $this->labAdodb->Param("Persona_PK_cedula"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["Persona_PK_cedula"] = $Reservacion->getPersona_PK_cedula();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            
            if ($resultSql->RecordCount() > 0) {
                $returnReservacion = Reservacion::createNullReservacion();
                $returnReservacion->setPersona_PK_cedula($resultSql->Fields("Persona_PK_cedula"));
                $returnReservacion->setVuelo_idVuelo($resultSql->Fields("Vuelo_idVuelo"));
                $returnReservacion->setAsiento($resultSql->Fields("Asiento"));

            }
        } catch (Exception $e) {
            throw new Exception('No se pudo consultar el registro (Error generado en el metodo searchById de la clase ReservacionDao), error:'.$e->getMessage());
        }
        return $returnReservacion;
    }

    //***********************************************************
    //obtiene la información de las Reservacion en la base de datos
    //***********************************************************
    
    public function getAll() {

        try {
            $sql = sprintf("select * from Reservacion");
            $resultSql = $this->labAdodb->Execute($sql);
            return $resultSql;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAll de la clase ReservacionDao), error:'.$e->getMessage());
        }
    }

}

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
        $this->labAdodb->setConnectionParameter('CharacterSet', 'WE8ISO8859P15');
        $this->labAdodb->Connect("localhost", "root","bases1", "progra3");
//        $this->labAdodb->debug=true;
    }

    //***********************************************************
    //agrega a una persona a la base de datos
    //***********************************************************

    public function add(Reservacion $Reservacion) {

        try {
            $sql = sprintf("insert into Reservacion (idReservacion, Numero_Fila, Numero_Asiento, Vuelo_id_Vuelo,Fecha_Reserva,Persona_Cliente1) 
                                          values (%s,%s,%s,%s,GETDATE(),%s)",
                    $this->labAdodb->Param("idReservacion"),
                    $this->labAdodb->Param("Numero_Fila"),
                    $this->labAdodb->Param("Numero_Asiento"),
                    $this->labAdodb->Param("Vuelo_id_Vuelo"),
                    $this->labAdodb->Param("Fecha_Reserva"),
                    $this->labAdodb->Param("Persona_Cliente1"));
                    

            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["idReservacion"]       = $Reservacion->getidReservacion();
            $valores["Numero_Fila"]          = $Reservacion->getNumero_Fila();
            $valores["Numero_Asiento"]       = $Reservacion->getNumero_Asiento();
            $valores["Vuelo_id_Vuelo"]       = $Reservacion->getVuelo_id_Vuelo();
            $valores["Fecha_Reserva"]       = $Reservacion->getFecha_Reserva();
            $valores["Persona_Cliente1"]       = $Reservacion->getPersona_Cliente1();
            

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
            $sql = sprintf("select * from Reservacion where  idReservacion = %s ",
                            $this->labAdodb->Param("idReservacion"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["idReservacion"] = $Reservacion->getidReservacion();

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
            $sql = sprintf("update Reservacion set Numero_Fila = %s, 
                                                Numero_Asiento = %s,  
                                                Vuelo_id_Vuelo = %s,
                                                Fecha_Reserva = CURDATE(),
                                                Persona_Cliente1 = %s
                            where idReservacion = %s",
                    $this->labAdodb->Param("Numero_Fila"),
                    $this->labAdodb->Param("Numero_Asiento"),
                    $this->labAdodb->Param("Vuelo_id_Vuelo"),
                    $this->labAdodb->Param("Fecha_Reserva"),
                    $this->labAdodb->Param("Persona_Cliente1"),
                    $this->labAdodb->Param("idReservacion"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["Numero_Fila"]         = $Reservacion->getNumero_Fila();
            $valores["Numero_Asiento"]      = $Reservacion->getNumero_Asiento();
            $valores["Vuelo_id_Vuelo"]      = $Reservacion->getVuelo_id_Vuelo();
            $valores["Fecha_Reserva"]       = $Reservacion->getFecha_Reserva();
            $valores["Persona_Cliente1"]    = $Reservacion->getPersona_Cliente1();
            $valores["idReservacion"]       = $Reservacion->getidReservacion();
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
            $sql = sprintf("delete from Reservacion where  idReservacion = %s",
                            $this->labAdodb->Param("idReservacion"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["idReservacion"] = $Reservacion->getidReservacion();

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
            $sql = sprintf("select * from Reservacion where  idReservacion = %s",
                            $this->labAdodb->Param("idReservacion"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["idReservacion"] = $Reservacion->getidReservacion();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            
            if ($resultSql->RecordCount() > 0) {
                $returnReservacion = Reservacion::createNullReservacion();
                $returnReservacion->setidReservacion($resultSql->Fields("idReservacion"));
                $returnReservacion->setNumero_Fila($resultSql->Fields("Numero_Fila"));
                $returnReservacion->setNumero_Asiento($resultSql->Fields("Numero_Asiento"));
                $returnReservacion->setVuelo_id_Vuelo($resultSql->Fields("Vuelo_id_Vuelo"));
                $returnReservacion->setFecha_Reserva($resultSql->Fields("Fecha_Reserva"));
                $returnReservacion->setPersona_Cliente1($resultSql->Fields("Persona_Cliente1"));

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

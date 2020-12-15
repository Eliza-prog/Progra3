<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once("../bo/ReservacionBo.php");
require_once("../domain/Reservacion.php");


/**
 * This class contain all services methods of the table Reservacion
 * @author ChGari
 * Date Last  modification: Fri Jul 24 11:28:43 CST 2020
 * Comment: It was created
 *
 */
//************************************************************
// Reservacion Controller 
//************************************************************

if (filter_input(INPUT_POST, 'action') != null) {
    $action = filter_input(INPUT_POST, 'action');

    try {
        $myReservacionBo = new ReservacionBo();
        $myReservacion = Reservacion::createNullReservacion();

        //***********************************************************
        //choose the action
        //***********************************************************

        if ($action === "add_Reservacion" or $action === "update_Reservacion") {
            //se valida que los parametros hayan sido enviados por post
            if ((filter_input(INPUT_POST, 'idReservacion') != null) && (filter_input(INPUT_POST, 'Numero_Fila') != null) && (filter_input(INPUT_POST, 'Numero_Asiento') != null)&& (filter_input(INPUT_POST, 'Vuelo_id_Vuelo') != null)&& (filter_input(INPUT_POST, 'Fecha_Reserva') != null)&& (filter_input(INPUT_POST, 'Persona_Cliente1') != null)) {
                $myReservacion->setidReservacion(filter_input(INPUT_POST, 'idReservacion'));
                $myReservacion->setNumero_Fila(filter_input(INPUT_POST, 'Numero_Fila'));
                $myReservacion->setNumero_Asiento(filter_input(INPUT_POST, 'Numero_Asiento'));
                $myReservacion->setVuelo_id_Vuelo(filter_input(INPUT_POST, 'Vuelo_id_Vuelo'));
                $myReservacion->setFecha_Reserva(filter_input(INPUT_POST, 'Fecha_Reserva'));
                $myReservacion->setPersona_Cliente1(filter_input(INPUT_POST, 'Persona_Cliente1'));
                if ($action == "add_Reservacion") {
                    $myReservacionBo->add($myReservacion);
                    echo('M~Registro Incluido Correctamente');
                }
                if ($action == "update_Reservacion") {
                    $myReservacionBo->update($myReservacion);
                    echo('M~Registro Modificado Correctamente');
                }
            }
        }

        //***********************************************************
        //***********************************************************

        if ($action === "showAll_Reservacion") {//accion de consultar todos los registros
            $resultDB   = $myReservacionBo->getAll();
            $json       = json_encode($resultDB->GetArray());
            $resultado = '{"data": ' . $json . '}';
            if($resultDB->RecordCount() === 0){
                $resultado = '{"data": []}';
            }
            echo $resultado;
        }

        //***********************************************************
        //***********************************************************

        
        if ($action === "show_Reservacion") {//accion de mostrar cliente por ID
            //se valida que los parametros hayan sido enviados por post
            if (filter_input(INPUT_POST, 'idReservacion') != null) {
                $myReservacion->setidReservacion(filter_input(INPUT_POST, 'idReservacion'));
                $myReservacion = $myReservacionBo->searchById($myReservacion);
                if ($myReservacion != null) {
                    echo json_encode(($myReservacion));
                } else {
                    echo('E~NO Existe un cliente con el ID especificado');
                }
            }
        }

        //***********************************************************
        //***********************************************************

        if ($action === "delete_Reservacion") {//accion de eliminar cliente por ID
            //se valida que los parametros hayan sido enviados por post
            if (filter_input(INPUT_POST, 'idReservacion') != null) {
                $myReservacion->setidReservacion(filter_input(INPUT_POST, 'idReservacion'));
                $myReservacionBo->delete($myReservacion);
                echo('M~Registro Fue Eliminado Correctamente');
            }
        }

        //***********************************************************
        //se captura cualquier error generado
        //***********************************************************
    } catch (Exception $e) { //exception generated in the business object..
        echo("E~" . $e->getMessage());
    }
} else {
    echo('M~Parametros no enviados desde el formulario'); //se codifica un mensaje para enviar
}
?>
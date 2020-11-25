<?php

require_once("../bo/VueloBo.php");
require_once("../domain/Vuelo.php");


/**
 * This class contain all services methods of the table Vuelo
 * @author ChGari
 * Date Last  modification: Fri Jul 24 11:28:43 CST 2020
 * Comment: It was created
 *
 */
//************************************************************
// Vuelo Controller 
//************************************************************

if (filter_input(INPUT_POST, 'action') != null) {
    $action = filter_input(INPUT_POST, 'action');

    try {
        $myVueloBo = new VueloBo();
        $myVuelo = Vuelo::createNullVuelo();

        //***********************************************************
        //choose the action
        //***********************************************************

        if ($action === "add_Vuelo" or $action === "update_Vuelo") {
            //se valida que los parametros hayan sido enviados por post
            if ((filter_input(INPUT_POST, 'idVuelo') != null) && (filter_input(INPUT_POST, 'Tipo') != null) && (filter_input(INPUT_POST, 'Ruta_idRuta') != null) && (filter_input(INPUT_POST, 'Costo')) != null) {
                $myVuelo->setidVuelo(filter_input(INPUT_POST, 'idVuelo'));
                $myVuelo->setTipo(filter_input(INPUT_POST, 'Tipo'));
                $myVuelo->setRuta_idRuta(filter_input(INPUT_POST, 'Ruta_idRuta'));
                $myVuelo->setCosto(filter_input(INPUT_POST, 'Costo'));
                $myVuelo->setLastUser('112540148');
                if ($action == "add_Vuelo") {
                    $myVueloBo->add($myVuelo);
                    echo('M~Registro Incluido Correctamente');
                }
                if ($action == "update_Vuelo") {
                    $myVueloBo->update($myVuelo);
                    echo('M~Registro Modificado Correctamente');
                }
            }
        }

        //***********************************************************
        //***********************************************************

        if ($action === "showAll_Vuelo") {//accion de consultar todos los registros
            $resultDB   = $myVueloBo->getAll();
            $json       = json_encode($resultDB->GetArray());
            $resultado = '{"data": ' . $json . '}';
            if($resultDB->RecordCount() === 0){
                $resultado = '{"data": []}';
            }
            echo $resultado;
        }

        //***********************************************************
        //***********************************************************

        
        if ($action === "show_Vuelo") {//accion de mostrar cliente por ID
            //se valida que los parametros hayan sido enviados por post
            if (filter_input(INPUT_POST, 'idVuelo') != null) {
                $myVuelo->setidVuelo(filter_input(INPUT_POST, 'idVuelo'));
                $myVuelo = $myVueloBo->searchById($myVuelo);
                if ($myVuelo != null) {
                    echo json_encode(($myVuelo));
                } else {
                    echo('E~NO Existe un cliente con el ID especificado');
                }
            }
        }

        //***********************************************************
        //***********************************************************

        if ($action === "delete_Vuelo") {//accion de eliminar cliente por ID
            //se valida que los parametros hayan sido enviados por post
            if (filter_input(INPUT_POST, 'idVuelo') != null) {
                $myVuelo->setidVuelo(filter_input(INPUT_POST, 'idVuelo'));
                $myVueloBo->delete($myVuelo);
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


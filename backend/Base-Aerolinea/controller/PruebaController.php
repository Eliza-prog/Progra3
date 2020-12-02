<?php
require_once("../bo/PruebaBo.php");
require_once("../domain/Prueba.php");


/**
 * This class contain all services methods of the table Prueba
 * @author ChGari
 * Date Last  modification: Fri Jul 24 11:28:43 CST 2020
 * Comment: It was created
 *
 */
//************************************************************
// Prueba Controller 
//************************************************************

if (filter_input(INPUT_POST, 'action') != null) {
    $action = filter_input(INPUT_POST, 'action');

    try {
        $myPruebaBo = new PruebaBo();
        $myPrueba = Prueba::createNullPrueba();

        //***********************************************************
        //choose the action
        //***********************************************************

        if ($action === "add_Prueba" or $action === "update_Prueba") {
            //se valida que los parametros hayan sido enviados por post
            if ((filter_input(INPUT_POST, 'PK_cedula') != null) && (filter_input(INPUT_POST, 'nombre') != null)) {
                $myPrueba->setPK_cedula(filter_input(INPUT_POST, 'PK_cedula'));
                $myPrueba->setnombre(filter_input(INPUT_POST, 'nombre'));
                if ($action == "add_Prueba") {
                    $myPruebaBo->add($myPrueba);
                    echo('M~Registro Incluido Correctamente');
                }
                if ($action == "update_Prueba") {
                    $myPruebaBo->update($myPrueba);
                    echo('M~Registro Modificado Correctamente');
                }
            }
        }

        //***********************************************************
        //***********************************************************

        if ($action === "showAll_Prueba") {//accion de consultar todos los registros
            $resultDB   = $myPruebaBo->getAll();
            $json       = json_encode($resultDB->GetArray());
            $resultado = '{"data": ' . $json . '}';
            if($resultDB->RecordCount() === 0){
                $resultado = '{"data": []}';
            }
            echo $resultado;
        }

        //***********************************************************
        //***********************************************************

        
        if ($action === "show_Prueba") {//accion de mostrar cliente por ID
            //se valida que los parametros hayan sido enviados por post
            if (filter_input(INPUT_POST, 'PK_cedula') != null) {
                $myPrueba->setPK_cedula(filter_input(INPUT_POST, 'PK_cedula'));
                $myPrueba = $myPruebaBo->searchById($myPrueba);
                if ($myPrueba != null) {
                    echo json_encode(($myPrueba));
                } else {
                    echo('E~NO Existe un cliente con el ID especificado');
                }
            }
        }

        //***********************************************************
        //***********************************************************

        if ($action === "delete_Prueba") {//accion de eliminar cliente por ID
            //se valida que los parametros hayan sido enviados por post
            if (filter_input(INPUT_POST, 'PK_cedula') != null) {
                $myPrueba->setPK_cedula(filter_input(INPUT_POST, 'PK_cedula'));
                $myPruebaBo->delete($myPrueba);
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

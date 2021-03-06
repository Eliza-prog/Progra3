<?php

require_once("../bo/RutaBo.php");
require_once("../domain/Ruta.php");


/**
 * This class contain all services methods of the table Ruta
 * @author ChGari
 * Date Last  modification: Fri Jul 24 11:28:43 CST 2020
 * Comment: It was created
 *
 */
//************************************************************
// Ruta Controller 
//************************************************************

if (filter_input(INPUT_POST, 'action') != null) {
    $action = filter_input(INPUT_POST, 'action');

    try {
        $myRutaBo = new RutaBo();
        $myRuta = Ruta::createNullRuta();

        //***********************************************************
        //choose the action
        //***********************************************************

        if ($action === "add_Ruta" or $action === "update_Ruta") {
            //se valida que los parametros hayan sido enviados por post
            if ((filter_input(INPUT_POST, 'idRuta') != null) && (filter_input(INPUT_POST, 'Recorrido') != null) && (filter_input(INPUT_POST, 'Valor') != null) && (filter_input(INPUT_POST, 'Tiempo') != null)) {
                $myRuta->setidRuta(filter_input(INPUT_POST, 'idRuta'));
                $myRuta->setRecorrido(filter_input(INPUT_POST, 'Recorrido'));
                $myRuta->setTiempo(filter_input(INPUT_POST, 'Tiempo'));
                $myRuta->setValor(filter_input(INPUT_POST, 'Valor'));
            
                if ($action == "add_Ruta") {
                    $myRutaBo->add($myRuta);
                    echo('M~Registro Incluido Correctamente');
                }
                if ($action == "update_Ruta") {
                    $myRutaBo->update($myRuta);
                    echo('M~Registro Modificado Correctamente');
                }
            }
        }

        //***********************************************************
        //***********************************************************

        if ($action === "showAll_Ruta") {//accion de consultar todos los registros
            $resultDB   = $myRutaBo->getAll();
            $json       = json_encode($resultDB->GetArray());
            $resultado = '{"data": ' . $json . '}';
            if($resultDB->RecordCount() === 0){
                $resultado = '{"data": []}';
            }
            echo $resultado;
        }

        //***********************************************************
        //***********************************************************

        
        if ($action === "show_Ruta") {//accion de mostrar cliente por ID
            //se valida que los parametros hayan sido enviados por post
            if (filter_input(INPUT_POST, 'idRuta') != null) {
                $myRuta->setidRuta(filter_input(INPUT_POST, 'idRuta'));
                $myRuta = $myRutaBo->searchById($myRuta);
                if ($myRuta != null) {
                    echo json_encode(($myRuta));
                } else {
                    echo('E~NO Existe un cliente con el ID especificado');
                }
            }
        }

        //***********************************************************
        //***********************************************************

        if ($action === "delete_Ruta") {//accion de eliminar cliente por ID
            //se valida que los parametros hayan sido enviados por post
            if (filter_input(INPUT_POST, 'idRuta') != null) {
                $myRuta->setidRuta(filter_input(INPUT_POST, 'idRuta'));
                $myRutaBo->delete($myRuta);
                echo('M~Registro Fue Eliminado Correctamente');
            }
        }
                
        if ($action === "Ruta_Login") {//accion de mostrar cliente por ID
            //se valida que los parametros hayan sido enviados por post
            if (filter_input(INPUT_POST, 'idRuta') != null && filter_input(INPUT_POST, 'Tiempo') != null) {
                $myRuta->setidRuta(filter_input(INPUT_POST, 'idRuta'));
                $myRuta = $myRutaBo->IntoById($myRuta);
                $Tiempo = filter_input(INPUT_POST, 'Tiempo');
                if ($myRuta != null) {
                    if($myRuta->getContrasena() === $Tiempo ){                       
                        session_name("Progra");
                        session_start();
                        $_SESSION["Progra_idRuta"] = $myRuta->getidRuta(); 
                        $_SESSION["Progra_idRuta"] = $myRuta->getidRuta();
                    }else{
                        echo('E~Usuario y/o Tiempo invalidos');
                    }
                } else {
                    echo('E~NO Existe un idRuta con el ID especificado');
                }
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



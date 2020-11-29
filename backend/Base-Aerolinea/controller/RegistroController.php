<?php

require_once("../bo/RegistroBo.php");
require_once("../domain/Registro.php");


/**
 * This class contain all services methods of the table Registro
 * @author ChGari
 * Date Last  modification: Fri Jul 24 11:28:43 CST 2020
 * Comment: It was created
 *
 */
//************************************************************
// Registro Controller 
//************************************************************

if (filter_input(INPUT_POST, 'action') != null) {
    $action = filter_input(INPUT_POST, 'action');

    try {
        $myRegistroBo = new RegistroBo();
        $myRegistro = Registro::createNullRegistro();

        //***********************************************************
        //choose the action
        //***********************************************************

        if ($action === "add_Registro" or $action === "update_Registro") {
            //se valida que los parametros hayan sido enviados por post
            if ((filter_input(INPUT_POST, 'idRegistro') != null) && (filter_input(INPUT_POST, 'NombreUsuario') != null) && (filter_input(INPUT_POST, 'Contraseña') != null) && (filter_input(INPUT_POST, 'Email') != null) (filter_input(INPUT_POST, 'Email') != null)(filter_input(INPUT_POST, 'FechaRegistro') != null)(filter_input(INPUT_POST, 'Personas_PK_cedula') != null)) {
                $myRegistro->setidRegistro(filter_input(INPUT_POST, 'idRegistro'));
                $myRegistro->setNombreUsuario(filter_input(INPUT_POST, 'NombreUsuario'));
                $myRegistro->setContraseña(filter_input(INPUT_POST, 'Contraseña'));
                $myRegistro->setEmail(filter_input(INPUT_POST, 'Email'));
                $myRegistro->setNombreUsuario(filter_input(INPUT_POST, 'FechaRegistro'));
                $myRegistro->setPersonas_PK_cedula(filter_input(INPUT_POST, 'Personas_PK_cedula'));
                if ($action == "add_Registro") {
                    $myRegistroBo->add($myRegistro);
                    echo('M~Registro Incluido Correctamente');
                }
                if ($action == "update_Registro") {
                    $myRegistroBo->update($myRegistro);
                    echo('M~Registro Modificado Correctamente');
                }
            }
        }

        //***********************************************************
        //***********************************************************

        if ($action === "showAll_Registro") {//accion de consultar todos los registros
            $resultDB   = $myRegistroBo->getAll();
            $json       = json_encode($resultDB->GetArray());
            $resultado = '{"data": ' . $json . '}';
            if($resultDB->RecordCount() === 0){
                $resultado = '{"data": []}';
            }
            echo $resultado;
        }

        //***********************************************************
        //***********************************************************

        
        if ($action === "show_Registro") {//accion de mostrar cliente por ID
            //se valida que los parametros hayan sido enviados por post
            if (filter_input(INPUT_POST, 'idRegistro') != null) {
                $myRegistro->setidRegistro(filter_input(INPUT_POST, 'idRegistro'));
                $myRegistro = $myRegistroBo->searchById($myRegistro);
                if ($myRegistro != null) {
                    echo json_encode(($myRegistro));
                } else {
                    echo('E~NO Existe un cliente con el ID especificado');
                }
            }
        }

        //***********************************************************
        //***********************************************************

        if ($action === "delete_Registro") {//accion de eliminar cliente por ID
            //se valida que los parametros hayan sido enviados por post
            if (filter_input(INPUT_POST, 'idRegistro') != null) {
                $myRegistro->setidRegistro(filter_input(INPUT_POST, 'idRegistro'));
                $myRegistroBo->delete($myRegistro);
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

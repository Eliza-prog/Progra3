<?php
$templateTitle = 'Mantenimiento de Vuelos';
$templateScripts = '<script type="text/javascript" src="js/VueloFunctions.js"></script>';
$templatePageHeader = '<h1><Nombre Sistema><small> Mantenimiento de Vuelos</small><img src="img/logo_1.png" align="right"/></h1>';

include_once("template/templateHead.php");
?>

<!-- ********************************************************** -->
<!-- ********************************************************** -->
<!-- ********************************************************** -->
<div class="row">
    <div class="col-md-12">
        <form role="form" onsubmit="return false;" id="formVuelo">
            <div class="row">
                <!-- ******************************************************** -->
                <!-- Campos de formulario      -->
                <!-- ******************************************************** -->
                <div class="col-md-12">

                    <div class="form-group" id="groupid_Vuelo">
                        <label for="txtid_Vuelo">id_Vuelo</label>
                        <input type="text" class="form-control" id="txtid_Vuelo"  placeholder="id_Vuelo">
                    </div>
                    <div class="form-group" id="groupFecha_Hora">
                        <label for="txtFecha_Hora">Fecha_Hora</label>
                        <input type="text" class="form-control" id="txtFecha_Hora"  placeholder="Fecha_Hora">
                    </div>
                    <div class="form-group" id="groupRuta_idRuta">
                        <label for="txtRuta_idRuta">Ruta_idRuta</label>
                        <input type="text" class="form-control" id="txtRuta_idRuta"  placeholder="Ruta_idRuta">
                    </div>
                    <div class="form-group" id="groupTipo_Avion_idTipo_Aviones">
                        <label for="txtTipo_Avion_idTipo_Aviones">Tipo_Avion_idTipo_Aviones</label>
                        <input type="text" class="form-control" id="txtTipo_Avion_idTipo_Aviones"  placeholder="Tipo_Avion_idTipo_Aviones">
                    </div>       
                    <div class="form-group">
                        <input type="hidden" id="typeAction" value="add_personas" />
                        <input type="hidden" value="" id="idTarea"/>
                        <button type="submit" class="btn btn-primary" id="enviar">Guardar</button>
                        <button type="reset" class="btn btn-danger" id="cancelar">Cancelar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<br>
<h3>Tabla con informacion de Vuelos</h3>
<br><br>
<div class="row">
    <div class="col-md-12">
        <div id="divResult" style="text-align:center;">Resultado de la consulta</div>
    </div>
</div>
<?php
include_once("template/templateFooter.php");
?>
